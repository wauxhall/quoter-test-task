<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $fillable = [ 'name' ];

    /**
     * @return BelongsToMany
     */
    public function quotes(): BelongsToMany
    {
        return $this->belongsToMany(Quote::class);
    }
}
