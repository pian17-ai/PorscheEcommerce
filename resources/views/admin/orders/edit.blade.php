@extends('layouts.admin')

@section('title', 'Edit Order')
@section('page-title', 'Edit Order')

@section('content')

@include('admin.orders.form', ['order' => $order])

@endsection
