@extends("layouts.main")
@section("content")
    <div class="card">
        <div class="card-header">
            {{ __("Edición de Usuario") }}
        </div>
        <div class="card-body">
            @if ($is_edition)
                <form method="post" action="{{ route("usuario.update", [ "user" => $user->id ]) }}">
                    @method("PATCH")
                    @csrf
                    <div class="col-auto">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">{{ __("Nombre") }}</div>
                            </div>
                            <input
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                id="name"
                                name="name"
                                placeholder="{{ __("Nombre") }}"
                                value="{{ old('name') ?? $user->name }}"
                                required
                            />
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">{{ __("Email") }}</div>
                            </div>
                            <input
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                id="email"
                                name="email"
                                placeholder="{{ __("Email") }}"
                                value="{{ old('email') ?? $user->email }}"
                                required
                            />
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{--
                        Podríamos añadir un botón para camibar el type de password a text
                        para que se pudiera ver la contraseña
                    --}}
                    <div class="col-auto">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">{{ __("Contraseña") }}</div>
                            </div>
                            <input
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                id="password"
                                name="password"
                                placeholder="{{ __("Contraseña") }}"
                            />
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">{{ __("Repetir Contraseña") }}</div>
                            </div>
                            <input
                                type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="password_confirmation"
                                name="password_confirmation"
                                placeholder="{{ __("Repetir Contraseña") }}"
                            />
                            @error('password_confirmation')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-success btn-block w-100">{{ __("Guardar Usuario") }}</button>
                </form>
            @endif
        </div>
    </div>
@endsection