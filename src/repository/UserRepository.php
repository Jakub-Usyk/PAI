<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $username): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users
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

    public function getUserSalt(string $username): string
    {
        $stmt = $this->database->connect()->prepare('
            SELECT salt FROM users WHERE users.username = :username
        ');

        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $salt = $stmt->fetch( PDO::FETCH_COLUMN);

        return $salt;
    }

    public function addUser(User $user, string $salt): string {

        $username = $user->getUsername();
        if ($this->getUser($username) != null) {
            return "User already exists!";
        }
        try {
            $stmt = $this->database->connect()->prepare(
                '
                INSERT INTO public.users(username, password, email, name, surname, salt) 
                VALUES (?, ?, ?, ?, ?, ?)
            '
            );

            $stmt->execute([
                $user->getUsername(),
                $user->getPassword(),
                $user->getEmail(),
                $user->getName(),
                $user->getSurname(),
                $salt
            ]);

            return "User created successfully";

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}