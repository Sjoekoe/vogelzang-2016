<?php
namespace App\Faqs;

class EloquentFaqRepository implements FaqRepository
{
    /**
     * @var \App\Faqs\EloquentFaq
     */
    private $faq;

    public function __construct(EloquentFaq $faq)
    {
        $this->faq = $faq;
    }

    /**
     * @return \App\Faqs\Faq
     */
    public function all()
    {
        return $this->faq
            ->where('visible', true)
            ->orderBy('sort')
            ->get();
    }

    /**
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findAllPaginated($limit = 40)
    {
        return $this->faq
            ->orderBy('sort')
            ->paginate($limit);
    }

    /**
     * @param array $values
     * @return \App\Faqs\Faq
     */
    public function create(array $values)
    {
        $faq = new EloquentFaq();
        $faq->title = $values['title'];
        $faq->content = $values['content'];
        $faq->visible = true;
        $faq->sort = 0;

        $faq->save();

        return $faq;
    }

    /**
     * @param \App\Faqs\Faq $faq
     */
    public function delete(Faq $faq)
    {
        $faq->delete();
    }

    /**
     * @param int $id
     * @return \App\Faqs\Faq|null
     */
    public function find($id)
    {
        return $this->faq
            ->where('id', $id)
            ->first();
    }
}
