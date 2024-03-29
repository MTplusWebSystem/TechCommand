<?php
require_once 'connection.php';

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


    $sql = "INSERT INTO adminCategories (username, password, level_id) VALUES (:username, :password, :level_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => "mtplus", 'password' => "Meez4m11@", 'level_id' => 3]);

    echo "Dados inseridos com sucesso...";
} catch (PDOException $e) {
    echo "Erro ao inserir dados: " . $e->getMessage();
}
?>
