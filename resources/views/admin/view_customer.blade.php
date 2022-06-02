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
                        <form method="POST" action="">
                            @csrf

                            <div class="row mb-3">
                                <label for="customer_first_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input id="customer_first_name" type="text" class="form-control"
                                        name="customer_first_name" value="{{ $customer['customer_first_name'] }}"
                                        readonly>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="customer_middle_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Middle Name') }}</label>

                                <div class="col-md-6">
                                    <input id="customer_middle_name" type="text" class="form-control"
                                        name="customer_middle_name" value="{{ $customer['customer_middle_name'] }}"
                                        readonly>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="customer_surname"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Surname') }}</label>

                                <div class="col-md-6">
                                    <input id="customer_surname" type="text" class="form-control" name="customer_surname"
                                        value="{{ $customer['customer_surname'] }}" readonly>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="customer_email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="customer_email" type="email" class="form-control" name="customer_email"
                                        value="{{ $customer['customer_email'] }}" readonly>

                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="phone_number"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="number" class="form-control" name="phone_number"
                                        value="{{ $customer['phone_number'] }}" readonly>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="gender"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

                                <div class="col-md-6">
                                    <select class="form-selectr" name="gender" id="gender" aria-label="gender">
                                        <option value="">{{ $customer['gender'] }}</option>
                                    </select>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address"
                                        value="{{ $customer['address'] }}" readonly>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="marital_status"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Marital Status') }}</label>

                                <div class="col-md-6">
                                    <select class="form-select @error('marital_status') is-invalid @enderror"
                                        name="marital_status" id="marital_status" aria-label="marital_status">
                                        <option value="">{{ $customer->marital_status }}</option>

                                    </select>

                                </div>

                                <div class="row mb-3">
                                    <label for="occupation"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Occupation') }}</label>

                                    <div class="col-md-6">
                                        <input id="occupation" type="text" class="form-control" name="occupation"
                                            value="{{ $customer['occupation'] }}" readonly>


                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="customer_state"
                                        class="col-md-4 col-form-label text-md-end">{{ __('State') }}</label>

                                    <div class="col-md-6">
                                        <input id="customer_state" type="text" class="form-control" name="customer_state"
                                            value="{{ $customer['customer_state'] }}" readonly>

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="customer_local_government"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Local Government') }}</label>

                                    <div class="col-md-6">
                                        <input id="customer_local_government" type="text" class="form-control"
                                            name="customer_local_government"
                                            value="{{ $customer['customer_local_government'] }}" readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="customer_business_type"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Business Type') }}</label>

                                    <div class="col-md-6">
                                        <input id="customer_business_type" type="text" class="form-control"
                                            name="customer_business_type"
                                            value="{{ $customer['customer_business_type'] }}" readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="customer_business_address"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Business Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="customer_business_address" type="text" class="form-control"
                                            name="customer_business_address"
                                            value="{{ $customer['customer_business_address'] }}" readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="customer_business_description"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Business Description') }}</label>

                                    <div class="col-md-6">
                                        <textarea id="customer_business_description" class="form-control"
                                            name="customer_business_description"
                                            value="{{ $customer['customer_business_description'] }}" readonly
                                            row="3"></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="customer_guarantor_name"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Guarantor Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="customer_guarantor_name" type="text" class="form-control"
                                            name="customer_guarantor_name"
                                            value="{{ $customer['customer_guarantor_name'] }}" readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="customer_guarantor_phone_no"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Guarantor Phone Number') }}</label>

                                    <div class="col-md-6">
                                        <input id="customer_guarantor_phone_no" type="number" class="form-control"
                                            name="customer_guarantor_phone_no"
                                            value="{{ $customer['customer_guarantor_phone_no'] }}" readonly>

                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="customer_guarantor_address"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Guarantor Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="customer_guarantor_address" type="text" class="form-control"
                                            name="customer_guarantor_address"
                                            value="{{ $customer['customer_guarantor_address'] }}" readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="next_kin_name"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Next of Kin Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="next_kin_name" type="text" class="form-control" name="next_kin_name"
                                            value="{{ $customer['next_kin_name'] }}" readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="next_kin_address"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Next of Kin Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="next_kin_address" type="text" class="form-control"
                                            name="next_kin_address" value="{{ $customer['next_kin_address'] }}" readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="next_kin_phone_number"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Next of Kin Phone Number') }}</label>

                                    <div class="col-md-6">
                                        <input id="next_kin_phone_number" type="number" class="form-control"
                                            name="next_kin_phone_number" value="{{ $customer['next_kin_phone_number'] }}"
                                            readonly>
                                    </div>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
