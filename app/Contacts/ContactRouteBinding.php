<?php
namespace App\Contacts;

use App\Http\AbstractRouteBinding;
use App\Http\Routebinding;

class ContactRouteBinding extends AbstractRouteBinding implements Routebinding
{
    /**
     * @var \App\Contacts\ContactRepository
     */
    private $contacts;

    public function __construct(ContactRepository $contacts)
    {
        $this->contacts = $contacts;
    }

    /**
     * @param int|string $value
     * @return \App\Contacts\Contact|null
     */
    public function find($value)
    {
        return $this->contacts->find($value);
    }
}
