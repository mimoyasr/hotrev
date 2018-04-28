@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('clients.store') }}" enctype="multipart/form-data">
                        @csrf


                        

                    <div class="form-group row">
                            <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>

                            <div class="col-md-6">
                                        <input type="file" name="photo" id='photo' class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" name="photo"  required autofocus>

                                @if ($errors->has('photo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>
    
                                <div class="col-md-6">
                                            <input  name="mobile" id='mobile' type="phone" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile"  required autofocus>
    
                                    @if ($errors->has('mobile'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('mobile') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        <div class="form-group row">
                                <label for="country_id" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>
    
                                <div class="col-md-6">
                                    <select id="country_id" type="text" class="form-control{{ $errors->has('country_id') ? ' is-invalid' : '' }}" name="country_id"  required autofocus>
                                        @foreach( $conts as $con )
                                        <option value="{{ $con->id }}"
                                            @if($con->id == 818)
                                            selected
                                            @endif
                                            
                                            >{{ $con->full_name }}</option>
                                        @endforeach
                                    </select>
    
                                    @if ($errors->has('country_id'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('country_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <select id="gender" type="text" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender"  required autofocus>
                                    <option value="0" selected >Male</option>
                                    <option value="1">Female</option>
                                </select>

                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
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
