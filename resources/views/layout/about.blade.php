@extends('layout.layout')
@section('body')
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>about us</h4>
                            <h2>all about php</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Banner Ends Here -->


    <section class="about-us">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <img src="{{ URL::asset('images/about-us.jpg') }}" alt="">
                    <p>PHP is a widely-used open source general-purpose scripting language that is especially suited for web
                        development and can be embedded into HTML.
                        Instead of lots of commands to output HTML, PHP pages contain HTML with
                        embedded code that does "something". The PHP code is
                        enclosed in special start and end processing instructions that allow you to jump
                        into and out of "PHP mode."

                        What distinguishes PHP from something like client-side JavaScript is that the code is executed on
                        the server, generating HTML which is then sent to the client. The client would receive the results
                        of running that script, but would not know what the underlying code was. You can even configure your
                        web server to process all your HTML files with PHP, and then there's really no way that users can
                        tell what you have up your sleeve.
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <h4>Laravel</h4>
                    <p>Laravel is a web application framework with expressive, elegant syntax. A web framework provides a
                        structure and starting point for creating your application, allowing you to focus on creating
                        something amazing while we sweat the details.</p>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12">
                    <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>


        </div>
    </section>
@endsection
