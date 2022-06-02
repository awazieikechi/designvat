@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-md-12">
                @include('layouts.menu.branch')


                <div class="card">
                    <div class="card-header">{{ __('Branch') }}</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-centered mb-0 rounded yajra-datatable">
                                <thead>
                                    <tr>

                                        <th>ID</th>
                                        <th>Branch Name</th>
                                        <th></th>
                                        @if (auth()->user()->role == 'admin')
                                            <th></th>
                                            <th></th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
