@layout('main')

@section('authbar')
	{{ HTML::link('logout', 'Logga ut') }}
@endsection

@section('content')
	<p>{{ HTML::link("/$station->slug", 'Tillbaka') }}</p>
	
	<h1>Nytt lag kör {{ $station->name }}</h1>
	
	{{ Form::open() }}
		{{ Form::hidden('station_id', $station->id) }}
		<div>
			{{ Form::label('team_id', 'Lag') }}<br>
			{{ Form::select('team_id', $teams) }}
		</div>
		<div>
			{{ Form::label('score', "Poäng ($station->unit)") }}<br>
			{{ Form::number('score') }}
		</div>
		<div>
			{{ Form::label('extra', 'Extra poäng (Vq)') }}<br>
			{{ Form::number('score') }}
		</div>
		<div>
			{{ Form::label('description', 'Kommentar/motivering') }}<br>
			{{ Form::textarea('description') }}
		</div>
		<div>
			{{ Form::submit('Klart!') }}
		</div>
	{{ Form::close() }}
	
@endsection