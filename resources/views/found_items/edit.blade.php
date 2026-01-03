@extends('layouts.app')

@section('content')
    @include('found_items.create', ['item' => $item])
@endsection
