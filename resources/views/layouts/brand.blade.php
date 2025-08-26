<section class="brand-one">
    <div class="brand-one__bg"
        style="background-image: url({{ asset("assets/images/backgrounds/brand-one-bg.jpg") }});"></div>
    <div class="container">
        <div class="brand-one__carousel thm-owl__carousel owl-theme owl-carousel" data-owl-options='{
                    "items": 3,
                    "margin": 10,
                    "smartSpeed": 700,
                    "loop":true,
                    "autoplay": 6000,
                    "nav":false,
                    "dots":false,
                    "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                    "responsive":{
                        "0":{
                            "items":2
                        },
                        "768":{
                            "items":3
                        },
                        "992":{
                            "items": 5
                        }
                    }
                }'>
            <!--Brand One Single Start-->
            @foreach ($references as $reference)
                <div class="item">
                    <div class="brand-one__single">
                        <div class="brand-one__img">
                            <img src="{{$reference->getFirstMediaUrl("default")}}" alt="">
                        </div>
                        <div class="brand-one__hover-img">
                            <img src="{{ $reference->getFirstMediaUrl("default") }}" alt="">
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <!-- If we need navigation buttons -->
    </div>
</section>