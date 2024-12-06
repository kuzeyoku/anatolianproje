@extends("layouts.main")
@section("title","Blog")
@section("content")
    @include("layouts.breadcrumb")
    <section class="blog-page">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="blog-page__left">
                        <div class="blog-page__content-box">
                            @foreach($blogs as $blog)
                                <div class="blog-page__single">
                                    <div class="blog-page__img-box">
                                        <div class="blog-page__img">
                                            <img src="{{$blog->image}}" alt="">
                                        </div>
                                    </div>
                                    <div class="blog-page__content">
                                        <div class="blog-page__date">
                                            <p>{{$blog->created_at->format("d")}}<br>
                                                <span>{{$blog->created_at->format("M")}}</span></p>
                                        </div>
                                        <ul class="blog-page__meta list-unstyled">
                                            <li>
                                                <a href="#"><span class="icon-user-icon"></span>{{$blog->user->name}}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#"><span
                                                        class="icon-comment-icon"></span>({{$blog->comments->count()}}
                                                    )
                                                    Yorum</a>
                                            </li>
                                        </ul>
                                        <h3 class="blog-page__title"><a href="{{$blog->url}}">{{$blog->title}}</a></h3>
                                        <p class="blog-page__text">{{$blog->short_description}}</p>
                                        <a href="{{$blog->url}}" class="thm-btn blog-page__btn"><span
                                                class="icon-right-arrow"></span>Detaylar</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="blog-page__pagination">
                            <ul class="pg-pagination list-unstyled">
                                <li class="prev">
                                    <a href="blog-details.html" aria-label="Prev"><i class="icon-prev"></i></a>
                                </li>
                                <li class="count"><a href="blog-details.html">1</a></li>
                                <li class="count"><a href="blog-details.html">2</a></li>
                                <li class="count"><a href="blog-details.html">3</a></li>
                                <li class="next">
                                    <a href="blog-details.html" aria-label="Next"><i class="icon-next"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    @include("blog.sidebar")
                </div>
            </div>
        </div>
    </section>
@endsection
