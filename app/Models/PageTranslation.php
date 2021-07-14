<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageTranslation extends Model
{
    use HasFactory;

    public $table = 'pages_translations';

    public $timestamps = false;

    protected $fillable = ['title', 'body', 'meta_title', 'meta_description'];
}
