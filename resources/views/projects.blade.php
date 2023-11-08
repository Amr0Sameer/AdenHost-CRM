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
        <th scope="col">اسم العميل</th>
        <th scope="col">نوع العمل</th>
        <th scope="col">تاريخ البداية</th>
        <th scope="col">تاريخ االانتهاء</th>
        <th scope="col">حذف</th>
    </tr>
</thead>
@endsection
@section('tbody')
<tbody>
    @php
        $i=1
    @endphp
    @foreach ($project as $proj)
    <tr>
    <td>{{ $i++ }}</td>
    <td>
        <form action="{{ route('projects.show', $proj['offer_id']) }}" method="GET">
            @csrf
            <button type="submit">{{ $proj['company_name'] }}</button>
        </form>
    </td>
    <td>{{ $proj['project_name'] }}</td>
    <td>{{ $proj['start_date'] }}</td>
    <td>{{ $proj['end_date'] }}</td>
    <td><form action="{{ route('projects.destroy', $proj['id']) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit"><i class="fa-solid fa-circle-xmark"></i></button>
        </form></td>
    </tr>
    @endforeach
  </tbody>
@endsection
        
    </div>
    <div class="infos-content">
        
    </div>
</div>