<x-content.site-template>
    <x-content.header-template>
        <h1 class="text-white display-1">Course Detail</h1>
            <div class="d-inline-flex text-white mb-5">
                <p class="m-0 text-uppercase"><a class="text-white" href="/">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Course Detail</p>
            </div>
    </x-content.header-template>
    <!-- Detail Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <div class="section-title position-relative mb-5">
                            <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Course Detail</h6>
                            <h1 class="display-4">{{$course->heading}}</h1>
                        </div>
                        <img class="img-fluid  rounded w-100 mb-4" src="{{$course->getFirstMediaUrl('banner')}}" alt="Image">
                        {{-- <p>Tempor erat elitr at rebum at at clita aliquyam consetetur. Diam dolor diam ipsum et, tempor voluptua sit consetetur sit. Aliquyam diam amet diam et eos sadipscing labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo justo et tempor consetetur takimata eirmod, dolores takimata consetetur invidunt magna dolores aliquyam dolores dolore. Amet erat amet et magna</p>
                         --}}
                        <h2>Tags:</h2>
                        @foreach ($tags as $tag)
                         <span class="badge mr-2 badge-info">
                            <a class="text-decoration-none text-light" 
                            href="{{route('course.related',['id' => $tag->id])}}">{{$tag->title}}</a>
                        </span>
                        @endforeach
                        <h2>Description:</h2>
                        <p>{{$course->body}}</p>
                    </div>

                    <h2 class="mb-3">Related Courses</h2>
                    <div class="owl-carousel related-carousel position-relative" style="padding: 0 30px;">
                       {{-- @foreach ($allCourses as $eachCourse)
                           @php
                               $turn = 0;
                           @endphp
                            @foreach ($eachCourse->tags as $eachTag)
                                @foreach ($tags as $tag)
                                    @if ($eachTag->id === $tag->id && $turn != 0)
                                        @php
                                            $turn = 1;
                                        @endphp
                                        <a class="courses-list-item position-relative d-block overflow-hidden mb-2" href="detail">
                                            <img class="img-fluid" src="{{$eachCourse->getFirstMediaUrl('thumbnail')}}" alt="">
                                            <div class="courses-text">
                                                <h4 class="text-center text-white px-3">{{$eachCourse->heading}}</h4>
                                                <div class="border-top w-100 mt-3">
                                                    <div class="d-flex justify-content-between p-4">
                                                        <span class="text-white"><i class="fa fa-user mr-2"></i>
                                                            {{$eachCourse->instructor->name}}</span>
                                                        <span class="text-white"><i class="fa fa-star mr-2"></i>4.5
                                                            <small>(250)</small></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endif
                                @endforeach
                            @endforeach
                       @endforeach --}}
                       @foreach ($myarr as $item)
                            <a class="courses-list-item position-relative d-block overflow-hidden mb-2"
                             href="{{route('course.details',['id'=>$item->id])}}">
                                <img class="img-fluid" src="{{$item->getFirstMediaUrl('thumbnail')}}" alt="">
                                <div class="courses-text">
                                    <h4 class="text-center text-white px-3">{{$item->heading}}</h4>
                                    <div class="border-top w-100 mt-3">
                                        <div class="d-flex justify-content-between p-4">
                                            <span class="text-white"><i class="fa fa-user mr-2"></i>
                                                {{$item->instructor->name}}</span>
                                            <span class="text-white"><i class="fa fa-star mr-2"></i>4.5
                                                <small>(250)</small></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                       @endforeach
                    </div>
               </div>

                <div class="col-lg-4 mt-5 mt-lg-0">
                    <div class="bg-primary mb-5 py-3">
                        <h3 class="text-white py-3 px-4 m-0">Course Features</h3>
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Instructor</h6>
                            <h6 class="text-white my-3">{{$course->instructor->name}}</h6>
                        </div>
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Rating</h6>
                            <h6 class="text-white my-3">4.5 <small>(250)</small></h6>
                        </div>
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Lectures</h6>
                            <h6 class="text-white my-3">{{$course->lectures}}</h6>
                        </div>
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Duration</h6>
                            <h6 class="text-white my-3">{{$course->duration}} Hrs</h6>
                        </div>
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Skill level</h6>
                            <h6 class="text-white my-3">{{$course->skill_level}}</h6>
                        </div>
                        <div class="d-flex justify-content-between px-4">
                            <h6 class="text-white my-3">Language</h6>
                            <h6 class="text-white my-3">{{$course->language}}</h6>
                        </div>
                        <h5 class="text-white py-3 px-4 m-0">Course Price: {{$course->price}}</h5>
                        <div class="py-3 px-4">
                            <a class="btn btn-block btn-secondary py-3 px-5" href="">Enroll Now</a>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h2 class="mb-3">Categories</h2>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="" class="text-decoration-none h6 m-0">Web Design</a>
                                <span class="badge badge-primary badge-pill">150</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="" class="text-decoration-none h6 m-0">Web Development</a>
                                <span class="badge badge-primary badge-pill">131</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="" class="text-decoration-none h6 m-0">Online Marketing</a>
                                <span class="badge badge-primary badge-pill">78</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="" class="text-decoration-none h6 m-0">Keyword Research</a>
                                <span class="badge badge-primary badge-pill">56</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="" class="text-decoration-none h6 m-0">Email Marketing</a>
                                <span class="badge badge-primary badge-pill">98</span>
                            </li>
                        </ul>
                    </div>

                    <div class="mb-5">
                        <h2 class="mb-4">Recent Courses</h2>
                        @foreach ($myarr as $item)
                            <a class="d-flex align-items-center text-decoration-none mb-4" 
                                href="{{route('course.details',['id' => $item->id])}}">
                                <img class="img-fluid rounded" src="{{$item->getFirstMediaUrl('thumbnail')}}" alt="">
                                <div class="pl-3">
                                    <h6>{{$item->heading}}</h6>
                                    <div class="d-flex">
                                        <small class="text-body mr-3"><i class="fa fa-user text-primary mr-2"></i>{{$item->instructor->name}}</small>
                                        <small class="text-body"><i class="fa fa-star text-primary mr-2"></i>4.5 (250)</small>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->

</x-content.site-template>