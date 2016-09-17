<?php
namespace App\Testing;

use App\Rosters\Roster;

trait DefaultIncludes
{
    /**
     * @param \App\Rosters\Roster $roster
     * @param array $attributes
     * @return array
     */
    public function includedRoster(Roster $roster, $attributes = [])
    {
        return array_merge([
            'id' => $roster->id(),
            'type' => $roster->type(),
            'date' => $roster->date()->toIso8601String(),
            'description' => $roster->description(),
            'limit' => $roster->limit(),
        ], $attributes);
    }
}
