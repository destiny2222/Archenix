@extends('layouts.master')
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">About Us</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item btn btn-primary">
                    <a href="javascript:void(0)" class="text-white">
                        {{  $title }}
                    </a>
                </li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{  $title }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{  route('admin.welcome.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                         <div class="card">
                             <div class="card-body">
                                 <div class="row mb-4">
                                     <div class="col-md-12">
                                         <label class=" form-label">Title :</label>
                                         <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ getWelcome() ? getWelcome()->title : '' }}" name="title" placeholder="Title">
                                     </div>
                                     @error('title')
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                 </div>
                                 <!-- Row -->
                                 <div class="row">
                                     <div class="col-md-12 mb-4">
                                         <label class=" form-label mb-4"> Description :</label>
                                         <textarea  name="description" cols="10" rows="10" class=" form-control">{{ getWelcome() ? getWelcome()->description : '' }}</textarea>
                                     </div>
                                 </div>
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
        </div>
    </div>
    <!-- End Row -->
@endsection

@push('script')
    <script>
        
    </script>
@endpush