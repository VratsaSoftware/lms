@if ($upcomingEvent)    
    <div class="col upcoming-event">
        <h2 class="fw-bold">{{ $upcomingEvent->name }}</h2>
        <div class="row g-0 d-flex align-items-center">
            <div class="col">
                <span>{{ $upcomingEvent->from->format('d.m.Y') }}</span>
            </div>
            <div class="col-auto">
                <button class="btn view-event-btn d-flex py-0 px-3">
                    <div class="row w-100 g-0 align-self-center">
                        <div class="col text-start align-self-center">
                            <span class="fw-bold">Виж</span>
                        </div>
                        <div class="col-auto align-self-center">
                            <img src="assets/icons/action icon.svg" width="20" alt="#">
                        </div>
                    </div>
                </button>
            </div>
        </div>
    </div>
@endif