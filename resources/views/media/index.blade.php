@extends('layouts.front.dashboard')

@section('pageTitle')
    My media
@endsection

@section('styles')
   
@endsection

@section('breadcrumbList')
    <li class="active">My Media</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left my-panel-title">
                <i class="fa fa-list"></i> Media List
            </div>
            <div class="pull-right">
                <a href="{{ url('media/create') }}" class="btn btn-link btn-xs btn-create-media" id="btn-create-media" title="Create new media">
                    <i class="fa fa-plus-circle"></i> Add new
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            
            
            
        </div>
    </div>
@endsection


@section('scripts')

@endsection