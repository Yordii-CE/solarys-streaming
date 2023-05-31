<?php
class MoviesModel extends Model
{
    function __construct()
    {
        $this->loadDatabase();
    }

    function getAll()
    {
        return $this->db->select("select * from movies");
    }
}
