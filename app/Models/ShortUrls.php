<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortUrls extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','original_url', 'shortened_url', 'hits'];
}
