<?php

namespace App\Repositories;

use App\Models\User;
use App\Config\Connection;

use PDO;
use PDOException;

class UserApiRepository
{
    private $pdo;

    public function __construct()
    {
        $conn = new Connection;
        $this->pdo = $conn->getConn();
    }

    public function createRepository(User $user)
    {
        $sql = 'INSERT INTO user (name_user, email_user, phone_user, login_user, password_user)
                VALUES (:name, :email, :phone, :login, :password)';
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':name' => $user->getName_user(),
            ':email' => $user->getEmail_user(),
            ':phone' => $user->getPhone_user(),
            ':login' => $user->getLogin_user(),
            ':password' => $user->getPassword_user()
        ]);
    }

    public function findLogin($login_user)
    {
        $sql = 'SELECT * FROM user WHERE login_user = :login_user';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':login_user' => $login_user
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateRepository(User $user)
    {
        $sql = 'UPDATE user SET name_user = :name_user, email_user = :email_user, 
                                phone_user = :phone_user, login_user = :login_user, 
                                password_user = :password_user WHERE id_user = :id_user';
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':name_user' => $user->getName_user(),
            ':email_user' => $user->getEmail_user(),
            ':phone_user' => $user->getPhone_user(),
            ':login_user' => $user->getLogin_user(),
            ':password_user' => $user->getPassword_user(),
            ':id_user' => $user->getId_user()
        ]);
    }

    public function deleteRepository($id_user)
    {
        $sql = "DELETE FROM user WHERE id_user = :id_user";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':id_user' => $id_user]);
    }
}
