@if (Auth::user()->isLecturer() || Auth::user()->isAdmin())
    <div class="col-auto">
        <!-- Button trigger modal -->
        <a href="#" id="settings" class="settings" data-bs-toggle="modal" data-bs-target="#course-modal">
            <span class="d-block"></span>
            <span class="d-block"></span>
            <span class="d-block"></span>
        </a>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="course-modal" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" style="margin-right: 15px">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom:0px">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-normal" style="padding-top:0px; font-size: 20px;">
                    <p class="ms-4">
                        <img src="{{ asset('assets/icons/edit-green.png') }}" alt="">
                        <a href="{{ route('course.edit', $module->Course->id) }}" class="ms-2" style="color:#00214b!important;">Редакция</a>
                    </p>
                    <p class="ms-4">
                        <i style="color:#8de219!important;" class="fas fa-book"></i>
                        <a href="{{ route('application-entry-form', $module->Course->id) }}" class="ms-3" style="color:#00214b!important;">Домашни</a>
                    </p>
                    <p class="ms-4">
                        <img src="{{ asset('assets/icons/application-green.png') }}" alt="">
                        <a href="{{ route('application-entry-form', $module->Course->id) }}" class="ms-2" style="color:#00214b!important;">Кандидатстване</a>
                    </p>
                    <p class="ms-4">
                        <img src="{{ asset('assets/icons/Certificate.svg') }}" alt="">
                        <a href="{{ route('course.cert.create', $module->Course->id) }}" class="ms-2" style="color:#00214b!important;">Сертификати</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function(){
                $('#settings').click(function () {
                    $('.modal-backdrop.fade.show').removeClass('modal-backdrop');
                });
            });
        </script>
    @endpush
@endif
