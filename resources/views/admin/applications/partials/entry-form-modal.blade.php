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
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row text-center" style="color:#00214b; font-size: 20px">
                    <div class="col-4">
                        <i class="fas fa-phone-alt"></i>
                        <a href="tel:{{ $entryForm->phone }}">{{ $entryForm->phone }}</a>
                    </div>
                    <div class="col-4">
                        <i class="fas fa-mail-bulk"></i>
                        <a href="mailto:{{ $entryForm->entry->User->email }}">{{ $entryForm->entry->User->email }}</a>
                    </div>
                    <div class="col-4">
                        <i class="fas fa-user-alt"></i>
                        {{ $entryForm->entry->User->Occupation->occupation }}
                    </div>
                </div>

                <div class="row text-center mt-3" style="color:#00214b; font-size: 20px">
                    <div class="col-12 ps-5 pe-5 pt-3">
                        <b>Защо смятате, че тези обучения са подходящи за Вас?</b>
                        <br>
                        {{ $entryForm->suitable_candidate }}
                    </div>
                    <div class="col-12 ps-5 pe-5 pt-3">
                        <b>Защо смятате, че Вие сте подходящ за ИТ обучение?</b>
                        <br>
                        {{ $entryForm->suitable_training }}
                    </div>
                    <div class="col-12 ps-5 pe-5 pt-3">
                        <b>Постижения</b>
                        <br>
                        {{ $entryForm->accompliments }}
                    </div>
                    <div class="col-12 ps-5 pe-5 pt-3">
                        <b>Какви са очакванията Ви за това обучение?</b>
                        <br>
                        {{ $entryForm->expecatitions }}
                    </div>
                    @if($entryForm->cv)
                        <div class="col-12 ps-5 pe-5 pt-3">
                            <b>CV</b>
                            <br>
                            <a href="{{ asset('entry/cv/' . $entryForm->cv) }}">Свали</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
