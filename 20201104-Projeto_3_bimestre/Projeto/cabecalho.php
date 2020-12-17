<?php

function cabecalho(){
    session_start();
    $alt = $GLOBALS["alt"];
    $menu = $GLOBALS["menu"];
    echo "<!DOCTYPE html>
    <html>
        <head>
            <meta charset='utf-8' />
            <script src='js/jquery-3.5.1.min.js'></script>
            <link href='bootstrap/css/bootstrap.min.css' rel='stylesheet' />            
            <link href='css/main.css' rel='stylesheet' />            
            <script src='bootstrap/js/bootstrap.min.js'></script>
            <script src='js/MD5.js'></script>
        </head>
        <body>                
            <nav class='navbar navbar-expand-md bg-primary navbar-dark'>
            <a href='index.php' class='navbar-brand logotipo'>
                <img src='img/restaurante.png' class='rounded' alt='$alt' />
            </a>

            <!-- botão que aparece quando a tela for pequena -->
            <button class='navbar-toggler' type='button'
                data-toggle='collapse' data-target='#menu'>
                <span class='navbar-toggler-icon'></span>
            </button>

            <div class='collapse navbar-collapse' id='menu'>
                <ul class='navbar-nav'>";
                if(isset($_SESSION["usuario"])){
                    if($_SESSION["permissao"]!=1){
                        $cont1=0;
                        echo"<li role='presentation' class='dropdown'>
                                <a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
                                Cadastrar<span class='caret'></span>
                                </a>
                                <ul class='dropdown-menu'>"; 
                        foreach($menu as $i=>$l){
                            if($cont1 == 2 || $cont1 == 3){
                                echo "<li class='nav-item'>
                                <a class='menu' href='form_$i.php'>$l</a>
                                </li>";
                            }
                            $cont1++;
                        }   
                    }
                    else{
                      echo"<li role='presentation' class='dropdown'>
                        <a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
                          Cadastrar<span class='caret'></span>
                        </a>
                        <ul class='dropdown-menu'>"; 
                        foreach($menu as $i=>$l){
                            echo "<li class='nav-item'>
                                    <a class='menu' href='form_$i.php'>$l</a>
                                </li>";
                        }  
                    }                       
                    echo "</ul>
                    </li>
                    <li role='presentation' class='dropdown'>
                    <a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
                      Listar <span class='caret'></span>
                    </a>
                    <ul class='dropdown-menu'>";                        
                foreach($menu as $i=>$l){
                    echo "<li class='nav-item'>
                            <a class='menu' href='lista_$i.php'>$l</a>
                        </li>";
                }  
                echo "
                    
                        </ul>
                    </li>
                    <ul class='navbar-nav'>
                        <li role='presentation'>
                            <a href='logout.php'>Logout</a>
                        </li>
                    </ul>";
                    if($_SESSION["permissao"]==3){
                        echo "<ul class='navbar-nav'>
                        <li role='presentation'>
                            <a href='lista_usuarios.php'>Perfil</a>
                        </li>
                    </ul>";
                    }
                    if($_SESSION["permissao"]==1){

                        echo"<ul class='navbar-nav'>
                        <li role='presentation'>
                            <a href='#' data-toggle='modal' data-target='#modal_cadastro'>Cadastrar</a>
                        </li>
                    </ul>
                    <ul class='navbar-nav'>
                        <li role='presentation'>
                            <a href='lista_usuarios.php'>Usuarios</a>
                        </li>
                    </ul>";
                    }
            }

            else{

                    echo" <ul class='navbar-nav'>
                    <li role='presentation'>
                        <a href='#' data-toggle='modal' data-target='#modal_cadastro'>Cadastrar-se</a>
                    </li>
                </ul>
                    
                    <ul class='navbar-nav'>
                        <li role='presentation'>
                            <a href='#' data-toggle='modal' data-target='#modal_login'>Login</a>
                        </li>
                    </ul>
                    <li role='presentation' class='dropdown'>
                    <a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
                      Listar <span class='caret'></span>
                    </a>
                    <ul class='dropdown-menu'>";
                    $cont=0;                        
                foreach($menu as $i=>$l){
                    if($cont == 0 || $cont == 1){
                        echo "<li class='nav-item'>
                            <a class='menu' href='lista_$i.php'>$l</a>
                        </li>";
                    }
                    $cont++;
                }  
            }
            echo "</ul>  
                    
            </div>        
        </nav>
        <main role='main' class='container'>";
        if(isset($_GET["erro"])){
            if($_GET["erro"]==2){
                echo"<div id='erro'>ERRO: Cadastre-se de forma correta!!</div>";
            }
            else{
                echo"<div id='erro'>ERRO na autenticação</div>";
            }
        }
        if(isset($_GET["confirmacao"])){
            echo"<div id='confirmacao'>CADASTRADO com sucesso!!!</div>";
        }
        include "form_login.php";
        include "form_cadastro.php";
}
?>