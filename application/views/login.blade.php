@layout('main')

@section('content')

<h3>Logga in!</h3>

{{ Form::open('login') }}

	@if(Session::has('login_errors'))
		<span class="error">Du failade på anv eller lösen.</span>
	@endif
	
	<div>
	{{ Form::label('username', 'Anv.') }}<br>
	{{ Form::text('username') }}
	</div>
	
	<div>
	{{ Form::label('password', 'Lösen') }}<br>
	{{ Form::password('password') }}
	</div>
	
	<div>
	{{ Form::submit('Do it!') }}
	</div>
	
{{ Form::close() }}

@endsection