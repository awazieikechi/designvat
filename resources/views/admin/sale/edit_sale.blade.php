@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-md-8">
                @include('layouts.menu.sale')

                <div class="card">
                    <div class="card-header">{{ __('Add Sales Description') }}</div>

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
                                <label for="service_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Customer Name') }}</label>

                                <div class="col-md-6">
                                    <select class="form-select" id="customer_id" name="customer_id" required>
                                        <option value="option_select" disabled selected>Select Customer</option>
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
                                    class="col-md-4 col-form-label text-md-end">{{ __('Income Type') }}</label>

                                <div class="col-md-6">
                                    <select class="form-select" id="service_id" name="service_id" required>
                                        <option value="{{ $service['id'] }}" selected>
                                            {{ $service->service_name }}
                                        </option>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('service_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="total_price"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Total Price') }}</label>

                                <div class="col-md-6">
                                    <input id="total_price" type="number" class="form-control" name="" value="" readonly>


                                </div>
                            </div>

                            <div class="row mb-3">

                                <div class="col-md-6">
                                    <input id="type" type="hidden" class="form-control" name="type" value="Credit Sales">


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
