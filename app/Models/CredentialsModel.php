<?php
namespace App\Models;

class CredentialsModel
{

    private $credentials_id;

    private $username;

    private $password;

    private $user_user_id;

    public function __construct($credentials_id, $username, $password, $user_user_id)
    {
        $this->credentials_id = $credentials_id;
        $this->username = $username;
        $this->password = $password;
        $this->user_user_id = $user_user_id;
    }

    /**
     *
     * @return mixed
     */
    public function getCredentials_id()
    {
        return $this->credentials_id;
    }

    /**
     *
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     *
     * @param mixed $credentials_id
     */
    public function setCredentials_id($credentials_id)
    {
        $this->credentials_id = $credentials_id;
    }

    /**
     *
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     *
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
    /**
     * @return mixed
     */
    public function getUser_user_id()
    {
        return $this->user_user_id;
    }

    /**
     * @param mixed $user_user_id
     */
    public function setUser_user_id($user_user_id)
    {
        $this->user_user_id = $user_user_id;
    }

}