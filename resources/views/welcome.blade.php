<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sis Biblioteca</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome para íconos -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        /* Hero background con overlay */
        .hero {
            background: url('https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?auto=format&fit=crop&w=1600&q=80') no-repeat center center/cover;
            min-height: 70vh;
            position: relative;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.6);
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        /* Animación flotante */
        .card-hover {
            transition: transform .3s, box-shadow .3s;
        }

        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="#">📚 Sis Biblioteca</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('custom.login') }}" class="btn btn-primary ms-2">Iniciar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="hero">
        <div class="hero-content container">
            <h1 class="display-4 fw-bold">Bienvenido a Sis Biblioteca</h1>
            <p class="lead mb-4">Gestiona tus libros, préstamos y usuarios de manera sencilla y eficiente.</p>
            <a href="{{ route('custom.login') }}" class="btn btn-lg btn-light text-primary fw-bold">
                🚀 Comenzar ahora
            </a>
        </div>
    </section>

    <!-- Beneficios -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row text-center mb-4">
                <h2 class="fw-bold">Características Principales</h2>
                <p class="text-muted">Todo lo que necesitas para gestionar tu biblioteca</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card card-hover h-100 text-center p-4">
                        <i class="fas fa-book fa-3x text-primary mb-3"></i>
                        <h5 class="fw-bold">Gestión de Libros</h5>
                        <p class="text-muted">Administra tu inventario de libros de forma ágil y organizada.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-hover h-100 text-center p-4">
                        <i class="fas fa-hand-holding fa-3x text-success mb-3"></i>
                        <h5 class="fw-bold">Préstamos</h5>
                        <p class="text-muted">Controla y registra préstamos con facilidad y seguridad.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-hover h-100 text-center p-4">
                        <i class="fas fa-users fa-3x text-warning mb-3"></i>
                        <h5 class="fw-bold">Gestión de Usuarios</h5>
                        <p class="text-muted">Administra docentes, estudiantes y personal de forma eficiente.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Libros Destacados -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <h2 class="fw-bold">📖 Libros Destacados</h2>
                <p class="text-muted">Algunos títulos recomendados de nuestra colección</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card card-hover h-100 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=800&q=60"
                            class="card-img-top" alt="Libro 1">
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-primary">El Principito</h5>
                            <p class="card-text text-muted">Una historia sobre la inocencia, la amistad y el valor de
                                ver con el corazón.</p>
                        </div>
                        <div class="card-footer bg-white text-center">
                            <small class="text-secondary">Antoine de Saint-Exupéry</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-hover h-100 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1532012197267-da84d127e765?auto=format&fit=crop&w=800&q=60"
                            class="card-img-top" alt="Libro 2">
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-success">Cien Años de Soledad</h5>
                            <p class="card-text text-muted">Una obra maestra del realismo mágico que narra la historia
                                de los Buendía.</p>
                        </div>
                        <div class="card-footer bg-white text-center">
                            <small class="text-secondary">Gabriel García Márquez</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-hover h-100 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=800&q=60"
                            class="card-img-top" alt="Libro 3">
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-warning">Don Quijote de la Mancha</h5>
                            <p class="card-text text-muted">Las aventuras del caballero más famoso que vio gigantes
                                donde había molinos.</p>
                        </div>
                        <div class="card-footer bg-white text-center">
                            <small class="text-secondary">Miguel de Cervantes</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonios / Línea de Tiempo con Imagen -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold text-primary">💬 Testimonios</h2>
      <p class="text-muted">Lo que opinan nuestros usuarios a lo largo del tiempo</p>
    </div>

    <div class="timeline position-relative mx-auto" style="max-width: 700px;">
      <!-- Línea vertical -->
      <div class="position-absolute top-0 bottom-0 start-50 translate-middle border-2 border-primary" style="width: 4px;"></div>

      <!-- Item 1 -->
      <div class="timeline-item mb-5 position-relative">
        <div class="row align-items-center">
          <div class="col-md-6 text-md-end">
            <div class="p-4 bg-white rounded shadow-sm card-hover">
              <div class="d-flex align-items-center justify-content-md-end mb-3">
                <img src="https://randomuser.me/api/portraits/women/45.jpg" class="rounded-circle me-3" alt="María Gómez" width="60" height="60">
                <div class="text-md-end">
                  <h5 class="fw-bold text-primary mb-1">Prof. María Gómez</h5>
                  <small class="text-secondary">Docente de Comunicación</small>
                </div>
              </div>
              <p class="text-muted mb-1 fst-italic">“Antes llevaba los préstamos en cuadernos. Ahora todo está digitalizado y accesible.”</p>
              <small class="text-secondary">Año 2023</small>
            </div>
          </div>
          <div class="col-md-6 position-relative">
            <span class="position-absolute top-50 start-0 translate-middle bg-primary rounded-circle" style="width: 16px; height: 16px;"></span>
          </div>
        </div>
      </div>

      <!-- Item 2 -->
      <div class="timeline-item mb-5 position-relative">
        <div class="row align-items-center flex-md-row-reverse">
          <div class="col-md-6">
            <div class="p-4 bg-white rounded shadow-sm card-hover">
              <div class="d-flex align-items-center mb-3">
                <img src="https://randomuser.me/api/portraits/men/46.jpg" class="rounded-circle me-3" alt="José Ramírez" width="60" height="60">
                <div>
                  <h5 class="fw-bold text-success mb-1">Lic. José Ramírez</h5>
                  <small class="text-secondary">Bibliotecario</small>
                </div>
              </div>
              <p class="text-muted mb-1 fst-italic">“Los estudiantes pueden consultar la disponibilidad sin venir físicamente.”</p>
              <small class="text-secondary">Año 2024</small>
            </div>
          </div>
          <div class="col-md-6 position-relative">
            <span class="position-absolute top-50 start-100 translate-middle bg-success rounded-circle" style="width: 16px; height: 16px;"></span>
          </div>
        </div>
      </div>

      <!-- Item 3 -->
      <div class="timeline-item position-relative">
        <div class="row align-items-center">
          <div class="col-md-6 text-md-end">
            <div class="p-4 bg-white rounded shadow-sm card-hover">
              <div class="d-flex align-items-center justify-content-md-end mb-3">
                <img src="https://randomuser.me/api/portraits/women/68.jpg" class="rounded-circle ms-3" alt="Ana Torres" width="60" height="60">
                <div class="text-md-end me-3">
                  <h5 class="fw-bold text-warning mb-1">Mg. Ana Torres</h5>
                  <small class="text-secondary">Coordinadora Académica</small>
                </div>
              </div>
              <p class="text-muted mb-1 fst-italic">“Ahora tenemos control total sobre el inventario y reportes automáticos en segundos.”</p>
              <small class="text-secondary">Año 2025</small>
            </div>
          </div>
          <div class="col-md-6 position-relative">
            <span class="position-absolute top-50 start-0 translate-middle bg-warning rounded-circle" style="width: 16px; height: 16px;"></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

    <!-- Call to action -->
    <section class="py-5 text-white bg-gradient bg-primary text-center">
        <div class="container">
            <h2 class="fw-bold mb-3">¿Listo para modernizar tu biblioteca?</h2>
            <p class="mb-4">Empieza hoy mismo a gestionar tus recursos con Sis Biblioteca</p>
            <a href="{{ route('custom.login') }}" class="btn btn-light text-primary fw-bold px-4 py-2">
                Iniciar Sesión
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-3">
        <p class="mb-0">&copy; {{ date('Y') }} Sis Biblioteca. Todos los derechos reservados.</p>
        <small>Desarrollado con ❤️ usando Laravel + AdminLTE</small>
    </footer>

    <!-- Scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
