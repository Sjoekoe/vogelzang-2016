<?php
namespace App\Faqs;

use App\Models\StandardModel;
use Illuminate\Database\Eloquent\Model;

class EloquentFaq extends Model implements Faq
{
    use StandardModel;

    /**
     * @var string
     */
    protected $table = self::TABLE;

    /**
     * @return string
     */
    public function title()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function content()
    {
        return nl2br($this->content);
    }

    /**
     * @return int
     */
    public function sort()
    {
        return $this->sort;
    }

    /**
     * @return bool
     */
    public function visible()
    {
        return $this->visible;
    }
}
