<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title',
        'description',
        'local_image_url',
        'web_image_url',
        'firestore_reference',
    ];
}
