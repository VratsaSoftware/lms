<link href="{{ asset('css/course/module.css') }}" rel="stylesheet" />

<form action="{{ asset('module') }}" method="POST" class="col-md-12" enctype="multipart/form-data" files="true">
    @csrf

    <input type="hidden" name="page_create_module" id="page-create-module" value="{{ old('page_create_module') }}">

    <input type="hidden" name="course_id" value="{{ $module->Course->id }}">
    <!-- Single lection content -->
    <div class="tab-body module-body-right position-relative">
        <span class="close d-flex justify-content-start d-lg-none position-absolute module-close-btn">&times;</span>
        <div class="row g-0 me-5">
            <div class="col">
                <div class="text-title-module">
                    <b>Добави модул</b>
                    <br>
                    <p class="text-title-module-sm d-lg-none">{{ $module->Course->name }}</p>
                </div>
            </div>
{{--            <div class="col-auto d-lg-none">--}}
{{--                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">--}}
{{--                    <img src="{{ asset('assets/img/info.svg') }}" class="img-info">--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="col-auto me-lg-5 d-none d-lg-block">--}}
{{--                <img src="{{ asset('assets/img/info.svg') }}" class="img-info">--}}
{{--            </div>--}}
{{--            <div class="col-auto text-info-modul d-none d-lg-block">--}}
{{--                Lorem ipsum dolor sit amet, consectetuer--}}
{{--                <br>--}}
{{--                adipiscing elit, sed diam nonummy nibh euismod--}}
{{--            </div>--}}
        </div>
        <div class="row g-0 module-top">
            <div class="col">
                <input type="text" name="name" class="form-module w-100" placeholder="Име на модула" aria-label="Име на модула" aria-describedby="addon-wrapping" value="{{ old('name') }}">
            </div>
        </div>
        <div class="row g-0 mt-5">
            <div class="col">
                <textarea class="form-module w-100" name="description" rows="8" placeholder="Описание на модула">{{ old('description') }}</textarea>
            </div>
        </div>
        <div class="row g-0 mt-5">
            <div class="col me-lg-4">
                <input name="starts" type="text" class="form-module date-input w-100" placeholder="Начало (дата)" aria-label="Начало (дата)" aria-describedby="addon-wrapping" autocomplete="off" value="{{ old('starts') }}">
            </div>
            <div class="col ms-3">
                <input name="ends" type="text" class="form-module date-input w-100" placeholder="Край (дата)" aria-label="Край (дата)" aria-describedby="addon-wrapping" autocomplete="off" value="{{ old('ends') }}">
            </div>
        </div>
        <div class="row g-0 position-relative mt-5 d-lg-none">
            <select name="visibility" class="border-0 position-absolute top-50 start-50 translate-middle text-uppercase ps-0 py-0" style="width: 40%;">
                <option value="">Статус</option>
                <option value="public" selected>Публичен</option>
                <option value="private">Скрит</option>
                <option value="draft">Чернова</option>
            </select>
        </div>
        <div class="row g-0 mt-5">
            <div class="col">
                <div class="row">
                    <div class="col text-title-module text-uppercase mt-lg-3">
                        <b>Добави курсисти</b>
                    </div>
                    @if ($candidates->count())
                        <div class="col mt-lg-3">
                            <input type="checkbox" class="checkbox" id="add-all-candidates" value="1">
                            <label for="add-all-candidates">Добави всички</label>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!--Mobil scrol-->
        @if ($candidates->count())
            <div class="student-scrol-module d-flex d-lg-none">
                <div class="d-flex flex-column bd-highlight mb-3">
                    @include('course.module.partials.module-students.create', [
                        'allUsers' => $candidates,
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
    <!--END mobil scroll-->
    @if ($candidates->count())
        <div class="student-scrol-module d-flex d-none d-lg-block">
            <div class="d-flex flex-column bd-highlight mb-3">
                @include('course.module.partials.module-students.create', [
                    'allUsers' => $candidates,
                    'resolution' => 'desktop',
                ])
            </div>
        </div>
    @endif
    <hr class="mt-5 d-none d-lg-block">
    <div class="row g-0">
        <div class="col d-none d-lg-block">
            <select name="visibility" class="border-0 status-1 text-uppercase ps-0 py-0 mt-5">
                <option value="">Статус</option>
                <option value="public" selected>Публичен</option>
                <option value="private">Скрит</option>
                <option value="draft">Чернова</option>
            </select>
        </div>
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
</form>

@push('scripts')
    <script>
        $('#add-all-candidates').click(function () {
            if ($('#add-all-candidates:checked').val()) {
                $('.candidates-checkbox').attr('checked', true);
            } else {
                $('.candidates-checkbox').attr('checked', false);
            }
        });
    </script>
@endpush
