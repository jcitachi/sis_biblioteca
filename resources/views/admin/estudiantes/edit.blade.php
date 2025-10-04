@extends('adminlte::page')

@section('content_header')
    <h1><b>Registro de Estudiantes</b></h1>
    <hr class="border-top border-3 border-primary rounded">
@stop

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-gradient-primary text-white rounded-top-4">
                <h4 class="mb-0 card-title">
                    <i class="fas fa-user-graduate"></i> FORMULARIO DE REGISTRO DE ESTUDIANTE
                </h4>
            </div>
            <div class="card-body py-4">
                <form action="{{ route('admin.estudiantes.update', $estudiante->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row justify-content-center">

                        {{-- Código --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="codigo" class="form-label fw-semibold">
                                    <i class="fas fa-id-badge text-primary"></i> Código <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="codigo" id="codigo"
                                    class="form-control rounded-pill"
                                    value="{{ old('codigo', $estudiante->codigo) }}" placeholder="Ej: EST001" required>
                            </div>
                            @error('codigo')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- DNI --}}
                        <div class="col-md-3">
                            <label for="dni" class="form-label fw-semibold">
                                <i class="fas fa-address-card text-primary"></i> DNI <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="dni" id="dni"
                                class="form-control rounded-pill"
                                value="{{ old('dni', $estudiante->dni) }}" placeholder="Ej: 87654321" required>
                            @error('dni')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Nombres --}}
                        <div class="col-md-3">
                            <label for="nombres" class="form-label fw-semibold">
                                <i class="fas fa-user text-primary"></i> Nombres <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="nombres" id="nombres"
                                class="form-control rounded-pill"
                                value="{{ old('nombres', $estudiante->nombres) }}" placeholder="Ej: Juan Carlos" required>
                            @error('nombres')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Apellidos --}}
                        <div class="col-md-3">
                            <label for="apellidos" class="form-label fw-semibold">
                                <i class="fas fa-user text-primary"></i> Apellidos <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="apellidos" id="apellidos"
                                class="form-control rounded-pill"
                                value="{{ old('apellidos', $estudiante->apellidos) }}" placeholder="Ej: Pérez García" required>
                            @error('apellidos')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row justify-content-center mt-3">
                        {{-- Carrera --}}
                        <div class="col-md-4">
                            <label for="carrera" class="form-label fw-semibold">
                                <i class="fas fa-graduation-cap text-primary"></i> Carrera <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="carrera" id="carrera"
                                class="form-control rounded-pill"
                                value="{{ old('carrera', $estudiante->carrera) }}" placeholder="Ej: Ingeniería de Sistemas" required>
                            @error('carrera')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Dirección --}}
                        <div class="col-md-4">
                            <label for="direccion" class="form-label fw-semibold">
                                <i class="fas fa-map-marker-alt text-primary"></i> Dirección <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="direccion" id="direccion"
                                class="form-control rounded-pill"
                                value="{{ old('direccion', $estudiante->direccion) }}" placeholder="Ingrese una dirección válida" required>
                            @error('direccion')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Teléfono --}}
                        <div class="col-md-4">
                            <label for="telefono" class="form-label fw-semibold">
                                <i class="fas fa-phone-alt text-primary"></i> Teléfono <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="telefono" id="telefono"
                                class="form-control rounded-pill"
                                value="{{ old('telefono', $estudiante->telefono) }}" placeholder="Ej: 987654321" required>
                            @error('telefono')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row justify-content-center mt-3">
                        {{-- Estado --}}
                        <div class="col-md-3">
                            <label for="estado" class="form-label fw-semibold">
                                <i class="fas fa-toggle-on text-primary"></i> Estado <span class="text-danger">*</span>
                            </label>
                            <select name="estado" id="estado" class="form-control rounded-pill" required>
                                <option value="1" {{ old('estado', $estudiante->estado) == 1 ? 'selected' : '' }}>Activo</option>
                                <option value="0" {{ old('estado', $estudiante->estado) == 0 ? 'selected' : '' }}>Inactivo</option>
                            </select>
                            @error('estado')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <hr class="border-top border-3 border-primary rounded">

                    <div class="row">
                        <div class="mt-4">
                            <a href="{{ route('admin.estudiantes.index') }}"
                                class="btn btn-outline-secondary btn-sm rounded-pill mr-2">
                                <i class="fas fa-arrow-left"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-success btn-sm rounded-pill shadow-sm">
                                <i class="fas fa-save"></i> Actualizar Estudiante
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('footer')
    <div class="text-center">
        <strong>Copyright &copy; 2025 <a href="#">Juan Carlos</a>.</strong>
        Todos los derechos reservados.
    </div>
@stop
