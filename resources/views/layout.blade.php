<html dir="rtl">
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    @vite(['resources/js/app.js'])
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
<!-- Side navigation -->
<div class="sidenav">
  <a href="index" class="@yield('h-index')">الصفحة الرئيسية</a>
  <a href="leads" class="@yield('h-lead')">الزبائن المحتملين</a>
  <a href="offer" class="@yield('h-off')">عروض سعر</a>
  <a href="customers" class="@yield('h-cust')">الزبائن</a>
  <a href="projects" class="@yield('h-proj')">المشاريع الحالية</a>
</div>

<!-- Page content -->
<div class="main">
  <div class="header">
    <h2>اسم المستخدم</h2>
    <h2>تاريخ اليوم</h2>
</div>
  @yield('index')
  <section class="intro">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover mb-0">
                  @yield('thead')
                  @yield('tbody')
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
</div>
</div>
</body>
</html>