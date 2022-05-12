<?php

require_once 'vendor/autoload.php';

ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory('./models');
    $cfg->set_connections(
    array(
     'development' => 'mysql://root@localhost/pws_ficha8',
    )
    );
});

define('NOME_APP', 'Fatura+');
define('ROTA_LOGIN', 'auth/login');
define('ROTA_LOGOUT', 'auth/logout');