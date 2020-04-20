<?php

namespace App\Services;

use App\Tag;

class TagService
{
    /**
     * @return array
     */
    public function getAll(): array
    {
        return Tag::all()->toArray();
    }
}
