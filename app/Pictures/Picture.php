<?php
namespace App\Pictures;

interface Picture
{
    const TABLE = 'itemphotos';

    /**
     * @return int
     */
    public function id();

    /**
     * @return \App\Articles\Article
     */
    public function article();

    /**
     * @return string
     */
    public function path();

    /**
     * @return \Carbon\Carbon
     */
    public function createdAt();

    /**
     * @return \Carbon\Carbon
     */
    public function updatedAt();
}
