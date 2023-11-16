<?php

namespace VNCHub\Mvc\Controller\Video;
use VNCHub\Mvc\Controller\Controller;
use VNCHub\Mvc\Entity\Video;
use VNCHub\Mvc\Repository\VideoRepository;

class VideoFormController implements Controller
{
    private VideoRepository $videoRepository;
    private Video $video;
    private ?int $id;

    public function __construct(\PDO $pdo)
    {   
        $this->id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if($this->id != false) {
            $stmt = $pdo->prepare("SELECT * FROM videos WHERE id = ?;");
            $stmt->bindValue(1, $this->id);
            $stmt->execute();
            $videoData = $stmt->fetch(\PDO::FETCH_ASSOC);
            $this->video = new Video(
                url: $videoData['url'],
                title: $videoData['title']);
            $this->video->setId($this->id);
        } 
        $this->videoRepository = new VideoRepository($pdo);
    }

    public function processaRequisicao(): void
    { 
    require_once __DIR__ . '/../../../views/__videoForm.php'; 
    }
}