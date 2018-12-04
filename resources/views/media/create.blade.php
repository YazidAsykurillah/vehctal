@extends('layouts.front.dashboard')

@section('pageTitle')
    Upload Media
@endsection

@section('styles')
   
@endsection

@section('breadcrumbList')
    <li><a href="{{ url('media') }}">Media</a></li>
    <li class="active">Upload</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left my-panel-title">
                <i class="fa fa-list"></i> Upload Media
            </div>
            <div class="pull-right">
                
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            {!! Form::open(['route'=>'media.store','role'=>'form','class'=>'form-horizontal','id'=>'form-add-media','files'=>true]) !!}
                {{ csrf_field() }}
                <div class="col-md-3">
                    <div class="form-group{{ $errors->has('media') ? ' has-error' : '' }}">
                        <label for="media" class="col-md-6 control-label">Media</label>
                        <div class="col-md-6">
                            {!! Form::file('media') !!}
                            @if ($errors->has('media'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('media') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary" id="btn-submit-media">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            {!! Form::close()!!}
            
            
        </div>
    </div>
@endsection


@section('scripts')

@endsection