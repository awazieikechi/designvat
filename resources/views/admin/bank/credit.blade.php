@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-md-8">
                @include('layouts.menu.bank')


                <div class="card">
                    <div class="card-header">{{ __('Depost') }}</div>

                    <div class="card-body">
                        @include('layouts.alert')
                        <form method="POST" action="{{ route('bank_store') }}">
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
                                <label for="service_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Customer Name') }}</label>

                                <div class="col-md-6">
                                    <select class="form-select" id="customer_id" name="customer_id" required>
                                        <option value="option_select" disabled selected>Select Customer</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">
                                                {{ $customer->customer_first_name . ' ' . $customer->customer_middle_name . ' ' . $customer->customer_surname }}
                                            </option>
                                        @endforeach
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
                                    <input id="deposits" type="number"
                                        class="form-control @error('deposits') is-invalid @enderror" name="deposits"
                                        value="{{ old('deposits') }}" autocomplete="deposits" required>

                                    @error('deposits')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">

                                <div class="col-md-6">
                                    <input id="transaction_type" type="hidden" class="form-control"
                                        name="transaction_type" value="Credit">


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
