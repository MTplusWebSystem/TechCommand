<?php

require_once 'connection.php';

$username = "mtplus";
$password = "Meez4m11@";

$query = "SELECT * FROM adminCategories WHERE username = :username AND password = :password";
$statement = $pdo->prepare($query);
$statement->execute(array(
    ':username' => $username,
    ':password' => $password
));

$result = $statement->fetch(PDO::FETCH_ASSOC);

if ($result) {
    echo $result['level_id'];
    echo "\n\nados do usuário:<br>";
    foreach ($result as $key => $value) {
        echo "$key: $value<br>";
    }
} else {
    echo "Usuário ou senha incorretos.";
}
?>
