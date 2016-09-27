<?php
namespace App\Announcements;

interface Announcement
{
    const TABLE = 'announcements';

    /**
     * @return int
     */
    public function id();

    /**
     * @return string
     */
    public function body();

    /**
     * @return \App\Users\User
     */
    public function user();

    /**
     * @return bool
     */
    public function visible();

    /**
     * @return \Carbon\Carbon
     */
    public function createdAt();

    /**
     * @return \Carbon\Carbon
     */
    public function updatedAt();
}
