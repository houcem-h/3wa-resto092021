@extends('layouts.app')

@section('content')
<div>
    <h2>3W Academy</h2>
    <ul class="list-group">
        @foreach ($categories as $category)
            <li class="list-group-item">{{  $category->Name }}</li>
        @endforeach
    </ul>
</div>
@endsection


