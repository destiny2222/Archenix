@extends('layouts.master')
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Slide</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)">
                        Add New Slide
                    </a>
                </li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END  contract-store-page-->

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <form action="{{  route('admin.slide.store') }}" method="post" enctype="multipart/form-data">
               @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Add New Slide</div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class=" form-label">Slide Title :</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Slide Title">
                            </div>
                        </div>
                        @error('title')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                        {{-- <div class="row mb-4">
                            <div class="col-md-12">
                                <label class=" form-label">Slide Link :</label>
                                <input type="text" class="form-control @error('link') is-invalid @enderror" name="link" placeholder="Slide Link">
                            </div>
                        </div> --}}
                        @error('link')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                        <!-- Row -->
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label class=" form-label mb-4">Slide Description :</label>
                                <textarea  name="description" id="body" class=" form-control @error('description') is-invalid @enderror"></textarea>
                            </div>
                        </div>
                        @error('description')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                        <!--End Row-->
    
                        <!--Row-->
                        <div class="row">
                            <div class="col-md-12">
                                <label class=" form-label mb-4">Slide Upload :</label>
                                <input  type="file" name="image" class="@error('image') is-invalid @enderror form-control">
                            </div>
                        </div>
                        @error('image')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                        <!--End Row-->
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