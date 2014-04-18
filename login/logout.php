<?php
include("seguranca.php");

session_start(); //iniciamos a sessão que foi aberta





session_destroy(); //pei!!! destruimos a sessão ;)


session_unset(); //limpamos as variaveis globais das sessões



expulsaVisitante();

 //"<script>alert('Você saiu!');top.location.href='loginMetro.php';</script>"; 





?>
