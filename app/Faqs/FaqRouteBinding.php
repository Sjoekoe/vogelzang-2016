<?php
namespace App\Faqs;

use App\Http\AbstractRouteBinding;
use App\Http\Routebinding;

class FaqRouteBinding extends AbstractRouteBinding implements Routebinding
{
    /**
     * @var \App\Faqs\FaqRepository
     */
    private $faqs;

    public function __construct(FaqRepository $faqs)
    {
        $this->faqs = $faqs;
    }

    /**
     * @param int|string $value
     * @return mixed
     */
    public function find($value)
    {
        return $this->faqs->find($value);
    }
}
