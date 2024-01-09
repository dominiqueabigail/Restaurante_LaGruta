<?php ob_start();?>
<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Tienda de Camisetas</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="<?=base_url?>assets/css/styles.css"/>
        <!-- Font Awesome -->
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
        />
        <!-- Google Fonts -->
        <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
        />
        <!-- MDB -->
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css"
        rel="stylesheet"
        />
    </head>
    <body>
        <div id="container">
            <!-- CABECERA -->
            <header id="header"> 
            <div >                
                    <div class="navbar-brand">
                        <a class="navbar-item" href="https://parzibyte.me/blog">
                            <img alt="" src="https://i.pinimg.com/564x/d0/cb/dd/d0cbdd64072b39bee998da3f214c52cf.jpg" style="max-height: 80px" />
                        </a>
                    </div>
                    
            </div>
            </header>

            <!-- MENU -->
            <?php $categorias = Utils::showCategorias(); ?>
            <nav id="menu">
                <ul>
                    <li>
                        <a href="<?=base_url?>">Inicio</a>
                    </li>
                    <?php while($cat = $categorias->fetch_object()): ?>
                    <li>
                        <a href="<?=base_url?>categoria/ver&id=<?=$cat->id?>"><?=$cat->nombre?></a>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </nav>

            <div id="content">

