@extends("layouts.main")
@section("content")
    @include("layouts.breadcrumb")
    <section class="case-studies-two">
        <div class="container">
            @if (count($categories))
                <div class="case-studies-two__filter-box">
                    <ul class="case-studies-two__filter style1 post-filter list-unstyled clearfix">
                        <li data-filter=".all" class="active"><span class="filter-text"> Tümü</span>
                        </li>
                        @foreach ($categories as $category)
                            <li data-filter=".{{ $category->id }}"><span class="filter-text">
                                    {{$category->title}}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row filter-layout">
                @foreach ($projects as $project)
                    <div class="col-xl-4 col-lg-6 col-mg-6 filter-item all {{$project->category->id}}">
                        <div class="project-two__single">
                            <div class="project-two__img-box">
                                <div class="project-two__img">
                                    <img src="{{$project->image}}" alt="{{ $project->title }}">
                                </div>
                                <div class="project-two__content">
                                    <div class="project-two__icon">
                                        <span class="icon-project-management"></span>
                                    </div>
                                    <h3 class="project-two__title"><a href="{{$project->url}}">{{$project->title}}</a></h3>
                                    <div class="project-two__arrow">
                                        <a href="{{$project->image}}" class="img-popup"><span class="icon-next"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection