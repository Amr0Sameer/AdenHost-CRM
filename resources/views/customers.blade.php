<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@extends('layout')

@section('title','Customers')
@section('h-cust','active')

@section('index')
<div class="important">
    <div class="header-section">
        <h2>العملاء</h2>
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
        <th scope="col">تعديل</th>
        <th scope="col">حذف</th>
    </tr>
</thead>
@endsection
@section('tbody')
<tbody>
    @php
        $i=1
    @endphp
    @foreach ($Leads as $lead)
    <tr>
    <td>{{ $i++ }}</td>
    <td>{{ $lead['name'] }}</td>
    <td>{{ $lead['phone'] }}</td>
    <td>{{ $lead['email'] }}</td>
    <td>{{ $lead['project_type'] }}</td>
    <td><form id="leadform" action="javascript:void(0)">
        @csrf
        @method('GET')
        <button class="getlead" value="{{ $lead['id'] }}" type="button"><i class="fa-solid fa-pen-to-square"></i></button>
        </form>
    </td>
    <td><form action="{{ route('leads.destroy', $lead['id']) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit"><i class="fa-solid fa-circle-xmark"></i></button>
        </form>
    @endforeach
  </tbody>
@endsection
        
    </div>
    <div class="infos-content">
        
    </div>
</div>
<!-- Add Lead -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <dir class="alert alert-success d-none">تمت الاضافة بنجاح</dir>
          <h5 class="modal-title" id="staticBackdropLabel">اضافة زبون</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin: 0"></button>
        </div>
        <div class="modal-body">
            <form id="add" action="javascript:void(0)" class="form bg-white p-6 border-1">
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
            <button type="submit" id="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End Add Lead -->
  <!-- Update Lead -->
  <div class="modal fade" id="EditLead" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <dir class="alert alert-success d-none">تمت الاضافة بنجاح</dir>
          <h5 class="modal-title" id="staticBackdropLabel">تعديل بيانات زبون</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin: 0"></button>
        </div>
        <div class="modal-body">
            <form id="update" method="POST" class="form bg-white p-6 border-1">
            @csrf
            @method('PUT')
            <input type="hidden" id="update_id">
            <div class="mb-3">
                <label for="name" class="form-label">اسم العميل</label>
                <input type="text" class="form-control" id="update_name" name="update_name">
                @error('update_name')
                <div class="form-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">رقم الهاتف</label>
                <input type="text" class="form-control" id="update_phone" name="update_phone">
                @error('update_phone')
                <div class="form-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">البريد الالكتروني</label>
                <input type="email" class="form-control" id="update_email" name="update_email">
                @error('update_email')
                <div class="form-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="project_type" class="form-label">نوع العمل</label>
                <select name="update_project_type" id="update_project_type" class="form-control">
                    <option value="موقع">موقع</option>
                    <option value="استضافة">استضافة</option>
                </select>
                @error('update_project_type')
                <div class="form-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" id="update_btn">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End Update Lead -->
<script>
$(document).ready(function(){
    $('#submit').on('click', function(){;
        $.ajax({
            url: '{{ url('leads/store/') }}',
            type: 'POST',
            data: $('#add').serialize(),
            success: function (response) {
                alert(response);
            }
        });
    });
    $('.getlead').on('click', function(e){
        e.preventDefault();

        let lead = $(this).val();
        $('#EditLead').modal('show');
        $('#update').attr('action', "http://localhost:8080/adenhost-crm/public/leads/"+lead);
        $.ajax({
            type: "GET",
            url: "leads/show/"+lead,
            success: function (response) {
                if(response.status == 404){
                    
                }
                else{
                    $('#update_id').val(response.lead.id);
                    $('#update_name').val(response.lead.name);
                    $('#update_phone').val(response.lead.phone);
                    $('#update_email').val(response.lead.email);
                    $('#update_project_type').val(response.lead.project_type);
                    $('#update_offer_state').val(response.lead.offer_state);
                }
            }
        });
    });
});
</script>