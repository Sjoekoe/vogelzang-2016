<?php
namespace App\Testing;

use App\Rosters\Roster;
use App\Users\User;
use Carbon\Carbon;

trait CreatesModels
{
    /**
     * @param array $attributes
     * @return \App\Users\User
     */
    public function createUser(array $attributes = [])
    {
        return $this->modelFactory->create(User::class, array_merge([
            'email' => 'foo@bar.com',
            'username' => 'johndoe',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'password' => 'password',
            'password_temp' => '',
            'code' => '',
            'active' => true,
            'level_id' => User::USER,
            'remember_token' => 'fvbhdfbvhjdfbv',
        ], $attributes));
    }

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
