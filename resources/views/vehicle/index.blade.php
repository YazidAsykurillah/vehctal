@extends('layouts.front.dashboard')

@section('pageTitle')
    My Vehicle
@endsection

@section('styles')
	<style type="text/css">
		.vehicle-information{
			margin-bottom: 10px;
		}
		.vehicle-action{
			text-align: center;
			background: #F1F3FA;
			font-weight: bold;
		}
		.btn-create-vehicle{
			/*border-radius: 30;*/
			
		}
	</style>
@endsection

@section('breadcrumbList')
    <li class="active">My Vehicle</li>
@endsection

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="pull-left my-panel-title">
				<i class="fa fa-list"></i> Vehicle List
			</div>
			<div class="pull-right">
				<a href="{{ url('vehicle/create') }}" class="btn btn-link btn-xs btn-create-vehicle" id="btn-create-vehicle" title="Create new vehicle">
					<i class="fa fa-plus-circle"></i> Add new
				</a>
			</div>
			<div class="clearfix"></div>
	  	</div>
	  	<div class="panel-body">
	    	
    		@if($vehicles->count() > 0 )
    		<?php $countedColumns = 1;?>
    		<div class="row">
	    		@foreach($vehicles as $vehicle)
				<div class="col-sm-6 col-md-3">
			    	<div class="thumbnail">
			    		@if($vehicle->primary_media->count() > 0)
			    			<?php $primary_media_path=$vehicle->primary_media->first()->path;?>
			    			<img src="{{url('storage/'.$primary_media_path) }}" alt="{{url('storage/'.$primary_media_path) }}" >
			    		@else
			      			<img src="{{ url('images/no-image.jpg') }}" alt="...">
			      		@endif
			      		<div class="caption">
			        		<h4>
			        			<a href="{{ url('vehicle/'.$vehicle->id.'')}}">
			        				{{ $vehicle->brand->name }}
			        			</a>
			        		</h4>
			        		<div class="vehicle-information">
			        			<p>Tipe : {{$vehicle->vehicle_type->name}}</p>
			        			{{ str_limit($vehicle->description, 20, ' ...') }}
			        		</div>
			        		<div class="vehicle-action">
			        			<a href="#" class="btn btn-link btn-xs btn-edit" data-vehicle-id="{{$vehicle->id}}">
			        				<i class="fa fa-edit"></i>
			        			</a>
			        			<a href="#" class="btn btn-link btn-xs btn-delete" data-vehicle-id="{{$vehicle->id}}">
			        				<i class="fa fa-trash"></i>
			        			</a>
			        		</div>
			        		{{ $countedColumns}}
			      		</div>
			    	</div>
			  	</div>
			  	<?php $countedColumns++;?>
			  	@endforeach
			</div>
		  	@endif
			
	  	</div>
	</div>
@endsection


@section('scripts')

@endsection