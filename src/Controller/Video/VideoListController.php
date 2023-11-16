<?php

namespace VNCHub\Mvc\Controller\Video;

use VNCHub\Mvc\Controller\Controller;
use VNCHub\Mvc\Repository\VideoRepository;

class VideoListController implements Controller
{
    private VideoRepository $videoRepository;
    public function __construct(\PDO $pdo)
    {
        $this->videoRepository = new VideoRepository($pdo);
    }

    public function processaRequisicao(): void
    {

        $videoList = $this->videoRepository->all();
        require_once __DIR__ . '/../../../views/__videoList.php';
    }
}