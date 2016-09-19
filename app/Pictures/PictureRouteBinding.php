<?php
namespace App\Pictures;

use App\Http\AbstractRouteBinding;
use App\Http\Routebinding;

class PictureRouteBinding extends AbstractRouteBinding implements Routebinding
{
    /**
     * @var \App\Pictures\PictureRepository
     */
    private $pictures;

    public function __construct(PictureRepository $pictures)
    {
        $this->pictures = $pictures;
    }

    /**
     * @param int|string $value
     * @return \App\Pictures\Picture|null
     */
    public function find($value)
    {
        return $this->pictures->find($value);
    }
}
