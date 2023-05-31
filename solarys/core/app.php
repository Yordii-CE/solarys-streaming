<?php
require_once 'app/controllers/error.controller.php';

/*NOTAS:
 pattern: "{controller=login}/{action=index}/{id?}") 
 api: Solo soporta rutas a primer nivel: ✔(/users), X(/data/users) 
 (SOLUCION $THIS->PRE, $THIS->POST DE ROUTE CLASE QUE HEREDA API)
 */
class App
{
    function __construct()
    {
        Cors::enableCors();

        session_start();
        $url = isset($_GET["url"]) ? $_GET["url"] : constant('DEFAULT_CONTROLLER');
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        $controllerName = $url[0];
        $pathController = 'app/controllers/' . $controllerName . '.controller.php';

        if (file_exists($pathController)) {
            $request = $_SERVER['REQUEST_METHOD'];

            require_once $pathController;
            $controllerName = $controllerName . "Controller";
            $controller = new $controllerName();

            $methodName;
            //Validate if controller is RestApi
            if (is_subclass_of($controller, 'Api'))
                $methodName = $request;
            else {
                // Check to set default method
                $methodName = isset($url[1]) ? $url[1] : 'index';
            }

            // Validate method
            if (!method_exists($controller, $methodName)) {
                $controller = new ErrorController();
                $controller->index("'$methodName' action not found");
                return;
            }

            // Validate params
            $params = [];
            $paramsIndex = is_subclass_of($controller, 'Api') ? 1 : 2;

            if (isset($url[$paramsIndex])) {
                for ($i = $paramsIndex; $i < sizeof($url); $i++) {
                    $param = $url[$i];
                    array_push($params, $param);
                }
            }
            //call method/action   
            call_user_func_array(array($controller, $methodName), $params);
        } else {
            $controller = new ErrorController();
            $controller->index("'$controllerName' not found");
        }
    }
}
