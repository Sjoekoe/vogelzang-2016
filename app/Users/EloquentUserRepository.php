<?php
namespace App\Users;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EloquentUserRepository implements UserRepository
{
    /**
     * @var \App\Users\EloquentUser
     */
    private $user;

    public function __construct(EloquentUser $user)
    {
        $this->user = $user;
    }

    /**
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findAllUsersPaginated($limit = 20)
    {
        return $this->user
            ->orderBy('first_name')
            ->paginate($limit);
    }

    /**
     * @param array $values
     * @return \App\Users\User
     */
    public function create(array $values)
    {
        $user = new EloquentUser();
        $user->first_name = $values['first_name'];
        $user->last_name = $values['last_name'];
        $user->email = $values['email'];
        $user->username = $values['username'];
        $user->password = Hash::make('vogelzang');
        $user->password_temp = '';
        $user->code = Str::random(30);
        $user->remember_token = '';
        $user->level_id = $values['level_id'];
        $user->active = false;

        $user->save();

        return $user;
     }

    /**
     * @param \App\Users\User $user
     * @param array $values
     * @return \App\Users\User
     */
    public function update(User $user, array $values)
    {
        $user->first_name = $values['first_name'];
        $user->last_name = $values['last_name'];
        $user->email = $values['email'];
        $user->username = $values['username'];

        $user->save();

        return $user;
    }

    /**
     * @param int $id
     * @return \App\Users\User
     */
    public function find($id)
    {
        return $this->user
            ->where('id', $id)
            ->first();
    }

    /**
     * @param \App\Users\User $user
     */
    public function delete(User $user)
    {
        $user->delete();
    }
}
