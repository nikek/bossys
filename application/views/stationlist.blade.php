@layout('main')

@section('authbar')
	{{ HTML::link('logout', 'Logga ut') }}
@endsection

@section('content')

<ul>
	@foreach($stations as $st)

		<li>{{ HTML::link("$st->slug", $st->name) }}</li>
	
	@endforeach
</ul>	
@endsection