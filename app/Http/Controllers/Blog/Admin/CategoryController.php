<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Http\Requests\BlogCategoryCreateRequest;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Repositories\BlogCategoryRepository;
/**
 * Управління категоріями блогу
 * 
 * @package App\Http\Controllers\Blog\Admin
 */
class CategoryController extends BaseController
{
    /*
     * @var BlogCategoryReposiory
     */
    private $blogCategoryRepository;
    
    public function __construct() {
        
        parent::__construct();
        
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $paginator = BlogCategory::paginate(5);
          $paginator = $this->blogCategoryRepository->getAllWithPaginate(10);
  
        return view('blog.admin.categories.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new BlogCategory();
        
        
//        $categoryList = BlogCategory::all();
        $categoryList = $this->blogCategoryRepository->getForCombobox();
        
        return view('blog.admin.categories.create', compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(BlogCategoryCreateRequest $request)
    {
        $data = $request->input();
        
        $item = (new BlogCategory())->create($data);
        
        if($item) {
            return redirect()->route('blog.admin.categories.edit', [$item->id])
            ->with(['success' => 'Успішно збережено']);
        } else {
            return back()->withErrors(['msg' => 'Помилка збереження'])
            ->withInput();
        }
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, BlogCategoryRepository $categoryRepository)
    {
      
        $item =  $this->blogCategoryRepository->getEdit($id);
        if(empty($item)) {
            abort(404);
        }
        
        $categoryList = $this->blogCategoryRepository->getForComboBox();
        
        return view('blog.admin.categories.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BlogCategoeyUpdateRequest  $request
     * @param  int                        $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(BlogCategoryUpdateRequest $request, $id)
    {
//        $validatedData = $this->validate($request, $rules);
             
        $item = $this->blogCategoryRepository->getEdit($id);
        if(empty($item)) {
            return back()
                ->withErrors(['msg' => "Запис id = [{$id}] не знайдено"])
                ->withInput();
        }
        
        $data = $request->all();
        $result = $item->update($data);
        
        if($result) {
            return redirect()
                ->route('blog.admin.categories.edit', $item->id)
                ->with(['success' => 'Успішно збережено']);            
        }
        else {
            return back()
                ->withErrors(['msg' => 'Помилка збереження'])
                ->withInput();
        }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = BlogCategory::destroy($id);
       
        if($result) {
            return redirect()
                ->route('blog.admin.categories.index')
                ->with(['success' => "Категорію id [$id] успішно видалено"]);
        } else {
            return back()->withErrors(['msg' => 'Помилка видалення']);
        }
        
    }

}
