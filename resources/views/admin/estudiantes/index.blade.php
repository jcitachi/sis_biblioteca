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
                <div
                    class="card-header bg-gradient-primary text-white rounded-top-4 d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-0 card-title">
                            <i class="fas fa-users"></i> Listado de Estudiantes
                        </h4>
                    </div>
                    <div class="flex-grow-1"></div>
                    <div class="text-end">
                        <a href="{{ route('admin.estudiantes.create') }}"
                            class="btn btn-light btn-sm rounded-pill shadow-sm">
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
                        <table class="table table-hover align-middle" id="example1">
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
                                            <a href="{{ route('admin.estudiantes.edit', $estudiante->id) }}"
                                                class="btn btn-warning btn-sm rounded-pill">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form id="miFormulario{{ $estudiante->id }}"
                                                action="{{ route('admin.estudiantes.destroy', $estudiante->id) }}"
                                                method="POST" style="display:inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm rounded-pill"
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
                                                            document.getElementById('miFormulario{{ $estudiante->id }}').submit();
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
@section('css')
    <style>
        /* Fondo transparente y sin borde en el contenedor */
        #example1_wrapper .dt-buttons {
            background-color: transparent;
            box-shadow: none;
            border: none;
            display: flex;
            justify-content: center;
            /* Centrar los botones */
            gap: 10px;
            /* Espaciado entre botones */
            margin-bottom: 15px;
            /* Separar botones de la tabla */
        }

        /* Estilo personalizado para los botones */
        #example1_wrapper .btn {
            color: #fff;
            /* Color del texto en blanco */
            border-radius: 4px;
            /* Bordes redondeados */
            padding: 5px 15px;
            /* Espaciado interno */
            font-size: 14px;
            /* Tamaño de fuente */
        }

        /* Colores por tipo de botón */
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-info {
            background-color: #17a2b8;
            border: none;
        }

        .btn-warning {
            background-color: #ffc107;
            border: none;
        }

        .btn-default {
            background-color: #6c757d;
            border: none;
        }
    </style>
    <style>
        /* Personalización del paginador */
        #example1_wrapper .dataTables_paginate .paginate_button {
            border-radius: 50% !important;
            /* Botones redondos */
            margin: 0 3px;
            /* Espaciado entre botones */
            border: none !important;
            padding: 6px 12px;
            background: #f0f0f0;
            color: #333 !important;
            transition: all 0.3s ease;
        }

        /* Hover */
        #example1_wrapper .dataTables_paginate .paginate_button:hover {
            background: #007bff !important;
            color: #fff !important;
        }

        /* Botón activo */
        #example1_wrapper .dataTables_paginate .paginate_button.current {
            background: #007bff !important;
            color: #fff !important;
            border-radius: 50% !important;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        /* Botones de siguiente y anterior */
        #example1_wrapper .dataTables_paginate .paginate_button.previous,
        #example1_wrapper .dataTables_paginate .paginate_button.next {
            border-radius: 20px !important;
            /* Más alargados */
            padding: 6px 16px;
        }
    </style>
    <style>
        /* Números más pequeños (círculos compactos) */
        #example1_wrapper .dataTables_paginate .paginate_button {
            border-radius: 50% !important;
            margin: 0 2px;
            border: none !important;
            padding: 4px 8px;
            /* antes era 6px 12px */
            font-size: 12px;
            /* reducir tamaño de texto */
            background: #f0f0f0;
            color: #333 !important;
            transition: all 0.3s ease;
        }

        /* Hover en los números */
        #example1_wrapper .dataTables_paginate .paginate_button:hover {
            background: #007bff !important;
            color: #fff !important;
        }

        /* Número activo */
        #example1_wrapper .dataTables_paginate .paginate_button.current {
            background: #007bff !important;
            color: #fff !important;
            border-radius: 50% !important;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);
        }

        /* Anterior y Siguiente más pequeños (pastillas compactas) */
        #example1_wrapper .dataTables_paginate .paginate_button.previous,
        #example1_wrapper .dataTables_paginate .paginate_button.next {
            border-radius: 20px !important;
            background: #f0f0f0;
            color: #333 !important;
            padding: 4px 10px;
            /* más pequeños */
            font-size: 12px;
            /* reducir texto */
        }

        /* Hover en Anterior y Siguiente */
        #example1_wrapper .dataTables_paginate .paginate_button.previous:hover,
        #example1_wrapper .dataTables_paginate .paginate_button.next:hover {
            background: #007bff !important;
            color: #fff !important;
        }
    </style>
@stop
@section('js')
    <script>
        $(document).ready(function() {
            $("#example1").DataTable({
                pageLength: 5,
                responsive: true,
                lengthChange: true,
                autoWidth: false,
                //dom: 'Bfrtip', // <-- Importante: agrega los botones arriba de la tabla
                language: {
                    emptyTable: "No hay información",
                    info: "Mostrando _START_ a _END_ de _TOTAL_ Estudiantes",
                    infoEmpty: "Mostrando 0 a 0 de 0 Estudiantes",
                    infoFiltered: "(Filtrado de _MAX_ total Estudiantes)",
                    lengthMenu: "Mostrar _MENU_ Estudiantes",
                    loadingRecords: "Cargando...",
                    processing: "Procesando...",
                    search: "Buscador:",
                    zeroRecords: "Sin resultados encontrados",
                    paginate: {
                        first: "Primero",
                        last: "Último",
                        next: "Siguiente",
                        previous: "Anterior"
                    }
                },
                buttons: [{
                        text: '<i class="fas fa-copy"></i> COPIAR',
                        extend: 'copyHtml5',
                        className: 'btn btn-default'
                    },
                    {
                        text: '<i class="fas fa-file-pdf"></i> PDF',
                        extend: 'pdfHtml5',
                        className: 'btn btn-danger',
                        orientation: 'portrait',
                        pageSize: 'A4',
                        exportOptions: {
                            columns: ':not(:last-child)' // Excluye columna "Acciones"
                        }
                    },
                    {
                        text: '<i class="fas fa-file-csv"></i> CSV',
                        extend: 'csvHtml5',
                        className: 'btn btn-info',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    {
                        text: '<i class="fas fa-file-excel"></i> EXCEL',
                        extend: 'excelHtml5',
                        className: 'btn btn-success',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    {
                        text: '<i class="fas fa-print"></i> IMPRIMIR',
                        extend: 'print',
                        className: 'btn btn-warning',
                        title: '',
                        exportOptions: {
                            columns: ':not(:last-child)' // Excluye "Acciones"
                        },
                        customize: function(win) {
                            $(win.document.body).css({
                                'font-family': 'Courier New, monospace',
                                'font-size': '12px',
                                'color': '#000',
                                'padding': '15px'
                            });

                            $(win.document.body).prepend(`
                            <div style="text-align:center; margin-bottom:10px;">
                                <h3 style="margin:0;">Mi Empresa S.A.C.</h3>
                                <p style="margin:0;">RUC: 123456789</p>
                                <p style="margin:0;">Av. Siempre Viva 742 - Lima</p>
                                <hr style="margin:8px 0; border:0; border-top:1px dashed #000;">
                                <h4 style="margin:0;">📑 REPORTE DE ADMINISTRATIVOS</h4>
                                <p style="margin:0;">Fecha: ${new Date().toLocaleDateString()}</p>
                            </div>
                        `);

                            $(win.document.body).find('table')
                                .css({
                                    'border-collapse': 'collapse',
                                    'width': '100%',
                                    'margin-top': '10px'
                                });

                            $(win.document.body).find('table thead th').css({
                                'border-bottom': '1px solid #000',
                                'text-align': 'left',
                                'padding': '4px'
                            });

                            $(win.document.body).find('table tbody td').css({
                                'border-bottom': '1px dotted #000',
                                'padding': '4px'
                            });

                            $(win.document.body).append(`
                            <hr style="margin-top:15px; border:0; border-top:1px dashed #000;">
                            <div style="text-align:center; font-size:11px; margin-top:10px;">
                                <p>Este documento no requiere firma ni sello.</p>
                                <p>Generado automáticamente por el sistema</p>
                            </div>
                        `);
                        }
                    }
                ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>

@stop
