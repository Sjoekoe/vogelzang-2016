<?php
namespace App\Console;

use App\Rosters\EloquentRoster;
use Carbon\Carbon;
use Illuminate\Console\Command;

class AdjustRosterDatesCommand extends Command
{
    public $name = 'roster-dates';

    public function fire()
    {
        $rosters = EloquentRoster::all();

        foreach ($rosters as $roster) {
            if ($roster->id == 171 || $roster->id == 591) {
                $roster->date = Carbon::now()->subMonths(5);
                $roster->save();
            }

            $date = Carbon::parse($roster->date)->format('d-m-Y');
            $hour = config('rosters.hours.' . $roster->hour);

            $formattedDate = $date . ' ' . $hour;

            $newDate = Carbon::createFromFormat('d-m-Y H:i', $formattedDate);

            $roster->date = $newDate;
            $roster->save();

            $this->info($roster->id);
        }

        $this->info('All Done');
    }
}
