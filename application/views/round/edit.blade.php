@layout('main')

@section('authbar')
	{{ HTML::link('logout', 'Logga ut') }}
@endsection

@section('content')
<section class="content">
	
	<div>{{ HTML::link("/$station->slug", '&larr;', array('class' => 'btn btn-back')) }}</div>
	
	<h2>Uppdatera {{ $team->name }} på {{ $station->name }}</h2>
	
	{{ Form::open(null, 'PUT') }}
		{{ Form::hidden('station_id', $station->id) }}
		{{ Form::hidden('team_id', $team->id) }}
		<fieldset>
			{{ Form::number('score', $round->score) }}<br>
			{{ Form::label('score', "Poäng ($station->unit)") }}
		</fieldset>
		<fieldset>
			{{ Form::number('extra', $round->extra) }}<br>
			{{ Form::label('extra', 'Extra poäng (Vq)') }}
		</fieldset>
		<fieldset>
			{{ Form::textarea('description', $round->description) }}<br>
			{{ Form::label('description', 'Kommentar/motivering') }}
		</fieldset>
		<fieldset>
			{{ Form::submit('Uppdatera!', array('class' => 'btn btn-info')) }}
		</fieldset>
	{{ Form::close() }}
</section>
@endsection