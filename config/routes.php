<?php
use VNCHub\Mvc\Controller\Video\{
    VideoDeleteController,
    VideoFormController,
    NewVideoController,
    VideoUpdateController,
    VideoListController
};
use VNCHub\Mvc\Controller\{
    LoginFormController,
    LoginController,
    LogoutController,
};

return [
    'GET|/' => VideoListController::class,
    "GET|/novo-video" => VideoFormController::class,
    "POST|/novo-video"=> NewVideoController::class,
    "GET|/editar-video"=> VideoFormController::class,
    "POST|/editar-video"=> VideoUpdateController::class,
    "GET|/remover-video" => VideoDeleteController::class,
    "GET|/login"=> LoginFormController::class,
    "POST|/login" => LoginController::class,
    "GET|/logout" => LogoutController::class,
];