<?php

namespace App\Core\View;

interface IView
{
    public function renderView(string $name): void;

    public function renderComponent(string $name): void;
}
