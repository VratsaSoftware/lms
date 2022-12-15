<div class="section col-md-12">
	<div class="col-md-12 d-flex flex-row flex-wrap options-wrap">
		<table class="table" id="forms">
			<thead>
			<tr>
				<th scope="col">Поредност</th>
				<th scope="col">#ID</th>
				<th scope="col">Име</th>
				<th scope="col">Фамилия</th>
				<th scope="col">Е-Поща</th>
				<th scope="col">Локация</th>
				<th scope="col">Възраст</th>
				<th scope="col">Занимание</th>
				<th scope="col">Телефон</th>
				<th scope="col">Източник на формата</th>
				<th>Направление</th>
				<th>Модул</th>
				<th scope="col">Форма</th>
				<th>Резултат от Тестове</th>
				<th>Добави във</th>
			</tr>
			</thead>
			<tbody>
			@foreach($entries as $num => $entry)
				<tr>
					<th>{{$num}}</th>
					<th scope="row">{{$entry->User->id}}</th>
					<td>{{$entry->User->name}}</td>
					<td>{{$entry->User->last_name}}</td>
					<td>{{$entry->User->email}}</td>
					<td>{{$entry->User->location}}</td>
					<td>{{(Carbon\Carbon::now()->format('Y') - $entry->User->dob->format('Y'))}}</td>
					<td>{{$entry->User->Occupation->occupation}}</td>
					<td>{{$entry->Form->phone}}</td>
					<td>{{$entry->Form->source_url}}</td>
					<td>{{$entry->Form->course}}</td>
					<td>{{$entry->Form->module}}</td>
					<td data-course="{{$entry->Form->course}}" data-sex="{{$entry->User->sex}}" data-module="{{$entry->Form->module}}" data-suitable_candidate="{{$entry->Form->suitable_candidate}}" data-suitable_training="{{$entry->Form->suitable_training}}" data-accompliments="{{$entry->Form->accompliments}}" data-expecatitions="{{$entry->Form->expecatitions}}" data-use="{{$entry->Form->use}}" data-source="{{$entry->Form->source}}" data-cv="{{$entry->Form->cv}}" data-created_at="{{$entry->Form->created_at}}" data-scholarship_motivation="{{ $entry->Form->scholarship_motivation }}">
						<a href="#modal" class="show-form"><button class="btn btn-success">Виж</button>
						</a>
					</td>
					<td>
						@if(isset($entry['testScoreTest']))
							@foreach($entry['testScoreTest'] as $tkey => $test)
								{{$entry['hidden']}}
								<p>
									{{$test->title}} =>
									отговорени:{{$entry['testScore'][$tkey][1]['answered'] .'/'. $entry['testScore'][$tkey][0]['questionsCount']}}<br/>
									резултат:{{$entry['testScore'][$tkey][2]['score'] .'/'. $entry['testScore'][$tkey][3]['maxScore']}}<br/>
									процент:{{$entry['testScore'][$tkey][4]['percentage']}}%
								</p>
							@endforeach
						@endif
					</td>
					<td>
						<form action="{{route('add.student.to.course')}}" method="POST" id="add-student" class="add-student">
							@csrf
							<input type="hidden" name="user" value="{{$entry->User->id}}">
							<select name="add_to_course" id="add_to_course">
								<option value="0" disabled selected>----</option>
								@foreach($allCourses as $course)
									<option value="{{$course->id}}">{{$course->name}}</option>
								@endforeach
							</select>
							<button class="btn btn-outline-success">добави</button>
						</form>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	<script>
        // this is the id of the form
        $(".add-student").submit(function(e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function(data)
                {
                    console.log(data); // show response from the php script.
	                form.stop(true, true).fadeOut('fast').fadeIn('fast');
                }
            });


        });
	</script>
	<!-- modal for adding elements -->
	<div id="modal" style="position:absolute">
		<div class="modal-content print-body">
			<div class="modal-header">
				<h2></h2>
			</div>
			<div class="copy text-center">
				<p>
				<table class="table table-hover">
					<thead>
					<tr>
						<th scope="col">Направление</th>
						<th>Мотивация зя стипендия</th>
						<th scope="col">Подходящ кандидат</th>
						<th scope="col">Подходящ обучение</th>
						<th scope="col">Постижения</th>
						<th scope="col">Очаквания</th>
						<th scope="col">Изплозване след това </th>
						<th scope="col">Източник</th>
						<th scope="col">Автобиография</th>
						<th scope="col">Изпратена</th>
						<th>Пол</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td id="course">1</td>
						<td id="scholarship_motivation">Не</td>
						<td id="suitable_candidate">Mark</td>
						<td id="suitable_training">Otto</td>
						<td id="accompliments">Otto</td>
						<td id="expecatitions">Otto</td>
						<td id="use">Otto</td>
						<td id="source">Otto</td>
						<td id="cv-wrapper"><a id="cv" data-url="{{asset('/entry/cv/')}}" href="" download>свали</a></td>
						<td id="created_at">Otto</td>
						<td id="sex"></td>
					</tr>
					</tbody>
				</table>
				</p>
			</div>
			<div class="cf footer">
				<div></div>
				<a href="#close" class="btn close-modal">Затвори</a>
			</div>
		</div>
		<div class="overlay"></div>
	</div>
	<div class="col-md-12 download-stats" style="bottom:1%;font-size:200%;position:fixed;left:-1%"><i class="fas fa-download"></i></div>
	<!-- end of modal -->
	<script type="text/javascript">
        $('.show-form').on('click',function(){
            var course = $(this).parent().attr('data-course');
            var scholarship_motivation = $(this).parent().attr('data-scholarship_motivation');
            var suitable_candidate = $(this).parent().attr('data-suitable_candidate');
            var suitable_training = $(this).parent().attr('data-suitable_training');
            var accompliments = $(this).parent().attr('data-accompliments');
            var expecatitions = $(this).parent().attr('data-expecatitions');
            var use = $(this).parent().attr('data-use');
            var source = $(this).parent().attr('data-source');
            var cv = $(this).parent().attr('data-cv');
            var created_at = $(this).parent().attr('data-created_at');
            var sex = $(this).parent().attr('data-sex');
            $('#course').html(course);
            $('#scholarship_motivation').html(scholarship_motivation);
            $('#suitable_candidate').html(suitable_candidate);
            $('#suitable_training').html(suitable_training);
            $('#accompliments').html(accompliments);
            $('#expecatitions').html(expecatitions);
            $('#use').html(use);
            $('#source').html(source);
            $('#sex').html(sex);
            var downloadUrl = $('#cv').attr('data-url');
            $('#cv').attr('href','');
            $('#cv').attr('href',downloadUrl+'/'+cv);
            $('#created_at').html(created_at);

            $( '#modal' ).show();
        });
        // $(document).ready(function() {
        //     $('#forms').DataTable({
        //         responsive: true,
        //         order: [[0, "desc"]],
        //     });
        // } );
	</script>
</div>
