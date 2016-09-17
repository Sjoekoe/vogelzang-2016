<?php
namespace App\Api\Rosters;

use App\Rosters\Roster;
use League\Fractal\TransformerAbstract;

class RosterTransformer extends TransformerAbstract
{
    /**
     * @param \App\Rosters\Roster $roster
     * @return array
     */
    public function transform(Roster $roster)
    {
        return [
            'id' => $roster->id(),
            'type' => $roster->type(),
            'date' => $roster->date()->toIso8601String(),
            'description' => $roster->description(),
            'limit' => $roster->limit(),
        ];
    }
}
