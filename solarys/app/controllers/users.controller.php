<?php
class UsersController extends Api
{
    function __construct()
    {
        $this->loadModel();
    }
    function get($email, $password)
    {
        $user = $this->model->validate($email, $password);

        if ($user == null) $this->fail("Unknown user.");
        else $this->ok(["user" => $user]);
    }

    function post()
    {

        $user = json_decode(file_get_contents('php://input'), true);

        $response = $this->model->create($user);

        if (gettype($response) == "string") $this->fail($response);
        else $this->ok(['user' => $response], 'successfully registered user');
    }


    function put($email)
    {
        $response = $this->model->update($email);

        if (gettype($response) == "string") $this->fail($response);
        else $this->ok(['user' => $response], 'successfully upgraded user');
    }
}
