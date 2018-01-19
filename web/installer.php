<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Ensofon installer</title>
    <meta name="description" content="My template">

    <!-- style -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

</head>
<body class="">

<div class="container">
    <div class="row" >
        <div class="col-md-6 col-md-offset-3" style="text-align: center">
            <h3 class="page-header" >Установка зависимостей</h3>
            <p>Зависимости <strong>composer</strong> не были найдены.</p>
            <p>Для установки зависимостей выполните команду <br> <code>php composer.phar install</code>, находясь в директории <code><?=preg_replace("#web$#","",__DIR__);?></code></p>
        </div>
    </div>

</div>
<!-- scripts -->
<script src="//cdn.jsdelivr.net/jquery/2.1.3/jquery.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>


</body>
</html>
