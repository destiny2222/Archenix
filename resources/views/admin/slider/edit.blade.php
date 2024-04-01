@extends('layouts.master')
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Slide</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)">
                        Add Edit Slide
                    </a>
                </li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END  contract-store-page-->

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <form action="{{  route('admin.slide.update',$slide->id) }}" method="post" enctype="multipart/form-data">
               @csrf
               @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Add Edit Slide</div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class=" form-label">Slide Title :</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ $slide->title }}" name="title" placeholder="Slide Title">
                            </div>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- <div class="row mb-4">
                            <div class="col-md-12">
                                <label class=" form-label">Slide Link :</label>
                                <input type="text" class="form-control @error('link') is-invalid @enderror" value="{{ $slide->link }}" name="link" placeholder="Slide Link">
                            </div>
                            @error('link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> --}}
                        <!-- Row -->
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label class=" form-label mb-4">Slide Description :</label>
                                <textarea  name="description"  class=" form-control">{{ $slide->description }}</textarea>
                            </div>
                        </div>
                        <!--End Row-->
    
                        <!--Row-->
                        <div class="row">
                            <div class="col-md-12">
                                <label class=" form-label mb-4">Slide Upload :</label>
                                <input  type="file" value="{{ $slide->image }}" name="image" class="@error('image') is-invalid @enderror form-control">
                            </div>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!--End Row-->
                    </div>
                    <div class="card-footer">
                        <!--Row-->
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-primary form-control" value="Update">
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