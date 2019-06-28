@extends('blog.admin.layouts')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Редагувати категорію
        <small>приятные слова..</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <form method="POST" action="{{ route('blog.admin.categories.update', $item->id) }}">
            @method('PATCH')
            @csrf
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Змінюємо категорію</h3>
        </div>
        @include('blog.admin.posts.includes.result_messages')
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="title">Назва</label>
              <input type="text" class="form-control" name="title" id="title" placeholder="" value="{{ $item->title }}">
            </div>
              <div class="form-group">
              <label for="slug">Ідентифікатор</label>
              <input type="text" class="form-control" name="slug" id="slug" placeholder="" value="{{ $item->slug }}">
            </div>
            <div class="form-group">
              <label for="description">Опис</label>
              <textarea class="form-control" name="description" id="description">{{ old('description', $item->description) }}</textarea>
            </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="{{ route('blog.admin.categories.index') }}" class="btn btn-default">Назад</a>
          <button class="btn btn-warning pull-right">Змінити</button>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
      </form>

    </section>
    <!-- /.content -->
  </div>
@endsection
