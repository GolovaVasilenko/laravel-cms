<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;

class MediaGroup extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug'];

    /**
     * @return HasMany
     */
    public function media(): HasMany
    {
        return $this->hasMany(Media::class);
    }
}
