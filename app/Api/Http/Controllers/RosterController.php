<?php
namespace App\Api\Http\Controllers;

use App\Api\Http\Controller;
use App\Api\Rosters\RosterTransformer;
use App\Rosters\Requests\RosterRequest;
use App\Rosters\Roster;
use App\Rosters\RosterRepository;

class RosterController extends Controller
{
    /**
     * @var \App\Rosters\RosterRepository
     */
    private $rosters;

    public function __construct(RosterRepository $rosters)
    {
        $this->rosters = $rosters;
    }

    public function index()
    {
        $rosters = $this->rosters->findAllFutureRostersPaginated();

        return $this->response()->paginator($rosters, new RosterTransformer());
    }

    public function store(RosterRequest $request)
    {
        $roster = $this->rosters->create($request->all());

        return $this->response()->item($roster, new RosterTransformer());
    }

    public function show(Roster $roster)
    {
        return $this->response()->item($roster, new RosterTransformer());
    }

    public function update(RosterRequest $request, Roster $roster)
    {
        $roster = $this->rosters->update($roster, $request->all());

        return $this->response()->item($roster, new RosterTransformer());
    }

    public function delete(Roster $roster)
    {
        $this->rosters->delete($roster);

        return $this->response()->noContent();
    }
}
