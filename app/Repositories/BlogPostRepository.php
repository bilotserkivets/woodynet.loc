<?php

namespace App\Repositories;

use App\Models\BlogPost as Model;
use Illuminate\Database\Eloquent\Collection;

class BlogPostRepository extends CoreRepository {
     
    /*
     * @return string
     */
    protected function getModelClass() {
        return Model::class;
    }
    /*
     * Отримати список статтей для виводу в списку
     * 
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate() {
        
        $columns = [
           'id',
           'title',
           'slug',
           'is_published',
           'published_at',
           'user_id',
           'category_id'            
        ];
        
        $result = $this->startConditions()
                ->select($columns)
                ->orderBy('id', 'DESC')
                ->paginate(25);
        
        return $result;
    }
    
    /*
     * Отримати модель для редагування в адмінці
     * 
     * @param int $id
     * 
     * return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    } 
}
