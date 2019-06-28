<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class BlogPost
 * 
 * @package App\Models
 * 
 * @property\App\Models\BlogCategory $category
 * @property \App\Models\User        $user
 * @property string                  $title
 * @property string                  $slug
 * @property string                  $content_html
 * @property string                  $content_raw
 * @property string                  $except
 * @property string                  $published_at
 * @property string                  $is_published
 */

class BlogPost extends Model
{
    use SoftDeletes;
    
    const UNKNOWN_USER = 1;
    
    protected $fillable
            = [
                'title',
                'slug',
                'category_id',
                'excerpt',
                'content_raw',
                'is_published',
                'published_at',
        
    ];
    
    /**
     * Категорія статті
     * 
     * @return \Illuminate\Datbase\Eloquent\Relation\BelongsTo 
     */
    public function category()
    {
        //Стаття належить категорії
        return $this->belongsTo(BlogCategory::class);
    }
    
    /**
     * Автор статті
     * 
     * @return \Illuminate\Datbase\Eloquent\Relation\BelongsTo
     */
    public function user()
    {
        //Стаття належить користувачу
        return $this->belongsTo(Users::class);
    }
}
