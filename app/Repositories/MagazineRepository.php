<?php

namespace App\Repositories;

use App\Models\Magazine;
use Illuminate\Database\Eloquent\Builder;

class MagazineRepository
{
    /**
     * @var Magazine|Builder
     */
    private $modelQuery;

    public function __construct()
    {
        $this->modelQuery = Magazine::query();
    }

    public static function init(): MagazineRepository
    {
        return new static();
    }

    public function filter(array $searchData): Builder
    {
        $this->filterByPublisher((int)($searchData['publisher_id'] ?? 0));
        $this->filterByName($searchData['name'] ?? null);

        return $this->modelQuery;
    }

    public function filterByPublisher(int $publisherId): Builder
    {
        if ($publisherId > 0) {
            $this->modelQuery->where('publisher_id', $publisherId);
        }

        return $this->modelQuery;
    }

    public function filterByName(?string $name): Builder
    {
        if (!empty($name)) {
            $this->modelQuery->where('name', 'like', '%' . $name . '%');
        }

        return $this->modelQuery;
    }
}