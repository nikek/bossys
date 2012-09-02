@layout('main')

@section('authbar')
	{{ HTML::link('logout', 'Logga ut') }}
@endsection

@section('content')
<section class="content">
	<div>{{ HTML::link('/', '&larr;', array('class' => 'btn btn-back')) }}</div>
	
	<h2>{{ $station->name }}</h2>
	
	<ul>
		@forelse($rounds as $r)
			<li>{{ HTML::link("$station->slug/".$r->team->id, $r->team->name ) }}</li>
		@empty
			Inga lag har registrerats på den här stationen än.
		@endforelse
	</ul>
	
	{{ HTML::link("$station->slug/nyttlag",'+ Nytt lag', array('class' => 'btn btn-info')) }}
</section>
@endsection