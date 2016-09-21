<?php
namespace App\Api\Http\Controllers;

use App\Api\FormEntries\FormEntryTransformer;
use App\Api\Http\Controller;
use App\Contacts\Contact;
use App\Contacts\ContactRepository;
use App\Contacts\Requests\StoreFormEntryRequest;

class FormEntryController extends Controller
{
    /**
     * @var \App\Contacts\ContactRepository
     */
    private $contacts;

    public function __construct(ContactRepository $contacts)
    {
        $this->contacts = $contacts;
    }

    public function index()
    {
        $formEntries = $this->contacts->findAllPaginated();

        return $this->response()->paginator($formEntries, new FormEntryTransformer());
    }

    public function store(StoreFormEntryRequest $request)
    {
        $formEntry = $this->contacts->create($request->all());

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
