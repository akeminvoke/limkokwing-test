@extends('layout/layout')

@section('content')
<div align="right">
	<a href="{{ route('crud.index') }}" class="btn btn-default">Back</a>
</div>
<br />
<div class="container">
	<div class="row justify-content-center" align="center">
		<div class="col-lg-12 align-self-end">


<form	method="post" action="{{ route('crud.update', $data->id) }}" enctype="multipart/form-data">

	@csrf
	@method('PATCH')

	<div class="form-group col-4">
        <div class="row justify-content-center" >
		<label for="exampleInputEmail1">Profile Image</label>
		</div>
		<img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" width="100" />

	</div>
	<div class="form-group col-4">

		<label for="exampleInputEmail1">Student Name</label>
		<input type="text" class="form-control" id="exampleInputEmail1" name="student_name" aria-describedby="emailHelp" placeholder="Enter your name" value="{{ $data->student_name }} "
			   data-parsley-required required >


	</div>
	<div class="form-group col-4">
		<label for="exampleInputPassword1">Date of birth</label>
		<input type="date" class="form-control" name="date_of_birth" id="exampleInputPassword1" placeholder="Choose your birth date" data-parsley-required value="{{ $data->date_of_birth}}">
	</div>

	<div class="form-group col-4">
		<label for="exampleInputNationality">Nationality</label>
		<input type="text" class="form-control" name="nationality" id="exampleInputPassword1" placeholder="Enter your nationality" data-parsley-required value="{{ $data->nationality}}">
	</div>

	<div class="form-group col-4">
		<label for="exampleInputPhoneNumber">Phone Number</label>
		<input type="text" class="form-control" name="phone" id="exampleInputPhoneNumber" placeholder="Enter your phone number" value="{{ $data->phone}}"
			   data-parsley-required data-parsley-trigger="input" data-parsley-type="digits">
		<small id="emailHelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
	</div>
	<div class="form-group">
		<label class="col-md-4 text-left">Select Profile Image</label>
		<div class="col-md-8">
			<input type="file" name="image"  data-parsley-required/>

			<input type="hidden" name="hidden_image" value="{{ $data->image }}" />
		</div>
	</div>
	<br /><br /><br />
	<div class="form-group text-center">
		<input type="submit" name="edit" class="btn btn-primary input-lg" value="Edit" />
	</div>
</form>
</div>

		</div>
	</div>
</div>

@endsection



