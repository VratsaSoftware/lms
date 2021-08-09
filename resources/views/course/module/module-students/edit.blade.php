@foreach ($allUsers as $user)
    <div class="p-2 bd-highlight">
        <div class="row g-0 mt-3">
            <div class="col-auto me-5 mt-4" >
                <input type="checkbox" name="remove_students[]" class="checkbox edit-{{ $resolution }}" id="edit-{{ $resolution }}-{{ $loop->iteration }}" value="{{ $user->User->id }}">
                <label title="Изтрий" for="edit-{{ $resolution }}-{{ $loop->iteration }}"></label>
            </div>
            <div class="col-auto me-5">
                @if(!$user->User->picture && $user->User->sex != 'male')
                    <img src="{{ asset('images/women-no-avatar.png') }}" alt="pic" class="student-avatar-size">
                @elseif(!$user->User->picture && $user->User->sex != 'female')
                    <img src="{{ asset('images/men-no-avatar.png') }}" alt="pic" class="student-avatar-size">
                @else
                    <img src="{{ asset('images/user-pics/' . $user->User->picture) }}" alt="pic" class="student-avatar-size">
                @endif
            </div>
            <div class="col me-5">
                <div class="row">
                    <div class="col-auto">
                        <div class="student-name-modul mt-4">
                            <b style="margin-right: 30px">{{ $user->User->name }} {{ $user->User->last_name }}</b> {{ $user->User->email }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (!$loop->last)
        <hr class="hr-add-stydents">
    @endif
@endforeach
