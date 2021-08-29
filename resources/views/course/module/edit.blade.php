<link href="{{ asset('css/course/module.css') }}" rel="stylesheet" />

<form action="{{ asset('module/' . $module->id) }}" method="POST" class="col-md-12" enctype="multipart/form-data" files="true">
    @method('PUT')
    @csrf

    <input type="hidden" name="course_id" value="{{ $module->Course->id }}">
    <!-- Single lection content -->
    <div class="tab-body module-body-right position-relative">
        <span class="close d-flex justify-content-start d-lg-none position-absolute module-close-btn">&times;</span>
        <div class="row g-0 me-5">
            <div class="col">
                <div class="text-title-module">
                    <b>Редактирай модул</b>
                    <br>
                    <p class="text-title-module-sm d-lg-none">{{ $module->name }}</p>
                </div>
            </div>
            <!-- <div class="col-auto d-lg-none">
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <img src="{{ asset('assets/img/info.svg') }}" class="img-info">
                </button>
            </div> -->
            <!-- <div class="col-auto me-lg-5 d-none d-lg-block">
                <img src="{{ asset('assets/img/info.svg') }}" class="img-info">
            </div>
            <div class="col-auto text-info-modul d-none d-lg-block">
                Lorem ipsum dolor sit amet, consectetuer
                <br>
                adipiscing elit, sed diam nonummy nibh euismod
            </div> -->
        </div>

        <div class="row g-0 module-top">
            <div class="col">
                <input type="text" name="name" class="form-module w-100" placeholder="Име на модула" aria-describedby="addon-wrapping" value="{{ $module->name }}">
            </div>
        </div>
        <div class="row g-0 mt-5">
            <div class="col">
                <textarea name="description" class="form-module w-100" id="exampleFormControlTextarea1" rows="8" placeholder="Описание на модула">{{ $module->description }}</textarea>
            </div>
        </div>
        <div class="row g-0 position-relative mt-5 d-lg-none">
            <select name="visibility" class="border-0 position-absolute top-50 start-50 translate-middle text-uppercase ps-0 py-0" style="width: 40%;">
                <option value="">Статус</option>
                <option value="public" @if ($module->visibility == 'public') selected @endif>Публичен</option>
                <option @if ($module->visibility == 'private') selected @endif value="private">Скрит</option>
                <option @if ($module->visibility == 'draft') selected @endif value="draft">Чернова</option>
            </select>
        </div>
        <div class="row g-0 mt-5">
            <div class="col me-lg-4">
                <input type="text" name="starts" class="form-module date-input w-100" placeholder="Начало (дата)" aria-label="Начало (дата)" value="{{ $module->Course->starts ? $module->Course->starts->format('m/d/Y') : null }}" autocomplete="off">
            </div>
            <div class="col ms-3">
                <input type="text" name="ends" class="form-module date-input w-100" placeholder="Край (дата)" value="{{ $module->Course->ends ? $module->Course->ends->format('m/d/Y') : null }}" autocomplete="off">
            </div>
        </div>
        <div class="row g-0 mt-5">
            <div class="col">
                <div class="text-title-module text-uppercase mt-lg-3">
                    <b>Премахни курсисти</b>
                </div>
            </div>
            <div class="col-auto">
                <div class="input-group mb-3">
                    <input type="text" name="addStudent" id="add-student" class="btn-name-module" placeholder="Email на струдент(и)" aria-describedby="button-addon2">
                    <button class="btn btn-outline-green border-end add-student-btn" type="button" id="button-addon2"><img src="{{ asset('assets/img/plus.svg') }}" class="me-2">Добави</button>
                </div>
            </div>
        </div>
        <!--Mobil scrol-->
        @if ($moduleStudents->count())
            <div class="student-scrol-module d-flex d-lg-none">
                <div class="d-flex flex-column bd-highlight mb-3">
                    @include('course.module.module-students.edit', [
                        'allUsers' => $moduleStudents,
                        'resolution' => 'mobile',
                    ])
                </div>
            </div>
        @endif
    </div>
    <div class="row g-0 d-flex justify-content-center">
        <div class="col-auto mt-3 d-lg-none ">
            <button onclick="this.form.submit()" class="nav btn btn-green active py-0 pe-2 d-flex btn1-cs" id="lection-1-tab" data-bs-toggle="tab" href="#" role="tab" aria-controls="lection-1" aria-selected="true">
                <div class="row g-0 align-self-center">
                    <div class="col-auto text-start ms-record">Запази</div>
                    <div class="col text-end align-items-center d-flex img-btn-ms">
                        <img src="{{ asset('assets/img/action_icon.svg') }}" alt="">
                    </div>
                </div>
            </button>
        </div>
    </div>
    <!--END mobil scrol-->
    @if ($moduleStudents->count())
        <div class="student-scrol-module d-flex d-none d-lg-block">
            <div class="d-flex flex-column bd-highlight mb-3">
                @include('course.module.module-students.edit', [
                    'allUsers' => $moduleStudents,
                    'resolution' => 'desktop',
                ])
            </div>
        </div>
    @endif

    <hr class="mt-5 d-none d-lg-block">
    <div class="row g-0">
        <div class="col d-none d-lg-block">
            <select name="visibility" class="border-0 status-1 text-uppercase ps-0 py-0 mt-5" id="status">
                <option value="">Статус</option>
                <option value="public" @if ($module->visibility == 'public') selected @endif>Публичен</option>
                <option @if ($module->visibility == 'private') selected @endif value="private">Скрит</option>
                <option @if ($module->visibility == 'draft') selected @endif value="draft">Чернова</option>
            </select>
        </div>
        <div class="col-auto mt-3 d-none d-lg-block">
            <div class="col-auto mt-5 d-none d-lg-block">
                <button class="btn-green btn1-cs">
                    <div class="row g-0 align-self-center">
                        <div class="col ps-2 text-start text-small">
                            Запази
                        </div>
                        <div class="col-auto px-2">
                            <img src="{{ asset('assets/img/action_icon.svg') }}">
                        </div>
                    </div>
                </button>
            </div>
        </div>
    </div>
</form>

<form action="{{ route('module.add.student') }}" method="POST" name="addStudent" id="addStudent">
    @csrf

    <input type="hidden" name="module_id" value="{{ $module->id }}">
    <input type="hidden" name="mail" id="student">
</form>

<script>
$(document).ready(function() {
    /* disabled input - date */
    $('.add-student-btn').click(function() {
        $('#student').attr('value', $('#add-student').val());
        $('#addStudent').submit();
    });

    if ($(window).width() < 992) {
        $('.edit-desktop').attr('name', 123);
    } else {
        $('.edit-mobile').attr('name', 123);
    }
});
</script>
