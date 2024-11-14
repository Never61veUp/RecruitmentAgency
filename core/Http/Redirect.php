<?php

namespace App\Core\Http;

class Redirect implements IRedirect
{
    public function to(string $url)
    {
        header('Location: '.$url);
        exit;
    }
}
