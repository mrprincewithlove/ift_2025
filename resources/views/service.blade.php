@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} - {{ $service->name }}</div>

                <div class="card-body">

                    @include('admin.service.'.$service->form)

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
