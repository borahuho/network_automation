<!DOCTYPE HTML>
<html lang="nl">
<head>
    <title>Test Ansible website  </title>
</head>

<body>
<h1>Test (This in the html)</h1>

<?php
$user = "root";
$password = "Welcome01";
$database = "ansible-les";
$table = "noorderpoort";

try {
  $db = new PDO("mysql:host=192.168.182.134;port=3306;dbname=$database", $user, $password);
  echo "<h2>Show me the table: (This is within the php)</h2><ol>";
  foreach($db->query("SELECT message FROM $table") as $row) {
    echo "<li>" . $row['message'] . "</li>";
  }
  echo "</ol>";
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>

</body>
</html>