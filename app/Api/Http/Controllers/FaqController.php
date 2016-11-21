<?php
namespace App\Api\Http\Controllers;

use App\Api\Faqs\FaqTransformer;
use App\Api\Faqs\Requests\StoreFaqRequest;
use App\Api\Http\Controller;
use App\Faqs\Faq;
use App\Faqs\FaqRepository;

class FaqController extends Controller
{
    /**
     * @var \App\Faqs\FaqRepository
     */
    private $faqs;

    public function __construct(FaqRepository $faqs)
    {
        $this->faqs = $faqs;
    }

    public function index()
    {
        $faqs = $this->faqs->findAllPaginated();

        return $this->response()->paginator($faqs, new FaqTransformer());
    }

    public function store(StoreFaqRequest $request)
    {
        $faq = $this->faqs->create($request->all());

        return $this->response()->item($faq, new FaqTransformer());
    }

    public function delete(Faq $faq)
    {
        $this->faqs->delete($faq);

        return $this->response()->noContent();
    }
}
