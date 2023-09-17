<html dir="rtl">
<head>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    @vite(['resources/js/app.js'])
    <title>@yield('title')</title>
</head>
<body>
<!-- Side navigation -->
<div class="sidenav">
  <a href="index">الصفحة الرئيسية</a>
  <a href="customers">الزبائن</a>
  <a href="projects">المشاريع</a>
  <a href="finance">المالية</a>
</div>

<!-- Page content -->
<div class="main">
  <div class="header">
    <h2>اسم المستخدم</h2>
    <h2>تاريخ اليوم</h2>
</div>
  @yield('index')
</div>
</body>
</html>