@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-md-8">
                @include('layouts.menu.branch')


                <div class="card">
                    <div class="card-header">{{ __('Add New Branch') }}</div>

                    <div class="card-body">
                        @include('layouts.alert')
                        <form method="POST" action="{{ route('branch_store') }}">
                            @csrf

                            <div class="mb-3 row">
                                <label for="role" class="col-md-4 col-form-label text-end">
                                    {{ __('Branch') }} :
                                </label>
                                <div class="col-md-6">
                                    <input id="branch_name" type="text"
                                        class="form-control @error('branch_name') is-invalid @enderror" name="branch_name"
                                        value="{{ old('branch_name') }}" required autocomplete="branch_name" autofocus>

                                    @error('branch_name')
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
