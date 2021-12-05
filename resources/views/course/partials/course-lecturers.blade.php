<h1 class="text-uppercase create-lecturer">Добави Лектори</h1>
<input id="search" onkeyup="searchFun()" class="search-name-lectur mt-4 mb-3" type="search"
       placeholder="Име на лектор" aria-label="Search">

<div class="lectur-scrol">
    @foreach($lecturers as $lecturer)
        <div class="filter">
            <div class="p-2 bd-highlight">
                <div class="row g-0">
                    <div class="col-auto me-5 mt-1">
                        <input form="lecturer-form" type="checkbox" class="checkbox" id="lecturer-{{ $loop->iteration }}" {{ isset($course) && in_array($lecturer->id, $course->lecturers->pluck('id')->toArray()) ? 'checked' : null }} name="lecturers[]" value="{{ $lecturer->id }}">
                        <label for="lecturer-{{ $loop->iteration }}"></label>
                    </div>
                    <div class="col me-5">
                        <div class="row">
                            <div class="col-auto">
                                <div class="student-name-modul mt-2">
                                    <b><span>{{ $lecturer->name }} {{ $lecturer->last_name }}</span></b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    @endforeach
</div>

@push('scripts')
    <script src="{{ asset('js/course/create.js') }}"></script>
@endpush

