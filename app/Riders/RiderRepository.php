<?php
namespace App\Riders;

use App\Users\User;

interface RiderRepository
{
    /**
     * @param string $search
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findAllPaginated($search = '', $limit = 50);

    /**
     * @param int $id
     * @return \App\Riders\Rider|null
     */
    public function find($id);

    /**
     * @return int
     */
    public function count();

    /**
     * @param \App\Users\User $user
     * @return \App\Riders\Rider
     */
    public function findAllForUser(User $user);

    /**
     * @param \App\Users\User $user
     * @param array $values
     * @return \App\Riders\Rider
     */
    public function create(User $user, array $values);

    /**
     * @return \App\Riders\Rider[]
     */
    public function findByBirthday();
}
