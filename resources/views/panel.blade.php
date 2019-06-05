@extends('plantillas.admin')
@extends('plantillas.menu')
@section('content')


<!--/////////////////////////////////////////////////////////////////////////-->

 <!-- ////////////////////////Corrusel de Imagenes ////////////////////////-->

    <header id="myCarousel" class="carousel slide">
<!-- Indicadores  -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
<!--////////////-->
             <!-- Laminas -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('img/slider.png');"></div>
                <div class="carousel-caption">
                    <h2>Reporte de Red de Datos de CANTV</h2>
                </div>
            </div>
           <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" 

                style="background-image:url('img/banner aniversario.png');"></div>
                <div class="carousel-caption">
                    <h2></h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" 

                style="background-image:url('img/slider4.jpg');"></div>
                <div class="carousel-caption">
                    <h2></h2>
                </div>
            </div>

        <!-- Controles -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </header>

<!--/////////////////////////////////////////////////////////////////////////-->


    <!-- Contenido de la Pagina -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12">


<br><br>
@include('alertas.errors')
            <br><br><br><br><br>

            </div>
        </div>

   


  
    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
