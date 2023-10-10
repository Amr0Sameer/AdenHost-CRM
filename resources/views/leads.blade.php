@extends('layout')

@section('title','Home')
@section('h-lead','active')

@section('index')
<div class="important">
    <div class="header-section">
        <h2>العملاء المحتملين</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">اضافة عميل</button>
    </div>
    <div class="infos">
@endsection
@section('thead')
<thead>
    <tr>
        <th scope="col">الرقم</th>
        <th scope="col">اسم العيمل</th>
        <th scope="col">رقم الهاتف</th>
        <th scope="col">البريد الالكتروني</th>
        <th scope="col">نوع العمل</th>
        <th scope="col">حالة الطلب</th>
        <th scope="col">قبول</th>
        <th scope="col">حذف</th>
    </tr>
</thead>
@endsection
@section('tbody')
<tbody>
    @foreach ($Leads as $lead)
    <tr>
    <td>{{ $lead['id'] }}</td>
    <td>{{ $lead['name'] }}</td>
    <td>{{ $lead['phone'] }}</td>
    <td>{{ $lead['email'] }}</td>
    <td>{{ $lead['project_type'] }}</td>
    <td>{{ $lead['offer_state'] }}</td>
    <td><button><i class="fa-solid fa-circle-check"></i></button></td>
    <td><button><i class="fa-solid fa-circle-xmark"></i></button></td>
    </tr>
    @endforeach
  </tbody>
@endsection
        
    </div>
    <div class="infos-content">
        
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <dir class="alert alert-success d-none">تمت الاضافة بنجاح</dir>
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin: 0"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('leads.store') }}" method="POST" class="form bg-white p-6 border-1">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">اسم العميل</label>
                <input type="text" class="form-control" id="name" name="name">
                @error('name')
                <div class="form-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">رقم الهاتف</label>
                <input type="text" class="form-control" id="phone" name="phone">
                @error('phone')
                <div class="form-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">البريد الالكتروني</label>
                <input type="email" class="form-control" id="email" name="email">
                @error('email')
                <div class="form-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="project_type" class="form-label">نوع العمل</label>
                <select name="project_type" id="project_type" class="form-control">
                    <option value="موقع">موقع</option>
                    <option value="استضافة">استضافة</option>
                </select>
                @error('project_type')
                <div class="form-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="offer_state" class="form-label">نوع العمل</label>
                <select name="offer_state" id="offer_state" class="form-control">
                    <option value="قيد الانتظار">قيد الانتظار</option>
                    <option value="تم الارسال">تم الارسال</option>
                </select>
                @error('offer_state')
                <div class="form-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" id="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>