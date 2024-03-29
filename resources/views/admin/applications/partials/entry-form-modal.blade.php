<!-- Modal -->
<div class="modal fade" id="entry-form-{{ $loop->iteration }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content" style="border-radius: 30px">
            <div class="modal-header" style="border-bottom: 0px">
                <h3 class="modal-title" style="color:#00214b">
                    Форма за кандидатстване
                    <br>
                    <div style="color:#999999; font-size: 20px">
                        <i class="fas fa-user-alt"></i> {{ $entryForm->entry->User->name . ' ' . $entryForm->entry->User->last_name }}
                        {{ $entryForm->entry->User->dob ? '(' . $entryForm->entry->User->dob->diffInYears() . ' години)' : '' }}
                    </div>
                </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-top: -60px;"></button>
            </div>
            <div class="modal-body">
                <div class="row g-0 text-center" style="color:#00214b; font-size: 20px">
                    <div class="col-lg-4 col-12">
                        <i class="fas fa-phone-alt"></i>
                        <a href="tel:{{ $entryForm->phone }}">{{ $entryForm->phone }}</a>
                    </div>
                    <div class="col-lg-4 col-12">
                        <i class="fas fa-mail-bulk"></i>
                        <a href="mailto:{{ $entryForm->entry->User->email }}">{{ $entryForm->entry->User->email }}</a>
                    </div>
                    <div class="col-lg-4 col-12">
                        <i class="fas fa-user-alt"></i>
                        {{ $entryForm->entry->User->Occupation ? $entryForm->entry->User->Occupation->occupation : null }}
                    </div>
                </div>

                <div class="row text-center mt-3" style="color:#00214b; font-size: 20px">
                    @if($entryForm->suitable_candidate)
                        <div class="col-12 ps-5 pe-5 pt-3">
                            <b>Защо смятате, че тези обучения са подходящи за Вас?</b>
                            <br>
                            {{ $entryForm->suitable_candidate }}
                        </div>
                    @endif
                    @if($entryForm->suitable_training)
                        <div class="col-12 ps-5 pe-5 pt-3">
                            <b>Защо смятате, че Вие сте подходящ за ИТ обучение?</b>
                            <br>
                            {{ $entryForm->suitable_training }}
                        </div>
                    @endif
                    @if($entryForm->accompliments)
                        <div class="col-12 ps-5 pe-5 pt-3">
                            <b>Постижения</b>
                            <br>
                            {{ $entryForm->accompliments }}
                        </div>
                    @endif
                    @if($entryForm->expecatitions)
                        <div class="col-12 ps-5 pe-5 pt-3">
                            <b>Какви са очакванията Ви за това обучение?</b>
                            <br>
                            {{ $entryForm->expecatitions }}
                        </div>
                    @endif
                    @if($entryForm->scholarship_motivation)
                        <div class="col-12 ps-5 pe-5 pt-3">
                            <b>Мотивация за стипендия</b>
                            <br>
                            {{ $entryForm->scholarship_motivation }}
                        </div>
                    @endif
                    @if($entryForm->cv)
                        <div class="col-12 ps-5 pe-5 pt-3">
                            <b>CV</b>
                            <br>
                            <a href="{{ asset('entry/cv/' . $entryForm->cv) }}" download>Свали</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
