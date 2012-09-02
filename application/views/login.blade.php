@layout('main')

@section('content')
<section class="content login">

	{{ Form::open('login') }}
	
		<fieldset>
			{{ Form::text('username') }}<br>
			{{ Form::label('username', 'Användarnamn') }}
		</fieldset>
	
		<fieldset>
			{{ Form::password('password') }}<br>
			{{ Form::label('password', 'Lösenord') }}
		</fieldset>
	
		@if(Session::has('login_errors'))
			<fieldset class="error">Du failade med anv eller lösen!</fieldset>
		@endif
		
		<fieldset>
		{{ Form::submit('Do it!', array('class' => 'btn btn-info')) }}
		</fieldset>
	
	{{ Form::close() }}
</section>
@endsection