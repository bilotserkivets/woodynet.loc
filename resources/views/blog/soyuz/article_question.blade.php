
@extends('blog.soyuz.layouts.layouts')

@section('content')
<!--  SINGLE BLOG CONTENT   -->
      <div class="container-fluid single-bg">
         <h2>
<!--            Single Blog-->
         </h2>
         <a href="{{ route('home')}}">Головна /</a>
         <a href="{{ route('question')}}">Питання-відповіді</a>
      </div>
      <div class="container show_button single_blog_content">
         <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
               <div class="row left_content">
                  <h2>{{ $articleQuestion->title }}</h2        
                  <p> {!! $articleQuestion->content_raw !!} </p>
               </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 single_blog">
               <div class="right_content recent_posts">
                  @include('blog.soyuz.news_right_sidebar')
               </div>
               <div class="right_content category">
                  @include('blog.soyuz.category_right_sidebar')
               </div>
               <div class="right_content tags">
                 @include('blog.soyuz.tags_right_sidebar')
               </div>
            </div>
         </div>
      </div>
@endsection

