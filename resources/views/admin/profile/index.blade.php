
@extends('layouts.master')
@section('content')
    

 <!-- PAGE-HEADER -->
 <div class="page-header">
    <h1 class="page-title">Edit Profile</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->


<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Edit Password</div>
            </div>
           <form action="{{ route('admin.change-password-update') }}" method="post">
             @csrf
             @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Current Password</label>
                        <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                            </a>
                            <input class="input100 form-control" name="current_password" type="password" placeholder="Current Password" autocomplete="current-password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">New Password</label>
                        <div class="wrap-input100 validate-input input-group" id="Password-toggle1">
                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                            </a>
                            <input class="input100 form-control" type="password" name="new_password" placeholder="New Password" autocomplete="new-password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Confirm Password</label>
                        <div class="wrap-input100 validate-input input-group" id="Password-toggle2">
                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                            </a>
                            <input class="input100 form-control" type="password" name="Confirm_password" placeholder="Confirm Password" autocomplete="new-password">
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <input type="submit" class="btn btn-primary" value="Update">
                </div>
           </form>
        </div>
    </div>
    <div class="col-xl-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Profile</h3>
            </div>
            <form action="{{ route('admin.profile-update', $admin->id) }}" method="post">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="exampleInputname">First Name</label>
                                <input type="text" name="name" value="{{ $admin->name }}" class="form-control" id="exampleInputname" placeholder="First Name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" value="{{ $admin->email }}" class="form-control" id="exampleInputEmail1" placeholder="Email address">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputnumber">Contact Number</label>
                        <input type="number" name="phone" value="{{ $admin->phone }}" class="form-control" id="exampleInputnumber" placeholder="Contact number">
                    </div>
                </div>
                <div class="card-footer text-end">
                    <input type="submit" class="btn btn-primary" value="Update">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ROW-1 CLOSED -->


@endsection