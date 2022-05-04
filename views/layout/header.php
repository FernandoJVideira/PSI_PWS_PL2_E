<?php $auth = new Auth(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="public/css/styles.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="router.php"><?=constant('NOME_APP')?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="router.php?r=plan/index">Plano</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="router.php?r=book/index">Books</a>
                    </li>
                    <?php if(!$auth -> isLoggedIn()){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="router.php?r=<?=constant('ROTA_LOGIN')?>">Login</a>
                    </li>
                    <?php }else{ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="router.php?r=<?=constant('ROTA_LOGOUT')?>">Logout (<?= $_SESSION['login'] ?>)</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>