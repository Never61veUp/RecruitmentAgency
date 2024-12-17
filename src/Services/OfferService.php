<?php

namespace App\Services;

use App\Core\Model\Offer;
use App\Core\Persistance\IDataBase;

class OfferService
{
    public function __construct(private IDataBase $database) {}

    public function getAll(array $conditions = [], array $likeConditions = [], ?string $companyName = null): array
    {

        if (! empty($companyName)) {
            $companies = $this->database->get('company', [], ['title' => $companyName]);

            $companyIds = array_map(fn ($company) => $company['id'], $companies)[0];

            if (! empty($companyIds)) {
                $conditions = ['CompanyId' => $companyIds];
            } else {
                return [];
            }
        }

        $offers = $this->database->get('offers', [], array_merge($likeConditions, $conditions));

        // Преобразуем данные офферов в объекты Offer
        $offers = array_map(function ($offer) {
            $companies = $this->database->get('company', ['id' => $offer['companyId']]);

            return new Offer(
                id: $offer['id'],
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

    public function getFirst(array $conditions = [], array $likeConditions = []): Offer
    {

        $offer = $this->database->first('offers', $conditions, $likeConditions);

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

    }

    public function getCount(): int
    {
        $offers = $this->database->get('offers');

        return count($offers);
    }
}
