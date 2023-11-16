<?php

namespace VNCHub\Mvc\Repository;
use VNCHub\Mvc\Entity\Video;
class VideoRepository
{
    public function __construct(
        private \PDO $pdo
        ) {}

    public function add(Video $video): bool | Video
    {
        $sqlInsert = "INSERT INTO videos (url, title, image_path) VALUES(?, ?, ?);";
        $stmt = $this->pdo->prepare($sqlInsert);
        $stmt->bindValue(1, $video->url);
        $stmt->bindValue(2, $video->title);
        $stmt->bindValue(3, $video->getFilePath());

        if($stmt->execute()) {
            $id = $this->pdo->lastInsertId();
            $video->setId(intval($id));
            return $video;
        }
        return False;
    }

    public function remove(int $id): bool
    {
        $deleteSql = 'DELETE FROM videos WHERE id = ?';
        $stmt = $this->pdo->prepare($deleteSql);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }

    public function update(Video $video): bool
    {
        $sqlUpdate = "UPDATE videos SET url = :url, title = :title WHERE id = :id;";
        $stmt = $this->pdo->prepare($sqlUpdate);
        $stmt->bindValue(':url', $video->url);
        $stmt->bindValue(':title', $video->title);
        $stmt->bindValue(':id', $video->id, \PDO::PARAM_INT);
        return $stmt->execute();
    }
    /**
     * @return Video[]
     */
    public function all(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM videos;");
        $videoData = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        // Função map recebe dois parametros, (1) uma função anônima que retorna o formato desejado
        // e (2) uma lista associativa.
        return array_map( 
            function (array $objectData) {
                $video = new Video(
                    url: $objectData['url'],
                    title: $objectData['title']
                );
                $video->setId($objectData['id']);
                $video->setFilePath($objectData['image_path']);
                return $video;
            }, 
            $videoData);
    }
}
