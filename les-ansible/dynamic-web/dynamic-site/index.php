<?php
$user = "student";
$password = "Welcome01";
$database = "ansible-les";
$table = "noorderpoort";

try {
  $db = new PDO("mysql:host=192.168.10.220;dbname=$database", $user, $password);
  echo "<h2>Show me the table:</h2><ol>";
  foreach($db->query("SELECT content FROM $table") as $row) {
    echo "<li>" . $row['content'] . "</li>";
  }
  echo "</ol>";
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
