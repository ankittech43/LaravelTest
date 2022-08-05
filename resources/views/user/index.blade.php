@extends('layouts.admin')

@section('head')
    @parent
@endsection

@section('header')
    @parent
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h2 class="mb-0">Positions</h2>
                    <div class="d-flex justify-content-around">
                        <form action="{{ url('/admin/positions') }}" method="GET" id="filter-form">
                            <div class="d-flex justify-content-between">
                                <div class="input-group w-auto me-2">
                                    <input type="hidden" name="sort_field" value="{{ $filter->sort_field ?? '' }}">
                                    <input type="hidden" name="sort_method" value="{{ $filter->sort_method ?? '' }}">
                                    <input name="search" type="search" class="form-control" placeholder="Search" value="{{ $filter->search ?? '' }}">
                                    <span class="input-group-btn ms-2">
                                    <button class="btn btn-secondary show-loader" type="submit"><i class="fa fa-search"></i></button>
                                </span>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="bg-white rounded mt-4">
                    @if($user->count())
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>
                                    <button class="bg-transparent border-0 p-0 custom-button fw-bold show-loader" type="button" data-sort="name" data-method="{{ $filter->sort_method ?? '' }}" title="Sort by Name">
                                        Name

                                    </button>
                                </th>
                                <th>
                                    <button class="bg-transparent border-0 p-0 custom-button fw-bold show-loader" type="button" data-sort="is_active" data-method="{{ $filter->sort_method ?? '' }}" title="Sort by Status">
                                        Status

                                    </button>
                                </th>
                                <th>
                                    <button class="bg-transparent border-0 p-0 custom-button fw-bold show-loader" type="button" data-sort="created_at" data-method="{{ $filter->sort_method ?? '' }}" title="Sort by Created">
                                        Created

                                    </button>
                                </th>
                                <th>
                                    <button class="bg-transparent border-0 p-0 custom-button fw-bold show-loader" type="button" data-sort="updated_at" data-method="{{ $filter->sort_method ?? '' }}" title="Sort by Updated">
                                        Updated

                                        @endif
                                    </button>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user as $position)
                                <tr>
                                    <td>
                                        {{ $position->firstname }}
                                    </td>
                                    <td>
                                        {{ $position->lastname }}
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ ($position->is_active) ? 'success' : 'danger' }}">{{ ($position->is_active) ? 'Active' : 'Inactive' }}</span>
                                    </td>
                                        <td>
                                                <a href="{{ url('/admin/positions/'.$position->id.'/edit') }}" title="Edit" class="light-link"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="{{ url('/admin/positions/'.$position->id.'/delete') }}" title="Delete" class="light-link ms-2"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="mt-2 d-flex justify-content-between pt-2">
                            <small>Showing {{ count($user) }} of {{ $user->total() }} filtered records</small>
                            {{ $user->links() }}
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
@endsection

