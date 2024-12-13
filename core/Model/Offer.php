<?php

namespace App\Core\Model;

use DateTime;

class Offer
{
    public function __construct(private int $id, private string $title, private float $salary, private string $description,
        private string $createdAt,
        private string $updatedAt,
        private int $companyId, private string $region, private string $requiredExperience, private bool $isRemote, private string $companyName,
        private int $status) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getCreatedAt(): string
    {
        return $this->timeAgo($this->createdAt);
    }

    public function getUpdatedAt(): string
    {
        return $this->timeAgo($this->updatedAt);
    }

    public function getCompanyId(): int
    {
        return $this->companyId;
    }

    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    private function timeAgo(string $datetime): string
    {
        $dateTime = new DateTime($datetime);
        $now = new DateTime;
        $interval = $now->diff($dateTime);

        $years = $interval->y;
        $months = $interval->m;
        $days = $interval->d;
        $hours = $interval->h;
        $minutes = $interval->i;
        $seconds = $interval->s;

        if ($years > 0) {
            return $years.' '.($years === 1 ? 'год назад' : ($years <= 4 ? 'года назад' : 'лет назад'));
        }
        if ($months > 0) {
            return $months.' '.($months === 1 ? 'месяц назад' : ($months <= 4 ? 'месяца назад' : 'месяцев назад'));
        }
        if ($days > 7) {
            $weeks = floor($days / 7);

            return $weeks.' '.($weeks === 1 ? 'неделю назад' : ($weeks <= 4 ? 'недели назад' : 'недель назад'));
        }
        if ($days > 0) {
            return $days.' '.($days === 1 ? 'день назад' : ($days <= 4 ? 'дня назад' : 'дней назад'));
        }
        if ($hours > 0) {
            return $hours.' '.($hours === 1 ? 'час назад' : ($hours <= 4 ? 'часа назад' : 'часов назад'));
        }
        if ($minutes > 0) {
            return $minutes.' '.($minutes === 1 ? 'минуту назад' : ($minutes <= 4 ? 'минуты назад' : 'минут назад'));
        }

        return $seconds.' '.($seconds === 1 ? 'секунду назад' : ($seconds <= 4 ? 'секунды назад' : 'секунд назад'));
    }

    public function getRegion(): string
    {
        return $this->region;
    }

    public function getRequiredExperience(): string
    {
        return $this->requiredExperience;
    }

    public function isRemote(): bool
    {
        return $this->isRemote;
    }

    public function getStatus(): string
    {
        $hashMap = [
            '0' => 'На проверке',
            '1' => 'Активное',
            '2' => 'Завершенное',
        ];
        $res = $hashMap[$this->status];

        return $res;
    }
}
