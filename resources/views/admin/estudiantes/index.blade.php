@extends('adminlte::page')

@section('title', 'Listado de Estudiantes')

@section('content_header')
    <h1><b>Gestión de Estudiantes</b></h1>
    <hr class="border-top border-3 border-primary rounded">
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-gradient-primary text-white rounded-top-4 d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-0 card-title">
                            <i class="fas fa-users"></i> Listado de Estudiantes
                        </h4>
                    </div>
                    <div class="flex-grow-1"></div>
                    <div class="text-end">
                        <a href="{{ route('admin.estudiantes.create') }}" class="btn btn-light btn-sm rounded-pill shadow-sm">
                            <i class="fas fa-user-plus text-primary"></i> Nuevo Estudiante
                        </a>
                    </div>

                </div>

                <div class="card-body">
                    {{-- Buscador
                    <form action="{{ route('admin.estudiantes.index') }}" method="GET" class="mb-3">
                        <div class="input-group">
                            <input type="text" name="buscar" class="form-control rounded-pill"
                                placeholder="Buscar estudiante por nombre, DNI o código..." value="{{ request('buscar') }}">
                            <button class="btn btn-primary rounded-pill px-4" type="submit">
                                <i class="fas fa-search"></i> Buscar
                            </button>
                        </div>
                    </form>
                    --}}
                    {{-- Tabla --}}
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-primary text-center">
                                <tr>
                                    <th>Nro</th>
                                    <th>Código</th>
                                    <th>DNI</th>
                                    <th>Nombre Completo</th>
                                    <th>Carrera</th>
                                    <th>Teléfono</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @forelse ($estudiantes as $estudiante)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $estudiante->codigo }}</td>
                                        <td>{{ $estudiante->dni }}</td>
                                        <td>{{ $estudiante->nombres }} {{ $estudiante->apellidos }}</td>
                                        <td>{{ $estudiante->carrera }}</td>
                                        <td>{{ $estudiante->telefono }}</td>
                                        <td>
                                            @if ($estudiante->estado == 1)
                                                <span class="badge bg-success"><i class="fas fa-check-circle"></i>
                                                    Activo</span>
                                            @else
                                                <span class="badge bg-danger"><i class="fas fa-times-circle"></i>
                                                    Inactivo</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{-- route('admin.estudiantes.show', $estudiante->id) --}}" class="btn btn-info btn-sm rounded-pill">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.estudiantes.edit', $estudiante->id) }}" class="btn btn-warning btn-sm rounded-pill">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form id="miFormulario{{ $estudiante->id }}" action="{{ route('admin.estudiantes.destroy', $estudiante->id) }}" method="POST"
                                                style="display:inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    type="submit"
                                                    class="btn btn-danger btn-sm rounded-pill"
                                                    onclick="preguntar{{ $estudiante->id }}(event)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            <script>
                                                function preguntar{{ $estudiante->id }}(event) {
                                                    event.preventDefault();
                                                    Swal.fire({
                                                        title: '¿Desea Eliminar este Registro?',
                                                        text: "¡No podrás revertir esto!",
                                                        icon: 'question',
                                                        showCancelButton: true,
                                                        confirmButtonText: 'Sí, eliminarlo',
                                                        confirmButtonColor: '#a5161d',
                                                        denyButtonColor: '#270a0a',
                                                        denyButtonText: 'Cancelar'
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            //java puro para enviar el formulario
                                                           document.getElementById( 'miFormulario{{ $estudiante->id }}' ).submit();
                                                        }
                                                    });
                                                }
                                            </script>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-muted">
                                            <i class="fas fa-exclamation-circle"></i> No se encontraron registros.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <div class="text-center">
        <strong>Copyright &copy; {{ date('Y') }} <a href="#">Juan Carlos</a>.</strong>
        Todos los derechos reservados.
    </div>
@stop
