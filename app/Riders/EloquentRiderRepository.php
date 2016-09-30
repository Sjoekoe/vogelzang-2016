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
     * @param string $search
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findAllPaginated($search = '', $limit = 50)
    {
        $query = $this->rider
            ->orderBy('firstname');

        if ($search && $search !== '') {
            $query = $query->where(function($query) use ($search) {
                $query->where('firstname', 'LIKE', '%' . $search . '%')
                    ->orWhere('lastname', 'LIKE', '%' . $search . '%');
            });
        }

        return $query->paginate($limit);
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

    /**
     * @param \App\Users\User $user
     * @param array $values
     * @return \App\Riders\Rider
     */
    public function create(User $user, array $values)
    {
        $rider = new EloquentRider();
        $rider->firstname = $values['first_name'];
        $rider->lastname = $values['last_name'];
        $rider->user_id = $user->id();

        $rider->save();

        return $rider;
    }
}
