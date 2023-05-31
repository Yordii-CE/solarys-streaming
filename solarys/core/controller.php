<?php
require_once 'libs/meta.php';
class Controller extends ControllerBase
{
    public $model;

    function view()
    {
        $args = func_get_args();

        $viewName = Meta::getCurrentController() . '/' . Meta::getCurrentAction();
        $model = null;
        $useTemplate = true;

        if (count($args) >= 1) {
            if (gettype($args[0]) == 'string') {
                $viewName = Meta::getCurrentController() . '/' . $args[0];
            } elseif (gettype($args[0]) == 'array') {
                $model = $args[0];
            } elseif (gettype($args[0]) == 'boolean') {
                $useTemplate = $args[0];
            }
        }

        if (count($args) >= 2) {
            if (gettype($args[1]) == 'array') {
                $model = $args[1];
            } elseif (gettype($args[1]) == 'boolean') {
                $useTemplate = $args[1];
            }
        }

        if (count($args) >= 3) {
            $model = $args[1];
            $useTemplate = $args[2];
        }
        //return [$viewName, $model, $useTemplate];
        View::render($viewName, $model, $useTemplate);
    }

    function redirectToAction()
    {
        $args = func_get_args();
        $baseUrl = constant("BASE_URL");

        $controller = Meta::getCurrentController();
        $action = isset($args[0]) ? $args[0] : '';
        $params = '';

        if (count($args) > 1) {
            if (is_string($args[1])) {
                $controller = $args[1];
            } elseif (is_array($args[1])) {
                $params = implode('/', $args[1]);
            }
        }

        if (count($args) > 2) {
            $params = implode('/', $args[2]);
        }

        $redirectUrl = rtrim("$baseUrl/$controller/$action/$params", '/');

        //return $redirectUrl;
        header("Location: $redirectUrl");
    }
}
