<?php

namespace App\Services;

use App\Core\Model\Company;
use App\Core\Persistance\IDataBase;

class CompanyService
{
    public function __construct(private IDataBase $database) {}

    public function getAllUsers(): array
    {
        $companies = $this->database->get('company');

        $companies = array_map(function ($company) {
            return new Company(id: $company['id'], title: $company['title'], email: $company['email'], password: $company['password']);
        }, $companies);

        return $companies;
    }

    public function getCount(): int
    {
        $companies = $this->database->get('company');

        return count($companies);
    }
}
