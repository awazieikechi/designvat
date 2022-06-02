@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-md-8">
                @include('layouts.menu.service')


                <div class="card">
                    <div class="card-header">{{ __('Edit Service') }}</div>

                    <div class="card-body">
                        @include('layouts.alert')
                        <form method="POST" action="{{ route('service_update', ['service' => $service->id]) }}"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            <div class="row mb-3">
                                <label for="service_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Service Name') }}</label>

                                <div class="col-md-6">
                                    <input id="service_name" type="text"
                                        class="form-control @error('service_name') is-invalid @enderror" name="service_name"
                                        value="{{ old('service_name', $service['service_name']) }}" required
                                        autocomplete="service_name" autofocus>

                                    @error('service_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="charge" class="col-md-4 col-form-label text-md-end">{{ __('Charge') }}</label>

                                <div class="col-md-6">
                                    <input id="charge" type="number"
                                        class="form-control @error('charge') is-invalid @enderror" name="charge"
                                        value="{{ old('charge', $service['charge']) }}" autocomplete="charge">

                                    @error('charge')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="percentage"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Percentage') }}</label>

                                <div class="col-md-6">
                                    <input id="percentage" type="number"
                                        class="form-control @error('percentage') is-invalid @enderror" name="percentage"
                                        value="{{ old('percentage', $service['percentage']) }}"
                                        autocomplete="percentage">

                                    @error('percentage')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
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
