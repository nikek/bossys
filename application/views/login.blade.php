@layout('main')

@section('content')
<section class="content login">

	{{ Form::open('login') }}
	
		<div>
			{{ Form::text('username') }}<br>
			{{ Form::label('username', 'Användarnamn') }}
		</div>
	
		<div>
			{{ Form::password('password') }}<br>
			{{ Form::label('password', 'Lösenord') }}
		</div>
	
		@if(Session::has('login_errors'))
			<div class="error">Du failade med anv eller lösen!</div>
		@endif
		
		<div>
		{{ Form::submit('Do it!', array('class' => 'btn btn-info')) }}
		</div>
	
	{{ Form::close() }}
</section>
@endsection