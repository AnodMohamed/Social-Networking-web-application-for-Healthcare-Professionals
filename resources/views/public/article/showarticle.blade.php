

@include('layouts.header')
<div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
        <div class="row py-5">
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn"> عرض  بيانات العامل في المجال الطبي</h1>
                <a href="{{ route('home') }}" class="h5 text-white">الصفحة الرئيسية</a>
                <i class="far fa-circle text-white px-2"></i>
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

    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    <div class="mb-5">
                        <img src="{{asset('storage/images')}}/{{$article->image}}"  class="img-fluid w-100 rounded mb-5">
                        <h1 class="mb-4">{{ $article->title}}</h1>
                        <p> {!! $article->content !!}</p>
                    </div>
                    <!-- Blog Detail End -->
    
                    <!-- Comment List Start -->
                    <div class="mb-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            @if ($likes > 0)
                                <h6 class="mb-0 d-flex">{{$likes }} الاعجابات</h6> 
                            @endif
                            @if (Auth::check())
                                @php
                                    $checklike =DB::table('likes')->where('article_id',$article->id)->where('user_id',Auth::user()->id)->count();
                                @endphp
                                 @if ($checklike  ==  0)
                                <form action="{{ route('like') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $article->id }}"/>
                                    <button type="submit" class="btn text-info"><i class="bi bi-hand-thumbs-up-fill"></i></button>
                                </form>
                                 @endif
                            @endif
                            
                            <p  class="mb-0"> {{count($comments) }} التعليقات</p> 
                        </div>
                        @if (count($comments) > 0)
                            @foreach ( $comments as $comment)

                                <div class="d-flex mb-4"  >
                                    @if ($comment->user->profile_photo_path== Null)
                                        <img src="{{ asset('defult.jpg') }}" style="width: 70px; height:70px; margin-left: 10px;">
                                    @else
                                        <img src="{{asset('storage')}}/{{$comment->user->profile_photo_path}}"  style="width: 70px; height:70px; margin-left: 10px;">
                                    @endif 
                                    <div class="ps-3">
                                        <h6>{{$comment->user->name}} <small><i>{{$comment->created_at->format('Y, M-d')}}</i></small></h6>
                                        <p>{{$comment->body}}</p>
                                        @if (Auth::check())
                                            @if ($comment->user_id == Auth::user()->id || $article->user_id == Auth::user()->id ||  Auth::user()->type == 'ادمن')
                                                <a href="{{ route('comments.delete',$comment->id ) }}"  ><i class="fas fa-trash-alt"></i></a>
                                            @endif

                                            @if ($comment->user_id == Auth::user()->id)
                                                <a href="{{ route('comments.edit',$comment->id ) }}"  ><i class="fas fa-edit"></i></a>

                                            @endif
                                        @endif
                                    </div>
                               
                                </div>
                            @endforeach
                        @endif
                 
                       
                      
                    </div>
                    <!-- Comment List End -->
    
                    @auth
                        <!-- Comment Form Start -->
                        <div class="bg-light rounded p-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="mb-0">اكتب تعليق</h3>
                            </div>
                            <form action="{{ route('comments.store') }}" method="post">
                                @csrf
                                <div class="row g-3">
                                
                                    <input type="hidden" name="article_id" value="{{ $article->id }}" />
                                    <div class="col-12">
                                        <textarea class="form-control bg-white border-0" rows="5" placeholder="تعليق" name="body"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">ارسال  </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Comment Form End -->
                    @endauth
           
                </div>
    
                <!-- Sidebar Start -->
                <div class="col-lg-4">
  
    
                    <!-- Category Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">التخصص</h3>
                        </div>
                        <div class="link-animated d-flex flex-column justify-content-start">
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="{{ route('public.medical.category',['category'=>'التخدير']) }}"><i class="bi bi-arrow-right me-2"></i>التخدير</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="{{ route('public.medical.category',['category'=>'طب القلب والأوعية الدموية']) }}"><i class="bi bi-arrow-right me-2"></i>طب القلب والأوعية الدموية</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="{{ route('public.medical.category',['category'=>'العناية المركزة']) }}"><i class="bi bi-arrow-right me-2"></i>العناية المركزة</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="{{ route('public.medical.category',['category'=>'طب الطوارئ']) }}"><i class="bi bi-arrow-right me-2"></i>طب الطوارئ</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="{{ route('public.medical.category',['category'=>'أمراض الغدد الصماء']) }}"><i class="bi bi-arrow-right me-2"></i>أمراض الغدد الصماء</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="{{ route('public.medical.category',['category'=>'أمراض الجهاز الهضمي']) }}"><i class="bi bi-arrow-right me-2"></i>أمراض الجهاز الهضمي</a>

                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="{{ route('public.medical.category',['category'=>'أمراض الدم']) }}"><i class="bi bi-arrow-right me-2"></i>أمراض الدم</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="{{ route('public.medical.category',['category'=>'التغذية']) }}"><i class="bi bi-arrow-right me-2"></i>التغذية</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="{{ route('public.medical.category',['category'=>'أمراض الكلى']) }}"><i class="bi bi-arrow-right me-2"></i>أمراض الكلى</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="{{ route('public.medical.category',['category'=>'الأورام']) }}"><i class="bi bi-arrow-right me-2"></i>الأورام</a>

                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="{{ route('public.medical.category',['category'=>'طب العيون']) }}"><i class="bi bi-arrow-right me-2"></i>طب العيون</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="{{ route('public.medical.category',['category'=>'الأنف والأذن والحنجرة']) }}"><i class="bi bi-arrow-right me-2"></i>الأنف والأذن والحنجرة </a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="{{ route('public.medical.category',['category'=>'الأمراض الصدرية']) }}"><i class="bi bi-arrow-right me-2"></i>الأمراض الصدرية</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="{{ route('public.medical.category',['category'=>'طب الرعاية الأولية']) }}"><i class="bi bi-arrow-right me-2"></i>طب الرعاية الأولية</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="{{ route('public.medical.category',['category'=>'طب الأطفال']) }}"><i class="bi bi-arrow-right me-2"></i>طب الأطفال</a>

                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="{{ route('public.medical.category',['category'=>'الطب النفسي']) }}"><i class="bi bi-arrow-right me-2"></i>الطب النفسي</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="{{ route('public.medical.category',['category'=>'جراحة العظام والروماتيزم']) }}"><i class="bi bi-arrow-right me-2"></i>جراحة العظام والروماتيزم</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="{{ route('public.medical.category',['category'=>'الأشعة']) }}"><i class="bi bi-arrow-right me-2"></i>الأشعة</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="{{ route('public.medical.category',['category'=>'الطب التناسلي']) }}"><i class="bi bi-arrow-right me-2"></i>الطب التناسلي</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="{{ route('public.medical.category',['category'=>'جراحة']) }}"><i class="bi bi-arrow-right me-2"></i>جراحة</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="{{ route('public.medical.category',['category'=>'جراحة المسالك البولية']) }}"><i class="bi bi-arrow-right me-2"></i>جراحة المسالك البولية</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="{{ route('public.medical.category',['category'=>'اخرى']) }}"><i class="bi bi-arrow-right me-2"></i>اخرى</a>

                        </div>
                    </div>
                    <!-- Category End -->
{{--     
                    <!-- Recent Post Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Recent Post</h3>
                        </div>
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="img/blog-1.jpg" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <a href="" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum dolor sit amet adipis elit
                            </a>
                        </div>
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="img/blog-2.jpg" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <a href="" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum dolor sit amet adipis elit
                            </a>
                        </div>
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="img/blog-3.jpg" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <a href="" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum dolor sit amet adipis elit
                            </a>
                        </div>
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="img/blog-1.jpg" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <a href="" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum dolor sit amet adipis elit
                            </a>
                        </div>
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="img/blog-2.jpg" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <a href="" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum dolor sit amet adipis elit
                            </a>
                        </div>
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="img/blog-3.jpg" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <a href="" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum dolor sit amet adipis elit
                            </a>
                        </div>
                    </div>
                    <!-- Recent Post End --> --}}
    

    
                    <!-- Tags Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">الوظيفة </h3>
                        </div>
                        <div class="d-flex flex-wrap m-n1">
                            <a href="{{ route('public.medical.occupation',['occupation'=>'طبيب']) }}" class="btn btn-light m-1">طبيب</a>
                            <a href="{{ route('public.medical.occupation',['occupation'=>'مساعد طبيب']) }}"  class="btn btn-light m-1">مساعد طبيب</a>
                            <a href="{{ route('public.medical.occupation',['occupation'=>'ممرض']) }}"  class="btn btn-light m-1">ممرض</a>
                            <a href="{{ route('public.medical.occupation',['occupation'=>'اخرى']) }}"  class="btn btn-light m-1">اخرى</a>

                        </div>
                    </div>
                    <!-- Tags End -->
    
                   
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
    <!-- Blog End -->


    <!-- Vendor Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5 mb-5">
            <div class="bg-white">
                <div class="owl-carousel vendor-carousel">
                    <img src="img/vendor-1.jpg" alt="">
                    <img src="img/vendor-2.jpg" alt="">
                    <img src="img/vendor-3.jpg" alt="">
                    <img src="img/vendor-4.jpg" alt="">
                    <img src="img/vendor-5.jpg" alt="">
                    <img src="img/vendor-6.jpg" alt="">
                    <img src="img/vendor-7.jpg" alt="">
                    <img src="img/vendor-8.jpg" alt="">
                    <img src="img/vendor-9.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->
</div>


@include('layouts.footer')