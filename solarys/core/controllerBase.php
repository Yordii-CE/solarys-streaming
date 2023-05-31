<?php
require_once 'libs/meta.php';
class ControllerBase
{
    public $model;
    function loadModel($modelName = null)
    {
        if ($modelName == null) $modelName = Meta::getCurrentController();

        $pathModel = 'app/models/' . $modelName . '.model.php';

        if (!file_exists($pathModel)) {
            echo "Model not found";
            return;
        }

        //return $pathModel: 
        require $pathModel;

        $modelName = $modelName . 'Model';
        $this->model  = new $modelName();
    }
}
