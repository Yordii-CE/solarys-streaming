<?php
class MoviesController extends Api
{
    function __construct()
    {
        $this->loadModel();
    }
    function get()
    {
        $this->ok(["movies" => $this->model->getAll()]);
    }
}
