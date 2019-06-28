
@extends('blog.admin.layouts')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Змінити статтю
        <small>приємні слова..</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <form method="POST" action="{{ route('blog.admin.posts.update', $item->id) }}">
              @method('PATCH')
              @csrf
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Оновлюємо статтю</h3>
        </div>
         @include('blog.admin.posts.includes.result_messages')
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Назва</label>
              <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $item->title }}">
            </div>
            
            <div class="form-group">
              <img src="../assets/dist/img/boxed-bg.jpg" alt="" class="img-responsive" width="200">
              <label for="exampleInputFile">Лицеве зображення</label>
              <input type="file" id="exampleInputFile">

              <p class="help-block">Яке небудь повідомлення про формат..</p>
            </div>
            <div class="form-group">
              <label for="category_id">Категорія</label>
              <select name="category_id" id="category_id" class="form-control select2" placeholder="Виберіть категорі" style="width: 100%;" required>
                @foreach($categoryList as $categoryOption)
                  <option  value="{{ $categoryOption->id }}" 
                      @if($categoryOption->id == $item->category_id) selected @endif>
                      {{ $categoryOption->id_title }}</option>
                @endforeach
              </select>
            </div>
            <!-- Date -->
            <div class="form-group">
              <label>Дата:</label>

              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="datepicker" value="{{ $item->created_at }}">
              </div>
              <!-- /.input group -->
            </div>

            <!-- checkbox -->
            <div class="form-check">
                <input name="is_published" 
                       type="hidden" 
                       value="0">
                
                <input name="is_published" 
                       type="checkbox" 
                       class="form-check-input" 
                       value="1"
                       @if($item->is_published)
                       checked="checked"
                       @endif
                       >
                <label class="form-check-label" for="is_published">Опубліковано</label>
            </div>
            <div class="form-group">
                
                <label for="slug">Ідентифікатор</label>
                <input name="slug" value="{{ $item->slug }}"
                       id="slug"
                       type="text"
                       class="form-control">
            </div>
            
          </div>
            
          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputEmail1">Повний текст</label>
              <textarea name="content_raw" id="" cols="30" rows="10" class="form-control">
               {{ $item->content_raw }}
              </textarea>
          </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Короткий текст</label>
              <textarea name="excerpt" id="" cols="30" rows="10" class="form-control">
               {{ old('excerpt', $item->excerpt) }}
              </textarea>
          </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="{{ route('blog.admin.posts.index') }}" class="btn btn-default">Назад</a>
          <button class="btn btn-warning pull-right">Змінити</button>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
      </form>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
