<?php
namespace App\Api\Faqs;

use App\Faqs\Faq;
use League\Fractal\TransformerAbstract;

class FaqTransformer extends TransformerAbstract
{
    /**
     * @param \App\Faqs\Faq $faq
     * @return array
     */
    public function transform(Faq $faq)
    {
        return [
            'id' => $faq->id(),
            'content' => $faq->content(),
            'title' => $faq->title(),
            'sort' => (int) $faq->sort(),
            'visible' => $faq->visible(),
        ];
    }
}
