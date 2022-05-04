<?php

class BaseController
{
    public function redirectToRoute($route = '')
    {
        $url = 'router.php';
        if($route)
        {
            $url = 'router.php?r='.$route;
        }
        header('Location: '.$url);
        exit(0);
    }

    public function renderView($view, $params = [])
    {
        extract($params);
        require_once 'views/layout/header.php';
        require_once 'views/'.$view;
        require_once 'views/layout/footer.php';
    }

}