<div class="sidebar">
    <div class="sidebar__single sidebar__category">
        <div class="sidebar__title-box">
            <h3 class="sidebar__title">Kategoriler</h3>
        </div>
        <ul class="sidebar__category-list list-unstyled">
            @foreach($categories as $category)
                <li>
                    <a href="{{$category->url}}">
                        {{$category->title}} ({{$category->blogs->count()}})
                        <span class="icon-right-arrow-1"></span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="sidebar__single sidebar__post">
        <div class="sidebar__title-box">
            <h3 class="sidebar__title">Popüler Konular</h3>
        </div>
        <ul class="sidebar__post-list list-unstyled">
            @foreach($popularPosts as $post)
                <li>
                    <div class="sidebar__post-image">
                        <img src="{{$post->image}}" alt="">
                    </div>
                    <div class="sidebar__post-content">
                        <p class="sidebar__post-date">
                            <span class="icon-calendar"></span>
                            {{$post->created_at->format("d M Y")}}
                        </p>
                        <h3 class="sidebar__post-title">
                            <a href="{{$post->url}}">{{$post->title}}</a>
                        </h3>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
