<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'photo',
        'post_id'
    ];
    public function product()
    {
        return $this->belongsTo('App\Posts', 'post_id');
    }
}
