
@extends('blog.admin.layouts')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Сторінка створення нового способу оплати
        <!--<small>приємні слова..</small>-->
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <form method="POST" action="{{ route('blog.admin.payments.store') }}" enctype="multipart/form-data">
<!--              @method('PATCH')-->
              @csrf
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Додаємо новий спосіб оплати</h3>
        </div>
          @include('blog.admin.posts.includes.result_messages')
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Посилання</label>
              <input type="text" name="link" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('title', $item->link) }}">
            </div>
            
            <div class="form-group">
              <img src="../assets/dist/img/boxed-bg.jpg" alt="" class="img-responsive" width="200">
              <label for="img">Лицеве зображення</label>
              <input type="file" id="img" name="img">

              <p class="help-block">Виберіть зображення розміром 325x120</p>
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
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="{{ route('blog.admin.payments.index') }}" class="btn btn-default">Назад</a>
          <button class="btn btn-warning pull-right">Створити</button>
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
