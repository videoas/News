<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['url', 'article_id'];

    public function articles()
    {

        return $this->belongsTo(\App\Article::class, 'id');//FQCN полноценное имя с нашим классом

    }

}
