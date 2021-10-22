@foreach($comments as $comment)
    <!-- table section -->
    <div class="text-normal" title="{{ (date('Y') == $comment->created_at->format('Y')) ? $comment->created_at->format('d.m H:i') : $comment->created_at->format('d.m.Y H:i') }}" id="myUL">
        <!-- table content-->
        <div class="filter row comment-row g-0 fw-normal mb-3">
            <div class="col-lg-auto col-12 comment-avatar">
                <div class="row g-0 align-items-center">
                    @if (Auth::user()->isLecturer() || Auth::user()->isAdmin() || $comment->is_lecturer_comment == 1)
                        <div class="col-auto me-4">
                            @include ('profile.partials.user-picture', [
                                'user' => $comment->Author,
                                'class' => 'student-avatar-size',
                                'style' => 'border-radius: 5px',
                            ])
                        </div>
                        <div class="col-auto text-small" title="{{ $comment->Author->email }}">
                            <span></span>
                            <span>
                                {{ $comment->Author->name }} {{ $comment->Author->last_name }}
                            </span>
                        </div>
                    @else
                        <img class="h-10 w-10 rounded-full" style="border-radius: 100%" src="https://loremflickr.com/320/240?sig={{ $loop->iteration }}">
                        <div class="col-auto ms-4 d-lg-none text-small">
                            Оценено
                        </div>
                    @endif
                </div>
            </div>
            <!-- https://ui-avatars.com/api/?name=?&amp;color=7F9CF5&amp;background=EBF4FF
                https://robohash.org/{{ $comment->Author->name }}?set=set4
                https://source.unsplash.com/random/200x200?sig={{ $loop->iteration }}
            -->
            <div class="col-lg col-12 d-flex overflow-hidden">
                <div class="col-lg-11 inline-block text-small align-self-center comment-text position-relative px-lg-4 me-lg-4 py-2">
                    {{ $comment->comment }}
                </div>
                <!-- <div class="col-auto d-none d-lg-block mt-1 px-3">
                    {{ $comment->created_at->diffForHumans() }}
                </div> -->
            </div>
            <div class="col-auto">
                <button class="comment-toggler text-white text-small px-3 d-flex align-items-center">
                    <span class="me-4 pe-2 fw-bold d-md-inline-block d-none lh-xs mb-1">Виж повече</span>
                    <img src="{{ asset('assets/img/arrow-right-white.svg') }}">
                </button>
            </div>
            <div class="col-auto ms-5 mt-2 d-lg-none">
                <b>{{ $comment->created_at->diffForHumans() }}</b>
            </div>
        </div>
    <!-- table content END-->
    </div>
@endforeach

<script>
    $(document).ready(function() {
        $('.comment-toggler').on('click', function () {
            var toggler =  $(this).parent();
            toggler.prev().children().toggleClass("active");
            $(this).toggleClass("active");
        });

        if ($(window).width() < 992) {
            $("#right-side .tab-pane.active").removeClass("active");
            $('.btn-green.active').removeClass("active");
        }
    });
</script>
