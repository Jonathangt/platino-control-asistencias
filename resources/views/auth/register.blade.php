@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12" style="margin-right:auto;margin-left:auto">
            <x-slot name="logo">
                <x-jet-authentication-card-logo />
            </x-slot>

            <!-- <x-jet-validation-errors class="mb-4" /> -->

  

            @error('email')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
               <!--  <x-jet-validation-errors class="mb-4" /> -->
                @if ($errors->any())
                    <div class="font-medium text-red-600">{{ __('¡Error!.') }}</div>
                    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            @enderror

            @error('password')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <x-jet-validation-errors class="mb-4" />
            </div>
            @enderror

            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
            @endif

        


            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card-group mb-0">
                            <div class="card p-0">
                                <div class="card-body">
                                    <h2>PLATINO</h2>
                                    <p class="text-muted">Registrarse al sistema</p>
                                    <div class="input-group mb-3">
                                        <span class="input-group-addon"><i class="icon-user"></i></span>
                                        <input type="text" name="name" id="name" class="form-control" :value="old('name')" required autofocus placeholder="Nombres">
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-addon"><i class="icon-key"></i></span>
                                        <input type="text" name="code_empleado" id="code_empleado" class="form-control" :value="old('code_empleado')" maxlength="4" required autofocus placeholder="Código Empleado">
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-addon"><i class="icon-lock"></i></span>
                                        <input type="password" class="form-control" type="password" name="password" required autocomplete="new-password" maxlength="12" placeholder="Contraseña">
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-addon"><i class="icon-lock"></i></span>
                                        <input type="password" class="form-control" type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" maxlength="12" placeholder="Confirmar Contraseña">
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                        <!-- style="background-color: #0229CE; border-color: #0229CE;" -->
                                            <button type="submit" class="btn btn-primary px-4">Registarse</button>
                                        </div>
                                       <div class="col-6 text-right">
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">Ya se encuentra registrado?</a>
                                        </div>
                                    </div><br><br>
          
                                </div>
                            </div> <!-- background-color: #0229CE;" -->
                            <div class="card text-white bg-primary py-0 d-md-down-none" style="width:44%;  background-color: #012061;">
                                    <div>
                                        <img src="img/bg-01.jpg" alt="">
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
