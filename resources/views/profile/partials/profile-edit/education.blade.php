<div class="col">
    <p class="fw-bold bio-title">Образование</p>
    <div class="bio-description-large">
        @foreach ($allEducation as $education)
            <div class="row g-0">
                <div class="col-auto pe-3 fw-bold item-number">{{ $loop->iteration }}.</div>
                <div class="col mb-3 bio-description">
                    <span style="font-size: 18px">
                        <div class="col-auto pe-3 fw-bold item-number">
                            {{ mb_strlen($education->EduInstitution->name, 'UTF-8') > 19 ? mb_substr($education->EduInstitution->name, 0, 19) . "..." : $education->EduInstitution->name }}
                        </div>
                        {{ $education->y_from }}/{{ $education->y_to ? $education->y_to : 'В ход' }}
                    </span>
                </div>
                <span data-bs-toggle="modal" data-bs-target="#educationModal-edit"
                      class="btn education-btn position-absolute top-0 end-0 d-flex justify-content-center align-items-center edit-area-btn m-2"
                      data-education="{{ $education }}" data-edu-name="{{ $education->EduInstitution->name }}"
                      data-specialty="{{ $education->EduSpeciality->name }}">
                        <i class="fas fa-pen"></i>
                </span>
                <form method="post" action="{{ url('/user/delete/education/' . $education->id) }}">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Образованието ще бъде премахнато')" class="btn position-absolute bottom-0 end-0 d-flex justify-content-center align-items-center edit-area-btn m-2">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </div>
        @endforeach
        <span class="bio-pill position-absolute bottom-0 start-0 m-2 p-0"
              data-bs-toggle="modal" data-bs-target="#educationModal-create">+</span>
    </div>
</div>
