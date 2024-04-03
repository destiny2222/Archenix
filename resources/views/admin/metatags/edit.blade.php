@extends('layouts.master')
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">{{ $title }}</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)">
                        Add New {{ $title }}
                    </a>
                </li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END  contract-store-page-->

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <form action="{{  route('admin.metaTag.update', $metaTag->id) }}" method="post" enctype="multipart/form-data">
               @csrf
               @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Add New {{ $title }}</div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class=" form-label">MetaTag Name:</label>
                                <input type="text" value="{{  $metaTag->name }}" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="name">
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class=" form-label">Description:</label>
                                <input type="text" value="{{  $metaTag->content }}" class="form-control @error('content') is-invalid @enderror" name="content">
                            </div>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <!--Row-->
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-primary form-control" value="Upload">
                            </div>
                        </div>
                        <!--End Row-->
                    </div>
                </div>
            
            </form>
        </div>
    </div>
    <!-- End Row -->
@endsection