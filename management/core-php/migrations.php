<?php
require_once 'connection.php';

function CreateUSERS($pdo, $username, $password, $level_id){
    $sql = "INSERT INTO adminCategories (username, password, level_id) VALUES (:username, :password, :level_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username, 'password' => $password, 'level_id' => $level_id]);
}

try {
    $levels = "
    CREATE TABLE IF NOT EXISTS levels (
        id INT AUTO_INCREMENT PRIMARY KEY,
        level_name VARCHAR(100) NOT NULL
    )";    
    $pdo->exec($levels);

    $levelsINSERT = "
    INSERT INTO levels (level_name) VALUES
    ('Atendente'),
    ('Gerente'),   
    ('Admin')
    ";
    $pdo->exec($levelsINSERT);

    $adminCategories = "
    CREATE TABLE IF NOT EXISTS adminCategories (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(100) NOT NULL,
        password VARCHAR(100) NOT NULL,
        level_id INT NOT NULL,
        FOREIGN KEY (level_id) REFERENCES levels(id)
    )";
    $pdo->exec($adminCategories);

    CreateUSERS($pdo, "mtplus1", "Meez4m11@", 1);
    CreateUSERS($pdo, "mtplus2", "Meez4m11@", 2);
    CreateUSERS($pdo, "mtplus3", "Meez4m11@", 3);
    
    echo "Dados inseridos com sucesso...
    \nUsuário:mtplus1 | senha:Meez4m11@ > nível Atendente\n
    \nUsuário:mtplus2 | senha:Meez4m11@ > nível Gerente\n
    \nUsuário:mtplus3 | senha:Meez4m11@ > nível Administrador\n";
} catch (PDOException $e) {
    echo "Erro ao inserir dados: " . $e->getMessage();
}
?>
