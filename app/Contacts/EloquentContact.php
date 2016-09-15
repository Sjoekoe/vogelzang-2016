<?php
namespace App\Contacts;

use App\Models\StandardModel;
use Illuminate\Database\Eloquent\Model;

class EloquentContact extends Model implements Contact
{
    use StandardModel;

    /**
     * @var string
     */
    protected $table = self::TABLE;

    /**
     * @var array
     */
    protected $fillable = ['subject', 'email', 'message', 'full_name'];

    /**
     * @return string
     */
    public function fullName()
    {
        return $this->full_name;
    }

    /**
     * @return string
     */
    public function subject()
    {
        return $this->subject;
    }

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
    public function message()
    {
        return $this->message;
    }

    /**
     * @return bool
     */
    public function isRead()
    {
        return $this->read;
    }
}
