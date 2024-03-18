@extends('component.main')
@section('content')
<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
<h4>Selamat Datang {{session('username')}}</h4>
    
@endsection