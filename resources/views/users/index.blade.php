@extends("layouts.main")
@section("content")
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __("Nombre") }}</th>
                <th scope="col">{{ __("Email") }}</th>
                <th scope="col">{{ __("Acciones") }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user_idx => $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <div class="d-flex flex-wrap justify-content-around">
                            <a href="{{ route("usuario.show", ["user" => $user->id])}}" class="btn btn-sm btn-primary">
                                {{ __("Ver Usuario") }}
                            </a>
                            <a href="{{ route("usuario.edit", ["user" => $user->id]) }}" class="btn btn-sm btn-info">
                                {{ __("Editar Usuario") }}
                            </a>
                            {{--    
                                Aquí se añadiría un modal para verificar si realmente
                                se quiere eliminar al usuario o no
                            --}}
                            <form method="post" action="{{ route("usuario.destroy", ["user" => $user->id]) }}">
                                @method("DELETE")
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">
                                    {{ __("Borrar Usuario") }}
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
  @endsection