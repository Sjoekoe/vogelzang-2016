<?php
namespace App\Testing;

use App\Rosters\Roster;
use Carbon\Carbon;

trait CreatesModels
{
    /**
     * @param array $attributes
     * @return \App\Rosters\Roster
     */
    public function createRoster(array $attributes = [])
    {
        return $this->modelFactory->create(Roster::class, array_merge([
            'name' => 3,
            'date' => Carbon::now(),
            'type' => Roster::DRESSUURLES,
            'description' => 'Foo bar',
            'limit' => 12,
            'hour' => 1,
        ], $attributes));
    }
}
