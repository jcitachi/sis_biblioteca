@extends('adminlte::page')

@section('content_header')
    <h1><b>Panel de Configuración del Sistema</b></h1>
    <hr class="border-top border-3 border-primary rounded">
@stop
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-gradient-primary text-white rounded-top-4">
                    <h4 class="mb-0 card-title"><i class="fas fa-id-card"> FORMULARIO DE REGISTRO</i></h4>
                </div>
                <div class="card-body py-4">
                    <form action="{{ route('admin.configuracion.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            {{-- Logo de la empresa --}}
                            <div class="col-md-3 text-center">
                                <label for="logo" class="form-label fw-semibold">
                                    <i class="fas fa-image text-primary"></i> Logo de la Empresa <span class="text-danger">
                                        *</span>
                                </label>
                                <div class="input-group d-flex flex-column align-items-center">
                                    <label for="logo" class="btn btn-outline-primary rounded-pill px-4">
                                        <i class="fas fa-upload"></i> Seleccionar Logo
                                    </label>
                                    <input
                                        type="file"
                                        name="logo"
                                        id="logo"
                                        class="form-control d-none"
                                        accept="image/*"
                                        onchange="mostrarImagen(event)"
                                        value="{{ old('logo', $configuracion->logo ?? '') }}">
                                    <span id="nombre-archivo" class="mt-2 text-muted">Ningun archivo seleccionado</span>
                                    {{-- Imagen Centrada --}}
                                    <img id="preview" src="{{ url($configuracion->logo ?? '') }}" alt="Logo de la Empresa" class="img-fluid mt-3"
                                        style="max-width: 200px; max-height: 200px;">
                                </div>
                            </div>

                            {{-- contenido --}}
                            <div class="col-md-9">
                                <div class="row justify-content-center">

                                    {{-- RUC --}}
                                    {{-- Nombre Completo --}}
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="" class="form-label fw-semibold">
                                                <span>
                                                    <i class="fas fa-building text-primary"></i>
                                                </span> Nombre de la Empresa
                                                <span class="text-danger"> *
                                                </span>
                                            </label>
                                            <input type="text" name="nombre" id="nombre"
                                                class="form-control rounded-pill" value="{{ old('nombre', $configuracion->nombre ?? '' ) }}"
                                                placeholder="Eje: Mi Empresa S.A.C." required>
                                        </div>
                                        @error('nombre')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Teléfono --}}
                                    <div class="col-md-3">
                                        <label for="" class="form-label fw-semibold">
                                            <span><i class="fas fa-phone-alt text-primary"></i></span> Teléfono <span
                                                class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="telefono" id="telefono" value="{{ old('telefono', $configuracion->telefono ?? '' ) }}"
                                            placeholder="Eje: 987654321" class="form-control rounded-pill" required>
                                    </div>
                                    @error('telefono')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                    {{-- Correo Electrónico --}}
                                    <div class="col-md-3">
                                        <label for="" class="form-label fw-semibold">
                                            <span><i class="fas fa-envelope text-primary"></i></span> Correo electrónico
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="email" name="email" id="email" value="{{ old('email', $configuracion->correo ?? '' ) }}"
                                            class="form-control rounded-pill"
                                            placeholder="ejemplo@correo.com" required>
                                    </div>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-md-4">
                                        {{-- dirección --}}
                                        <label for="" class="form-label fw-semibold">
                                            <i class="fas fa-map-marker-alt text-primary"></i> Dirección<span
                                                class="text-danger"> *</span>
                                        </label>
                                        <input type="text" name="direccion" id="direccion"
                                            value="{{ old('direccion', $configuracion->direccion ?? '') }}" placeholder="ingrese una dirección válida"
                                            class="form-control rounded-pill" required>
                                    </div>
                                    @error('direccion')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <hr class="border-top border-3 border-primary rounded">
                                <div class="row ">
                                    <div class="mt-5 ">
                                        <a href="{{ route('admin.configuracion.index' ) }}"
                                            class="btn btn-outline-secondary btn-sm rounded-pill mr-2">
                                            <i class="fas fa-arrow-left"></i> Cancelar
                                        </a>
                                        <button type="submit" class="btn btn-success btn-sm rounded-pill shadow-sm">
                                            <i class="fas fa-save"></i> Guardar Registro
                                        </button>
                                    </div>
                                </div>
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
        <strong>Copyright &copy; 2022 <a href="#">Juan Carlos</a>.</strong>
        Todos los derechos reservados.
    </div>
@stop
@section('css')

@stop
@section('js')
    <script>
        function mostrarImagen(event) //mostrar imagen viene del onchange del input file
        {
            const archivo = event.target.files[0];
            const preview = document.getElementById('preview'); //preview viene del id de la imagen
            const nombreArchivo = document.getElementById('nombre-archivo'); //nombre-archivo viene del id del span

            if (archivo) {
                //mostrar nombre del archivo
                nombreArchivo.textContent = archivo.name; //nombreArchivo variable que toma del id nombre-archivo

                //Mostrar vista previa de la imagen
                const lector = new FileReader();
                lector.onload = e => {
                    preview.src = e.target.result; //preview variable que toma del id preview
                    preview.style.display = 'block'; //mostrar la imagen

                };
                lector.readAsDataURL(archivo);
            } else {
                nombreArchivo.textContent = 'Ningun archivo seleccionado';
                preview.src = '';
                preview.style.display = 'none'; //ocultar la imagen
            }
        }
    </script>
@stop
