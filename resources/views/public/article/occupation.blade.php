

@include('layouts.header')
<div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
        <div class="row py-5">
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn">{{$occupation}}</h1>
                <a href="{{ route('home') }}" class="h5 text-white">الصفحة الرئيسية</a>
                <i class="far fa-circle text-white px-2"></i>
                <span  class="h5 text-white">{{$occupation}}</span>
            </div>
        </div>
    </div>
    </div>
    <!-- Navbar End -->


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <x-authentication-card>
            <x-slot name="logo">
            </x-slot>
    
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </x-authentication-card>
    </div>
    </div>
    <!-- Full Screen Search End -->

    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                @foreach ($profiles as $profile)
                    
                    <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                        <div class="team-item bg-light rounded overflow-hidden">
                            <div class="team-img position-relative overflow-hidden">
                                @if ($profile->user->profile_photo_path == Null)
                                    <img class="img-fluid w-100"  src="{{ asset('defult.jpg') }}" alt="{{ $profile->user->name }}">
                                @else
                                    <img class="img-fluid w-100"  src="{{asset('storage')}}/{{$profile->user->profile_photo_path}}" alt="{{ $profile->user->name }}">

                                @endif
                           
                            </div>
                            <div class="text-center py-4">
                               <a href="{{ route('public.medical.showprofile',['user_id'=>$profile->user->id ]) }}" > <h4 class="text-primary">{{ $profile->user->name }}</h4></a>
                                <p class="text-uppercase m-0">{{$profile->occupation}}</p>
                            </div>

                            
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Blog End -->



</div>


@include('layouts.footer')