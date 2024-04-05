@extends('layouts.master')
@section('content')
    
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Mail Inbox</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mail Inbox</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body p-6">
                    <div class="inbox-body">
                        <div class="table-responsive">
                            <table class="table table-inbox table-hover text-nowrap mb-0">
                                <tbody>
                                    @forelse ($contact as $item)
                                        <tr>
                                            <td class="inbox-small-cells">
                                                <a href="{{ route('admin.inbox.details',$item->id) }}" class="">
                                                    <span class="btn btn-primary btn-sm">View</span>
                                                </a>
                                            </td>
                                            <td class="view-message dont-show fw-semibold clickable-row" data-href='{{ route('admin.inbox.details',$item->id) }}'>{{ $item->name }}</td>
                                            <td class="view-message clickable-row" data-href='{{ route('admin.inbox.details',$item->id) }}'>{{ $item->email }}</td>
                                            <td class="view-message clickable-row" data-href='{{ route('admin.inbox.details',$item->id) }}'>{{ $item->subject }}</td>
                                            <td class="view-message clickable-row" data-href='{{ route('admin.inbox.details',$item->id) }}'>{{ $item->phone }}</td>
                                            <td class="view-message clickable-row" data-href='{{ route('admin.inbox.details',$item->id) }}'>{{ $item->message }}</td>
                                            <td class="view-message text-end fw-semibold clickable-row" data-href='{{ route('admin.inbox.details',$item->id) }}'>{{ $item->created_at->format('d M Y')}}</td>
                                            
                                            <td class="inbox-small-cells">
                                                {{-- <a id="delete" href="{{ route('admin.inbox.details',$item->id) }}" class="">
                                                    <span class="btn btn-primary btn-sm">Delete</span>
                                                </a> --}}
                                                <form action="{{ route('admin.inbox.delete',$item->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-primary btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        No Message Available
                                    @endforelse
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <ul class="pagination mb-4">
                <li class="page-item page-prev disabled">
                    <a class="page-link" href="javascript:void(0)" tabindex="-1">Prev</a>
                </li>
                <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0)">5</a></li>
                <li class="page-item page-next">
                    <a class="page-link" href="javascript:void(0)">Next</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- ROW-1 CLOSED -->
@endsection