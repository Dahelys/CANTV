<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Reporte de Red de Datos">
    <meta name="author" content="CANTV">
    <link rel="shortcut icon" href="img/cantv.ico" type="image/x-icon">
    <link rel="icon" href="img/cantv.ico" type="image/x-icon">

    <title>Reporte de Red de Datos</title>


<!--///////////////////////// Hojas de Estilo /////////////////////////////-->

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
   <link href="css/half-slider.css" rel="stylesheet">

    <link href="css/styles.css" rel="stylesheet">

<!--///////////////////////////////////////////////////////////////////////-->

</head>

<body>




<!--///////////////////////////// Navigación /////////////////////////////////-->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

        
  <div id='cssmenu'>


  <ul>


<li id="button_ingreso"><a href='#' data-toggle="modal" data-target="#myModal" >Ingresar</a></li>


<img src="img/cantv _Black_and_White.png" width="115px" height="50px" />


</ul>

</div>

</nav>

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

@include('alertas.errors')
  @include('alertas.request')
    <!-- Contenido de la Pagina -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <br>
                <br>
                <br>
                <br>
                <br><br>
                <br>
                <br>
            </div>
        </div>

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                   <center>        <p><b>Copyleft &copy; Compañía Anónima Nacional Teléfonos de Venezuela | 


                   <?php 

                    echo date('Y');
                   ?>


                   </b></p> </center>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    

<div class="container">



<!-- Modal -->


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center>
         <br><h4 class="modal-title" id="myModalLabel">
        <img src="img/cantv.png" width="90px" height="40px" />&nbsp;
        | Iniciar Sesión</h4></center>
      </div>
      <div class="modal-body">
      <br>

    <center>


      {!!Form::open(['route'=>'log.store', 'method'=>'POST'])!!}
           
           {!!Form::label('name','Usuario:',['class' => 'control-label col-xs-5'])!!} 
           <div class="col-xs-5">



           {!!Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Ingresa tu Usuario'])!!}
           </div>
<br>
<br>
          {!!Form::label('¨contrasena','Contraseña:',['class' => 'control-label col-xs-5'])!!} 

          <div class="col-xs-5">
          {!!Form::password('password',['class'=>'form-control', 'placeholder'=>'Ingresa tu contraseña'])!!}

          </div>
      </div>
      </center>
<br>
      <br>
<br>
      <div class="modal-footer">
      <center>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        {!!Form::submit('Iniciar',['class'=>'btn btn-primary'])!!}
        
        </center>
      </div>
      
        {!!Form::close()!!}




    </div>
  </div>
</div>


  



    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>

