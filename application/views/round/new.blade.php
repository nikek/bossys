@layout('main')

@section('authbar')
	{{ HTML::link('logout', 'Logga ut') }}
@endsection

@section('content')
<section class="content">
	
	<div>{{ HTML::link("/$station->slug", '&larr;', array('class' => 'btn btn-back')) }}</div>
	
	<h2>Nytt lag kör {{ $station->name }}</h2>
	
	{{ Form::open() }}
		{{ Form::hidden('station_id', $station->id) }}
		<fieldset>
			{{ Form::select('team_id', $teams) }}<br>
			{{ Form::label('team_id', 'Lag') }}
		</fieldset>
		<fieldset>
			{{ Form::number('score') }}<br>
			{{ Form::label('score', "Poäng ($station->unit)") }}
		</fieldset>
		<fieldset>
			{{ Form::number('extra') }}<br>
			{{ Form::label('extra', 'Extra poäng (Vq)') }}
		</fieldset>
		<fieldset>
			{{ Form::textarea('description') }}<br>
			{{ Form::label('description', 'Kommentar/motivering') }}
		</fieldset>
		<fieldset>
			{{ Form::submit('Klart!', array('class' => 'btn btn-info')) }}
		</fieldset>
	{{ Form::close() }}
</section>
@endsection