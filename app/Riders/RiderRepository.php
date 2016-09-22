<?php
namespace App\Riders;

interface RiderRepository
{
    /**
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findAllPaginated($limit = 50);

    /**
     * @param int $id
     * @return \App\Riders\Rider|null
     */
    public function find($id);

    /**
     * @return int
     */
    public function count();
}
