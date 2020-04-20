<?php

namespace App\Services;

use App\Quote;

class QuoteService
{
    /**
     * @return array
     */
    public function getAll(): array
    {
        return Quote::with('tags')->orderBy('created_at', 'DESC')->paginate(config('common.quotes_pagination_size'))->toArray();
    }

    /**
     * @param array $data
     * @return array
     */
    public function create(array $data): array
    {
        $create_data = [
            'text' => $data['text'],
            'author_name' => $data['author_name']
        ];

        $quote = Quote::create($create_data);
        $quote->tags()->attach($data['tag_ids']);

        $create_data['id'] = $quote->id;

        return Quote::with('tags')->where('id', $quote->id)->get()->toArray();
    }
}
