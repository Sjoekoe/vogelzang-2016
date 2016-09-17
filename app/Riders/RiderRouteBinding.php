<?php
namespace App\Riders;

use App\Http\AbstractRouteBinding;
use App\Http\Routebinding;

class RiderRouteBinding extends AbstractRouteBinding implements Routebinding
{
    /**
     * @var \App\Riders\RiderRepository
     */
    private $riders;

    public function __construct(RiderRepository $riders)
    {
        $this->riders = $riders;
    }

    /**
     * @param int|string $value
     * @return \App\Riders\Rider|null
     */
    public function find($value)
    {
        return $this->riders->find($value);
    }
}
