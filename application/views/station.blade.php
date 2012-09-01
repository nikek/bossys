@layout('main')

@section('authbar')
	{{ HTML::link('logout', 'Logga ut') }}
@endsection

@section('content')
	<p>{{ HTML::link('/', 'Tillbaka') }}</p>
	
	<h1>{{ $station->name }}</h1>
	
	<ul>
		@forelse($rounds as $r)
			<li>{{ HTML::link("$station->slug/".$r->team->id, $r->team->name ) }}</li>
		@empty
			Inga lag har registrerats på den här stationen än.
		@endforelse
	</ul>
	
	{{ HTML::link("$station->slug/nyttlag",'Nytt lag') }}
	
@endsection