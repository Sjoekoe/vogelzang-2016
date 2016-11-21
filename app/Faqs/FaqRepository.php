<?php
namespace App\Faqs;

interface FaqRepository
{
    /**
     * @return \App\Faqs\Faq
     */
    public function all();

    /**
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findAllPaginated($limit = 40);

    /**
     * @param array $values
     * @return \App\Faqs\Faq
     */
    public function create(array $values);

    /**
     * @param \App\Faqs\Faq $faq
     */
    public function delete(Faq $faq);

    /**
     * @param int $id
     * @return \App\Faqs\Faq|null
     */
    public function find($id);
}
