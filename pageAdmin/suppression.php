<?php
/**
 * @file deconnexion.php 
 * @brief fichier de deconnexion de la partie
 * @autor Guillaume Arricastre
 * version 
 * date 
 * 
 * */
    session_start();
    require('../connexionBD.php');
    $stmt = $connection->prepare("DELETE FROM compte  WHERE id = :id");
    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_STR);
    $stmt->execute();




    header('Location: gestion.php');
?>