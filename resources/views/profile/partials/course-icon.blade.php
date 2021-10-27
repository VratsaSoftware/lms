@if ($type == 1)
	<img src="{{ asset('assets/icons/Programirane.svg') }}" alt="#">
@elseif ($type == 2)
	<img src="{{ asset('assets/icons/Design.svg') }}" alt="#">
@elseif ($type == 3)
	<img src="{{ asset('assets/icons/Marketing.svg') }}" alt="#">
@elseif ($type == 4)
	<img src="{{ asset('assets/icons/Software.svg') }}" alt="#">
@elseif ($type == 5)
    <img src="{{ asset('assets/icons/qa.svg') }}" alt="#" width="80px">
@endif
