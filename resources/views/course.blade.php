<x-content.site-template>
    <x-content.header-template>
        <h1 class="text-white display-1">Courses</h1>
            <div class="d-inline-flex text-white mb-5">
                <p class="m-0 text-uppercase"><a class="text-white" href="/">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Courses</p>
            </div>
    </x-content.header-template>
    

    <!-- Courses Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row mx-0 justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center position-relative mb-5">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Our Courses</h6>
                        @if (Route::currentRouteName()==='course')
                            <h1 class="display-4">Checkout New Releases Of Our Courses</h1>
                        @else
                            <h1 class="display-4">Checkout {{$tag->title}} Related Courses</h1>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
            {{-- Content Start --}}
               @foreach ($courses as $course)
               <div class="col-lg-4 col-md-6 pb-4">
                    <a class="courses-list-item position-relative d-block overflow-hidden mb-2" 
                        href="{{route('course.details',['id'=>$course->id])}}">
                        <img class="img-fluid" 
                            src="{{$course->getFirstMediaUrl('thumbnail','card')}}" 
                            alt="{{$course->getFirstMedia('thumbnail')->name}}">
                        <div class="courses-text">
                            <h4 class="text-center text-white px-3">{{$course->heading}}</h4>
                            <div class="border-top w-100 mt-3">
                                <div class="d-flex justify-content-between p-4">
                                    <span class="text-white"><i class="fa fa-user mr-2"></i>
                                        {{$course->instructor->name}}</span>
                                    <span class="text-white"><i class="fa fa-star mr-2"></i>4.5
                                        <small>(250)</small></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
               @endforeach
            {{-- Content End --}}
                {{-- Navigator Start --}}
                <div class="col-12">
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-lg justify-content-center mb-0">
                          <li class="page-item disabled">
                            <a class="page-link rounded-0" href="#" aria-label="Previous">
                              <span aria-hidden="true">&laquo;</span>
                              <span class="sr-only">Previous</span>
                            </a>
                          </li>
                          <li class="page-item active"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item">
                            <a class="page-link rounded-0" href="#" aria-label="Next">
                              <span aria-hidden="true">&raquo;</span>
                              <span class="sr-only">Next</span>
                            </a>
                          </li>
                        </ul>
                      </nav>
                </div>
                {{-- Navigator End --}}
            </div>
        </div>
    </div>
    <!-- Courses End -->
</x-content.site-template>
