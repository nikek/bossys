@layout('main')

@section('authbar')
	{{ HTML::link('logout', 'Logga ut') }}
@endsection

@section('content')
<section>
	<table>
		<thead>
			<tr>
				<th>Vq (extra)</th>
				@foreach($stations as $s)
				<th>{{ $s->name }}</th>
				@endforeach
				<th>Sum</th>
			</tr>
		</thead>
		<tbody>
			@foreach($teams as $t)
				<tr>
					<th>{{ $t->name }}</th>
					@foreach($stations as $s)
						<?php $tmp = 0; ?>
						@foreach($rounds as $r)
							@if($r->team->id == $t->id && $r->station->id == $s->id)
								<td>{{$r->score}}@if(!empty($r->extra))({{ $r->extra }})@endif</td>
								<?php $tmp = 1; $t->sum += $r->score+$r->extra;?>
							@endif
						@endforeach
						@if($tmp == 0)
							<td></td>
						@endif
					@endforeach
					<td>{{$t->sum}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</section>
@endsection