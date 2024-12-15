<?php

namespace App\Controllers;

use App\Core\Controller\Controller;

class EmployeeResponsesController extends Controller
{
    public function getResponses(): array
    {

        $userEmail = $this->session->get('email')['id'];

        $sql = '
        SELECT 
            r.id,
            r.fullName,
            r.email,
            r.phone,
            r.Cv,
            o.title AS offer_title,
            c.title AS company_name
        FROM 
            responses r
        JOIN 
            offers o ON r.offerId = o.id
        JOIN 
            company c ON o.companyId = c.id
        WHERE 
            c.id = :userEmail
    ';

        // Выполняем запрос с параметром userId
        return $this->dataBase->query($sql, ['userEmail' => $userEmail]);

    }

    public function index()
    {
        $responses = $this->getResponses();
        $this->view('responses', ['responses' => $responses]);
    }
}
