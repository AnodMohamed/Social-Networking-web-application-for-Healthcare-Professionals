

@include('layouts.header')
<div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
        <div class="row py-5">
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn"> عرض  بيانات العامل في المجال الطبي</h1>
                <a href="{{ route('home') }}" class="h5 text-white">الصفحة الرئيسية</a>
                <i class="far fa-circle text-white px-2"></i>
                @auth
                    @if (Auth::user()->type  == 'ادمن')
                        <a href="{{ route('admin.medical.index') }}" class="h5 text-white">التحكم في العاملين في المجال الطبي</a>
                        <i class="far fa-circle text-white px-2"></i>
                    @endif
                @endauth
                <span  class="h5 text-white"> عرض  بيانات العامل في المجال الطبي</span>
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


    <!-- Contact Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase"> عرض  بيانات العامل في المجال الطبي</h5>
            <h6 class="mb-0">   </h6>
        </div>

        
        <div class="row g-5">
            <div class="col-lg-12 wow slideInUp m-auto row" data-wow-delay="0.3s">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        {{--البريد الالكتروني--}}
                        <h5 class="fw-bold text-primary text-uppercase"> {{ $user->email }}</h5>
                        
                        {{-- اسم المستخدم--}}
                        <h1 class="mb-0">{{ $user->name }}</h1>
                    </div>

                    {{---نبذةتعريفية--}}
                    <p class="mb-4">{!! $medical_profile->bio !!}</p>

                    <div class="row g-0 mb-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            {{--الوظيفة--}}
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3">الوظيفة:</i>{{ $medical_profile->occupation }} </h5>
                            {{--التخصص--}}
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"> التخصص:</i>{{ $medical_profile->specialization }}</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                             {{--الدرجة العلمية--}}
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"> الدرجة العلمية:</i>{{ $medical_profile->degree }}</h5>
                            {{-- سنوات الخبرة --}}
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"> سنوات الخبرة:</i>{{ $medical_profile->experience }}</h5>
                        </div>
                    </div>

                    @auth
                        @if (Auth::user()->id != $user->id)
                            <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                                <div class="bg-primary d-flex align-items-center justify-content-center rounded " style="width: 60px; height: 60px;">
                                    <a  class="px-2"
                                        href="{{ str_replace('?', '/', route('chatify', $user->id)) }}" >
                                        <i class="bi bi-chat-fill text-white" ></i>
                                    </a>
                                </div>
                            </div>
    
                        @endif
                    @endauth
                    
                    

                    @auth
                         {{-- بطاقة الهوية --}}
                        @if (Auth::user()->type == "ادمن" || Auth::user()->id == $user->id)

                            <div class="d-blok align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                                <div class=" d-blok align-items-center justify-content-center rounded" >
                                    <h4> بطاقة الهوية </h4>
                                    @if(isset($medical_profile->Identification_card))
                                        <iframe class="mt-2" src="{{asset('storage/uploads')}}/{{ $medical_profile->Identification_card }}"
                                        style="width: 100%; height: 300px;"></iframe>
                                    @else
                                        <p>لا يوجد ملف pdf</p>
                                    @endif
                                </div>
                            </div>

                        @endif

                        {{-- الرخصة--}}
                        @if (Auth::user()->type == "ادمن" || Auth::user()->id == $user->id)

                            <div class="d-blok align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                                <div class=" d-blok align-items-center justify-content-center rounded" >
                                    <h4>الرخصة</h4>
                                    @if(isset($medical_profile->license))
                                        <iframe class="mt-2" src="{{asset('storage/uploads')}}/{{ $medical_profile->license }}"
                                        style="width: 100%; height: 300px;"></iframe>
                                    @else
                                        <p>لا يوجد ملف pdf</p>
                                    @endif
                                </div>
                            </div>

                        @endif

                         {{-- الشهادة --}}
                        @if (Auth::user()->type == "ادمن" || Auth::user()->id == $user->id)

                            <div class="d-blok align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                                <div class=" d-blok align-items-center justify-content-center rounded" >
                                    <h4>الشهادة</h4>
                                    @if(isset($medical_profile->certificate))
                                        <iframe class="mt-2" src="{{asset('storage/uploads')}}/{{ $medical_profile->certificate }}"
                                        style="width: 100%; height: 300px;"></iframe>
                                    @else
                                        <p>لا يوجد ملف pdf</p>
                                    @endif
                                </div>
                            </div>

                        @endif
                    @endauth


                   
                </div>

                {{-- الصور التعريفية --}}
                <div class="col-lg-5" style="height: 500px;">
                    <div class="position-relative h-100">
                        @if ($user->profile_photo_path == Null)
                            <img src="{{ asset('defult.jpg') }}"  class="position-absolute w-100 h-100 rounded wow zoomIn"
                            data-wow-delay="0.9s" style="object-fit: cover;">
                        @else
                            <img src="{{asset('storage')}}/{{$user->profile_photo_path}}" class="position-absolute w-100 h-100 rounded wow zoomIn"
                            data-wow-delay="0.9s" style="object-fit: cover;">
                        @endif
                        {{-- <img class="position-absolute w-100 h-100 rounded wow zoomIn"  src="img/about.jpg" style="object-fit: cover;"> --}}
                    </div>
                </div>

            </div>
        </div>
        
<!-- Blog Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase"> المقالات</h5>
        </div>
        <div class="row g-5">
            @foreach ($Articles as $article)
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid" src="{{asset('storage/images')}}/{{$article->image}}" style="width:100%; height:300px">
                        </div>
                        <div class="p-4">
                             
                            <h4 class="mb-3">{{ $article->title}}</h4>
                            <a class="text-uppercase" href="{{ route('public.article.showarticle',['article_id'=>$article->id ]) }}" >قراءة المزيد  <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
         
    
        </div>
    </div>
    </div>
    <!-- Blog Start -->
    </div>
</div>


@include('layouts.footer')