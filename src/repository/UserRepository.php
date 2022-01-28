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
            $user['surname'],
            $user['avatar']
        );
    }

    public function getUserSalt(string $username): string
    {
        $stmt = $this->database->connect()->prepare('
            SELECT salt FROM users WHERE users.username = :username
        ');

        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch( PDO::FETCH_COLUMN);
    }

    public function addUser(User $user, string $salt): string {

        $username = $user->getUsername();

        if (!ctype_alpha($username[0])) {
            return "Wrong username!";
        }

        if ($this->getUser($username) != null) {
            return "User already exists!";
        }

        try {
            $stmt = $this->database->connect()->prepare(
                '
                INSERT INTO public.users(username, password, email, name, surname, salt, avatar) 
                VALUES (?, ?, ?, ?, ?, ?, ?)
            '
            );

            $stmt->execute([
                $user->getUsername(),
                $user->getPassword(),
                $user->getEmail(),
                $user->getName(),
                $user->getSurname(),
                $salt,
                $user->getAvatar()
            ]);

            return "User created successfully";

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getUserID($username) {
        $stmt = $this->database->connect()->prepare('
            SELECT "ID_users" FROM users WHERE users.username = :username
        ');

        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch( PDO::FETCH_COLUMN);
    }

    public function getUserById($userID) {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users
            WHERE "ID_users" = :userID
        ');

        $stmt->bindParam(':userID', $userID, PDO::PARAM_STR);
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
            $user['surname'],
            $user['avatar']
        );
    }

    public function changeAvatar($avatar) {

        $stmt = $this->database->connect()->prepare('
            UPDATE public.users 
            SET avatar = :avatar
            WHERE "ID_users" = :id;
        ');

        $stmt->bindParam(':avatar', $avatar, PDO::PARAM_STR);
        $stmt->bindParam(':id', $_COOKIE['user_ID'], PDO::PARAM_STR);
        $stmt->execute();


        $avatar = $stmt->fetch(PDO::FETCH_ASSOC);

    }
}