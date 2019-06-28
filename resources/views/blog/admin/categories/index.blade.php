@extends('blog.admin.layouts')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blank page
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Лістинг сущності</h3>
            </div>
          @include('blog.admin.posts.includes.result_messages')
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <a href="{{ route('blog.admin.categories.create') }}" class="btn btn-success">Додати</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Назва</th>
                  <th>Дія</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($paginator as $item)
                <tr>
                  <td>{{ $item->id }}</td>
                  <td><a href="{{ route('blog.admin.categories.edit', $item->id) }}"> {{ $item->title }}</a>
                  </td>
                  <td>
                        <form method="POST" action="{{ route('blog.admin.categories.destroy', $item->id) }}">
                        @method('DELETE')
                        @csrf
                        <button onclick="return confirm('Ви впевнені?')" type="submit" class="delete">
	                   <i class="fa fa-remove"></i>
	                </button>
                      </form>
                  </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      @if($paginator->total() > $paginator->count())
                <br>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                 {{ $paginator->links() }}
                            </div>
                        </div>
                    </div>    
                </div>
            @endif
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
@endsection
