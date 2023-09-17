<html dir="rtl">
<head>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    @vite(['resources/js/app.js'])
    <title>@yield('title')</title>
</head>
<body>
<!-- Side navigation -->
<div class="sidenav">
  <a href="/">الصفحة الرئيسية</a>
  <a href="customers">الزبائن</a>
  <a href="projects">المشاريع</a>
  <a href="finance">المالية</a>
  <a href="clients-accounts">حسابات المستخدمين</a>
</div>

<!-- Page content -->
<div class="main">
  @yield('index')
</div>
</body>
</html>