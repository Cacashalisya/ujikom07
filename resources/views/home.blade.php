@extends('adminlte::page')

@section('title', 'SHA.Trip - Discover Your Adventure')

@section('content_header')
    <h1 class="m-0 text-dark">
        <span class="unique-font text-blue">SHA.Trip - Discover Your Adventure</span>
    </h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div id="imageSlider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://i.pinimg.com/564x/91/cb/38/91cb388e7e7ff70ae33de221b5df1cc8.jpg" class="d-block w-100" alt="Slide 1">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Discover New Horizons</h5>
                            <p>Explore breathtaking landscapes and immerse yourself in different cultures.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://www.islander.io/wp-content/uploads/wpallimport/files/places/Banda%20Neira.jpg" class="d-block w-100" alt="Slide 2">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Create Lasting Memories</h5>
                            <p>Make unforgettable experiences with your loved ones.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://www.ikons.id/wp-content/uploads/2017/11/7898886782_7679b4be1d_o.jpg" class="d-block w-100" alt="Slide 3">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Adventures Await</h5>
                            <p>Embark on thrilling adventures and push your limits.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#imageSlider" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#imageSlider" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card bg-blue">
                <div class="card-body">
                    <h3 class="text-white">Have Questions?</h3>
                    <p class="text-white">Feel free to reach out to our friendly team for any inquiries or assistance.</p>
                    <a href="#" class="btn btn-light">Get in Touch</a>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-body">
                    <h3 class="text-dark">Latest Offers</h3>
                    <ul class="list-group">
                        <li class="list-group-item">Special Discount to Bali</li>
                        <li class="list-group-item">Adventure Package to Mount Everest</li>
                        <li class="list-group-item">Luxury Cruise to the Caribbean</li>
                        <li class="list-group-item">Hiking Trip to Machu Picchu</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop

@push('styles')
    <style>
        .unique-font {
            font-family: 'YourUniqueFont', sans-serif;
            font-size: 28px;
            font-weight: bold;
        }

        .text-blue {
            color: blue;
        }
    </style>
@endpush
