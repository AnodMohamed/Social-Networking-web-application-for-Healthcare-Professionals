@include('layouts.header')
<div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
        <div class="row py-5">
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn"> إضافة مقال</h1>
                <a href="{{ route('home') }}" class="h5 text-white">الصفحة الرئيسية</a>
                <a href="{{ route('home') }}" class="h5 text-white"> مقالاتي</a>
                <i class="far fa-circle text-white px-2"></i>
                <span  class="h5 text-white">إضافة مقال</span>
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
            <h5 class="fw-bold text-primary text-uppercase">إضافة مقال</h5>
        </div>

        <div class="row g-5">
            <div class="col-lg-8 wow slideInUp m-auto" data-wow-delay="0.3s">
                @if ($medical_profile->status == 'مقبول')
                    @if(Session::has('message'))
                        <div class="alert alert-success">{{Session::get('message')}}</div>
                    @endif
                
                    <form method="POST" action="{{ route('medical.article.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-3">

                            {{--العنوان--}}
                            <div class="col-md-12">
                                <x-label for="title" value="{{ __('العنوان') }}" />
                                <x-input id="title" class="block mt-1 w-full form-control border-0 bg-light px-4" type="text" name="title" required/>
                                @error('title')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            {{---المحتوى--}}
                            <div class="col-md-12">
                                <x-label for="content" value="{{ __(' المحتوى') }}" />
                                <textarea id="content" class="content" name="content"  required> </textarea>

                                @error('content')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            {{--الصورة--}}
                            <div class="col-md-12">
                                <x-label for="image" value="{{ __('الصورة') }}" />
                                <x-input id="image" class="block mt-1 w-full form-control border-0 bg-light px-4" type="file" name="image"   required/>
                                @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>


                            <div class="col-12">
                                <x-button class="btn btn-primary w-100 py-3" type="submit">
                                    {{ __('ارسل') }}
                                </x-button>
                            </div>
                        </div>
                    </form>
                @else
                    <div class="alert alert-danger my-3">غير مسموح لك بنشر مقال </div>

                @endif
              
            </div>
      
        </div>
    </div>
</div>
    <!-- Contact End -->

@push('javascript')
    <script>
    
        tinymce.init({
    
          selector: '#content',
    
          plugins: [
    
            'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
    
            'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
    
            'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
    
          ],
    
          toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
    
            'alignleft aligncenter alignright alignjustify | ' +
    
            'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
    
        });
    
      </script>
@endpush
@include('layouts.footer')
