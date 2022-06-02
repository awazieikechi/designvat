@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-md-12">
                @include('layouts.menu.expense')


                <div class="card">
                    <div class="card-header">{{ __('Expenses Information') }}</div>

                    <div class="card-body">
                        @include('layouts.alert')
                        <div class="table-responsive">
                            <table class="table table-centered mb-0 rounded yajra-datatable">
                                <thead>
                                    <tr>

                                        <th>Date</th>
                                        <th>Expense Category</th>
                                        <th>Expense Detail</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Total Cost</th>

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
