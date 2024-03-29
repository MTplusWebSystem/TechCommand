<?php
require_once 'connection.php';

function sendMSG($url, $msg) {
    echo "
    <script>
        alert('{$msg}');
        window.location.href = '{$url}';
    </script>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $query = "SELECT * FROM adminCategories WHERE username = :username AND password = :password";
            $statement = $pdo->prepare($query);
            $statement->execute(array(
                ':username' => $username,
                ':password' => $password
            ));
            
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                switch ($result['level_id']){
                    case 1:
                        echo "<script>window.location.href = 'http://localhost:7070/attendant.php';</script>";
                    case 2:
                        echo "<script>window.location.href = 'http://localhost:7070/manager.php';</script>";
                    case 3:
                        echo "<script>window.location.href = 'http://localhost:7070/administrator.php';</script>";
                }
            } else {
                sendMSG("http://localhost:7070/index.php", "Usuário ou senha incorretos.");
            }            
        } else {
            sendMSG("http://localhost:7070/index.php","Por favor, preencha todos os campos.");
        }
    } catch (PDOException $e) {
        echo "Erro de conexão: " . $e->getMessage();
    }
}
?>
