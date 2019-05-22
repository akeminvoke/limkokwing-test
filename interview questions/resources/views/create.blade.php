@extends('layout/layout')

@section('content')
@if($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<div align="right">
	<a href="{{ route('crud.index') }}" class="btn btn-default">Back</a>
</div>

	<div class="container">
		<div class="row justify-content-center">
			  <div class="col-lg-12 align-self-end">
		<form id="studentform" data-parsley-validate method="post" action="{{ route('crud.store') }}" enctype="multipart/form-data">
			{{ csrf_field() }}
		<div class="form-group col-4">

			<label for="exampleInputEmail1">Student Name</label>
			<input type="text" class="form-control" id="exampleInputEmail1" name="student_name" aria-describedby="emailHelp" placeholder="Enter your name"
				   data-parsley-required >

		</div>
		<div class="form-group col-4">
			<label for="exampleInputPassword1">Date of birth</label>
			<input type="date" class="form-control" name="date_of_birth" id="exampleInputPassword1" placeholder="Choose your birth date" data-parsley-required>
		</div>

		<div class="form-group col-4">
			<label for="exampleInputNationality">Nationality</label>
			<input type="text" class="form-control" name="nationality" id="exampleInputPassword1" placeholder="Enter your nationality" data-parsley-required>
		</div>

		<div class="form-group col-4">
			<label for="exampleInputPhoneNumber">Phone Number</label>
			<input type="text" class="form-control" name="phone" id="exampleInputPhoneNumber" placeholder="Enter your phone number"
				   data-parsley-required data-parsley-trigger="input" data-parsley-type="digits">
			<small id="emailHelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
		</div>

		<label class="form-group col-md-4 ">Select Profile Image</label>

		<div class="form-group col-4">
		<div class="col-md-4">
		<input class="" type="file" name="image" />
		</div>
		</div>
			<div class="form-group col-4 justify-content-end">
				<input type="submit" name="add" class="btn btn-primary input-lg" value="Add" />
			</div>
	</form>
	</div>
	</div>

<script>
    $('#exampleInputPhoneNumber').mask('00000000000');

</script>
@endsection



