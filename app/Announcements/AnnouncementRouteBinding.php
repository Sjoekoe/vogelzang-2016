<?php
namespace App\Announcements;

use App\Http\AbstractRouteBinding;
use App\Http\Routebinding;

class AnnouncementRouteBinding extends AbstractRouteBinding  implements Routebinding
{
    /**
     * @var \App\Announcements\AnnouncementRepository
     */
    private $announcements;

    public function __construct(AnnouncementRepository $announcements)
    {
        $this->announcements = $announcements;
    }

    /**
     * @param int|string $value
     * @return \App\Announcements\Announcement|null
     */
    public function find($value)
    {
        return $this->announcements->find($value);
    }
}
