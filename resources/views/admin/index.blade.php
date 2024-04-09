
@extends('layouts.master')
@section('content')
    

 <!-- PAGE-HEADER -->
 <div class="page-header">
    <h1 class="page-title">Dashboard</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->
<!-- ROW-1 CLOSED -->
@include('admin.chart')
@endsection