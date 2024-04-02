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
            <form action="{{  route('admin.blog.update',$blog->id) }}" method="post" enctype="multipart/form-data">
               @csrf
               @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Add New {{ $title }}</div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class=" form-label">Blog Title:</label>
                                <input type="text" value="{{ $blog->title }}" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="">
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
                                    @foreach ($category as $categories)
                                     <option value="{{ $categories->id }}" {{ $categories->id == $blog->category_id ? 'selected' : ''}}>{{ $categories->title  }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Row -->
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label class=" form-label mb-4">Description :</label>
                                <textarea  name="content" rows="10" cols="10" class=" form-control">{{ $blog->content }}</textarea>
                            </div>
                        </div>
                        <!--End Row-->
    
                        <!--Row-->
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class=" form-label mb-4">Upload :</label>
                                <input  type="file" name="image" value="{{ $blog->image }}" class="@error('image') is-invalid @enderror form-control">
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
                                    <option value="1" {{  $blog->status == 1 ? 'selected' : ''  }}>Published</option>
                                    <option value="0" {{  $blog->status == 0 ? 'selected' : ''  }}>Hold</option>
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
        </div>
    </div>
    <!-- End Row -->
@endsection