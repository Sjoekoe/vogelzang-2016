<?php
namespace App\Rosters;

use Carbon\Carbon;

class EloquentRosterRepository implements RosterRepository
{
    /**
     * @var \App\Rosters\EloquentRoster
     */
    private $roster;

    public function __construct(EloquentRoster $roster)
    {
        $this->roster = $roster;
    }

    /**
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findAllFutureRostersPaginated($limit = 20)
    {
        $today = Carbon::now();

        return $this->roster->where('date', '>=', $today->startOfDay())
            ->orderBy('date')
            ->orderBy('hour')
            ->paginate($limit);
    }

    /**
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findFutureRostersFor4Weeks($limit = 20)
    {
        $today = Carbon::now();
        $future = Carbon::now()->addWeeks(4);

        return $this->roster->where('date', '>', $today)
            ->where('date', '<', $future)
            ->orderBy('date')
            ->orderBy('hour')
            ->paginate($limit);
    }

    /**
     * @param array $values
     * @return \App\Rosters\Roster
     */
    public function create(array $values)
    {
        $formattedDate = $values['date'] . ' ' . $values['time'];

        $roster = new EloquentRoster();
        $roster->name = 1;
        $roster->date = Carbon::createFromFormat('d-m-Y H:i', $formattedDate);
        $roster->hour = 1;

        if (array_key_exists('type', $values)) {
            $roster->type = $values['type'];
        }

        if (array_key_exists('limit', $values)) {
            $roster->limit = $values['limit'];
        }

        if (array_key_exists('description', $values)) {
            $roster->description = $values['description'];
        }

        $roster->save();

        return $roster;
    }

    /**
     * @param int $id
     * @return \App\Rosters\Roster|null
     */
    public function find($id)
    {
        return $this->roster
            ->where('id', $id)
            ->first();
    }

    /**
     * @param \App\Rosters\Roster $roster
     * @param array $values
     * @return \App\Rosters\Roster
     */
    public function update(Roster $roster, array $values)
    {
        $roster->name = $values['name'];

        $roster->date = Carbon::createFromFormat('d/m/Y', $values['date']);

        if (array_key_exists('type', $values)) {
            $roster->type = $values['type'];
        }

        if (array_key_exists('hour', $values)) {
            $roster->hour = $values['hour'];
        }

        if (array_key_exists('limit', $values)) {
            $roster->limit = $values['limit'];
        }

        if (array_key_exists('description', $values)) {
            $roster->description = $values['description'];
        }

        $roster->save();

        return $roster;
    }

    /**
     * @param \App\Rosters\Roster $roster
     */
    public function delete(Roster $roster)
    {
        $roster->delete();
    }

    /**
     * @return int
     */
    public function count()
    {
        return $this->roster
            ->count();
    }
}
