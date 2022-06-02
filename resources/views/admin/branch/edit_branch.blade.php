@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-md-8">
                @include('layouts.menu.branch')

                <div class="card">
                    <div class="card-header">{{ __('Edit Branch') }}</div>

                    <div class="card-body">
                        @include('layouts.alert')
                        <form method="POST" action="{{ route('branch_update', ['branch' => $branch->id]) }}">
                            {{ method_field('PATCH') }}
                            @csrf

                            <div class="row mb-3">
                                <label for="branch_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Branch Name') }}</label>

                                <div class="col-md-6">
                                    <input id="branch_name" type="text"
                                        class="form-control @error('branch_name') is-invalid @enderror" name="branch_name"
                                        value="{{ old('branch_name', $branch['branch_name']) }}" required
                                        autocomplete="service_name" autofocus>

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
