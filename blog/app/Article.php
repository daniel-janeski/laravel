<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
 //   protected $fillable = [
 //       'title',
 //       'body',
//       'slug'
//    ];
    protected $guarded = [
        'id'
    ];
    
    public function author (){
        return $this->belongsTo('\App\User', 'user_id');
    }
    
    public function tags() {
        return $this->belongsToMany('\App\Tag', 'articles_tags', 'article_id');
    }
    
    public function getTagAttribute () {
        return $this->tags()->pluck('id')->toArray();
    }
}
