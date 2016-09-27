<?php
namespace App\Announcements;

use App\Users\User;

interface AnnouncementRepository
{
    /**
     * @param \App\Users\User $user
     * @param array $values
     * @return \App\Announcements\Announcement
     */
    public function create(User $user, array $values);

    /**
     * @param \App\Announcements\Announcement $announcement
     * @param array $values
     * @return \App\Announcements\Announcement
     */
    public function update(Announcement $announcement, array $values);

    /**
     * @param \App\Announcements\Announcement $announcement
     */
    public function delete(Announcement $announcement);

    /**
     * @return \App\Announcements\Announcement[]
     */
    public function findAllVisible();

    /**
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findAllPaginated($limit = 20);

    /**
     * @param int $id
     * @return \App\Announcements\Announcement|null
     */
    public function find($id);
}
