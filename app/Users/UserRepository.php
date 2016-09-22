<?php
namespace App\Users;

interface UserRepository
{
    /**
     * @param string|null $q
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findAllUsersPaginated($q = null, $limit = 50);

    /**
     * @param array $values
     * @return \App\Users\User
     */
    public function create(array $values);

    /**
     * @param \App\Users\User $user
     * @param array $values
     * @return \App\Users\User
     */
    public function update(User $user, array $values);

    /**
     * @param int $id
     * @return \App\Users\User
     */
    public function find($id);

    /**
     * @param \App\Users\User $user
     */
    public function delete(User $user);
}
