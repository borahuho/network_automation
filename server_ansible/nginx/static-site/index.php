<?php
$user = "db_user";
$password = "Welcome01";
$database = "testdb";
$table = "noorderpoort";

try {
  $db = new PDO("mysql:host=192.168.182.130;dbname=$database", $user, $password);
  echo "<h2>TODO</h2><ol>";
  foreach($db->query("SELECT content FROM $table") as $row) {
    echo "<li>" . $row['content'] . "</li>";
  }
  echo "</ol>";
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>