<?php

namespace App\Core\Http;

interface IRedirect
{
    public function to(string $url);
}
