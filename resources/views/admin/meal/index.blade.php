@extends('layouts.admin.app')

@section('admin-content')
  <h2>Managing Meals</h2>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Stock quantity</th>
          <th>Sale price</th>
          <th>Options</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($meals as $meal)
            <tr>
                <th>{{ $meal->id }}</th>
                <td>{{ $meal->name }}</td>
                <td>{{ $meal->stock_quantity }}</td>
                <td>{{ $meal->sale_price }}</td>
                <td>
                    <button class="btn btn-info">Show</button>
                    <button class="btn btn-warning">Edit</button>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr>
          @endforeach
      </tbody>
    </table>
  </div>
  <div class="float-right">
      {{  $meals->links() }}
  </div>
@endsection
