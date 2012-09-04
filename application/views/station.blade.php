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
	
	@if(!empty($teamslist))
		{{ HTML::link("$station->slug/nyttlag",'+ Nytt lag', array('class' => 'btn btn-info')) }}
	@else
		<div>Alla lag har kört den här stationen, klicka på lagnamnet för att redigera.</div>
	@endif
</section>
@endsection