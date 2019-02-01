{{-- Template for the PDF download --}}
<h4>{{$eventName}} : Liste des inscrits</h4>
<table style="width: 100%;" cellpadding=0 cellspacing=0>
	<thead>
		<tr>
			<th>#</th>
			<th>Prénom</th>
			<th>Nom</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($registerList as $row)
		<tr>
			<th>{{$row->user->id}}</th>
			<td>{{$row->user->firstname}}</td>
			<td>{{$row->user->lastname}}</td>
		</tr>
		@endforeach
	</tbody>
</table>