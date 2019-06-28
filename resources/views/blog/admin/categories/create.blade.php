@extends('blog.admin.layouts')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Додати категорію
        <small>приятные слова..</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <form method="POST" action="{{ route('blog.admin.categories.store') }}">
            @csrf
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Додаємо категорію</h3>
        </div>
           @include('blog.admin.posts.includes.result_messages')
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="title">Назва</label>
              <input type="text" class="form-control" name="title" id="title" placeholder="">
            </div>
            <div class="form-group">
              <label for="slug">Ідентифікатор</label>
              <input type="text" class="form-control" name="slug" id="slug" placeholder="" value="">
            </div>
            <div class="form-group">
              <label for="description">Опис</label>
              <textarea class="form-control" name="description" id="description"></textarea>
            </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="{{ route('blog.admin.categories.index') }}" class="btn btn-default">Назад</a>
          <button class="btn btn-success pull-right">Додати</button>
        </div>
        <!-- /.box-footer-->
      </div>
      </form>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
@endsection

