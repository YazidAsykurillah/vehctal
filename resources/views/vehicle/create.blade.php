@extends('layouts.front.dashboard')

@section('pageTitle')
    Add New Vehicle
@endsection

@section('styles')
	<style type="text/css">
	
	</style>
@endsection

@section('breadcrumbList')
    <li><a href="{{ url('vehicle') }}">My Vehicle</a></li>
    <li class="active">Add New</li>
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
                        <!--Non Primary Medias-->
                        <div class="form-group{{ $errors->has('non_primary_medias') ? ' has-error' : '' }}">
                            <label for="non_primary_medias" class="col-md-6 control-label">Non Primary Media</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="non_primary_medias[]" multiple />
                                @if ($errors->has('non_primary_medias'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('non_primary_medias') }}</strong>
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

                        <div class="form-group{{ $errors->has('brand_id') ? ' has-error' : '' }}">
                            <label for="brand_id" class="col-md-4 control-label">Brand</label>
                            <div class="col-md-6">
                                <select name="brand_id" id="brand_id" class="form-control"></select>
                                @if ($errors->has('brand_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('brand_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>
                            <div class="col-md-6">
                                <textarea name="description" id="description" class="form-control"></textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" id="btn-submit-vehicle">
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
    <script type="text/javascript">
        $('#btn-submit-vehicle').prop('disabled', false);
        
        $('#vehicle_type_id').select2({
            placeholder : 'Selct vehicle type',
            allowClear: true
        });
        $('#vehicle_type_id').on('select2:select', function (e) {
            $('#brand_id').val('').trigger('change');
        }).on('select2:unselect',function(e){
            $('#brand_id').val('').trigger('change');
        });


        var old_brand_id = "{{old('brand_id')}}";
        console.log(old_brand_id);
        $('#brand_id').val(old_brand_id).trigger('change');
        $('#brand_id').select2({
            placeholder: 'Select an item',
            ajax: {
              url: '/select2Brand',
              dataType: 'json',
              delay: 250,
              data: function (params) {
                   return {
                        q: params.term,
                        vehicle_type_id: $('#vehicle_type_id').val(),
                        page: params.page
                   };
               },
              processResults: function (data) {
                return {
                  results:  $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
              },
              cache: true
            }
        });

        //Submit form handling
        $('#form-add-vehicle').on('submit', function(){
            $('#btn-submit-vehicle').prop('disabled', true);
        });
    </script>
@endsection