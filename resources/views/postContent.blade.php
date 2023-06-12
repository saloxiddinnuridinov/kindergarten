@extends('main.master')

@section('main')
    <div class="slider-area">
        <div class="pages-title">
            <div class="single-slider slider-height slider-height-breadcrumb d-flex align-items-center" style="background-image: url({{asset('template/img/bg/others_bg.jpg')}});">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-14">
                            <div class="slider-content slider-content-breadcrumb text-center">
                                <h1 class="white-color f-700">News Details</h1>
                                <nav class="text-center" aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">News Details</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider-end -->
    <div class="course-details-area gray-bg pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="blog-wrapper blog-list blog-details blue-blog mb-50">
                        <div class="blog-thumb mb-35">
                            <img src="{{asset("template/img/blog/$post->photo")}}" alt="">
                            <span class="blog-text-offer">news</span>
                        </div>
                        <div class="blog-content news-content">
                            <div class="blog-meta news-meta">
                                <div class="blog-meta">
                                    <span>{{$post->users->name}}</span>
                                    <span>{{$post['created_at']}}</span>
                                </div>
                            </div>
                            <h5>{{$post['title']}}</h5>
                            <p>{{$post['description']}}</p>
                            <blockquote class="blockquote">
                                <p class="mb-0">"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesenti voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditat provident, similique sunt in culpa qui officia deserunt mollit id est laborum asperiores repellat."</p>
                            </blockquote>
                            <p>{{$post['content']}}</p>

                            <div class="blog-wrapper-footer">
                                <div class="news-wrapper-tags">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="new-post-tag">
                                                <span>Tags:</span>
                                                <a href="#">Business,</a>
                                                <a href="#">Finance,</a>
                                                <a href="#">Banking,</a>
                                                <a href="#">SEO</a>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="new-post-tag news-share-icon text-left text-md-right">
                                                <span>Share</span>
                                                <a href="#">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                                <a class="twitter" href="#">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                                <a class="dribble" href="#">
                                                    <i class="fab fa-dribbble"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
