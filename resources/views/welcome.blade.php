@extends('layouts.front.main')

@section('pageTitle')
    {{ config('app.name') }}
@endsection

@section('content')
<!-- about us -->
<section class="about-us">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 text-center">
                <h2>Hey, Welcome to W3 Eden</h2>
                <strong>A digital design agency</strong>
            </div>
        </div>    
        
        
        <!-- card -->
        <div class="row m-t-90">
            <div class="col-md-4 col-sm-6">
                <div class="caption-img">
                    <img class="img-responsive" src="images/blog-slider1.jpg" alt=""/>
                    <div class="caption-tag">
                        <h4>Sketching & Design</h4>
                        <span>From start to finish</span>
                    </div>
                </div>    
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="caption-img">
                    <img class="img-responsive" src="images/blog-slider2.jpg" alt=""/>
                    <div class="caption-tag">
                        <h4>Sketching & Design</h4>
                        <span>From start to finish</span>
                    </div>
                </div>    
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="caption-img">
                    <img class="img-responsive" src="images/blog-slider1.jpg" alt=""/>
                    <div class="caption-tag">
                        <h4>Sketching & Design</h4>
                        <span>From start to finish</span>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</section>



@endsection