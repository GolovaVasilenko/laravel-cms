<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Media extends Model
{
    use HasFactory;

    protected $fillable = ['link', 'title', 'alt', 'group_id'];

    /**
     * @return BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(MediaGroup::class);
    }
}
