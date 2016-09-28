<?php
namespace App\Announcements;

use App\Users\User;

class EloquentAnnouncementRepository implements AnnouncementRepository
{
    /**
     * @var \App\Announcements\EloquentAnnouncement
     */
    private $announcement;

    public function __construct(EloquentAnnouncement $announcement)
    {
        $this->announcement = $announcement;
    }

    /**
     * @param \App\Users\User $user
     * @param array $values
     * @return \App\Announcements\Announcement
     */
    public function create(User $user, array $values)
    {
        $announcement = new EloquentAnnouncement();
        $announcement->body = $values['body'];
        $announcement->show = true;
        $announcement->user_id = $user->id();

        $announcement->save();

        return $announcement;
    }

    /**
     * @param \App\Announcements\Announcement $announcement
     * @param array $values
     * @return \App\Announcements\Announcement
     */
    public function update(Announcement $announcement, array $values)
    {
        if (array_key_exists('body', $values)) {
            $announcement->body = $values['body'];
        }

        if (array_key_exists('visible', $values)) {
            $announcement->show = true;
        } else {
            $announcement->show = false;
        }

        $announcement->save();

        return $announcement;
    }

    /**
     * @param \App\Announcements\Announcement $announcement
     */
    public function delete(Announcement $announcement)
    {
        $announcement->delete();
    }

    /**
     * @return \App\Announcements\Announcement[]
     */
    public function findAllVisible()
    {
        return $this->announcement
            ->where('show', true)
            ->latest()
            ->get();
    }

    /**
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findAllPaginated($limit = 20)
    {
        return $this->announcement
            ->latest()
            ->paginate($limit);
    }

    /**
     * @param int $id
     * @return \App\Announcements\Announcement|null
     */
    public function find($id)
    {
        return $this->announcement
            ->where('id', $id)
            ->first();
    }
}
