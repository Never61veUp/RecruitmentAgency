<?php

namespace App\Services;

use App\Core\Model\Offer;
use App\Core\Persistance\IDataBase;

class OfferService
{
    public function __construct(private IDataBase $database) {}

    public function getAll(array $conditions = [], array $likeConditions = []): array
    {

        $offers = $this->database->get('offers', $conditions, $likeConditions);

        $offers = array_map(function ($offer) {
            $companies = $this->database->get('company', ['id' => $offer['companyId']]);

            //dd($offer, $companies);
            return new Offer(id: $offer['id'],
                title: $offer['title'],
                salary: $offer['salary'],
                description: $offer['description'],
                createdAt: $offer['created_at'],
                updatedAt: $offer['updatedAt'],
                companyId: $offer['companyId'],
                region: $offer['region'],
                requiredExperience: $offer['requiredExperience'],
                isRemote: $offer['isRemote'],
                companyName: $companies[0]['title'] ?? '',
                status: $offer['status'] ?? 2,
            );
        }, $offers);

        return $offers;
    }

    public function getCount(): int
    {
        $offers = $this->database->get('offers');

        return count($offers);
    }
}
