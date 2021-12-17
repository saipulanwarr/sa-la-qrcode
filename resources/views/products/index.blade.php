@extends('layouts.main')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Products</h1>
      </div>
      <div class="table-responsive col-lg-8">
        <a href="/products/create" class="btn btn-primary btn-sm mb-3">Create new product</a>

        @if(session()->has('success'))
          <div class="alert alert-success" role="alert">
            {{ session('success') }}
          </div>
        @endif

        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama</th>
              <th scope="col">Harga</th>
              <th scope="col">Stok</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach($products as $product)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $product->nama }}</td>
              <td>{{ $product->harga }}</td>
              <td>{{ $product->stok }}</td>
              <td>
                <a href="/products/{{ $product->id }}" class="btn btn-info btn-sm">Detail</a>
                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                <a href="#" class="btn btn-danger btn-sm">Delete</a>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>

    </main>

@endsection