@extends('layout.master')

@section('title','Test Project')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				{{-- *****************Start sidebar************** --}}
				@include('layout.sidebar')
				{{-- *****************End sidebar************** --}}
			</div>
			<div class="col-md-8">
				<h2>Content</h2><br>
				{{-- ***********post start********** --}}
				@foreach($products as $product)
				<div class="col-md-4">
					<div class="card" style="width: 23rem;">
					  <h4 style="text-align: center;">Price ${{$product->price}}</h4>
					  {{-- @foreach(unserialize($product->image) as $img)  --}}
					  {{-- unserialize(): Error at offset 0 of 22 bytes <= this error is when not insert image with serialize method in database  --}}
					  	{{-- {{$img}} --}}

					   <img src="{{asset('/uploads/'.unserialize($product->image)[0])}}" class="card-img-top" alt="beautiful image">
 
					  {{-- @endforeach --}}
					  <div class="card-body">
					    <h5 class="card-title burmese">{{$product->title}}</h5>
					    <p class="card-text">{{substr($product->description,0,100)}}</p>
					    <a href="#" class="btn btn-primary">View Detail</a>
					    <a href="{{url('product/'.$product->id.'/add_cart')}}" class="btn btn-default">Add to cart</a>
					    {{-- {{action('PageController@add_cart',$product->id)}} --}}
					  </div>
					</div>
				</div>
				@endforeach
				{{-- ***********post end********** --}}			
			</div>
		</div>
	</div>
@endsection


