<?php
namespace App\Api\Http\Controllers;

use App\Api\FormEntries\FormEntryTransformer;
use App\Api\Http\Controller;
use App\Contacts\Contact;
use App\Contacts\ContactRepository;
use App\Contacts\Requests\StoreFormEntryRequest;
use App\Mailers\AppMailer;

class FormEntryController extends Controller
{
    /**
     * @var \App\Contacts\ContactRepository
     */
    private $contacts;

    /**
     * @var \App\Mailers\AppMailer
     */
    private $mailer;

    public function __construct(ContactRepository $contacts, AppMailer $mailer)
    {
        $this->contacts = $contacts;
        $this->mailer = $mailer;
    }

    public function index()
    {
        $formEntries = $this->contacts->findAllPaginated();

        return $this->response()->paginator($formEntries, new FormEntryTransformer());
    }

    public function store(StoreFormEntryRequest $request)
    {
        $formEntry = $this->contacts->create($request->all());

        $this->mailer->contactFormWasFilledIn($formEntry);

        return $this->response()->item($formEntry, new FormEntryTransformer());
    }

    public function show(Contact $formEntry)
    {
        return $this->response()->item($formEntry, new FormEntryTransformer());
    }

    public function delete(Contact $formEntry)
    {
        $this->contacts->delete($formEntry);

        return $this->response()->noContent();
    }

    public function read(Contact $contact)
    {
        $contact = $this->contacts->markAsRead($contact);

        return $this->response()->item($contact, new FormEntryTransformer());
    }
}
