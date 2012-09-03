@layout('main')

@section('authbar')
	{{ HTML::link('logout', 'Logga ut') }}
@endsection

@section('content')
<section>
	<table>
		<thead>
			<tr>
				<th></th>
				@foreach($teams as $t)
				<th colspan="2">{{ $t->name }}</th>
				@endforeach
			</tr>
			<tr>
				<th></th>
				@foreach($teams as $t)
				<th>Vq</th><th>extra</th>
				@endforeach
			</tr>
		</thead>
		<tbody>
			@foreach($stations as $s)
				<tr>
					<th>{{ $s->name }}</th>
					@foreach($teams as $t)
						<?php $tmp = 0; ?>
						@foreach($rounds as $r)
							@if($r->team->id == $t->id && $r->station->id == $s->id)
								<td>{{$r->score}}</td><td>{{ $r->extra }}</td>
								<?php $tmp = 1; $t->sum += $r->score+$r->extra;?>
							@endif
						@endforeach
						@if($tmp == 0)
							<td></td><td></td>
						@endif
					@endforeach
				</tr>
			@endforeach
			<tr>
				<th>Sum:</th>
				@foreach($teams as $t)
					<td colspan="2">{{$t->sum}}</td>
				@endforeach
			</tr>
		</tbody>
	</table>
</section>
@endsection