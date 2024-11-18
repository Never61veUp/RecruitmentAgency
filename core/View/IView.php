<?php

namespace App\Core\View;

interface IView
{
    public function renderView(string $name, array $data = []): void;

    public function renderComponent(string $name): void;
}
