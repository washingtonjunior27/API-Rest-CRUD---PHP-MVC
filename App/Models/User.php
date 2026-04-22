<?php

namespace App\Models;

class User
{
    private int $id_user;
    private string $name_user;
    private string $login_user;
    private string $password_user;
    private string $email_user;
    private string $phone_user;

    /**
     * Get the value of id_user
     */
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * Get the value of name_user
     */
    public function getName_user()
    {
        return $this->name_user;
    }

    /**
     * Set the value of name_user
     *
     * @return  self
     */
    public function setName_user($name_user)
    {
        $this->name_user = $name_user;

        return $this;
    }

    /**
     * Get the value of login_user
     */
    public function getLogin_user()
    {
        return $this->login_user;
    }

    /**
     * Set the value of login_user
     *
     * @return  self
     */
    public function setLogin_user($login_user)
    {
        $this->login_user = $login_user;

        return $this;
    }

    /**
     * Get the value of password_user
     */
    public function getPassword_user()
    {
        return $this->password_user;
    }

    /**
     * Set the value of password_user
     *
     * @return  self
     */
    public function setPassword_user($password_user)
    {
        $this->password_user = $password_user;

        return $this;
    }

    /**
     * Get the value of email_user
     */
    public function getEmail_user()
    {
        return $this->email_user;
    }

    /**
     * Set the value of email_user
     *
     * @return  self
     */
    public function setEmail_user($email_user)
    {
        $this->email_user = $email_user;

        return $this;
    }

    /**
     * Get the value of phone_user
     */
    public function getPhone_user()
    {
        return $this->phone_user;
    }

    /**
     * Set the value of phone_user
     *
     * @return  self
     */
    public function setPhone_user($phone_user)
    {
        $this->phone_user = $phone_user;

        return $this;
    }
}
