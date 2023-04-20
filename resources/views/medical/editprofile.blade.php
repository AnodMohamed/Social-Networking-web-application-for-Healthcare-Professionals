@include('layouts.header')
<div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
        <div class="row py-5">
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn"> تعديل الملف التعريفي للعامل في المجال الطبي</h1>
                <a href="{{ route('home') }}" class="h5 text-white">الصفحة الرئيسية</a>
                <i class="far fa-circle text-white px-2"></i>
                <span  class="h5 text-white">تعديل الملف التعريفي للعامل في المجال الطبي </span>
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
            <h5 class="fw-bold text-primary text-uppercase">تعديل الملف التعريفي للعامل في المجال الطبي</h5>
            <h6 class="mb-0"> بعد تعديل البيانات تتم مراجعة البيانات المرسلة من قبل المشرف وتحويل حسابك قيد المراجعة حتى الانتهاء(كل البيانات مطلوبة)  </h6>
        </div>

        <div class="row g-5">
            <div class="col-lg-8 wow slideInUp m-auto" data-wow-delay="0.3s">

                @if(Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                @endif
            
                <form method="POST" action="{{ route('medical.update') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">
                        {{---نبذةتعريفية--}}
                        <div class="col-md-12">
                            <x-label for="bio" value="{{ __('نبذة تعريفية') }}" />
                            <textarea id="bio" class="bio" name="bio" value="{{ $profile->bio }}" required> {{ $profile->bio }}</textarea>

                            @error('bio')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {{--الوظيفة--}}
                        <div class="col-md-12">
                            <x-label for="occupation" value="{{ __('الوظيفة') }}" />
                            <select id="occupation" class="block mt-1 w-full form-control border-0 bg-light px-4" name="occupation" value="{{ $profile->occupation }}" required>
                                <option value=""> اختار من الآتي</option>
                                <option value="طبيب" {{ $profile->occupation == 'طبيب' ? 'selected' : '' }}>طبيب</option>
                                <option value="مساعد طبيب" {{ $profile->occupation == 'مساعد طبيب' ? 'selected' : '' }}>مساعد طبيب</option>
                                <option value="ممرض" {{ $profile->occupation == 'ممرض' ? 'selected' : '' }}>ممرض</option>
                                <option value="اخرى" {{ $profile->occupation == 'اخرى' ? 'selected' : '' }}>اخرى</option>

                            </select>
                            @error('occupation')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {{--التخصص--}}
                        <div class="col-md-12">
                            <x-label for="specialization" value="{{ __('التخصص') }}" />
                            <select id="specialization" class="block mt-1 w-full form-control border-0 bg-light px-4" name="specialization" value="{{ $profile->specialization }}" required>
                                <option value=""> اختار من الآتي</option>
                                <option value="التخدير"  {{ $profile->specialization == 'التخدير' ? 'selected' : '' }}>التخدير</option>
                                <option value="طب القلب والأوعية الدموية" {{ $profile->specialization == 'طب القلب والأوعية الدموية' ? 'selected' : '' }}> طب القلب والأوعية الدموية</option>
                                <option value="العناية المركزة" {{ $profile->specialization == 'العناية المركزة' ? 'selected' : '' }}>العناية المركزة</option>
                                <option value="طب الطوارئ" {{ $profile->specialization == 'طب الطوارئ' ? 'selected' : '' }}>طب الطوارئ</option>
                                <option value="أمراض الغدد الصماء" {{ $profile->specialization == 'أمراض الغدد الصماء' ? 'selected' : '' }}>أمراض الغدد الصماء</option>
                                <option value="طب المسنين" {{ $profile->specialization == 'طب المسنين' ? 'selected' : '' }}>طب المسنين</option>
                                <option value="أمراض الجهاز الهضمي" {{ $profile->specialization == 'أمراض الجهاز الهضمي' ? 'selected' : '' }}>أمراض الجهاز الهضمي</option>
                                <option value="أمراض الدم" {{ $profile->specialization == 'أمراض الدم' ? 'selected' : '' }}>أمراض الدم</option>
                                <option value="التغذية"{{ $profile->specialization == 'التغذية' ? 'selected' : '' }}>التغذية</option>
                                <option value="أمراض الكلى" {{ $profile->specialization == 'أمراض الكلى' ? 'selected' : '' }}>أمراض الكلى</option>
                                <option value="علم الأعصاب" {{ $profile->specialization == 'علم الأعصاب' ? 'selected' : '' }}>علم الأعصاب</option>
                                <option value="الأورام" {{ $profile->specialization == 'الأورام' ? 'selected' : '' }}>الأورام</option>
                                <option value="طب العيون" {{ $profile->specialization == 'طب العيون' ? 'selected' : '' }}>طب العيون</option>
                                <option value="الأنف والأذن والحنجرة" {{ $profile->specialization == 'الأنف والأذن والحنجرة' ? 'selected' : '' }}>الأنف والأذن والحنجرة</option>
                                <option value="الأمراض الصدرية" {{ $profile->specialization == 'الأمراض الصدرية' ? 'selected' : '' }}>الأمراض الصدرية</option>
                                <option value="طب الرعاية الأولية" {{ $profile->specialization == 'طب الرعاية الأولية' ? 'selected' : '' }}>طب الرعاية الأولية</option>
                                <option value="طب الأطفال" {{ $profile->specialization == 'طب الأطفال' ? 'selected' : '' }}>طب الأطفال</option>
                                <option value="الطب النفسي" {{ $profile->specialization == 'طب الأطفال' ? 'selected' : '' }}>الطب النفسي</option>
                                <option value="جراحة العظام والروماتيزم" {{ $profile->specialization == 'جراحة العظام والروماتيزم' ? 'selected' : '' }}>جراحة العظام والروماتيزم</option>
                                <option value="الأشعة" {{ $profile->specialization == 'الأشعة' ? 'selected' : '' }}>الأشعة</option>
                                <option value="الطب التناسلي" {{ $profile->specialization == 'الطب التناسلي' ? 'selected' : '' }}>الطب التناسلي</option>
                                <option value="جراحة" {{ $profile->specialization == 'جراحة' ? 'selected' : '' }}>جراحة</option>
                                <option value="جراحة المسالك البولية" {{ $profile->specialization == 'جراحة المسالك البولية' ? 'selected' : '' }}>جراحة المسالك البولية</option>
                                <option value="اخرى" {{ $profile->specialization == 'اخرى' ? 'selected' : '' }}>اخرى</option>
                            </select>
                            @error('specialization')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {{--الدرجة العلمية--}}
                        <div class="col-md-12">
                            <x-label for="degree" value="{{ __('الدرجة العلمية') }}" />
                            <select id="degree" class="block mt-1 w-full form-control border-0 bg-light px-4" name="degree" value="{{ $profile->degree }}" required>
                                <option value=""> اختار من الآتي</option>
                                <option value="درجة الدبلوم" {{ $profile->degree == 'درجة الدبلوم' ? 'selected' : '' }}>درجة الدبلوم</option>
                                <option value="درجة البكالوريوس" {{ $profile->degree == 'درجة البكالوريوس' ? 'selected' : '' }}>درجة البكالوريوس</option>
                                <option value="درجة الماجستير" {{ $profile->degree == 'درجة الماجستير' ? 'selected' : '' }}>  درجة الماجستير</option>
                                <option value="درجة الدكتوراه" {{ $profile->degree == 'درجة الدكتوراه' ? 'selected' : '' }}>درجة الدكتوراه</option>
                                <option value="اخرى" {{ $profile->degree == 'اخرى' ? 'selected' : '' }}>اخرى</option>
                            </select>
                            @error('degree')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {{-- سنوات الخبرة --}}
                        <div class="col-md-12">
                            <x-label for="experience" value="{{ __('سنوات الخبرة ') }}" />
                            <x-input id="experience" class="block mt-1 w-full form-control border-0 bg-light px-4" type="number" name="experience" value="{{ $profile->experience }}"  />
                            @error('experience')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                                  
                        
                        {{-- بطاقة الهوية --}}
                        <div class="col-md-12">
                            <x-label for="Identification_card" value="{{ __('بطاقة الهوية') }}" />
                            <x-input id="Identification_card" class="block mt-1 w-full form-control border-0 bg-light px-4" type="file" name="Identification_card"   />
                             @error('Identification_card')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            
                            @if(isset($profile->Identification_card))
                                <iframe class="mt-2" src="{{asset('storage/uploads')}}/{{ $profile->Identification_card }}"
                                style="width: 100%; height: 300px;"></iframe>
                            @else
                                <p>لا يوجد ملف pdf</p>
                            @endif
                        </div>

                        {{-- الرخصة--}}
                        <div class="col-md-12">
                            <x-label for="license" value="{{ __('الرخصة') }}" />
                            <x-input id="license" class="block mt-1 w-full form-control border-0 bg-light px-4" type="file" name="license"  />
                            @error('license')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            @if(isset($profile->license))
                            <iframe class="mt-2" src="{{asset('storage/uploads')}}/{{ $profile->license }}"
                                style="width: 100%; height: 300px;"></iframe>
                            @else
                                <p>لا يوجد ملف pdf</p>
                            @endif
                        </div>

                        {{-- الشهادة --}}
                        <div class="col-md-12">
                            <x-label for="certificate" value="{{ __('الشهادة') }}" />
                            <x-input id="certificate" class="block mt-1 w-full form-control border-0 bg-light px-4" type="file" name="certificate"  />
                            @error('certificate')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            @if(isset($profile->license))
                            <iframe class="mt-2" src="{{asset('storage/uploads')}}/{{ $profile->certificate }}"
                                style="width: 100%; height: 300px;"></iframe>
                            @else
                                <p>لا يوجد ملف pdf</p>
                            @endif
                        </div>

                        <div class="col-12">
                            <x-button class="btn btn-primary w-100 py-3" type="submit">
                                {{ __('ارسل') }}
                            </x-button>
                        </div>
                    </div>
                </form>
            </div>
      
        </div>
    </div>
</div>
    <!-- Contact End -->

@push('javascript')
    <script>
    
        tinymce.init({
    
          selector: '#bio',
    
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
