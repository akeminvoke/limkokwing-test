@extends('layout/layout')

@section('content')
	<div class="row">
		<div align="left">
			<h1>Question 4</h1>

		</div>
	</div>
<div align="right">
	<a href="{{ route('crud.create') }}" class="btn btn-success btn-sm">Add</a>
</div>

<br />
@if ($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered table-striped">
	<tr>
		<th width="10%">Image</th>
		<th width="20%">Students Name</th>
		<th width="10%">Date of Birth</th>
		<th width="15%">Nationality</th>
		<th width="13%">contact number</th>
		<th width="35%">Action</th>
	</tr>
	@foreach($data as $row)
		<tr>
			<td><img src="{{ URL::to('/') }}/images/{{ $row->image }}" class="img-thumbnail" width="75" /></td>
			<td>{{ $row->student_name }}</td>
			<td>{{ $row->date_of_birth }}</td>
			<td>{{ $row->nationality}}</td>
			<td>{{ $row->phone}}</td>
			<td><form action="{{ route('crud.destroy', $row->id) }}" method="post">
					<a href="{{ route('crud.show', $row->id) }}" class="btn btn-primary">Show</a>
					<a href="{{ route('crud.edit', $row->id) }}" class="btn btn-warning">Edit</a>
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger">Delete</button>
				</form></td>
		</tr>

@endforeach</table>
{!! $data->links() !!}
@endsection