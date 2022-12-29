<x-content.site-template>

    <x-content.header-template>
        <h1 class="text-white mt-4 mb-4">Learn From Home</h1>
        <h1 class="text-white display-1 mb-5">Education Courses</h1>
    </x-content.header-template>

    <x-content.blog-template :blogs="$blogs">
    </x-content.blog-template>

    <!-- Courses Start -->
    <div class="container-fluid px-0 py-5">
        <div class="row mx-0 justify-content-center pt-5">
            <div class="col-lg-6">
                <div class="section-title text-center position-relative mb-4">
                    <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Our Courses</h6>
                    <h1 class="display-4">Checkout New Releases Of Our Courses</h1>
                </div>
            </div>
        </div>
        <div class="owl-carousel courses-carousel">
            @foreach ($courses as $course)
                
                <div class="courses-item position-relative">
                    <img class="img-fluid" src="{{$course->getFirstMediaUrl('thumbnail')}}" alt="">
                    <div class="courses-text">
                        <h4 class="text-center text-white px-3">{{$course->heading}}</h4>
                        <div class="border-top w-100 mt-3">
                            <div class="d-flex justify-content-between p-4">
                                <span class="text-white"><i class="fa fa-user mr-2"></i>{{$course->instructor->name}}</span>
                                <span class="text-white"><i class="fa fa-star mr-2"></i>4.5 <small>(250)</small></span>
                            </div>
                        </div>
                        <div class="w-100 bg-white text-center p-4" >
                            <a class="btn btn-primary" href="{{route('course.details',['id' => $course->id])}}">Course Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
           
        </div>
        <div class="row justify-content-center bg-image mx-0 mb-5">
            <div class="col-lg-6 py-5">
                <div class="bg-white p-5 my-5">
                    <h1 class="text-center mb-4">30% Off For New Students</h1>
                    <form>
                        <div class="form-row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Your Name" style="padding: 30px 20px;">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="email" class="form-control bg-light border-0" placeholder="Your Email" style="padding: 30px 20px;">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <select class="custom-select bg-light border-0 px-3" style="height: 60px;">
                                        <option selected>Select A courses</option>
                                        <option value="1">courses 1</option>
                                        <option value="2">courses 1</option>
                                        <option value="3">courses 1</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <button class="btn btn-primary btn-block" type="submit" style="height: 60px;">Sign Up Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Courses End -->

    <x-content.tutor-template :instructors="$instructors">
    </x-content.tutor-template>

    <x-content.testimonial-template>
    </x-content.testimonial-template>


    <x-content.contact-template>
    </x-content.contact-template>


</x-content.site-template>