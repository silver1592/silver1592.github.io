<?php 
        //Sesiones son variables que se almacenan el el servidor mientras se tenga coneccion,
        //esto quiere decir que cuando se cierre el navegador se perdera la informacion
        session_start();    //inicia una secion
        $_SESSION["nombre"] = "valor";


        //cookies son variables que se quedan en el cliente
        
        //creacion de cookies
        setcookies("cookie1","1",10); //'nombre','valor',duracion
        
        //lectura de cookies
        $cookie = $_COOKIE["cookie1"];
?>