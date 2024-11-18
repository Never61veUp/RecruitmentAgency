<?php

namespace App\Core\Router;

class Route
{
    public function __construct(
        private string $url,
        private string $method,
        private $action,
        private readonly array $middlewares = [],
    ) {}

    public static function get(string $url, $action, array $middlewares = []): static
    {
        return new static($url, 'GET', $action, $middlewares);
    }

    public static function post(string $url, $action, array $middlewares = []): static
    {

        return new static($url, 'POST', $action, $middlewares);
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

    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }

    public function hasMiddlewares(): bool
    {
        return ! empty($this->middlewares);
    }
}
