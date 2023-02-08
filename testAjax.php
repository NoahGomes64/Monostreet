<?php
    try {
    $connection = new PDO("mysql:host=lakartxela;dbname=garricastres_bd", "garricastres_bd", "garricastres_bd");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT * FROM CD";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<option value='".$row['genre']."'>".$row['genre']."</option>";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

?>