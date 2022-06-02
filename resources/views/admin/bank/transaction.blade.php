@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-md-12">
                @include('layouts.menu.bank')


                <div class="card">
                    <div class="card-header">{{ __('Depost / Withdraw Information') }}</div>

                    <div class="card-body">
                        @include('layouts.alert')
                        <div class="table-responsive">
                            <table class="table table-centered mb-0 rounded yajra-datatable">
                                <thead>
                                    <tr>

                                        <th>Date</th>
                                        <th>Customer Name</th>
                                        <th>Transaction Type</th>
                                        <th>Deposits</th>
                                        <th>Withrawals</th>


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
