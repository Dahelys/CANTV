  {!!Html::style('css/family-lato.css')!!}

   
    

   
    <!-- Jquery -->
    {!!Html::script('js/jquery-1.11.3.min.js')!!}

   

    <!-- Datepicker Files -->

    {!!Html::style('datePicker/css/bootstrap-datepicker3.css')!!}
  
   

    {!!Html::script('datePicker/js/bootstrap-datepicker.js')!!}

   <!-- Languaje -->

    {!!Html::script('datePicker/locales/bootstrap-datepicker.es.min.js')!!}
    

<script>
    $('.datepicker').datepicker({
        format: "yyyy-mm-dd",
        language: "es",
        autoclose: true
    });

   


</script>