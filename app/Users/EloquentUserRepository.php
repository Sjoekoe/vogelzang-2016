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
     * @param string|null $q
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findAllUsersPaginated($q = null, $limit = 50)
    {
        $query = $this->user
            ->orderBy('username');

        if ($q && $q !== '') {
            $query = $query->where(function($query) use ($q) {
                $query->where('first_name', 'LIKE', '%' . $q . '%')
                    ->orWhere('username', 'LIKE', '%' . $q . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $q . '%')
                    ->orWhere('email', 'LIKE', '%' . $q . '%');
            });
        }

        return $query->paginate($limit);
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
        $user->phone = array_key_exists('phone', $values) ? $values['phone'] : '';
        $user->password = Hash::make('vogelzang');
        $user->password_temp = '';
        $user->code = Str::random(30);
        $user->remember_token = '';
        $user->level_id = $values['level_id'];
        $user->active = true;

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
        $user->phone = array_key_exists('phone', $values) ? $values['phone'] : '';

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
     * @param string $login
     * @return \App\Users\User|null
     */
    public function findByUsernameOrEmail($login)
    {
        return $this->user
            ->where('email', $login)
            ->orWhere('username', $login)
            ->first();
    }

    /**
     * @param \App\Users\User $user
     */
    public function delete(User $user)
    {
        $user->delete();
    }

    /**
     * @param \App\Users\User $user
     * @param string $password
     * @return \App\Users\User
     */
    public function updatePassword(User $user, $password)
    {
        $user->password = Hash::make($password);

        $user->save();

        return $user;
    }
}
