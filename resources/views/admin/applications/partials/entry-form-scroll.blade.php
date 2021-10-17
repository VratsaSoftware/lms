<div class="{{ $entryForms ? 'scroll-teacher-elec' : 'student-name-modul mt-3' }}">
    <div class="d-flex flex-column bd-highlight mb-3 width-candidates">
        @forelse($entryForms as $entryForm)
            <div class="p-2 bd-highlight">
                <div class="row g-0 mt-3">
                    <div class="col">
                        <div class="row g-0">
                            <div class="col-xxl-9 col">
                                <div class="student-name-modul mt-3">
                                    <b>{{ $loop->iteration }}. {{ $entryForm->entry->User->name . ' ' . $entryForm->entry->User->last_name }}</b>
                                    <br>
                                    <div class="student-email-modul mt-lg-3 mt-xxl-3">
                                        {{ $entryForm->entry->User->email }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-auto">
                                <button class="nav btn btn-green-elec-form btn-green active py-0 pe-2 d-flex btn1-elec mt-2" id="lection-1-tab" data-bs-toggle="tab" href="#" role="tab" aria-controls="lection-1" aria-selected="true">
                                    <div class="row g-0 align-self-center">
                                        <div class="col-auto text-start ms-3 d-none d-lg-block">Отвори</div>
                                        <div class="col text-end align-items-center d-flex img-btn-ms">
                                            <img src="{{ asset('assets/img/action_icon.svg') }}" alt="">
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        @empty
            <h1 style="text-align: center">Няма кандидати</h1>
        @endforelse
    </div>
</div>
