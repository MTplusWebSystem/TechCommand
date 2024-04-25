<?php
function CreateDB() {
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    if ($requestMethod == "POST") {
        $dadosJSON = file_get_contents('php://input');
        $dados = json_decode($dadosJSON, true);
        $initDB =false;
        if (isset($_GET['create']) && $_GET['create'] === 'true') {
            $arquivoConfig = "../../database/ConnectionDB.conf";
            $conteudo = implode("|", $dados);
            $resultado = file_put_contents($arquivoConfig, $conteudo);
            
            if ($resultado !== false) {

                $response = array(
                    "success" => true,
                    "message" => "Dados gravados com sucesso no arquivo $arquivoConfig"
                );
            } else {
                $response = array(
                    "success" => false,
                    "message" => "Erro ao gravar os dados no arquivo $arquivoConfig"
                );
            }
            header('Content-Type: application/json');
            echo json_encode($response);
        } elseif (isset($_GET['jsoninfo']) && $_GET['jsoninfo'] === 'true') {
            
            $arquivoJSON = '../../database/infos.json';
            $jsonData = json_encode($dados);

            if (file_put_contents($arquivoJSON, $jsonData)) {
                $response = array(
                    "success" => true,
                    "message" => "Dados gravados com sucesso no arquivo $arquivoJSON"
                );
                $initDB = true;
            } else {
                $response = array(
                    "success" => false,
                    "message" => "Erro ao gravar os dados no arquivo $arquivoJSON"
                );
            }
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $response = array(
                "success" => false,
                "message" => "O parâmetro 'create' ou 'jsoninfo' não está presente ou não é 'true'"
            );
            header('Content-Type: application/json');
            http_response_code(400);
            echo json_encode($response);
        }
    }
    return $initDB;
}

CreateDB();