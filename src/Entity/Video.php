<?php

namespace VNCHub\Mvc\Entity;
use InvalidArgumentException;

class Video 
{
    public readonly int $id;
    public readonly string $url;
    private ?string $filePath = null;

    public function __construct(
        string $url,
        public readonly string $title,
    ) {
        $this->setUrl($url);
    }

    private function setUrl(string $url)
    {
        if(filter_var($url, FILTER_VALIDATE_URL) === false) {
            throw new InvalidArgumentException();
        }
        $this->url = $url;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setFilePath(?string $filePath) {
        $this->filePath = $filePath;
    }

    public function getFilePath(): ?string
    {
        return $this->filePath;
    }
}