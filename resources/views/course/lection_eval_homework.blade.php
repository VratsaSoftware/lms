@if($homework->count())
	<p>
		<label for="downloadme">Свали файла от линка </label>
		<a href="{{asset('/data/homeworks/'.$homework->file)}}" id="downloadme" download style="color:#00F">свали</a>
	</p>

	<form action="{{route('student.homework.comment',['homework' => $homework->id])}}" id="comment_form-{{$homework->id}}" name="comment_form" method="POST">
		{{ csrf_field() }}
		<textarea name="comment" id="comment" cols="30" rows="10" placeholder="остави коментар (минимум 3 символа)"></textarea><br>
		<div class="col-md-12 text-center"><button type="submit" class="btn btn-success" style="float:none">оцени</button></div>
	</form>
@else
	<p>В момента няма налични домашни!</p>
@endif
