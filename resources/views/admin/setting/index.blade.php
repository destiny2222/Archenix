@extends('layouts.master')
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">{{  $title }}</h1>
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
                    <form action="{{  route('admin.setting.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                         <div class="card">
                             <div class="card-body">
                                 <!-- Row -->
                                 <div class="row">
                                     <div class="col-md-12 mb-4">
                                         <label class=" form-label mb-4">Analysis Tracking ID :</label>
                                         <textarea  name="analysis_trackingid"  class=" form-control">{{ $setting->analysis_trackingid ?? '' }}</textarea>
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