<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap"
        rel="stylesheet">

    <title>Akyüz Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ URL::asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/blog.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/owl.css') }}">

</head>

<body>

    <!-- ***** Preloader Start ***** -->

    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ route('posts.index') }}">
                    <h2>Akyuz Blog<em>.</em></h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('posts.index') }}">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('about') }}">About Us</a>
                        </li>
                        <!---<li class="nav-item">
                            <a class="nav-link" href="blog.html">Blog Entries</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="post-details.html">Post Details</a>
                        </li>--->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('contact') }}">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @yield('body')

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="social-icons">
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">İnstagram</a></li>
                        <li><a href="#">Linkedin</a></li>
                        <li><a href="#">Discord</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="copyright-text">
                        <p>Akyuz 2023

                            | Design: <a rel="nofollow" href="https://github.com/mlhakyz" target="_parent">Akyuz</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ URL::asset('jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.bundle.min.js') }}"></script>

    <!-- Additional Scripts -->
    <script src="{{ URL::asset('js/custom.js') }}"></script>
    <script src="{{ URL::asset('js/owl.js') }}"></script>
    <script src="{{ URL::asset('js/slick.js') }}"></script>
    <script src="{{ URL::asset('js/isotope.js') }}"></script>
    <script src="{{ URL::asset('js/accordions.js') }}"></script>

    <script language="text/Javascript">
        cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
        function clearField(t) { //declaring the array outside of the
            if (!cleared[t.id]) { // function makes it static and global
                cleared[t.id] = 1; // you could use true and false, but that's more typing
                t.value = ''; // with more chance of typos
                t.style.color = '#fff';
            }
        }
    </script>

</body>

</html>
