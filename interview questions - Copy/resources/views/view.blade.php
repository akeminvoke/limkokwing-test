@extends('layout/layout')

@section('content')

<div class="jumbotron text-center">
	<div align="right">
		<a href="{{ route('crud.index') }}" class="btn btn-default">Back</a>
	</div>
	<br />
	<img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" />
	<h3>Student Name - {{ $data->student_name }} </h3>
	<h3>Phone number - {{ $data->phone }}</h3>
	<h3>Nationality - {{ $data->nationality }}</h3>
	<h3>Date of birth - {{ $data->date_of_birth }}</h3>
</div>
@endsection
