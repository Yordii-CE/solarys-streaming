<?php
class UsersModel extends Model
{
    function __construct()
    {
        $this->loadDatabase();
    }

    function get($email)
    {
        $user = $this->db->select("select * from users where email = $email");

        return count($user) > 0 ? $user[0] : null;
    }

    function validate($email, $password)
    {
        $user = $this->db->select("select * from users where email = '$email' and password = '$password'");

        return count($user) > 0 ? $user[0] : null;
    }

    function create($user)
    {
        try {
            $this->db->insert("
                insert into users(email, password, preferences, isPremium) 
                values(
                    '{$user['email']}', 
                    '{$user['password']}', 
                    '{$user['preferences']}', 
                    '{$user['isPremium']}'
                );
            ");

            return $user;
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }

    function update($email)
    {
        $email = $this->db->connection->quote($email); // Escapar el valor de $email

        try {
            $this->db->update("
                update users 
                set isPremium = 'yes'
                where email = $email;
            ");

            return $this->get($email);
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }
}
