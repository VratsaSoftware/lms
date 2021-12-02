@foreach($lecturers as $lecturer)
    <div class="p-2 bd-highlight">
        <div class="row g-0">
            <div class="col-auto me-5 mt-1">
                <input type="checkbox" class="checkbox" id="lecturer-{{ $loop->iteration }}" {{ isset($course) && in_array($lecturer->id, $course->lecturers->pluck('id')->toArray()) ? 'checked' : null }} name="lecturers[]" value="{{ $lecturer->id }}">
                <label for="lecturer-{{ $loop->iteration }}"></label>
            </div>
            <div class="col me-5">
                <div class="row">
                    <div class="col-auto">
                        <div class="student-name-modul mt-2">
                            <b>{{ $lecturer->name }}</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
@endforeach
