@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="mb-3">📊 Panel de Control - Sis Biblioteca</h1>
@stop

@section('content')
<div class="row">
    <!-- Card: Total Libros -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>120</h3>
                <p>Total de Libros</p>
            </div>
            <div class="icon">
                <i class="fas fa-book"></i>
            </div>
            <a href="#" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <!-- Card: Libros Prestados -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>35</h3>
                <p>Libros Prestados</p>
            </div>
            <div class="icon">
                <i class="fas fa-hand-holding"></i>
            </div>
            <a href="#" class="small-box-footer">Ver detalles <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <!-- Card: Usuarios -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>58</h3>
                <p>Usuarios Registrados</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">Gestionar usuarios <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <!-- Card: En Mantenimiento -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>7</h3>
                <p>Libros en Mantenimiento</p>
            </div>
            <div class="icon">
                <i class="fas fa-tools"></i>
            </div>
            <a href="#" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<!-- Ejemplo de gráfica -->
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-indigo">
                <h3 class="card-title">Préstamos por Mes</h3>
            </div>
            <div class="card-body">
                <canvas id="chartPrestamos"></canvas>
            </div>
        </div>
    </div>
</div>
@stop

@section('footer')
    <div class="text-center">
        <p class="mb-0">&copy; {{ date('Y') }} Sis Biblioteca. Todos los derechos reservados.</p>
        <small>Desarrollado con ❤️</small> <small> V. 1.0</small>
    </div>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Ejemplo de gráfica con Chart.js
    const ctx = document.getElementById('chartPrestamos').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
            datasets: [{
                label: 'Préstamos',
                data: [12, 19, 8, 15, 20, 14],
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
            }]
        },
    });
</script>
@stop

