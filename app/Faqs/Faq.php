<?php
namespace App\Faqs;

interface Faq
{
    const TABLE = 'faqs';

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
    public function content();

    /**
     * @return int
     */
    public function sort();

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
