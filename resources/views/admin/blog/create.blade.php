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
            @if (count($category) != null)
                <form action="{{  route('admin.blog.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Add New {{ $title }}</div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <label class=" form-label">Blog Title:</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="">
                                </div>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!--End Row-->
                            <div class="row">
                                <div class="form-group">
                                    <label class=" form-label mb-4">Category</label>
                                    <select class="form-control"   name="category_id">
                                        <option value="">Select</option>
                                        @foreach ($category as $categories)
                                        <option value="{{ $categories->id }}">{{ $categories->title  }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- Row -->
                            
                            <div class="row mb-4">
                                <div class="col-md-12 mb-4">
                                    <label class=" form-label mb-4">Description :</label>
                                    <textarea  name="content" rows="10" cols="10" class=" form-control"></textarea>
                                </div>
                            </div>
                            <!--End Row-->
        
                            <!--Row-->
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <label class=" form-label mb-4">Upload :</label>
                                    <input  type="file" name="image" class="@error('image') is-invalid @enderror form-control">
                                </div>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!--End Row-->
                            <div class="row">
                                <div class="form-group">
                                    <label class=" form-label mb-4">Published/Hold</label>
                                    <select class="form-control"   name="status">
                                        <option value="">Select</option>
                                        <option value="1">Published</option>
                                        <option value="0">Hold</option>
                                    </select>
                                </div>
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
                @else
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card m-50">
                            <div class="card-body">
                                <h3>There is no categories, must add category before you can upload post</h3>
                                <a class="btn btn-primary" href="{{ route('admin.category.home')  }}">
                                    Add Category
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif    
        </div>
    </div>
    <!-- End Row -->
@endsection