<?php
    namespace VNCHub\Mvc\Controller\Video;
    use VNCHub\Mvc\Controller\Controller;
    use VNCHub\Mvc\Entity\Video;
    use VNCHub\Mvc\Repository\VideoRepository;

    class VideoUpdateController implements Controller
    {
        private VideoRepository $videoRepository;
        private Video $video;

        public function __construct(\PDO $pdo)
        {
            $this->videoRepository = new VideoRepository($pdo);

            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
            $title = filter_input(INPUT_POST, 'titulo');

            if( $id === false || $url === false || $title === false){
                header("Location: /?sucesso=0");
                exit();
            }
            
            $this->video = new Video(url: $url, title: $title);
            $this->video->setId($id);
        }

        public function processaRequisicao(): void
        {
            if($this->videoRepository->update($this->video)){
                header("Location: /?sucesso=1");
                exit();
            }
            
            header("Location: /?sucesso=0");
        }
    }