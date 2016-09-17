<?php
namespace App\Contacts;

interface ContactRepository
{
    /**
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findAllPaginated($limit = 20);

    /**
     * @param array $values
     * @return \App\Contacts\Contact
     */
    public function create(array $values);

    /**
     * @param int $id
     * @return \App\Contacts\Contact|null
     */
    public function find($id);

    /**
     * @param \App\Contacts\Contact $contact
     */
    public function delete(Contact $contact);
}
