<?php
namespace App\Mailers;

use App\Contacts\Contact;

class AppMailer extends Mailer
{
    /**
     * @param \App\Contacts\Contact $contact
     */
    public function contactFormWasFilledIn(Contact $contact)
    {
        $data = [
            'name' => $contact->fullName(),
            'email' => $contact->email(),
            'subject' => $contact->subject(),
            'q' => $contact->message(),
        ];

        $this->sendTo('info@staldevogelzang.be', 'Het contactFormulier was ingevuld.', 'emails.contact_form', $data, $data['email']);
    }
}
