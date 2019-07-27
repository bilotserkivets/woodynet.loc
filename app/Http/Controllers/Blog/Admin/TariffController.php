<?php

namespace App\Http\Controllers\Blog\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\BlogTariffRepository;
use App\Http\Requests\BlogTariffUpdateRequest;
use App\Http\Requests\BlogTariffCreateRequest;
use App\Models\BlogTariff;

class TariffController extends BaseController
{
    
    /*
     * @var BlogPostRepository
     */
    
    private $blogTariffRepository;
    
    public function __construct() {
        parent::__construct();
        
        $this->blogTariffRepository = app(BlogTariffRepository::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->blogTariffRepository->getAllWithPaginateAdmin(25);
        
        return view('blog.admin.tariffs.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new BlogTariff();
        
        return view ('blog.admin.tariffs.create', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogTariffCreateRequest $request)
    {
        $data = $request->input();
        
        $item = (new BlogTariff())->create($data);
        
        if($item) {
            return redirect()->route('blog.admin.tariffs.edit', [$item->id])
                    ->with(['success' => 'Успішно збережено']);
        } else {
            return back()->withErrors(['msg' => 'Помилка збереження'])
                    ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $item = $this->blogTariffRepository->getEdit($id);
        if(empty($item)) {
            abort(404);
        }
        
        return view('blog.admin.tariffs.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogTariffUpdateRequest $request, $id)
    {
        $item = $this->blogTariffRepository->getEdit($id);
        
        if(empty($item)) {
            return back()
                ->withErrors(['msg' => "Запис id=[{$id}] не знайдено"])
                ->withInput();
        }
       
       $data = $request->all();             
        
        $result = $item->update($data);
        
        if($result) {
            return redirect()
                ->route('blog.admin.tariffs.edit', $item->id)
                ->with(['success' => 'Успішно збережено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Помилка зберігання'])
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
        $result = BlogTariff::destroy($id);
        if($result) {
            return redirect()
            ->route('blog.admin.tariffs.index')
            ->with(['success' => 'Запис id № [$id] успішно видалено']);
        } else {
            return back()->withErorrs(['msg' => 'Помилка видалення']);
        }
    }
}
