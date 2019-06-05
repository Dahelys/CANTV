<?php

//------------------------------------------------------


function reiniciar_tablas(){
//DB::table("plantas")->truncate();
//DB::table("estado_nodos_planta")->truncate();

//DB::table("historials")->truncate();

//DB::table("plantas2")->truncate();


DB::table("spl_sise")->truncate();
DB::table("spls")->truncate();
DB::table("nodos_sise")->truncate();
DB::table("orden")->truncate();
DB::table("detalle_orden")->truncate();


}//Cierre de la funcion


//-----------------------------------------------------
?>















