<?php
namespace App\Rosters;

use App\Http\AbstractRouteBinding;
use App\Http\Routebinding;

class RosterRouteBinding extends AbstractRouteBinding implements Routebinding
{
    /**
     * @var \App\Rosters\RosterRepository
     */
    private $rosters;

    public function __construct(RosterRepository $rosters)
    {
        $this->rosters = $rosters;
    }

    /**
     * @param int|string $value
     * @return \App\Rosters\Roster|null
     */
    public function find($value)
    {
        return $this->rosters->find($value);
    }
}
