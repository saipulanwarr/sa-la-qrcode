@extends('layouts.main')
@section('content')
    <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">
        <h3>{{ $product->nama }}</h3>
        <p>{{ $product->kd }}</p>
        <div class="mt-4">
            {!! QrCode::size(300)->generate($message) !!}
        </div>
    </div>
@endsection