<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Quote extends Model
{
    protected $fillable = [ 'text', 'author_name' ];

    protected $appends = [ 'created_at_readable' ];

    /**
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * @return mixed
     */
    public function getCreatedAtReadableAttribute()
    {
        return $this->created_at->format('d.m.Y H:i');
    }
}
