<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Reporte de Red de Datos">
    <link rel="shortcut icon" href="{{ asset('img/cantv.ico') }}"
 
     type="image/x-icon">

    
    <link rel="icon" href="{{ asset('img/cantv.ico') }}" img/cantv.ico" type="image/x-icon">
    <meta name="author" content="CANTV">

    <title>Reporte de Red de Datos</title>


<!--///////////////////////// Hojas de Estilo /////////////////////////////-->


    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/half-slider.css')!!}
    {!!Html::style('css/styles.css')!!}
    {!!Html::style('css/titulos.css')!!}




<!--///////////////////////////////////////////////////////////////////////-->






</head>

<body >



@yield('content')



        <!-- Footer -->
        <footer>

         <hr/>
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


    

    <!-- /.container -->

    <!-- jQuery -->
    {!!Html::script('js/jquery.js')!!}
   

    <!-- Bootstrap Core JavaScript -->
    {!!Html::script('js/bootstrap.min.js')!!}
       
    <!-- Graficas JavaScript -->


    {!!Html::script('js/graficas.js')!!}


</body>

</html>

