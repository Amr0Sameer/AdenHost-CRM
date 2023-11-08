<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@extends('layout')

@section('title','offers')
@section('h-off','active')

@section('index')
<div class="important">
    <div class="header-section">
        <h2>عروض السعر</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">اضافة عرض</button>
    </div>
    <div class="infos">
@endsection
@section('thead')
<thead>
    <tr>
        <th scope="col">الرقم</th>
        <th scope="col">اسم العميل</th>
        <th scope="col">مساحة الموقع</th>
        <th scope="col">لغة الموقع</th>
        <th scope="col">برمجة الموقع</th>
        <th scope="col">السعر</th>
        <th scope="col">المدة</th>
        <th scope="col">الخصم</th>
        <th scope="col">تعديل</th>
        <th scope="col">حذف</th>
        <th scope="col">الموافقة</th>
    </tr>
</thead>
@endsection
@section('tbody')
<tbody>
    @php
        $i=1
    @endphp
    @foreach ($Offers as $offer)
    <tr>
    <td>{{ $i++ }}</td>
    <td>{{ $offer->Leads->name }}</td>
    <td>{{ $offer['size'] . 'GB ' }}</td>
    <td>{{ $offer['language'] }}</td>
    <td>{{ $offer['programming'] }}</td>
    <td>{{ $offer['price'] . '$' }}</td>
    <td>{{ $offer['time'] }}</td>
    <td>{{ $offer['discount'] }}</td>
    <td><form class="offerform" action="javascript:void(0)">
        @csrf
        @method('GET')
        <button class="getoffer" value="{{ $offer['id'] }}" type="button"><i class="fa-solid fa-pen-to-square"></i></button>
        </form>
    </td>
    <td><form action="{{ route('offer.destroy', $offer['id']) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit"><i class="fa-solid fa-circle-xmark"></i></button>
        </form>
    </td>
    <td><form id="acceptOffer" action="{{ route('offer.edit', $offer['id']) }}" method="GET">
        @csrf
        <button type="submit"><i class="fa-solid fa-check"></i></button>
        </form>
    </td>
    @endforeach
  </tbody>
@endsection
       
</div>
<div class="infos-content">
    
</div>
</div>
<!-- Add Offer -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <dir class="alert alert-success d-none">تمت الاضافة بنجاح</dir>
          <h5 class="modal-title" id="staticBackdropLabel">اضافة عرض سعر</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin: 0"></button>
        </div>
        <div class="modal-body">
            <form id="offer" action="javascript:void(0)" class="form bg-white p-6 border-1">
            @csrf
            <div class="mb-3">
                <label for="lead_name" class="form-label">اسم العميل</label>
                <select name="lead_name" class="form-control">
                        <option value="#" selected disabled>---</option>
                    @foreach ($Leads as $lead)
                        <option value="{{ $lead['id'] }}">{{ $lead['name'] }}</option>
                    @endforeach
                </select>
                @error('lead_name')
                <div class="form-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="size" class="form-label">مساحة الموقع</label>
                <select name="size" class="form-control">
                    <option value="5">5 جيجا</option>
                    <option value="10">10 جيجا</option>
                    <option value="20">20 جيجا</option>
                </select>
                @error('size')
                <div class="form-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="language" class="form-label">لغة الموقع</label>
                <select name="language" class="form-control">
                    <option value="عربي">عربي</option>
                    <option value="انجليزي">انجليزي</option>
                    <option value="لغتين">لغتين</option>
                </select>
                @error('language')
                <div class="form-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="programming" class="form-label">نوع البرمجة</label>
                <select name="programming" class="form-control">
                    <option value="قالب">قالب</option>
                    <option value="خاصة">خاصة</option>
                </select>
                @error('project_type')
                <div class="form-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">السعر</label>
                <input type="number" name="price" class="form-control">
                @error('price')
                <div class="form-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="time" class="form-label">المدة</label>
                <select name="time" class="form-control">
                    <option value="اسبوع">اسبوع</option>
                    <option value="اسبوعين">اسبوعين</option>
                    <option value="ثلاثة اسابيع">ثلاثة اسابيع</option>
                    <option value="شهر">شهر</option>
                    <option value="شهرين">شهرين</option>
                    <option value="ثلاثة اشهر">ثلاثة اشهر</option>
                </select>
                @error('time')
                <div class="form-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="discount" class="form-label">الخصم</label>
                <input type="number" name="discount" class="form-control" value="0">
                @error('discount')
                <div class="form-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button id="offer_btn" type="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End Add Offer -->
  <!-- Update Offer -->
<div class="modal fade" id="EditOffer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <dir class="alert alert-success d-none">تمت الاضافة بنجاح</dir>
          <h5 class="modal-title" id="staticBackdropLabel">اضافة عرض سعر</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin: 0"></button>
        </div>
        <div class="modal-body">
            <form id="update" method="POST" class="form bg-white p-6 border-1">
            @csrf
            @method('PUT')
            <input type="hidden" id="update_id">
            <div class="mb-3">
                <label for="lead_name" class="form-label">اسم العميل</label>
                <select id="lead_name" name="lead_name" class="form-control">
                        <option value="#" selected disabled>---</option>
                    @foreach ($Leads as $lead)
                        <option value="{{ $lead['id'] }}">{{ $lead['name'] }}</option>
                    @endforeach
                </select>
                @error('lead_name')
                <div class="form-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="size" class="form-label">مساحة الموقع</label>
                <select id="size" name="size" class="form-control">
                    <option value="5">5 جيجا</option>
                    <option value="10">10 جيجا</option>
                    <option value="20">20 جيجا</option>
                </select>
                @error('size')
                <div class="form-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="language" class="form-label">لغة الموقع</label>
                <select id="language" name="language" class="form-control">
                    <option value="عربي">عربي</option>
                    <option value="انجليزي">انجليزي</option>
                    <option value="لغتين">لغتين</option>
                </select>
                @error('language')
                <div class="form-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="programming" class="form-label">نوع البرمجة</label>
                <select id="programming" name="programming" class="form-control">
                    <option value="قالب">قالب</option>
                    <option value="خاصة">خاصة</option>
                </select>
                @error('project_type')
                <div class="form-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">السعر</label>
                <input id="price" type="number" name="price" class="form-control">
                @error('price')
                <div class="form-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="time" class="form-label">المدة</label>
                <select id="time" name="time" class="form-control">
                    <option value="اسبوع">اسبوع</option>
                    <option value="اسبوعين">اسبوعين</option>
                    <option value="ثلاثة اسابيع">ثلاثة اسابيع</option>
                    <option value="شهر">شهر</option>
                    <option value="شهرين">شهرين</option>
                    <option value="ثلاثة اشهر">ثلاثة اشهر</option>
                </select>
                @error('time')
                <div class="form-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="discount" class="form-label">الخصم</label>
                <input id="discount" type="number" name="discount" class="form-control">
                @error('discount')
                <div class="form-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button id="update_btn" type="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End Update Offer -->
  <script>
$(document).ready(function(){
    $('#offer_btn').on('click', function(e){
    $.ajax({
        url: 'http://localhost:8080/adenhost-crm/public/offer/store',
        type: 'POST',
        data: $('#offer').serialize(),
        success: function (response) {
            alert(response);
        }
    });
    });
    $('.getoffer').on('click', function(e){
        e.preventDefault();

        let offer = $(this).val();
        $('#EditOffer').modal('show');
        $('#update').attr('action', "http://localhost:8080/adenhost-crm/public/offer/"+offer);
        $.ajax({
            type: "GET",
            url: "offer/show/"+offer,
            success: function (response) {
                if(response.status == 404){
                    
                }
                else{
                    $('#updated_id').val(response.offer.id);
                    $('#lead_name').val(response.offer.lead_name);
                    $('#size').val(response.offer.size);
                    $('#language').val(response.offer.language);
                    $('#programmin').val(response.offer.programmin);
                    $('#price').val(response.offer.price);
                    $('#time').val(response.offer.time);
                    $('#discount').val(response.offer.discount);
                }
            }
        });
    });
});
</script>