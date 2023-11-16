@extends('layouts.frontend')

@section('content')
    <div class="container px-6 mx-auto">
        <form method="post" action="{{ route('login.perform') }}">

            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <h1 class="h3 mb-3 fw-normal">Login</h1>


            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="username" value="{{ old('username') }}"
                    placeholder="Username" required="required" autofocus>

                @if ($errors->has('username'))
                    <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <input type="password" class="form-control" name="password" value="{{ old('password') }}"
                    placeholder="Password" required="required">

                @if ($errors->has('password'))
                    <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <button class="px-4 py-2 text-white bg-blue-800 rounded" type="submit">Login</button>


        </form>
    </div>
@endsection
