<?php

namespace App\Core\Http;

readonly class Request
{
    function __construct(
        public array $get,
        public array $post,
        public array $server,
        public array $files,
        public array $cookies,
    )
    {

}
public static function createFromGlobals(): static
{
return new static(
    $_GET,
    $_POST,
    $_SERVER,
    $_FILES,
    $_COOKIE,
);
}
public function uri(): string
{
return strtok($_SERVER['REQUEST_URI'], '?');
}
public function method(): string{
        return $this->server['REQUEST_METHOD'];
}
}