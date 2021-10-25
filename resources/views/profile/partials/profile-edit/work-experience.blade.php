<div class="col pe-2 me-5">
    <p class="fw-bold bio-title">Работен опит</p>
    <div class="bio-description-large">
        @foreach ($allWorkExperience as $workExperience)
            <div class="row g-0">
                <div class="col-auto pe-3 fw-bold item-number">{{ $loop->iteration }}.</div>
                <div class="col mb-3 bio-description">
                    <span style="font-size: 18px">
                        <div class="col-auto pe-3 fw-bold item-number">
                            {{ mb_strlen($workExperience->Company->name, 'UTF-8') > 19 ? mb_substr($workExperience->Company->name, 0, 19) . "..." : $workExperience->Company->name }}
                        </div>
                        {{ $workExperience->y_from->format('d.m.Y') }}/{{ $workExperience->y_to ? $workExperience->y_to->format('d.m.Y') : 'В ход' }}
                    </span>
                </div>
                <span data-bs-toggle="modal" data-bs-target="#editWorkExperienceModal" class="btn position-absolute top-0 end-0 d-flex justify-content-center align-items-center edit-area-btn m-2 work-experience-btn" data-work-experience-company="{{ $workExperience->Company->name }}" data-work-position="{{ $workExperience->Position->position }}" data-work-y_from="{{ $workExperience->y_from->format('m/d/Y') }}" data-work-y_to="{{ $workExperience->y_to ? $workExperience->y_to->format('m/d/Y') : null }}" data-work-id="{{ $workExperience->id }}">
                    <i class="fas fa-pen"></i>
                </span>
                <form method="post" action="{{ url('/user/delete/work/' . $workExperience->id) }}">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Работният опит ще бъде премахнат')" class="btn position-absolute bottom-0 end-0 d-flex justify-content-center align-items-center edit-area-btn m-2">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </div>
        @endforeach
        <span class="bio-pill position-absolute bottom-0 start-0 m-2 p-0"
              data-bs-toggle="modal" data-bs-target="#createWorkExperienceModal">+</span>
    </div>
</div>
