@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <admin-app user="{{ Auth::user() }}" />
        </div>
    </div>
</div>
@endsection