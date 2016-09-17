<?php
namespace App\Users;

use App\Models\StandardModel;
use App\Riders\EloquentRider;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class EloquentUser extends Authenticatable implements User
{
    use Notifiable, StandardModel;

    /**
     * @var string
     */
    protected $table = self::TABLE;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'username', 'first_name', 'last_name', 'password', 'password_temp', 'level_id', 'active', 'code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return string
     */
    public function email()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function username()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function firstName()
    {
        return $this->first_name;
    }

    /**
     * @return string
     */
    public function lastName()
    {
        return $this->last_name;
    }

    /**
     * @return string
     */
    public function password()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function tempPassword()
    {
        return $this->password_temp;
    }

    /**
     * @return int
     */
    public function level()
    {
        $this->level_id;
    }

    /**
     * @return bool
     */
    public function active()
    {
        return $this->active;
    }

    /**
     * @return string
     */
    public function code()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function rememberToken()
    {
        return $this->remember_token;
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return $this->level_id == 3;
    }

    /**
     * @return bool
     */
    public function isModerator()
    {
        return $this->level_id == self::MODERATOR;
    }

    /**
     * @return bool
     */
    public function hasPrivileges()
    {
        return $this->isAdmin() || $this->isModerator();
    }

    /**
     * @return \App\Riders\Rider[]
     */
    public function riders()
    {
        return $this->hasMany(EloquentRider::class, 'user_id', 'id')->get();
    }
}
