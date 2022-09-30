@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div id="app" class="col-12">
            <App user="{{ Auth::user() }}" />
        </div>
    </div>
</div>
@endsection
