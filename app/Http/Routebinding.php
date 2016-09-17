<?php
namespace App\Http;

interface Routebinding
{
    /**
     * @param int|string $value
     * @return mixed
     */
    public function find($value);

    /**
     * @param int|string $value
     * @return mixed
     */
    public function bind($value);
}
