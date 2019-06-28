<?php

namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;

class BlogCategoryRepository extends CoreRepository {
    
    public function getEdit($id) {
        return $this->startConditions()->find($id);
    }
    /*
     * Отримати список категорій для виводу у випадачому списку
     * 
     * @return Collection
     */
    
    public function getForCombobox() {
 
        $columns = implode(', ', [
            'id',
            'CONCAT (id, ". ", title) AS id_title' 
        ]);
        
        $result = $this
                ->startConditions()
                ->selectRaw($columns)
                ->toBase()
                ->get();
        
        return $result;
    }
    
    protected function getModelClass() {
        return Model::class;
    }
    
    public function getAllWithPaginate($perPage = null) {
        
        $columns = ['id', 'title', 'parent_id'];
        
        $result = $this
                ->startConditions()
                ->select($columns)
                ->paginate($perPage);
        
        return $result;
                
    }
}
