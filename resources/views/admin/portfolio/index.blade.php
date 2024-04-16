@extends('layouts.master')
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">{{ $title }}</h1>
        <div>
            <ol class="breadcrumb">
                @if (count($portfolio) > 0)
                <!-- Handle the case where the count is less than zero -->
                @else
                    <li class="breadcrumb-item btn btn-primary">
                        <a href="{{ route('admin.portfolio.create') }}" class="text-white">
                            Add New {{ $title }}
                        </a>
                    </li>
                @endif
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered border text-nowrap mb-0" id="basic-edit">
                            <thead>
                                <tr>
                                    {{-- <th>S/N</th>
                                    <th>Image</th>
                                    <th>Title</th> --}}
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($portfolio as $portfolios)
                                <tr>
                                    {{-- <td>{{  $loop->index + 1 }}</td>
                                    <td>
                                        <img src="{{ asset('upload/portfolio/'.$portfolios->image) }}" width="50" height="50" alt="">
                                    </td>
                                    <td>{{  $portfolios->title }}</td> --}}
                                    <td>{{  $portfolios->description }}</td>
                                    <td name="bstable-actions">
                                        <div class="btn-list d-flex">
                                            <a href="{{ route('admin.portfolio.edit',$portfolios->id) }}" class="btn btn-sm btn-primary">
                                                <span class="fe fe-edit"> </span> Edit
                                            </a>
                                            <form  action="{{ route('admin.portfolio.delete',$portfolios->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button  type="submit"  class="btn  btn-sm btn-danger" onclick="return confirm('Are you sure?');">
                                                    <span class="fe fe-trash-2"> </span> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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