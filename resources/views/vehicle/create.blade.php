@extends('layouts.front.dashboard')

@section('pageTitle')
    Add New Vehicle
@endsection

@section('styles')
	<style type="text/css">
	
	</style>
@endsection

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"> Add New Vehicle</h3>
	  	</div>
	  	<div class="panel-body">
	    	<div class="row">
	    		{!! Form::open(['route'=>'vehicle.store','role'=>'form','class'=>'form-horizontal','id'=>'form-add-vehicle','files'=>true]) !!}
		    		{{ csrf_field() }}
		    		<div class="col-md-3">
		    			<div class="form-group{{ $errors->has('primary_media') ? ' has-error' : '' }}">
                            <label for="primary_media" class="col-md-6 control-label">Primary Media</label>
                            <div class="col-md-6">
                                {!! Form::file('primary_media') !!}
                                @if ($errors->has('primary_media'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('primary_media') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
		    		</div>
		    		<div class="col-md-9">
                        <div class="form-group{{ $errors->has('vehicle_type_id') ? ' has-error' : '' }}">
                            <label for="vehicle_type_id" class="col-md-4 control-label">Vehicle Type</label>
                            <div class="col-md-6">
                                {{ Form::select('vehicle_type_id', $vehicle_type_opts, null, ['class'=>'form-control', 'placeholder'=>'Select a type', 'id'=>'vehicle_type_id']) }}
                                @if ($errors->has('vehicle_type_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vehicle_type_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
		    		</div>
		    	{!! Form::close() !!}
	    	</div>
	  	</div>
	</div>
@endsection


@section('scripts')

@endsection