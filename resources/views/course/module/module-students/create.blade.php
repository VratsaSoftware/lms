@foreach ($allUsers as $user)
    <div class="p-2 bd-highlight">
        <div class="row g-0 mt-3">
            <div class="col-auto me-5 mt-4">
                <input type="checkbox" name="students[]" class="checkbox" id="create-{{ $resolution }}-{{ $loop->iteration }}"  value="{{ $user->id }}">
                <label title="Добави" for="create-{{ $resolution }}-{{ $loop->iteration }}"></label>
            </div>
            <div class="col-auto me-5">
                @if(!$user->picture && $user->sex != 'male')
                    <img src="{{ asset('images/women-no-avatar.png') }}" alt="pic" class="student-avatar-size">
                @elseif(!$user->picture && $user->sex != 'female')
                    <img src="{{ asset('images/men-no-avatar.png') }}" alt="pic" class="student-avatar-size">
                @else
                    <img src="{{ asset('images/user-pics/' . $user->picture) }}" alt="pic" class="student-avatar-size">
                @endif
            </div>
            <div class="col me-5">
                <div class="row">
                    <div class="col-auto">
                        <div class="student-name-modul mt-4">
                            <b style="margin-right: 30px">{{ $user->name }} {{ $user->last_name }}</b> {{ $user->email }}
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
