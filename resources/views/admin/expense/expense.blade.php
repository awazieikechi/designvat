@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-md-8">
                @include('layouts.menu.expense')

                <div class="card">
                    <div class="card-header">{{ __('Add Expenses') }}</div>

                    <div class="card-body">
                        @include('layouts.alert')
                        <form method="POST" action="{{ route('expense_store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="date"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Transaction Date') }}</label>

                                <div class="col-md-6">
                                    <input id="date" type="date" class="form-control @error('date') is-invalid @enderror"
                                        name="date" value="{{ old('date') }}" required autocomplete="date" autofocus>

                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="expense_category"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Expense Category') }}</label>

                                <div class="col-md-6">
                                    <select class="form-select" id="expense_category" name="expense_category" required>
                                        <option value="option_select" disabled selected>Select Expense Category</option>

                                        <option value="Advertising | Marketing"> Advertising | Marketing </option>
                                        <option value="Office Expenses"> Office Expenses </option>
                                        <option value="Rent"> Rent </option>
                                        <option value="Salaries"> Salaries </option>
                                        <option value="Transportation | Auto"> Transportation | Auto </option>
                                        <option value="Utilities"> Utilities </option>
                                        <option value="Phone Credit"> Phone Credit </option>
                                        <option value="Others"> Others </option>
                                    </select>

                                    @error('expense_category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="expense_detail"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Expense Detail') }}</label>

                                <div class="col-md-6">
                                    <input id="expense_detail" type="text"
                                        class="form-control @error('expense_detail') is-invalid @enderror"
                                        name="expense_detail" value="{{ old('expense_detail') }}" required
                                        autocomplete="expense_detail">

                                    @error('expense_detail')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="quantity"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Quantity') }}</label>

                                <div class="col-md-6">
                                    <input id="quantity" type="number"
                                        class="form-control @error('quantity') is-invalid @enderror" name="quantity"
                                        value="{{ old('quantity') }}" autocomplete="quantity" required>

                                    @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="unit_price"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Unit Price') }}</label>

                                <div class="col-md-6">
                                    <input id="unit_price" type="number"
                                        class="form-control @error('unit_price') is-invalid @enderror" name="unit_price"
                                        value="{{ old('unit_price') }}" autocomplete="unit_price" required>

                                    @error('unit_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label for="total_cost"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Total Cost') }}</label>

                                <div class="col-md-6">
                                    <input id="total_cost" type="number"
                                        class="form-control  @error('total_cost') is-invalid @enderror" name="total_cost"
                                        value="{{ old('total_cost') }}" readonly>

                                    @error('total_cost')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
