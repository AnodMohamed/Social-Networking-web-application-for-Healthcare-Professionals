<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <title>Startup - Startup Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
 
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    @stack('style')

    @livewireStyles

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->



    <!-- Navbar & Carousel Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="index.html" class="navbar-brand p-0">
                <h1 class="m-0">SNFHP</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ route('home') }}"  class="nav-item nav-link px-1 ms-3 ">الصفحة الرئيسية</a>

                    <div class="nav-item dropdown px-1 ms-3 ">
                        <a href="#" class="nav-link dropdown-toggle m-auto " data-bs-toggle="dropdown">الوظيفة</a>
                        <ul>
                            <div class="dropdown-menu m-auto  ">
                                <a href="{{ route('public.medical.occupation',['occupation'=>'طبيب']) }}"  class="dropdown-item text-end">طبيب</a>
                                <a href="{{ route('public.medical.occupation',['occupation'=>'مساعد طبيب']) }}"   class="dropdown-item text-end">مساعد طبيب</a>
                                <a href="{{ route('public.medical.occupation',['occupation'=>'ممرض']) }}"  class="dropdown-item text-end">ممرض</a>
                                <a href="{{ route('public.medical.occupation',['occupation'=>'اخرى']) }}"   class="dropdown-item text-end">اخرى</a>

                            </div>
                        </ul>
                    </div>
                    <div class="nav-item dropdown px-1 ms-3 ">
                        <a href="#" class="nav-link dropdown-toggle m-auto " data-bs-toggle="dropdown">التخصص</a>
                        <ul>
                            <div class="dropdown-menu m-auto scroll ">
                                <a   class="dropdown-item text-end" href="{{ route('public.medical.category',['category'=>'التخدير']) }}">التخدير</a>
                                <a   class="dropdown-item text-end" href="{{ route('public.medical.category',['category'=>'طب القلب والأوعية الدموية']) }}"></i>طب القلب والأوعية الدموية</a>
                                <a   class="dropdown-item text-end" href="{{ route('public.medical.category',['category'=>'العناية المركزة']) }}">العناية المركزة</a>
                                <a   class="dropdown-item text-end" href="{{ route('public.medical.category',['category'=>'طب الطوارئ']) }}">طب الطوارئ</a>
                                <a   class="dropdown-item text-end" href="{{ route('public.medical.category',['category'=>'أمراض الغدد الصماء']) }}">أمراض الغدد الصماء</a>
                                <a   class="dropdown-item text-end" href="{{ route('public.medical.category',['category'=>'أمراض الجهاز الهضمي']) }}">أمراض الجهاز الهضمي</a>
    
                                <a   class="dropdown-item text-end" href="{{ route('public.medical.category',['category'=>'أمراض الدم']) }}">أمراض الدم</a>
                                <a   class="dropdown-item text-end" href="{{ route('public.medical.category',['category'=>'التغذية']) }}">التغذية</a>
                                <a   class="dropdown-item text-end" href="{{ route('public.medical.category',['category'=>'أمراض الكلى']) }}">أمراض الكلى</a>
                                <a   class="dropdown-item text-end" href="{{ route('public.medical.category',['category'=>'الأورام']) }}">الأورام</a>
    
                                <a   class="dropdown-item text-end" href="{{ route('public.medical.category',['category'=>'طب العيون']) }}">طب العيون</a>
                                <a   class="dropdown-item text-end" href="{{ route('public.medical.category',['category'=>'الأنف والأذن والحنجرة']) }}">الأنف والأذن والحنجرة </a>
                                <a   class="dropdown-item text-end" href="{{ route('public.medical.category',['category'=>'الأمراض الصدرية']) }}">الأمراض الصدرية</a>
                                <a   class="dropdown-item text-end" href="{{ route('public.medical.category',['category'=>'طب الرعاية الأولية']) }}">طب الرعاية الأولية</a>
                                <a   class="dropdown-item text-end" href="{{ route('public.medical.category',['category'=>'طب الأطفال']) }}">طب الأطفال</a>
    
                                <a   class="dropdown-item text-end" href="{{ route('public.medical.category',['category'=>'الطب النفسي']) }}">الطب النفسي</a>
                                <a   class="dropdown-item text-end" href="{{ route('public.medical.category',['category'=>'جراحة العظام والروماتيزم']) }}">جراحة العظام والروماتيزم</a>
                                <a   class="dropdown-item text-end" href="{{ route('public.medical.category',['category'=>'الأشعة']) }}">الأشعة</a>
                                <a   class="dropdown-item text-end" href="{{ route('public.medical.category',['category'=>'الطب التناسلي']) }}">الطب التناسلي</a>
                                <a   class="dropdown-item text-end" href="{{ route('public.medical.category',['category'=>'جراحة']) }}">جراحة</a>
                                <a   class="dropdown-item text-end" href="{{ route('public.medical.category',['category'=>'جراحة المسالك البولية']) }}">جراحة المسالك البولية</a>
                                <a   class="dropdown-item text-end" href="{{ route('public.medical.category',['category'=>'اخرى']) }}">اخرى</a>
    
                            </div>
                        </ul>
                    </div>
                    @if (Auth::check())
                        {{-- the user is logged in --}}
                        <div class="nav-item dropdown px-4 ms-3 ">
                            <a href="#" class="nav-link dropdown-toggle m-auto " data-bs-toggle="dropdown">{{ Auth::user()->name}}</a>
                            <ul>
                            <div class="dropdown-menu m-auto  ">
                                <a href="{{ route('profile.show') }}" class="dropdown-item text-end">تعديل الملف الشخصي</a>
                                @if (Auth::user()->type  == 'ادمن')
                                    <a href="{{ route('admin.dashboard') }}" class="dropdown-item text-end"> لوحة النحكم </a>
                                    <a href="{{ route('admin.medical.index') }}" class="dropdown-item text-end">  التحكم في العاملين في المجال الطبي</a>
                                    <a href="{{ route('admin.article.index') }}" class="dropdown-item text-end">  التحكم في المقالات</a>

                                @elseif (Auth::user()->type  == 'عامل في المجال الطبي')    
                                    <a href="{{ route('medical.edit') }}" class="dropdown-item text-end">   تعديل الملف التعريفي  </a>
                                    <a href="{{ route('medical.article.index') }}" class="dropdown-item text-end">  مقلاتي </a>
                                @endif
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item text-end" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        {{ __('تسجيل الخروج ') }}
                                        </a>
                                </form>
                            </div>

                        </div>                   
                    @endif
                </div>
              @if (Auth::check() == 0)
                <a href="{{ route('login')}}" class="btn btn-primary py-2 px-4 ms-3"> تسجيل الدخول </a>
                <a href="{{ route('register')}}" class="btn btn-primary py-2 px-4 ms-3">انشاء حساب</a>

              @endif
              
            </div>
        </nav>