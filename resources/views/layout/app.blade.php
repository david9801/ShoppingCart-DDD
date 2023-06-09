<!doctype html>
<html lang="en">
<head>
    <!-- resources/css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <!--Añadimos dropzone para que en un form si queremos subir algo se pueda arrastrar/soltar  -->
    <!-- estilos CSS de Dropzone -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" integrity="sha512-tKcMsN1UmnR6+RzlMu42XZ6KjIz7C/vTupTfzjAAWw8JY18BQlGm13sZncXWZs8aFFtjN/WQplwvl+8aSFDgjg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--script de Dropzone -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js" integrity="sha512-tJ8Nx6xjE6IpkbQT1DGMJOp8jzwP04+TmyTb05egEwWsd8JzrBdnG0ndTTew2lWZj8vpvubXNpTlmHTbEJwK8w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Icons fontawesome  -->
    <script src="https://kit.fontawesome.com/06c6f7ab73.js" crossorigin="anonymous"></script>
    <!-- Icons Bootstrap  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- Titulo-->
    <title>SIROKO-@yield('title') </title>
</head>

<body>
<div  class="bg-light1 d-flex flex-column min-vh-100" id="content" >
    <nav class="navbar navbar-dark bg-dark sticky-top" >
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('welcome')}}"> ShoppingCart </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">OPCIONES</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('show-products')}}">  <i class="fa-solid fa-list"></i>   Show Products </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('show-shopping-cart')}}">  <i class="fa-solid fa-cart-shopping"></i>   Show ShoppingCart </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')

    <footer class="footer mt-auto py-3">
        <div class="container text-center">
            <span class="text-muted">ShoppingCart SIROKO 2023</span>
        </div>
    </footer>
</div>
<!-- Para solventar problemas de version con este tipo de navbar-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>
</html>

