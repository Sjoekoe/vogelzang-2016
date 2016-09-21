<?php
namespace App\Contacts;

class EloquentContactRepository implements ContactRepository
{
    /**
     * @var \App\Contacts\EloquentContact
     */
    private $contact;

    public function __construct(EloquentContact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findAllPaginated($limit = 20)
    {
        return $this->contact
            ->latest()
            ->paginate($limit);
    }

    /**
     * @param array $values
     * @return \App\Contacts\Contact
     */
    public function create(array $values)
    {
        $contact = new EloquentContact();
        $contact->full_name = $values['name'];
        $contact->email = $values['email'];
        $contact->subject = $values['subject'];
        $contact->message = $values['message'];
        $contact->read = false;

        $contact->save();

        return $contact;
    }

    /**
     * @param int $id
     * @return \App\Contacts\Contact|null
     */
    public function find($id)
    {
        return $this->contact
            ->where('id', $id)
            ->first();
    }

    /**
     * @param \App\Contacts\Contact $contact
     */
    public function delete(Contact $contact)
    {
        $contact->delete();
    }

    /**
     * @param \App\Contacts\Contact $contact
     * @return \App\Contacts\Contact
     */
    public function markAsRead(Contact $contact)
    {
        $contact->read = true;

        $contact->save();

        return $contact;
    }
}
