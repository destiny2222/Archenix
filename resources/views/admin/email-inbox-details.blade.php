@extends('layouts.master')
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Email Read</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Email Read</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Mail Read</h3>
                </div>
                <div class="card-body">
                    <div class="email-media">
                        <div class="mt-0 d-sm-flex">
                            <div class="media-body pt-0">
                                <div class="float-md-end d-flex flex-column fs-15">
                                    <small class="me-3 mt-3 text-muted">{{ $contact->created_at->format('d M Y')}}</small>
                                    <small class="mb-0">{{  $contact->subject  }} </small>
                                </div>
                                <div class="media-title text-dark font-weight-semibold mt-1">{{  $contact->name  }}</span></div>
                                <div class="media-title text-dark font-weight-semibold mt-1">{{  $contact->email  }}</div>
                                <small class="mb-0">{{  $contact->phone  }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="eamil-body mt-5">
                        <p>{{  $contact->message }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End  Row -->
@endsection