<?php
namespace App\Users;

interface User
{
    const TABLE = 'users';

    /**
     * @return int
     */
    public function id();

    /**
     * @return string
     */
    public function email();

    /**
     * @return string
     */
    public function username();

    /**
     * @return string
     */
    public function firstName();

    /**
     * @return string
     */
    public function lastName();

    /**
     * @return string
     */
    public function password();

    /**
     * @return string
     */
    public function tempPassword();

    /**
     * @return int
     */
    public function level();

    /**
     * @return bool
     */
    public function active();

    /**
     * @return string
     */
    public function code();

    /**
     * @return string
     */
    public function rememberToken();

    /**
     * @return bool
     */
    public function isAdmin();

    /**
     * @return bool
     */
    public function isModerator();

    /**
     * @return bool
     */
    public function hasPrivileges();

    /**
     * @return \App\Riders\Rider[]
     */
    public function riders();

    /**
     * @return \Carbon\Carbon
     */
    public function createdAt();

    /**
     * @return \Carbon\Carbon
     */
    public function updatedAt();
}
