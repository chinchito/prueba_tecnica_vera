@extends("layouts.main")
@section("content")
    <div class="card">
        <div class="card-header">
            {{ __("Ver Usuario") }}
        </div>
        <div class="card-body">
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
                        value="{{ $user->name }}" disabled/>
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
                        value="{{ $user->email }}" disabled/>
                </div>
            </div>
        </div>
    </div>
@endsection