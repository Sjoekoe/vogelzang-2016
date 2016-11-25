<?php
namespace App\Reservations;

use App\Models\StandardModel;
use App\Users\EloquentUser;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class EloquentReservation extends Model implements Reservation
{
    use StandardModel;

    /**
     * @var string
     */
    protected $table = self::TABLE;

    /**
     * @return \App\Users\User
     */
    public function user()
    {
        return $this->belongsTo(EloquentUser::class, 'user_id', 'id')->first();
    }

    /**
     * @return \Carbon\Carbon
     */
    public function start()
    {
        return Carbon::parse($this->start);
    }

    /**
     * @return \Carbon\Carbon
     */
    public function end()
    {
        return Carbon::parse($this->end);
    }

    /**
     * @return string
     */
    public function comment()
    {
        return nl2br($this->comment);
    }

    /**
     * @return int
     */
    public function type()
    {
        switch ($this->type) {
            case self::DRESSUURLES:
                return 'Dressuurles';

            case self::SPRINGLES:
                return 'Springles';

            case self::ONDERHOUD:
                return 'Onderhoud piste';

            case self::ANDERE:
                return 'Andere reden';
        }
    }
}
