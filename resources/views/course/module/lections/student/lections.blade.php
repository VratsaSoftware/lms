@if($loop->first)
    <link href="{{ asset('css/lection/students.css') }}" rel="stylesheet" />
@endif

@if (!Auth::user()->isLecturer() && !Auth::user()->isAdmin())
	@foreach ($homeworks as $homework)
		@if ($homework->lection_id == $lection->id)
			@php
				$validHomework = true;
				$myHomework = $homework;
			@endphp
			@break
		@else
			@php
				$validHomework = false;
			@endphp
		@endif
	@endforeach
@endif

<div class="tab-pane fade show {{ Session::get('lectionId') == $lection->id ? 'show active' : (!Session::get('lectionId') && $loop->first ? 'show active' : null) }} mt-xl-2 pt-xl-1" id="lection-{{ $loop->iteration }}" role="tabpanel" aria-labelledby="lection-1-tab">
	<div class="tab-body position-relative">
		<span class="close d-lg-none position-absolute">&times;</span>
		<div class="row pt-lg-0 pt-4 g-0">
			<div class="col pe-4 d-none d-lg-block">
				<h2 class="text-l1">{{ strlen($lection->title) > 25 ? mb_substr($lection->title, 0, 25) . "..." : $lection->title }}</h2>
			</div>
			<div class="col-auto pe-4 d-block d-lg-none">
				<h2 class="text-l1">{{ $lection->title }}</h2>
			</div>
			<div class="col-auto pe-4">
				<div class="data1">{{ $lection->first_date->format('d.m.Y') }}</div>
			</div>
			<div class="col-auto align-self-stretch border d-none d-lg-block"></div>
			<div class="col pe-4 ps-4 d-none d-lg-block">
				<div class="data1">{{ isset($lection->second_date) ? $lection->second_date->format('d.m.Y') : null }}</div>
			</div>
			<div class="col-auto pe-5 d-none d-lg-block">
	            <div class="pill1 d-flex align-items-center float-right rounded-circle overflow-hidden">
	                <button class="nav btn py-0 pe-2 d-flex" id="lection-1-tab" data-bs-toggle="tab" href="#lection-{{ $loop->iteration - 1 }}" aria-controls="lection-1" aria-selected="true">
	                    <a class="btn px-2 col p-0 text-center" id="toggleNav">
	                        <img src="{{ asset('assets/img/arrow.svg') }}"class="arrow1">
	                    </a>
	                </button>
	            </div>
	        </div>
	        <div class="col-auto pe-4 d-none d-lg-block">
	            <div class="pill2 d-flex align-items-center float-right rounded-circle overflow-hidden">
	                <button class="nav btn py-0 pe-2 d-flex" id="lection-1-tab" data-bs-toggle="tab" href="#lection-{{ $loop->iteration + 1 }}" aria-controls="lection-1" aria-selected="true">
	                    <a class="btn px-2 col p-0 text-center" id="toggleNav">
	                        <img src="{{ asset('assets/img/arrow.svg') }}"class="arrow1">
	                    </a>
	                </button>
	            </div>
	        </div>
		</div>
        <div class="{{ $lection->Video ?: 'video-upload' }} row g-0 my-4 position-relative" {{ $lection->Video ? 'style="background-color: transparent;"' : null }}>
            @if($lection->Video && strstr($lection->Video, 'http'))
                <span id="lection-video-{{ $lection->id }}" class="videos row"></span>
            @else
                <div class="edit-lection-btn video-upload-btn position-absolute text-center">
                    <div class="text-center fw-bold pt-lg-4 pt-3">
                        Няма
                        <br class="d-lg-block d-none">
                        видео
                    </div>
                </div>
            @endif

            <div class="text-center videos-nav" id="lection-video-nav-{{ $lection->id }}"></div>
        </div>
		<div class="edit-decsription pt-3 pb-2">
			<div class="lorem">
				{{ $lection->description }}
			</div>
		</div>
		@if ($lection->presentation)
			<div class="row g-0 d-lg-none mt-2">
				<div class="col-auto col-auto text-small align-self-end pe-3">
                    <a href="{{ asset('/data/course-' . $module->Course->id . '/modules/' . $module->id.'/slides-'.$lection->id . '/' . $lection->presentation) }}" target="_blank">
                        Презентация
                    </a>
                </div>
				<div class="col-auto">
					<a href="{{asset('/data/course-'.$module->Course->id.'/modules/'.$module->id.'/slides-'.$lection->id.'/'.$lection->presentation)}}" download>
						<img src="{{ asset('assets/img/download.svg') }}" alt="">
					</a>
				</div>
			</div>
		@endif
		<hr class="mt-4 mb-4 d-lg-none">
		<div class="row g-0 align-items-lg-center lh-1 pb-5">
			@if ($lection->presentation)
				<div class="col-5 text-normal py-4 d-none d-lg-block">
					Презентация
				</div>
			@endif
			<div class="col-7 text-normal py-4 d-none d-lg-block">
				Файлове
			</div>
			@if ($lection->presentation)
				<div class="col-auto col-3 mb-lg-0 mb-3 me-lg-0 me-5 text-lg-end d-none d-lg-block">
					<div class="row g-0 ">
						<div class="col-auto col-auto text-small align-self-end pe-3">
                            <a href="{{ asset('/data/course-' . $module->Course->id . '/modules/' . $module->id.'/slides-'.$lection->id . '/' . $lection->presentation) }}" target="_blank">
                                Презентация
                            </a>
                        </div>
							<div class="col-auto">
							<a href="{{asset('/data/course-'.$module->Course->id.'/modules/'.$module->id.'/slides-'.$lection->id.'/'.$lection->presentation)}}" download>
								<img src="{{ asset('assets/img/download.svg') }}" alt="">
							</a>
						</div>
					</div>
				</div>
				<div class="col-auto align-self-stretch border b-size d-none d-lg-block ms-5"></div>
			@endif
			<div class="col">
				<div class="row g-0">
					@if ($lection->demo)
						<div class="col-auto col-5 mb-lg-0 mb-3 text-lg-end">
							<div class="row g-0">
								<div class="col-lg col-auto text-small align-self-end pe-3">Демо</div>
								<div class="col-auto">
									<a href="{{ $lection->demo }}">
										<img src="{{ asset('assets/img/download.svg') }}" alt="">
									</a>
								</div>
							</div>
						</div>
					@endif
		            @if ($lection->homework_criteria)
						<div class="col-lg col-5 mb-lg-0 mb-3 text-lg-end">
							<div class="row g-0">
								<div class="col-lg col-auto text-small align-self-end pe-3">
                                    <a href="{{ asset('/data/course-' . $module->Course->id . '/modules/' . $module->id . '/homework-' . $lection->id . '/' . $lection->homework_criteria) }}" target="_blank">
                                        Домашно
                                    </a>
                                </div>
								<div class="col-auto">
									<a href="{{ asset('/data/course-'.$module->Course->id.'/modules/'.$module->id.'/homework-'.$lection->id.'/'.$lection->homework_criteria) }}" download>
										<img src="{{ asset('assets/img/download.svg') }}">
									</a>
								</div>
							</div>
						</div>
					@endif
				</div>
			</div>
		</div>
		<!-- upload homework box -->
        @include('course.module.lections.student.partials.upload-homework')

		@if ($lection->homework_end && isset($myHomework))
            @include('course.module.lections.student.partials.evaluate-box')

			@include('course.module.lections.student.partials.homework-box')
		@endif
	</div>
</div>

@if (($lection->homework_end && $lection->homework_end->addDays(1)->gt(\Carbon\Carbon::now())) || !$lection->homework_end)
	<form id="upload-homework-{{ $loop->iteration }}" action="{{ route('user.upload.homework') }}" method="post" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="lection" value="{{ $lection->id }}">
		<input type="file" id="homework-input-{{ $loop->iteration }}" name="homework" class="homework-input" style="display: none" accept=".zip,.rar,.7zip, .7z">
	</form>
@endif

@php
	$validHomework = false;
	$myHomework = null;
@endphp
