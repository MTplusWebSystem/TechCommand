<?php
require_once 'connection.php';

function CreateUSERS($pdo, $username, $password, $level_id){
    $sql = "INSERT INTO adminCategories (username, password, level_id) VALUES (:username, :password, :level_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username, 'password' => $password, 'level_id' => $level_id]);
}

try {
    $Page_Index = "
    CREATE TABLE IF NOT EXISTS Page_Index (
        id INT AUTO_INCREMENT PRIMARY KEY,
        Logo_Name VARCHAR(50) NOT NULL,
        Title VARCHAR(50) NOT NULL
    )";
    $pdo->exec($Page_Index);

    $insertPageIndex = "
    INSERT INTO Page_Index (Logo_Name, Title)
    VALUES ('TechCommand', 'Seu painel de gerenciamento')
    ";
    $pdo->exec($insertPageIndex);

    $Plan_Categories = "
    CREATE TABLE IF NOT EXISTS Plan_Categories (
        id INT AUTO_INCREMENT PRIMARY KEY,
        Category_Name VARCHAR(100) NOT NULL
    )";    
    $pdo->exec($Plan_Categories);

    $Plan_CategoriesINSERT = "
    INSERT INTO Plan_Categories (Category_Name) VALUES
    ('Plano Básico'),
    ('Plano Essencial'),
    ('Plano Standard'),
    ('Plano Premium'),
    ('Plano VIP')
    ";
    $pdo->exec($Plan_CategoriesINSERT);

    $Plan_Information = "
    CREATE TABLE IF NOT EXISTS Plan_Information (
        id INT AUTO_INCREMENT PRIMARY KEY,
        Valor FLOAT(8,2),
        Maximum_Connection INT NOT NULL, -- Corrigido para INT
        Category_ID INT NOT NULL,
        Server_Name VARCHAR(50) NOT NULL,
        Rede VARCHAR(50) NOT NULL,
        Description VARCHAR(80) NOT NULL,
        FOREIGN KEY (Category_ID) REFERENCES Plan_Categories(id)
    )";
    $pdo->exec($Plan_Information);

    $insertPlanoBasico = "
    INSERT INTO Plan_Information (Valor, Maximum_Connection, Category_ID, Server_Name, Rede, Description)
    VALUES (6.50, 1, 1, 'Servidor Brasileiro', 'Tráfego ilimitado', 'Ideal para uso individual')
    ";
    $pdo->exec($insertPlanoBasico);

    $insertPlanoEssencial = "
    INSERT INTO Plan_Information (Valor, Maximum_Connection, Category_ID, Server_Name, Rede, Description)
    VALUES (12.50, 2, 2, 'Servidor Brasileiro', 'Tráfego ilimitado', 'Ideal para casal')
    ";
    $pdo->exec($insertPlanoEssencial);
    
} catch (PDOException $e) {
    echo "Erro ao inserir dados: " . $e->getMessage();
}
?>
