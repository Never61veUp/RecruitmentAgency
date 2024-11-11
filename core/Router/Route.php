<?php

namespace App\Core\Router;

class Route
{
    public function __construct(
        private string $url,
        private string $method,
        private $action
    ) {}

    public static function get(string $url, $action): static
    {
        return new static($url, 'GET', $action);
    }

    public static function post(string $url, $action): static
    {

        return new static($url, 'POST', $action);
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getAction()
    {

        return $this->action;
    }
}
