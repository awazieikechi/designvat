@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-md-8">
                @include('layouts.menu.customer')


                <div class="card">
                    <div class="card-header">{{ __('Add New Customer') }}</div>

                    <div class="card-body">
                        @include('layouts.alert')
                        <form method="POST" action="{{ route('customer_store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="customer_first_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input id="customer_first_name" type="text"
                                        class="form-control @error('customer_first_name') is-invalid @enderror"
                                        name="customer_first_name" value="{{ old('customer_first_name') }}" required
                                        autocomplete="customer_first_name" autofocus>

                                    @error('customer_first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="customer_middle_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Middle Name') }}</label>

                                <div class="col-md-6">
                                    <input id="customer_middle_name" type="text"
                                        class="form-control @error('customer_middle_name') is-invalid @enderror"
                                        name="customer_middle_name" value="{{ old('customer_middle_name') }}" required
                                        autocomplete="customer_middle_name" autofocus>

                                    @error('customer_middle_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="customer_surname"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Surname') }}</label>

                                <div class="col-md-6">
                                    <input id="customer_surname" type="text"
                                        class="form-control @error('customer_surname') is-invalid @enderror"
                                        name="customer_surname" value="{{ old('customer_surname') }}" required
                                        autocomplete="customer_surname" autofocus>

                                    @error('customer_surname')
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
                                        name="customer_email" value="{{ old('customer_email') }}" required
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
                                        name="customer_photo" type="file" id="formFile" required>
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
                                        value="{{ old('phone_number') }}" required autocomplete="phone_number">

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
                                    <select class="form-select @error('gender') is-invalid @enderror" name="gender"
                                        id="gender" aria-label="gender">
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>

                                    </select>

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
                                        value="{{ old('address') }}" required autocomplete="address">

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
                                    <select class="form-select @error('marital_status') is-invalid @enderror"
                                        name="marital_status" id="marital_status" aria-label="marital_status" required>
                                        <option value="">Select Marital Status</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Widowed">Widowed</option>
                                    </select>

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
                                        value="{{ old('occupation') }}" required autocomplete="occupation">

                                    @error('occupation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="customer_state"
                                    class="col-md-4 col-form-label text-md-end">{{ __('State') }}</label>

                                <div class="col-md-6">
                                    <input id="customer_state" type="text"
                                        class="form-control @error('customer_state') is-invalid @enderror"
                                        name="customer_state" value="{{ old('customer_state') }}" required
                                        autocomplete="customer_state">

                                    @error('customer_state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="customer_local_government"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Local Government') }}</label>

                                <div class="col-md-6">
                                    <input id="customer_local_government" type="text"
                                        class="form-control @error('customer_local_government') is-invalid @enderror"
                                        name="customer_local_government" value="{{ old('customer_local_government') }}"
                                        required autocomplete="customer_local_government">

                                    @error('customer_local_government')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="customer_business_type"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Business Type') }}</label>

                                <div class="col-md-6">
                                    <input id="customer_business_type" type="text"
                                        class="form-control @error('customer_business_type') is-invalid @enderror"
                                        name="customer_business_type" value="{{ old('customer_business_type') }}"
                                        required autocomplete="customer_business_type">

                                    @error('customer_business_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="customer_business_address"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Business Address') }}</label>

                                <div class="col-md-6">
                                    <input id="customer_business_address" type="text"
                                        class="form-control @error('customer_business_address') is-invalid @enderror"
                                        name="customer_business_address" value="{{ old('customer_business_address') }}"
                                        required autocomplete="customer_business_address">

                                    @error('customer_business_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="customer_business_description"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Business Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="customer_business_description"
                                        class="form-control @error('customer_business_description') is-invalid @enderror"
                                        name="customer_business_description"
                                        value="{{ old('customer_business_description') }}" required
                                        autocomplete="customer_business_description""" row="3"></textarea>

                                    @error('customer_business_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="customer_guarantor_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Guarantor Name') }}</label>

                                <div class="col-md-6">
                                    <input id="customer_guarantor_name" type="text"
                                        class="form-control @error('customer_guarantor_name') is-invalid @enderror"
                                        name="customer_guarantor_name" value="{{ old('customer_guarantor_name') }}"
                                        required autocomplete="customer_guarantor_name">

                                    @error('customer_guarantor_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="customer_guarantor_phone_no"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Guarantor Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="customer_guarantor_phone_no" type="number"
                                        class="form-control @error('customer_guarantor_phone_no') is-invalid @enderror"
                                        name="customer_guarantor_phone_no"
                                        value="{{ old('customer_guarantor_phone_no') }}" required
                                        autocomplete="customer_guarantor_phone_no">

                                    @error('customer_guarantor_phone_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="customer_guarantor_address"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Guarantor Address') }}</label>

                                <div class="col-md-6">
                                    <input id="customer_guarantor_address" type="text"
                                        class="form-control @error('customer_guarantor_address') is-invalid @enderror"
                                        name="customer_guarantor_address" value="{{ old('customer_guarantor_address') }}"
                                        required autocomplete="customer_guarantor_address">

                                    @error('customer_guarantor_address')
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
                                        name="next_kin_name" value="{{ old('next_kin_name') }}" required
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
                                        name="next_kin_address" value="{{ old('next_kin_address') }}" required
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
                                        name="next_kin_phone_number" value="{{ old('next_kin_phone_number') }}" required
                                        autocomplete="next_kin_phone_number">

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
                                        {{ __('Register') }}
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
