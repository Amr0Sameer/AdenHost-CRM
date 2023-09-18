<html dir="rtl">
<head>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    @vite(['resources/js/app.js'])
    <title>@yield('title')</title>
</head>
<body>
<!-- Side navigation -->
<div class="sidenav">
  <a href="index" class="@yield('h-index')">الصفحة الرئيسية</a>
  <a href="customers" class="@yield('h-cust')">الزبائن</a>
  <a href="projects" class="@yield('h-proj')">المشاريع</a>
  <a href="finance" class="@yield('h-fin')">المالية</a>
  <a href="offers" class="@yield('h-off')">العروض</a>
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