<?php

require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['start'])) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM Page_Index");
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $response = array();

            foreach ($results as $row) {
                $response[] = array(
                    'logo_name' => $row['Logo_Name'],
                    'title' => $row['Title']
                );
            }

            echo json_encode($response);
        } catch(PDOException $e) {
            echo "Erro ao acessar o banco de dados: " . $e->getMessage();
        }
    }
} else {
    echo "Este script só aceita requisições via método POST.";
}

?>
