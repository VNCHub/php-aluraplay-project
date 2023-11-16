<?php

namespace VNCHub\Mvc\Controller\Video;
use VNCHub\Mvc\Controller\Controller;
use VNCHub\Mvc\Entity\Video;
use VNCHub\Mvc\Repository\VideoRepository;

class NewVideoController implements Controller
{
    private VideoRepository $videoRepository;
    private Video $video;

    public function __construct(\PDO $pdo)
    {
        $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
        $titulo = filter_input(INPUT_POST, 'titulo');

        if ($url === false || $titulo === false){
            header("Location: /?sucesso=0");
            exit();
        }
        $this->video = new Video($url, $titulo);
        $file = $_FILES['image'];

        if ($file['error'] === UPLOAD_ERR_OK) {
            $safeFileName = pathinfo($file['name'], PATHINFO_BASENAME);
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mimeType = $finfo->file($file['tmp_name']);
            if(str_starts_with($mimeType, 'image/')) {
                move_uploaded_file( 
                    $file['tmp_name'],
                    __DIR__ . '/../../../public/img/uploads/' . $safeFileName
                );
            }
            $this->video->setFilePath($safeFileName);
        }

        $this->videoRepository = new VideoRepository($pdo);
    }

    public function processaRequisicao(): void
    {
        $this->videoRepository->add($this->video);

        header("Location: /?sucesso=1");
    }
}