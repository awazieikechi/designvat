@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-md-12">
                @include('layouts.menu.customer')


                <div class="card">
                    <div class="card-header">{{ __('Add New Customer') }}</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-centered mb-0 rounded yajra-datatable">
                                <thead>
                                    <tr>

                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Photo</th>
                                        <th>Phone Number</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Marital Status</th>
                                        <th>Occupation</th>
                                        <th>Account Balance</th>
                                        <th>Other Transactions</th>
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
