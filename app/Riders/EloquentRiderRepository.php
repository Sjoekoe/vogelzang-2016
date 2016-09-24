<?php
namespace App\Riders;

use App\Users\User;

class EloquentRiderRepository implements RiderRepository
{
    /**
     * @var \App\Riders\EloquentRider
     */
    private $rider;

    public function __construct(EloquentRider $rider)
    {
        $this->rider = $rider;
    }

    /**
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findAllPaginated($limit = 50)
    {
        return $this->rider
            ->orderBy('firstname')
            ->paginate($limit);
    }

    /**
     * @param int $id
     * @return \App\Riders\Rider|null
     */
    public function find($id)
    {
        return $this->rider
            ->where('id', $id)
            ->first();
    }

    /**
     * @return int
     */
    public function count()
    {
        return $this->rider
            ->count();
    }

    /**
     * @param \App\Users\User $user
     * @return \App\Riders\Rider
     */
    public function findAllForUser(User $user)
    {
        return $this->rider
            ->where('user_id', $user->id())
            ->get();
    }
}
