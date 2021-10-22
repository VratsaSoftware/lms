@if ($upcomingEvent)
    <div class="w-100"></div>
    <div class="col mt-5">
        <div class="row g-0">
            <div class="col">
                <p class="fw-bold bio-title">Предстоящо събитие</p>
            </div>
            <div class="w-100"></div>
            <div class="col upcoming-event">
                <div class="row g-0">
                    <div class="col">
                        <p class="text-uppercase event-title pb-4 mb-1">{{ $upcomingEvent->name }}</p>
                    </div>
                    <div class="row g-0 d-flex align-items-center">
                        <div class="col event-info">
                            <span>{{ $upcomingEvent->from->format('d.m.Y') }}</span>
                            <!-- <span class="h-100 vertical-line"></span>
                                            <span>Зала “БОТЕВ”</span> -->
                        </div>
                        <div class="col-auto">
                            <button class="btn view-event-btn d-flex py-0 px-3">
                                <div class="row w-100 g-0 align-self-center">
                                    <div class="col text-start fw-bold">
                                        Виж повече
                                    </div>
                                    <div class="col-auto d-flex align-items-center">
                                        <img src="{{ asset('assets/icons/action icon.svg') }}" width="27" alt="#">
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif