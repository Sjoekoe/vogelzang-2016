<?php
namespace App\Api\Announcements;

use App\Announcements\Announcement;
use App\Api\Users\UserTransformer;
use League\Fractal\TransformerAbstract;

class AnnouncementTransformer extends TransformerAbstract
{
    /**
     * @var array
     */
    protected $defaultIncludes = ['userRelation'];

    /**
     * @param \App\Announcements\Announcement $announcement
     * @return array
     */
    public function transform(Announcement $announcement)
    {
        return [
            'id' => $announcement->id(),
            'body' => $announcement->body(),
            'visible' => (bool) $announcement->visible(),
            'created_at' => $announcement->createdAt()->format('d-m-Y'),
        ];
    }

    /**
     * @param \App\Announcements\Announcement $announcement
     * @return \League\Fractal\Resource\Item
     */
    public function includeUserRelation(Announcement $announcement)
    {
        return $this->item($announcement->user(), new UserTransformer());
    }
}
