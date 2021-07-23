@extends('layout.master')

@section('title','Create Product')

@section('content')
 	<div class="container col-md-8 col-md-offset-2">
 		<div class="well">
 			{{-- **********Form Start********* --}}
 			<form method="POST" enctype="multipart/form-data">
 				@foreach($errors->all() as $error)
 					<p class="alert alert-danger">{{$error}}</p>
 				@endforeach

 				@if(session('status'))
 					<p class="alert alert-success">{{session('status')}}</p>
 				@endif
 				
 				<legend>Insert a New Product</legend>
 					{{csrf_field()}}
			  <div class="form-group">
			    <label for="title">Title</label>
			    <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
			    {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
			  </div>
			  <div class="form-group">
			    <label for="price">Price</label>
			    <input type="number" class="form-control" name="price" id="price" placeholder="Enter Price">
			  </div>
			  <div class="form-group">
			  	<label for="description">Description</label>
			  	<textarea class="form-control" name="description" id="description" rows="3"></textarea>
			  </div>
			  <div class="form-group">
			  	<label for="imageFile">File Input</label>
			  	<input type="file" name="file[]" id="imageFile" multiple>
			  </div>

			  {{-- <div class="form-group form-check">
			    <input type="checkbox" class="form-check-input" id="exampleCheck1">
			    <label class="form-check-label" for="exampleCheck1">Check me out</label>
			  </div> --}}
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>

 			{{-- **********Form End********* --}}
 			
 		</div>
 	</div>
@endsection


