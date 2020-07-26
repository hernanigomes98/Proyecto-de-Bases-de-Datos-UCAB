@extends('adminlte::page')
@section('content')

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Animated-Pretty-Product-List-v12.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="container">
        <div class="row product-list dev">

            @foreach ($perfume as $d)



            <div class="col-md-4 col-sm-6 product-item animation-element slide-top-left">
                <div class="product-container">
                    <div class="row">
                        <div class="col-md-12"><a class="product-image" href="#"><img src="assets/img/iphone6.jpg"></a></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <h2><a href="#">{{$d->nombre}}</a></h2>
                        </div>
                        <div class="col-xs-4"><a class="small-text" href="#">compare </a></div>
                    </div>
                    <div class="product-rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i><a class="small-text" href="#">82 reviews</a></div>
                    <div class="row">
                        <div class="col-xs-12">
                            <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ornare sem sed nisl dignissim, facilisis dapibus lacus vulputate. Sed lacinia lacinia magna. </p>
                            <div class="row">
                                <div class="col-xs-6"><button class="btn btn-default" type="button">Buy Now!</button></div>
                                <div class="col-xs-6">
                                    <p class="product-price">$599.00 </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach


        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Animated-Pretty-Product-List-v12.js"></script>
</body>

</html>



@endsection
