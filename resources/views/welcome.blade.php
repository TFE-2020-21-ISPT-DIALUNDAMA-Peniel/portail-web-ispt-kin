@inject('ressources', 'App\Models\Ressource')

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Peniel DIALUNDAMA BilWiFi">
    <title>Portail Web ISPT-Kin</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/album/">



    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css"/>

    <!-- Favicons -->

<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


  </head>
  <body>

<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">A propos</h4>
          <p class="text-muted">Cette page vous donne accès à toutes les applications web de l'ISPT-KIN</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <ul class="list-unstyled">
            <li><a href="{{url("login")}}" class="text-white">Connexion</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg"  width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"></path>
          </svg>
        <strong>ISPT-KIN</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <img src="{{ asset("img/logo_ispt.gif")}}" class="img-fluid rounded mx-auto d-block" width="75" />
        <h1 class="fw-light">Portail  de l'ISPT-KIN</h1>

      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($ressources::all() as $ressource )
        <div class="col">
            <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="70" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">{{$ressource->libele}}</text></svg>

                <div class="card-body">
                <p class="card-text"> {{$ressource->description}}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a type="button" href="{{$ressource->url}}" class="btn btn-sm btn-outline-secondary">Consulter</a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        @endforeach
      </div>
    </div>
  </div>

</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Retourner en haut</a>
    </p>
    <p class="mb-1">&copy; 2021 | ISPT-KIN</p>
  </div>
</footer>
    <script src="https://getbootstrap.com/docs/5.1/dist/js/bootstrap.bundle.min.js" ></script>


  </body>
</html>
