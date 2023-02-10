<?php
try {
  $connection = new PDO("mysql:host=lakartxela;dbname=garricastres_bd", "garricastres_bd", "garricastres_bd");
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $connection->prepare("SELECT * FROM CD");
  $stmt->execute();
  $result = $stmt->fetchAll();
  foreach ($result as $row) {
    echo "<option value='$row[genre]'>$row[genre]</option>";
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$connection = null;
?>