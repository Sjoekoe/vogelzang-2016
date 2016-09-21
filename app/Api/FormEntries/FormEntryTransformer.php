<?php
namespace App\Api\FormEntries;

use App\Contacts\Contact;
use League\Fractal\TransformerAbstract;

class FormEntryTransformer extends TransformerAbstract
{
    /**
     * @param \App\Contacts\Contact $contact
     * @return array
     */
    public function transform(Contact $contact)
    {
        return [
            'id' => $contact->id(),
            'is_read' => (bool) $contact->isRead(),
            'name' => $contact->fullName(),
            'subject' => $contact->subject(),
            'email' => $contact->email(),
            'message' => nl2br($contact->message()),
        ];
    }
}
