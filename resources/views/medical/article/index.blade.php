@include('layouts.header')
<div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
        <div class="row py-5">
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn"> التحكم في مقالاتي</h1>
                <a href="{{ route('home') }}" class="h5 text-white">الصفحة الرئيسية</a>
                <i class="far fa-circle text-white px-2"></i>
                <span  class="h5 text-white"> التحكم في مقالاتي</span>
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
            <h5 class="fw-bold text-primary text-uppercase">  التحكم في مقالاتي</h5>
            <h6 class="mb-0">   </h6>
        </div>

        
        <div class="row g-5">
            <div class="col-lg-8 wow slideInUp m-auto" data-wow-delay="0.3s">

                @if(Session::has('message'))
                    <div class="alert alert-success py-1 my-3">{{Session::get('message')}}</div>
                @endif
               {{-- عرض--}}
               <a href="{{ route('medical.article.create') }}" 
                    class="btn btn-info text-white my-3"
                    title="اضافة">
                    <i class="bi bi-plus"></i>
                    إضافة
                 </a>
                @if(isset($articles))

                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>الصور</th>
                                <th>العنوان</th>
                                <th>التحكم</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($articles as $article)
                                <tr>
                                    <td>
                                        <img src="{{asset('storage/images')}}/{{$article->image}}"  style="width: 70px; height:70px;">
                                    </td>
                                    <td>{{ $article->title }}</td>
                                    <td class="float-start">
                                        {{-- تعديل--}}
                                        <a href="{{ route('admin.medical.edit',['article_id'=>$article->id ]) }}" 
                                            class="btn btn-success text-white"
                                            title="تعديل">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        {{-- حذف--}}
                                        {{-- <a href="{{ route('admin.medical.reject',['user_id'=>$profile->id ]) }}" 
                                            class="btn btn-danger text-white"
                                            title="حذف">
                                            <i class="bi bi-trash3"></i>
                                        </a> --}}

                                        {{-- <i class="bi bi-trash3"></i> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                @endif
            </div>
      
        </div>
    </div>
</div>
    <!-- Contact End -->
@push('javascript')
<script>
let table = new DataTable('#myTable');
</script>
    
@endpush

@include('layouts.footer')
