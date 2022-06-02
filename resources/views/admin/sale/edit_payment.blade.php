@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-md-8">
                @include('layouts.menu.sale')


                <div class="card">
                    <div class="card-header">{{ __('Edit Payment') }}</div>

                    <div class="card-body">
                        @include('layouts.alert')
                        <form method="POST" action="{{ route('sale_update', ['sales' => $sales->id]) }}">
                            {{ method_field('PATCH') }}
                            @csrf

                            <div class="row mb-3">
                                <label for="date"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Transaction Date') }}</label>

                                <div class="col-md-6">
                                    <input id="date" type="date" class="form-control @error('date') is-invalid @enderror"
                                        name="date" value="{{ old('date', $sales['date']) }}" required autocomplete="date"
                                        autofocus>

                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="customer_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Customer Name') }}</label>

                                <div class="col-md-6">
                                    <select class="form-select" id="customer_id" name="customer_id" required>
                                        <option value="{{ $customer['id'] }}" selected>
                                            {{ $customer['customer_first_name'] .' ' .$customer['customer_middle_name'] .' ' .$customer['customer_surname'] }}
                                        </option>
                                    </select>

                                    @error('customer_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="charge"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Amount Credited') }}</label>

                                <div class="col-md-6">
                                    <input id="revenue_amount" type="number"
                                        class="form-control @error('revenue_amount') is-invalid @enderror"
                                        name="revenue_amount"
                                        value="{{ old('revenue_amount', $sales['revenue_amount']) }}"
                                        autocomplete="revenue_amount">
                                    <p> Balance: <span id="balance" role="alert"><strong></strong></span></p>
                                    @error('revenue_amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">

                                <div class="col-md-6">
                                    <input id="type" type="hidden" class="form-control" name="type" value="Payment">

                                </div>
                                <div class="col-md-6">
                                    <input id="type" type="hidden" class="form-control" name="service_id" value="0">

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
