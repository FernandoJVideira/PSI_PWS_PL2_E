<?php

class BaseController
{
    public function redirectToRoute($route = '', $params = [])
    {
        $url = 'router.php';
        if ($route) {
            $url = 'router.php?r=' . $route;
            foreach ($params as $paramKey => $paramValue) {
                $url .= '&' . $paramKey . '=' . $paramValue;
            }
        }
        header('Location: ' . $url);
        exit(0);
    }

    public function renderView($view, $params = [])
    {
        extract($params);
        require_once 'views/layout/header.php';
        require_once 'views/' . $view;
        require_once 'views/layout/footer.php';
    }
}
