<?php

function dbConnect()
{
    $dbHost = 'localhost';
    $dbName = 'monostreet_utilisateur';
    $dbUser = 'root';
    $dbPassword = '';

    try {
        $db = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPassword);
        return $db;
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function getUserByEmail($email)
{
    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM compte WHERE email = :email');
    $query->execute(['email' => $email]);

    $user = $query->fetch();

    return $user;
}

function updateUser($id, $nom6, $email, $role)
{
    $db = dbConnect();

    $query = $db->prepare('UPDATE compte SET nom = :nom, email = :email, estPrivilegie = :estPrivilegie WHERE id = :id');
    $query->execute([
        'id' => $id,
        'nom' => $nom,
        'email' => $email,
        'estPrivilegie' => $role
    ]);
}

function deleteUser($id)
{
    $db = dbConnect();

    $query = $db->prepare('DELETE FROM compte WHERE id = :id');
    $query->execute(['id' => $id]);
}

function getAllUsers()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM compte');
    $users = $query->fetchAll();

    return $users;
}

function isUserAdmin($email)
{
    $user = getUserByEmail($email);

    if ($user && $user['estPrivilegie'] === 1) {
        return true;
    }

    return false;
}

function isUserLoggedIn() {
    return isset($_SESSION['user_id']);
}

function connect() {
    $dsn = "mysql:host=localhost;dbname=monostreet_utilisateur";
    $username = "root";
    $password = "";

    try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}
function getUserById($id) {
    $db = connect();

    $stmt = $db->prepare("SELECT * FROM compte WHERE id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    return $user;
}
function deleteUserById($id) {
    $db = dbConnect();
    $stmt = $db->prepare("DELETE FROM compte WHERE id = ?");
    $stmt->execute([$id]);
}


