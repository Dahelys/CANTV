{!!Form::open(['class'=>'form-horizontal','route'=>'planta.store', 'method'=>'POST'])!!}

             
 <div class="form-group">

                <label  class="control-label col-xs-5">IP de Sistema Metro:</label>
         <div class="col-xs-3">


{!!Form::text('dir_ip', null,['class'=>'form-control', 'placeholder'=>'Dirección IP ', 'onkeyup'=>'javascript:this.value=this.value.toUpperCase()', 'required'=>'required', 'maxlength'=>'30'])!!}
             
         </div>

     </div>
     <div class="form-group">
         <label for="inputName" class="control-label col-xs-5">Nombre del Nodo:</label>
         <div class="col-xs-3">
{!!Form::text('equipo',null,['class'=>'form-control', 'placeholder'=>'Nombre Nodo', 'onkeyup'=>'javascript:this.value=this.value.toUpperCase()','required'=>'required', 'maxlength'=>'100'])!!}

         </div>
     </div>

     <div class="form-group">
         <label for="inputName" class="control-label col-xs-5">Puerto ATM/FR:</label>
         <div class="col-xs-3">
        {!!Form::number('puerto_atm_fr',null,['class'=>'form-control', 'placeholder'=>'puertos', 'min'=>'0','maxlength'=>'30'])!!}

         </div>
     </div>
     <div class="form-group">
         <label for="inputName" class="control-label col-xs-5">Puerto Metro:</label>
         <div class="col-xs-3">
        {!!Form::number('puerto_metro',null,['class'=>'form-control', 'placeholder'=>'puertos', 'min'=>'0','maxlength'=>'30'])!!}

         </div>
     </div>

     <div class="form-group">
         <label for="name" class="control-label col-xs-5">Marca:</label>
         <div class="col-xs-3">
{!!Form::select('marca_equipo',

['ALCATEL' => 'ALCATEL', 
'HUAWEI' => 'HUAWEI', 'ZTE' => 'ZTE'],null,['class'=>'form-control' , 'placeholder' => 'Seleccione Marca'])!!}
         </div>

        </div> 

             <div class="form-group">
         <label for="name" class="control-label col-xs-5">Modelo:</label>
         <div class="col-xs-3">
                    
{!!Form::text('modelo_equipo',null,['class'=>'form-control', 'placeholder'=>'Modelo equipo','onkeyup'=>'javascript:this.value=this.value.toUpperCase()','required'=>'required', 'maxlength'=>'30'])!!}

         </div>

        </div> 

         <div class="form-group">
        <label class="control-label col-xs-5">Región:</label>
     
        <div class="col-xs-3">


{!!Form::select('region_equipo',['ANDES' => 'ANDES', 'CAPITAL' => 'CAPITAL','CENTRAL' => 'CENTRAL','CENTRO OCCIDENTE' => 'CENTRO OCCIDENTE', 'OCCIDENTAL' => 'OCCIDENTAL','ORIENTAL' => 'ORIENTAL'],null,['class'=>'form-control', 'placeholder' => 'Seleccione Región'])!!}

    
        </div>
</div>

<div class="form-group">
        <label class="control-label col-xs-5">Estado:</label>
     
        <div class="col-xs-3">

    
{!!Form::select('estado_equipo',['AMAZONAS' => 'AMAZONAS', 'ANZOATEGUI' => 'ANZOATEGUI',
'APURE' => 'APURE','ARAGUA' => 'ARAGUA', 'BARINAS' => 'BARINAS',
'BOLIVAR' => 'BOLIVAR', 'CARABOBO' => 'CARABOBO', 'COJEDES' => 'COJEDES',
'DELTA AMACURO' => 'DELTA AMACURO','DTTO CAPITAL' => 'DTTO CAPITAL', 
'FALCON' => 'FALCON','GUARICO' => 'GUARICO', 'LARA' => 'LARA', 
'MERIDA' => 'MERIDA','MIRANDA' => 'MIRANDA','MONAGAS' => 'MONAGAS', 
'NUEVA ESPARTA' => 'NUEVA ESPARTA','PORTUGUESA' => 'PORTUGUESA', 
'SUCRE' => 'SUCRE', 'TACHIRA' => 'TACHIRA','TRUJILLO' => 'TRUJILLO',
'VARGAS' => 'VARGAS', 'YARACUY' => 'YARACUY','ZULIA' => 'ZULIA'],null,['class'=>'form-control', 'placeholder' => 'Seleccione Estado'])!!}


        </div>
</div>


          <div class="form-group">

                <label  class="control-label col-xs-5">Central:</label>
         <div class="col-xs-3">
            {!!Form::text('central_sise',null,['class'=>'form-control', 'placeholder'=>'Nombre Central','onkeyup'=>'javascript:this.value=this.value.toUpperCase()','required'=>'required', 'maxlength'=>'60'])!!}
         </div>

     </div>

               <div class="form-group">

                <label  class="control-label col-xs-5">Código Contable:</label>
         <div class="col-xs-3">
                                {!!Form::text('codigo_contable',null,['class'=>'form-control', 'placeholder'=>'Codigo Contable','onkeyup'=>'javascript:this.value=this.value.toUpperCase()','required'=>'required', 'maxlength'=>'10'])!!}
         </div>

     </div>
     
   <div class="form-group">
        <label class="control-label col-xs-5">Tipo:</label>
     
        <div class="col-xs-3">

{!!Form::select('tipo_puerto',['ATM/FR' => 'ATM/FR', 
'METRO' => 'METRO'],null,['class'=>'form-control', 'placeholder' => 'Selecione Tipo de Puerto'])!!}

        </div>
</div>
 
