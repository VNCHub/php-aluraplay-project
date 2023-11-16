<?php

namespace VNCHub\Mvc\Controller\Video;
use VNCHub\Mvc\Controller\Controller;
use VNCHub\Mvc\Repository\VideoRepository;

class VideoDeleteController implements Controller
{
    private VideoRepository $videoRepository;
    private null | int $id;

    public function __construct($pdo){
        $this->videoRepository = new VideoRepository($pdo);

        $this->id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($this->id === false) {
            header("Location: /?sucesso=0");
            exit();
        }
    }

    public function processaRequisicao(): void
    {
        if ($this->videoRepository->remove($this->id)) {
            header("Location: /?sucesso=1");
            exit();
        }

        header("Location: /?sucesso=0");
    }
}