<form action="{{ route('lection.homework.lecturer.comment', ['homework' => $homework->id]) }}" method="POST">
    {{ csrf_field() }}
    <textarea id="comment-edit-textarea-{{ $homework->id }}" name="comment" class="create-lection-description mt-5 p-2" placeholder="Остави коментар на {{ $homework->user->name }}" rows="4" style="display: none; width: 100%" required>{{ isset($comment) && $comment->user_id == Auth::user()->id ? $comment->comment : '' }}</textarea>

    <div class="d-flex flex-row-reverse">
        <button class="btn-green btn-edit mt-4" id="btn-edit-comment-{{ $homework->id }}" style="display: none; width: 270px">
            <div class="row g-0 align-items-center">
                <div class="col text-start text-small">
                    Запази
                </div>
                <div class="col-auto">
                    <img src="{{ asset('assets/img/action_icon.svg') }}">
                </div>
            </div>
        </button>
    </div>
</form>
