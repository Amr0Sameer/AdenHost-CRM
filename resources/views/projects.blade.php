@extends('layout')

@section('title','Projects')
@section('h-proj','active')

@section('index')
<div class="important">
    <h2>المشاريع الحالية</h2>
    <div class="infos">
@endsection
@section('thead')
<thead>
    <tr>
        <th scope="col">الرقم</th>
        <th scope="col">اسم المؤسسة</th>
        <th scope="col">نوع العمل</th>
        <th scope="col">تاريخ البداية</th>
        <th scope="col">تاريخ االانتهاء</th>
        <th scope="col">العاملين</th>
        <th scope="col">التقدم</th>
        <th scope="col">الحالة</th>
    </tr>
</thead>
@endsection
@section('tbody')
<tbody>
    @foreach ($project as $proj)
    <tr>
    <td>{{ $proj['id'] }}</td>
    <td>{{ $proj['project_name'] }}</td>
    <td>{{ $proj['company_name'] }}</td>
    <td>{{ $proj['start_date'] }}</td>
    <td>{{ $proj['end_date'] }}</td>
    <td>{{ $proj['workers'] }}</td>
    <td>{{ $proj->progress->name }}</td>
    <td>{{ $proj->stat->name }}</td>
    </tr>
    @endforeach
  </tbody>
@endsection
        
    </div>
    <div class="infos-content">
        
    </div>
</div>