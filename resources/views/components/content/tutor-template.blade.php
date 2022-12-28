<!-- Team Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="section-title text-center position-relative mb-5">
            <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Instructors</h6>
            <h1 class="display-4">Meet Our Instructors</h1>
        </div>
        <div class="owl-carousel team-carousel position-relative" style="padding: 0 30px;">
            @foreach ($instructors as $instructor)
            <div class="team-item">
                <img class="img-fluid w-100"
                    src="{{$instructor->getFirstMediaUrl('profile_picture')}}" alt="">
                <div class="bg-light text-center p-4">
                    <h5 class="mb-3">{{$instructor->name}}</h5>
                    <p class="mb-2">{{$instructor->tag->Field}}</p>
                    <div class="d-flex justify-content-center">
                        @if(isset($instructor->twitter))
                        <a class="mx-1 p-1" href="{{$instructor->twitter}}"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if(isset($instructor->facebook))
                        <a class="mx-1 p-1" href="{{$instructor->facebook}}"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        @if(isset($instructor->linknedin))
                        <a class="mx-1 p-1" href="{{$instructor->linknedin}}"><i class="fab fa-linkedin-in"></i></a>
                        @endif
                        @if(isset($instructor->instagram))
                        <a class="mx-1 p-1" href="{{$instructor->instagram}}"><i class="fab fa-instagram"></i></a>
                        @endif
                        @if(isset($instructor->youtube))
                        <a class="mx-1 p-1" href="{{$instructor->youtube}}"><i class="fab fa-youtube"></i></a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach   
        </div>
    </div>
</div>
<!-- Team End -->