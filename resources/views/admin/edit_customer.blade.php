@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-md-8">
                @include('layouts.menu.customer')


                <div class="card">
                    <div class="card-header">{{ __('Edit Customer') }}</div>

                    <div class="card-body">
                        @include('layouts.alert')
                        <form method="POST" action="{{ route('customer_update', ['customer' => $customer->id]) }}"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            <div class="row mb-3">
                                <label for="customer_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="customer_name" type="text"
                                        class="form-control @error('customer_name') is-invalid @enderror"
                                        name="customer_name"
                                        value="{{ old('customer_name', $customer['customer_name']) }}" required
                                        autocomplete="customer_name" autofocus>

                                    @error('customer_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="customer_email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="customer_email" type="email"
                                        class="form-control @error('customer_email') is-invalid @enderror"
                                        name="customer_email"
                                        value="{{ old('customer_email', $customer['customer_email']) }}" required
                                        autocomplete="customer_email">

                                    @error('customer_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="customer_photo"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Photo') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control @error('customer_photo') is-invalid @enderror"
                                        name="customer_photo" type="file" id="formFile">
                                    @error('customer_photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone_number"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="number"
                                        class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                        value="{{ old('phone_number', $customer['phone_number']) }}" required
                                        autocomplete="phone_number">

                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="gender"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

                                <div class="col-md-6">
                                    <input id="gender" type="text"
                                        class="form-control @error('gender') is-invalid @enderror" name="gender"
                                        value="{{ old('gender', $customer['gender']) }}" required autocomplete="gender">

                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address', $customer['address']) }}" required
                                        autocomplete="address">

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="marital_status"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Marital Status') }}</label>

                                <div class="col-md-6">
                                    <input id="marital_status" type="text"
                                        class="form-control @error('marital_status') is-invalid @enderror"
                                        name="marital_status"
                                        value="{{ old('marital_status', $customer['marital_status']) }}" required
                                        autocomplete="address">

                                    @error('marital_status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="occupation"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Occupation') }}</label>

                                <div class="col-md-6">
                                    <input id="occupation" type="text"
                                        class="form-control @error('occupation') is-invalid @enderror" name="occupation"
                                        value="{{ old('occupation', $customer['occupation']) }}" required
                                        autocomplete="occupation">

                                    @error('occupation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="next_kin_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Next of Kin Name') }}</label>

                                <div class="col-md-6">
                                    <input id="next_kin_name" type="text"
                                        class="form-control @error('next_kin_name') is-invalid @enderror"
                                        name="next_kin_name"
                                        value="{{ old('next_kin_name', $customer['next_kin_name']) }}" required
                                        autocomplete="next_kin_name">

                                    @error('next_kin_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="next_kin_address"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Next of Kin Address') }}</label>

                                <div class="col-md-6">
                                    <input id="next_kin_address" type="text"
                                        class="form-control @error('next_kin_address') is-invalid @enderror"
                                        name="next_kin_address"
                                        value="{{ old('next_kin_address', $customer['next_kin_address']) }}" required
                                        autocomplete="next_kin_address">

                                    @error('next_kin_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="next_kin_phone_number"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Next of Kin Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="next_kin_phone_number" type="number"
                                        class="form-control @error('next_kin_phone_number') is-invalid @enderror"
                                        name="next_kin_phone_number"
                                        value="{{ old('next_kin_phone_number', $customer['next_kin_phone_number']) }}"
                                        required autocomplete="next_kin_phone_number">

                                    @error('next_kin_phone_number')
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
