<?php $auth = new Auth(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>Fatura+</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/Ludens-Users---25-After-Register.css">
    <link rel="stylesheet" href="public/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="router.php"><?= constant('NOME_APP') ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if ($auth->isLoggedIn() && $_SESSION['login'][2] != 'cliente') { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="router.php?r=user/create">Registar Utilizador</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="router.php?r=user/index">Gerir Utilizadores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="router.php?r=iva/create">Registar Iva</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="router.php?r=iva/index">Gerir Ivas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="router.php?r=produto/create">Registar Produto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="router.php?r=produto/index">Gerir Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="router.php?r=fatura/create">Registar Fatura</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="router.php?r=fatura/index">Gerir Faturas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="router.php?r=empresa/index">Gerir Empresa</a>
                        </li>
                    <?php } else if ($auth->isLoggedIn() && $_SESSION['login'][2] == 'cliente') { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="router.php?r=fatura/index">Ver Faturas</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <ul class="navbar-nav ml-auto flex-nowrap">
                <?php if (!$auth->isLoggedIn()) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="router.php?r=<?= constant('ROTA_LOGIN') ?>">Login</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="router.php?r=<?= constant('ROTA_LOGOUT') ?>">Logout (<?= $_SESSION['login'][0] ?>)</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </nav>