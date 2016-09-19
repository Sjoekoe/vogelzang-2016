<?php
namespace App\Riders;

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
    public function findAllPaginated($limit = 20)
    {
        return $this->rider
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
}
