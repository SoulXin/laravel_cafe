@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12 mt-3" id="container_render"> <!-- Container -->
            <div class="card">
                <div class="card-header" id="render_header">{{ __('Dashboard') }}</div> <!-- Header Container -->
                
   

                <div class="card-body col-lg-12" id = "render_body"></div> <!-- bagian yang akan mereturn hasil render -->
            </div>
        </div>
    </div>
</div>
@endsection
