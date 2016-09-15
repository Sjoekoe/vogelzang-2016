<?php
namespace App\Contacts;

interface Contact
{
    const TABLE = 'contacts';

    /**
     * @return int
     */
    public function id();

    /**
     * @return string
     */
    public function fullName();

    /**
     * @return string
     */
    public function subject();

    /**
     * @return string
     */
    public function email();

    /**
     * @return string
     */
    public function message();

    /**
     * @return bool
     */
    public function isRead();

    /**
     * @return \Carbon\Carbon
     */
    public function createdAt();

    /**
     * @return \Carbon\Carbon
     */
    public function updatedAt();
}
