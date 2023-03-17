@include('layouts.header')
<div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
    <div class="row py-5">
        <div class="col-12 pt-lg-5 mt-lg-5 text-center">
            <h1 class="display-4 text-white animated zoomIn"> إنشاء حساب</h1>
            <a href="{{ route('home') }}" class="h5 text-white">الصفحة الرئيسية</a>
            <i class="far fa-circle text-white px-2"></i>
            <span  class="h5 text-white">إنشاء حساب </span>
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
        <h5 class="fw-bold text-primary text-uppercase">  إنشاء حساب</h5>
    </div>

    <div class="row g-5">
        <div class="col-lg-8 wow slideInUp m-auto" data-wow-delay="0.3s">
            <div style="color:red">
                <x-validation-errors class="mb-4" />

            </div>
           
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
    
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="row g-3">
                    <div class="col-md-12">
                        <x-label for="name" value="{{ __('اسم المستخدم') }}" />
                        <x-input id="name" class="block mt-1 w-full form-control border-0 bg-light px-4" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>
                    <div class="col-12">
                        <x-label for="email" value="{{ __('البريد الإلكتروني ') }}" />
                        <x-input  id="email" class="block mt-1 w-full form-control border-0 bg-light px-4" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>
                
                    <div class="col-12">
                        <x-label for="password" value="{{ __('كلمة المرور ') }}" />
                        <x-input id="password" class="block mt-1 w-full form-control border-0 bg-light px-4" type="password" name="password" required autocomplete="new-password" />
                    </div>
                
                    <div class="col-12">
                        <x-label for="password_confirmation" value="{{ __('تأكيد كلمة المرور ') }}" />
                        <x-input id="password_confirmation" class="block mt-1 w-full form-control border-0 bg-light px-4" type="password" name="password_confirmation" required autocomplete="new-password"/>
                    </div>
                    <div class="col-md-12">
                        <x-label for="type" value="{{ __(' تسجيل ك ') }}" />
                        <select id="type" class="block mt-1 w-full form-control border-0 bg-light px-4" name="type" :value="old('type')" required>
                            <option value=""> اختار من الآتي</option>
                            <option value="العامل في المجال الطبي">عامل في المجال الطبي</option>
                            <option value="مستخدم">مستخدم</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <x-button class="btn btn-primary w-100 py-3" type="submit">
                            {{ __('تسجيل الدخول  ') }}
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
  
    </div>
</div>
</div>


@include('layouts.footer')
