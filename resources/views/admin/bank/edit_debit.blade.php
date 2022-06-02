@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-md-8">
                @include('layouts.menu.bank')

                <div class="card">
                    <div class="card-header">{{ __('Edit Depost') }}</div>

                    <div class="card-body">
                        @include('layouts.alert')
                        <form method="POST" action="{{ route('transaction_update', ['bank' => $bank->id]) }}">
                            {{ method_field('PATCH') }}
                            @csrf

                            <div class="row mb-3">
                                <label for="date"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Transaction Date') }}</label>

                                <div class="col-md-6">
                                    <input id="date" type="date" class="form-control @error('date') is-invalid @enderror"
                                        name="date" value="{{ old('date', $bank['date']) }}" required autocomplete="date"
                                        autofocus>

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
                                    class="col-md-4 col-form-label text-md-end">{{ __('Amount Debited') }}</label>

                                <div class="col-md-6">
                                    <input id="withrawals" type="number"
                                        class="form-control @error('withrawals') is-invalid @enderror" name="withrawals"
                                        value="{{ old('withrawals', $bank['withrawals']) }}" autocomplete="deposits"
                                        required>
                                    <p> Balance: <span id="balance" role="alert"><strong></strong></span></p>
                                    @error('withrawals')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">

                                <div class="col-md-6">
                                    <input id="transaction_type" type="hidden" class="form-control"
                                        name="transaction_type" value="{{ $bank['transaction_type'] }}">

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
