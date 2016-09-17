<?php
namespace App\Users;

use App\Http\AbstractRouteBinding;
use App\Http\Routebinding;

class UserRouteBinding extends AbstractRouteBinding implements Routebinding
{
    /**
     * @var \App\Users\UserRepository
     */
    private $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * @param int|string $value
     * @return mixed
     */
    public function find($value)
    {
        return $this->users->find($value);
    }
}
