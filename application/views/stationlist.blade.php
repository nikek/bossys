@layout('main')

@section('authbar')
	{{ HTML::link('logout', 'Logga ut') }}
@endsection

@section('content')
<section class="content">
	<ul class="stationlist">
		@foreach($stations as $st)

			<li>{{ HTML::link("$st->slug", $st->name, array('class' => 'btn')) }}</li>
	
		@endforeach
	</ul>
</section>
@endsection