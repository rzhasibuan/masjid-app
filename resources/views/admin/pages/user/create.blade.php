@extends('admin.templates.default')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Register') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.user.store') }}">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-7">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus placeholder="Name">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-7">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-7">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-3 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-7">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Confirm Password">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="role_id" class="col-md-3 col-form-label text-md-right">{{ __('Role') }}</label>

                    <div class="col-md-7">
                        <select name="role_id" id="role_id" class="form-control @error('role_id') is-invalid @enderror">
                            @if (count($roles))
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                                @endforeach
                            @endif
                        </select>

                        @error('role_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-7 offset-md-3">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                        <a href="{{route('admin.user.index')}}" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
