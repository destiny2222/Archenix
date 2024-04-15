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
                    <form action="{{  route('admin.social.create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                         <div class="card">
                             <div class="card-body">
                                <!-- Row -->
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <label class=" form-label">Email Address :</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $social->email ?? '' }}" name="email" placeholder="Email Address">
                                    </div>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- Row -->
                                <!-- Row -->
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <label class=" form-label">Phone Number :</label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ $social->phone ?? '' }}" name="phone" placeholder="Phone Number">
                                    </div>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- Row -->
                                 <div class="row mb-4">
                                     <div class="col-md-12">
                                         <label class=" form-label">Facebook Link :</label>
                                         <input type="text" required class="form-control @error('facebook') is-invalid @enderror" value="{{ $social->facebook ?? '' }}" name="facebook" placeholder="Facebook Link">
                                     </div>
                                     @error('facebook')
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                 </div>
                                 <div class="row mb-4">
                                     <div class="col-md-12">
                                         <label class=" form-label">Instagram Link :</label>
                                         <input type="text" required class="form-control @error('instagram') is-invalid @enderror" value="{{ $social->instagram ?? '' }}" name="instagram" placeholder="Instagram Link">
                                     </div>
                                     @error('instagram')
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                 </div>
                                 <div class="row mb-4">
                                     <div class="col-md-12">
                                         <label class=" form-label">Twitter Link :</label>
                                         <input type="text" required class="form-control @error('twitter') is-invalid @enderror" value="{{ $social->twitter ?? '' }}" name="twitter" placeholder="Twitter Link">
                                     </div>
                                     @error('twitter')
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                 </div>
                                 <!-- Row -->
                                 <div class="row mb-4">
                                     <div class="col-md-12">
                                         <label class=" form-label">Linkedin Link :</label>
                                         <input type="text" required class="form-control @error('linkedin') is-invalid @enderror" value="{{ $social->linkedin ?? '' }}" name="linkedin" placeholder="Linkedin Link">
                                     </div>
                                     @error('linkedin')
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                 </div>
                                 <!-- Row -->
                                 <div class="row">
                                     <div class="col-md-12 mb-4">
                                         <label class=" form-label mb-4">Address :</label>
                                         <textarea  name="address"  class=" form-control">{{ $social->address ?? '' }}</textarea>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-md-12 mb-4">
                                         <label class=" form-label mb-4">Address 2(optional):</label>
                                         <textarea  name="address_2"  class=" form-control">{{ $social->address_2 ?? '' }}</textarea>
                                     </div>
                                 </div>
                                 
                                 <div class="row">
                                     <div class="col-md-12 mb-4">
                                         <label class=" form-label mb-4">Address 3(optional):</label>
                                         <textarea  name="address_3"  class=" form-control">{{ $social->address_3 ?? '' }}</textarea>
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