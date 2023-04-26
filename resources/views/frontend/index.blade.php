@extends('frontend.includes.layout')
@section('page_title', 'Book')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>                                       
@section('container')
<!-- ======================
      Blog Grid
    ========================= -->
    <section class="mx-4">
       <form  method="GET" action="{{ route('frontend.search') }}">
        <div class="row">
          <div class="col-md-3 col-6">
            <label>Title</label>
            <input type="text" class="form-control"  name="title" > 
          </div>
          <div class="col-md-3 col-6" >
            <label>Author</label>
               <input type="text" class="form-control"  name="author" > 
          </div>
          <div class="col-md-3 col-6" >
            <label>ISBN</label>
               <input type="text" class="form-control"  name="isbn"> 
          </div>
          <div class="col-md-3 col-6" >
            <label>Genre</label>
               <input type="text" class="form-control"  name="genre"> 
          </div>
           <div class="col-md-6 col-6" style="padding:15px;">
                      <button type="submit" class="btn btn-primary" id="filter"><i class="fa fa-search" aria-hidden="true"></i></button>
                      <a href="{{ route('frontend.index') }}" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i></a>
            </div>
        </div> 
      </form> 
    </section>    
    <section class="blog-grid">
      <div class="container">
       @if ($book->isEmpty())
        <h4 class="card-title text-center">No Records Found</h4>
        @else
        <div class="row">
          <!-- Post Item #1 -->
          @foreach($book as $key => $val)
          <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="post-item">
              <div class="post__img">
                <a href="blog-1.html">
                  <img src="{{ url('/') }}/public//assets/admin/images/{{ $val->image }}" loading="lazy">
                </a>
              </div><!-- /.post__img -->
              <div class="post__body">
                <div class="post__meta-cat">
                  <h2>{{ $val->title }}</h2>
                </div><!-- /.blog-meta-cat -->
                <div class="post__meta d-flex">
                  <span class="post__meta-date">{{ date('M d, Y',strtotime($val->published)) }}</span>
                </div>
                <h4 class="post__title"><a>{{ $val->author }}</a></h4>

                <p class="post__desc">{{ $val->description }}
                </p>
              </div><!-- /.post__body -->
            </div><!-- /.post-item -->
          </div><!-- /.col-lg-4 -->
          <!-- Post Item #2 -->
          @endforeach
        </div><!-- /.row -->
        <div class="row">
          <div class="col-12 text-center">
            <nav class="pagination-area">
              <ul class="pagination justify-content-center">
                 {{ $book->links('frontend.includes.paginate') }}
              </ul>
            </nav><!-- .pagination-area -->
          </div><!-- /.col-12 -->
        </div><!-- /.row -->
        @endif
      </div><!-- /.container -->
    </section><!-- /.blog Grid -->

@endsection