<?php
namespace App\Http\Controllers;

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
        return view('rosters.index', compact('rosters'));
    }

    public function create()
    {
        return view('rosters.create');
    }

    public function store(RosterRequest $request)
    {
        $this->rosters->create($request->all());

        session()->put('success', 'De les is aangemaakt');

        return redirect()->route('rosters.index');
    }

    public function show(Roster $roster)
    {
        $riders = [];

        foreach (auth()->user()->riders() as $rider) {
            if ($rider->hasNoSubscriptionForRoster($roster)) {
                array_push($riders, $rider);
            }
        }

        return view('rosters.show', compact('roster', 'riders'));
    }

    public function edit(Roster $roster)
    {
        return view('rosters.edit', compact('roster'));
    }

    public function update(RosterRequest $request, Roster $roster)
    {
        $roster = $this->rosters->update($roster, $request->all());

        session()->put('De les is aangepast.');

        return redirect()->route('rosters.index', compact('roster'));
    }

    public function delete(Roster $roster)
    {
        $this->rosters->delete($roster);

        session()->put('success', 'De les is verwijderd');

        return redirect()->route('rosters.index');
    }
}
