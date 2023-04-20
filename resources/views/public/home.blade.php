@include('layouts.header')

<div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="w-100" src="{{ asset('img/img-1.jpg') }}" alt="Image" style="height: 90vh">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <div class="p-3" style="max-width: 900px;">
                    <h5 class="text-white text-uppercase mb-3 animated slideInDown">SNFHP </h5>
                    <h1 class="display-1 text-white mb-md-4 animated zoomIn">Social Networking web application for healthcare 
                        Professionals </h1>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="w-100" src="{{ asset('img/img-2.jpg') }}" alt="Image" style="height: 90vh">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <div class="p-3" style="max-width: 900px;">
                    <h5 class="text-white text-uppercase mb-3 animated slideInDown"> SNFHP</h5>
                    <h1 class="display-1 text-white mb-md-4 animated zoomIn">Social Networking web application for healthcare 
                        Professionals </h1>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
</div>
<!-- Navbar & Carousel End -->


<!-- Full Screen Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1">
<div class="modal-dialog modal-fullscreen">
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
</div>
</div>
<!-- Full Screen Search End -->


<!-- Facts Start -->
<div class="container-fluid facts py-5 pt-lg-0">
<div class="container py-5 pt-lg-0">
    <div class="row gx-0">
        <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
            <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                    <i class="bi bi-file-earmark-medical text-primary" style="font-size:42px"></i>
                </div>
                <div class="ps-4">
                    <h5 class="text-white mb-0">عدد المقالات</h5>
                    <h1 class="text-white mb-0" data-toggle="counter-up">{{$countArticles}}</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
            <div class="bg-light shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                <div class="bg-primary d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                    <i class="bi bi-people-fill text-white" style="font-size:42px"></i>
                </div>
                <div class="ps-4">
                    <h5 class="text-primary mb-0">عدد العاملين في المجال الطبي </h5>
                    <h1 class="mb-0" data-toggle="counter-up">{{$countMedicals}}</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
            <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                    <i class="bi bi-chat-fill text-primary" style="font-size:42px"></i>
                </div>
                <div class="ps-4">
                    <h5 class="text-white mb-0"> عدد التعليقات </h5>
                    <h1 class="text-white mb-0" data-toggle="counter-up">{{$countComments}}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Facts Start -->


<!-- About Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
<div class="container py-5">
    <div class="row g-5">
        <div class="col-lg-7">
            <div class="section-title position-relative pb-3 mb-5">
                <h5 class="fw-bold text-primary text-uppercase">نبذة عنا </h5>
            </div>
            <p class="mb-4">
                كما يقول المثل العربي: أعط الخباز خبزا ولو نصفه. نحن نعيش في ثورة معلوماتية. يمكننا توفير المعلومات وجعلها أسهل مما كانت عليه في العصور الماضية. في ظل كل هذه التطورات،
            </p>
            <p class="mb-4">
                ما زلنا نواجه مشاكل في البحث عن المعلومات الطبية. على سبيل المثال، انتشار المعلومات الخاطئة من المستخدمين المهنيين غير الطبيين. كما لا تستفيد من الخبرات والمعلومات من المستخدمين الطبيين المحترفين. ليس فقط هذه الأسئلة المتكررة أيضا على وسائل التواصل الاجتماعي.           
            </p>
            <p class="mb-4">
                يوفر تطبيق الويب الخاص بالشبكات الاجتماعية لمتخصصي الرعاية الصحية  حل للمستخدمين الطبيين المحترفين والمستخدمين الذين يحتاجون إلى المشورة الطبية. يتيح تطبيق الويب للمستخدمين الطبيين تلقي الاستفسارات. لتوفير المعلومات عبر الإنترنت بعد التحقق من صحة بياناته عن طريق تحميل شهادات وخبرات الطبيب على تطبيق الويب. يساعد النظام على ربط العيادة من جميع أنحاء العالم بالمستفيدين للحصول على معلومات طبية موثوقة.
            </p>
        </div>
        <div class="col-lg-5" style="min-height: 500px;">
            <div class="position-relative h-100">
                <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="{{ asset('img/img-3.jpg') }}" style="object-fit: cover;">
            </div>
        </div>
    </div>
</div>
</div>
<!-- About End -->





<!-- Service Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
<div class="container py-5">
    <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
        <h5 class="fw-bold text-primary text-uppercase">الاهداف </h5>
    </div>
    <div class="row g-5">
        <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
            <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                <div class="service-icon">
                    <i class="fa fa-shield-alt text-white"></i>
                </div>
                <h4 class="mb-3">ربط الأطباء بالأشخاص المهتمين في المجال الطبي.</h4>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
            <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                <div class="service-icon">
                    <i class="fa fa-chart-pie text-white"></i>
                </div>
                <h4 class="mb-3">توفير المال والجهد والوقت الذي سيخسره الأطباء لإنشاء موقع على شبكة الإنترنت.</h4>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.9s">
            <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                <div class="service-icon">
                    <i class="fa fa-code text-white"></i>
                </div>
                <h4 class="mb-3">مساعدة الناس الحصول على معلومات طبية موثوقة.</h4>
            </div>
        </div>
      
    </div>
</div>
</div>
<!-- Service End -->



<!-- Blog Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
<div class="container py-5">
    <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
        <h5 class="fw-bold text-primary text-uppercase">اخر 6 مقالات </h5>
    </div>
    <div class="row g-5">
        @foreach ($last6Articles as $article)
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


<!-- Vendor Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
<div class="container py-5 mb-5">
    <div class="bg-white">
        <div class="owl-carousel vendor-carousel">
            <img src="{{ asset('img/vendor-1.jpg') }}" alt="">
            <img src="{{ asset('img/vendor-2.jpg') }}" alt="">
            <img src="{{ asset('img/vendor-3.jpg') }}" alt="">

        </div>
    </div>
</div>
</div>
<!-- Vendor End -->
@include('layouts.footer')
