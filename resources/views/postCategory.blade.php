@extends('main.master')

@section('main')
    <div class="blog-grid-area gray-bg pt-100 pb-70">
        <div class="container">
            <div class="blog-grid-list">
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="blog-wrapper mb-30">
                                <div class="blog-thumb mb-25">
                                    <a href="news_details.html"><img src="{{asset('template/img/blog/'.$post->photo)}}" alt=""></a>
                                    <span class="blog-category">news</span>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <li><a href="#">{{$post->users->name}}</a></li>
                                        <span>{{$post['created_at']}}</span>
                                    </div>
                                    <h5><a href="{{route('post.content',['id' => $post['id']])}}">{{$post['title']}}</a></h5>
                                    <p>{{$post['description']}}</p>
                                    <div class="read-more-btn">
                                        <button>Read more</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-xl-12 text-center">
                        <div class="single-events-btn mt-15 mb-30">
                            <nav class="course-pagination mb-30" aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item">
                                        <a class="page-link" href="#"><span class="ti-angle-left"></span></a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">4</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><span class="ti-angle-right"></span></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- courses end -->
    <!-- brand start -->
@endsection

