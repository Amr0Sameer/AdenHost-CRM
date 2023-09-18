@extends('layout')

@section('title','Offers')
@section('h-off','active')

@section('index')
<div class="important">
    <h2>المشاريع المحتملة</h2>
@endsection
@section('thead')
    <thead>
        <tr>
        <th scope="col">الرقم</th>
        <th scope="col">الاسم</th>
        <th scope="col">تاريخ التقديم</th>
        <th scope="col">عنوان المشروع</th>
        <th scope="col">المبلغ</th>
        </tr>
      </thead>
    @endsection
    @section('tbody')
    <tbody>
        @foreach ($customer as $cust)
        <tr>
        <td>{{ $cust['id'] }}</span>
        <td>{{ $cust['name'] }}</span>
        <td>{{ $cust['cust_name'] }}</span>
        <td>{{ $cust['type'] }}</span>
        <td>{{ $cust['price'] }}</span>
        <td>{{ $cust['added_date'] }}</span>
        </tr>
        @endforeach
      </tbody>
@endsection