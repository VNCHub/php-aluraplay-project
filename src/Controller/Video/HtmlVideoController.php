<?php

namespace VNCHub\Mvc\Controller\Video;

abstract class HtmlVideoController
{
    private const TEMPLATE_PATH = __DIR__ . '/../../../views';

    protected function renderTemplate(string $templateName, array $context = []): void
    {
        extract($context);
        require_once self::TEMPLATE_PATH . $templateName .'.php';
    }

}