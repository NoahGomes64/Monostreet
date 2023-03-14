<?php
require_once("connexionBD.php");


function getUserByEmail($email)
{
    

    $query = $connnection->prepare('SELECT * FROM compte WHERE email = :email');
    $query->execute(['email' => $email]);

    $user = $query->fetch();

    return $user;
}

function updateUser($id, $nom6, $email, $role)
{
   

    $query = $connnection->prepare('UPDATE compte SET nom = :nom, email = :email, estPrivilegie = :estPrivilegie WHERE id = :id');
    $query->execute([
        'id' => $id,
        'nom' => $nom,
        'email' => $email,
        'estPrivilegie' => $role
    ]);
}

function deleteUser($id)
{
    

    $query = $connnection->prepare('DELETE FROM compte WHERE id = :id');
    $query->execute(['id' => $id]);
}

function getAllUsers()
{
    

    $query = $connnection->query('SELECT * FROM compte');
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
    return isset($_SESSION['id']);
}


function getUserById($id) {
    

    $stmt = $connnection->prepare("SELECT * FROM compte WHERE id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    return $user;
}
function deleteUserById($id) {

    $stmt = $connnection->prepare("DELETE FROM compte WHERE id = ?");
    $stmt->execute([$id]);
}


