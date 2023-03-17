@push('style')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@endpush

@include('layouts.header')


<div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
    <div class="row py-5">
        <div class="col-12 pt-lg-5 mt-lg-5 text-center">
            <h1 class="display-4 text-white animated zoomIn"> تعديل البيانات الشخصية</h1>
            <a href="{{ route('home') }}" class="h5 text-white">الصفحة الرئيسية</a>
            <i class="far fa-circle text-white px-2"></i>
            <span  class="h5 text-white"> تعديل البيانات الشخصية</span>
        </div>
    </div>
</div>
</div>
<!-- Navbar End -->

</div>
<!-- Contact End -->


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif

        </div>
    </div>

@include('layouts.footer')

