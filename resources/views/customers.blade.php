@extends('layout')

@section('title','Customers')
@section('h-cust','active')

@section('index')
<div class="important">
    <h2>معلومات العملاء</h2>
@endsection
@section('thead')
    <thead>
        <tr>
        <th scope="col">الرقم</th>
        <th scope="col">اسم المؤسسة</th>
        <th scope="col">اسم الزبون</th>
        <th scope="col">رقم الهاتف</th>
        <th scope="col">الموفع</th>
        <th scope="col">تاريخ الاضافة</th>
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
        <td>{{ $cust['phone'] }}</span>
        <td>{{ $cust['location'] }}</span>
        <td>{{ $cust['added_date'] }}</span>
        </tr>
        @endforeach
      </tbody>
@endsection