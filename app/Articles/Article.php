<?php
namespace App\Articles;

interface Article
{
    const TABLE = 'items';

    /**
     * @return int
     */
    public function id();

    /**
     * @return string
     */
    public function title();

    /**
     * @return string
     */
    public function message();

    /**
     * @return \App\Users\User
     */
    public function author();

    /**
     * @return \App\Pictures\Picture[]
     */
    public function pictures();

    /**
     * @return \Carbon\Carbon
     */
    public function createdAt();

    /**
     * @return \Carbon\Carbon
     */
    public function updatedAt();
}
