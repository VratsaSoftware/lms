<!--Mobil-->
<div class="row g-0 home-work-1 align-items-center p-3 mt-3">
    <div class="col-auto mx-lg-0 mx-auto d-lg-none lection-eval">
        <button style="margin-top: -50px!important;" onclick="window.location.href='{{ asset('lection/homework/' . $homework->id . '/coments') }}'" class="ms-xxl-2 mt-xxl-0 mt-4 btn-view-1 btn-green row g-0 align-items-center">
            <div class="col-auto mx-auto fw-bold see-all">Виж коментари ({{ $myHomework->evaluated_count }})</div>
        </button>
    </div>
    <!--END mobil-->
    <a href="{{ asset('lection/homework/' . $homework->id . '/coments') }}" style="margin-left: -40px;" class="col-5 ps-5 text-normal text-uppercase text-white d-none d-lg-block">
        Коментари ({{ $myHomework->evaluated_count }})
    </a>
    <div class="col-auto text-small align-self-end pe-3 text-white mb-2 ms-4 d-none d-lg-block">Домашно</div>
    <div class="col d-none d-lg-block">
        <a href="{{ asset('/data/homeworks/' . $myHomework->file) }}" download>
            <img src="{{ asset('assets/img/download.svg') }}" alt="">
        </a>
    </div>
    <div class="col-auto d-none d-lg-block">
        <div class="row g-0 ps-1">
            <div class="col">
                @if (!\Carbon\Carbon::parse($lection->homework_end)->addDays(1)->gt(\Carbon\Carbon::now()))
                    <div class="nav btn  btn-green active py-0 pe-2 d-flex btn2-d" style="background-color: #999999">
                        <div class="row g-0 align-self-center">
                            <div class="col-auto ms-3 text-uploaded-home-sm">
                                Редактирай
                            </div>
                            <div class="col text-end align-items-center d-flex img-btn1-ms">
                                <i class="fas fa-edit"></i>
                            </div>
                        </div>
                    </div>
                @else
                    <label for="homework-edit-file-{{ $loop->iteration }}" class="nav btn  btn-green active py-0 pe-2 d-flex btn2-d">
                        <div class="row g-0 align-self-center">
                            <div class="col-auto ms-3 text-uploaded-home-sm">
                                Редактирай
                            </div>
                            <div class="col text-end align-items-center d-flex img-btn1-ms">
                                <i class="fas fa-edit"></i>
                            </div>
                        </div>
                    </label>
                @endif
            </div>
        </div>
    </div>
</div>

<form id="homework-edit-{{ $loop->iteration }}" action="{{ route('user.edit.homework', $myHomework->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" style="display: none" id="homework-edit-file-{{ $loop->iteration }}" name="homework" onchange="this.form.submit()" accept=".zip,.rar,.7zip, .7z">
</form>
