<?php

namespace App\Observers;

use App\Models\BlogPost;

class BlogPostObserver
{
    /**
     * Опрацювання перед створенням запису
     * 
     * @param BlogPOst $blogPost
     */
    public function creating(BlogPost $blogPost)
    {
        $this->setPublishedAt($blogPost);
        $this->setSlug($blogPost);
        $this->setHtml($blogPost);
        $this->setUser($blogPost);
    }
    
    /**
     * Handle the models blog post "created" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function created(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the models blog post "updated" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    
    /**
     * Опрацювання перед оновленням запису
     * 
     * @param BlogPost $blogPost
     */
    
    public function updating(BlogPost $blogPost)
    {
        $this->setPublishedAt($blogPost);
        
        $this->setSlug($blogPost);
    }
    
    /**
     * Якшр дата публікації не встановлена і відбувається встановлення прапору - Опубліковано,
     * то встановлюємо дату публукації на поточну
     * 
     * @param BlogPost $blogPost
     */

    protected function setPublishedAt(BlogPost $blogPost) {
       if(empty($blogPost->published_at) && $blogPost->is_published) {
            $blogPost->published_at = Carbon::now();            
        } 
    }
    
    /**
     * Якщо поле слаг пусте, то заповнюємо його конвертаціє заголовку.
     * 
     * @param BlogPost $blogPost
     */
    
    protected function setSlug(BlogPost $blogPost) {
         if(empty($blogPost->slug)) {
            $blogPost->slug = \Str::slug($blogPost->title);
        }
    }
    
    /**
     * Встановлення значення полю content_html поля content_raw
     * 
     * @param BlogPost $blogPost
     */
    
    protected function setHtml(BlogPost $blogPost)
    {
        if($blogPost->isDirty('content_raw')) {
            //TODO:Тут повинна бути генерація markdown -> html
            $blogPost->content_html = $blogPost->content_raw;
        }
    }
    
    /**
     * Якщо не вказаний user_id, то встановлюємо користувача по замовчуванню
     * 
     * @param BlogPost $blogPost
     * 
     */
    protected function setUser(BlogPost $blogPost)
    {
        $blogPost->user_id = auth()->id() ?? BlogPost::UNKNOWN_USER;
    }        
            
    public function updated(BlogPost $blogPost)
    {
        //
    }
    
    public function deleting(BlogPost $blogPost)
    {
      return false;       
    }
    
    /**
     * Handle the models blog post "deleted" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function deleted(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the models blog post "restored" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function restored(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the models blog post "force deleted" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function forceDeleted(BlogPost $blogPost)
    {
        //
    }
}
