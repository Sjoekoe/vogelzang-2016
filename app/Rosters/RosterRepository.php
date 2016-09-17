<?php
namespace App\Rosters;

interface RosterRepository
{
    /**
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findAllFutureRostersPaginated($limit = 20);

    /**
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findFutureRostersFor4Weeks($limit = 20);

    /**
     * @param array $values
     * @return \App\Rosters\Roster
     */
    public function create(array $values);

    /**
     * @param int $id
     * @return \App\Rosters\Roster|null
     */
    public function find($id);

    /**
     * @param \App\Rosters\Roster $roster
     * @param array $values
     * @return \App\Rosters\Roster
     */
    public function update(Roster $roster, array $values);

    /**
     * @param \App\Rosters\Roster $roster
     */
    public function delete(Roster $roster);
}
