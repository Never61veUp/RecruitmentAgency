<?php

namespace App\Core\View;

class View
{
public function render(string $name): void {
    include_once APP_PATH . "/views/pages/$name.php";
}
}