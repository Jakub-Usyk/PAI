<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $username): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users
            JOIN public.users_details ON users."ID_users_details" = users_details."ID_users_details"
            WHERE username = :username
        ');

        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['username'],
            $user['password'],
            $user['email'],
            $user['name'],
            $user['surname']
        );
    }
}