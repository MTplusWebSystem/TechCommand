<?php

class DataControl {
    public function Connection(string $filename) { 
        $handle = file_get_contents($filename);
        $data = explode('|', $handle);
        $host = $data[3];
        $dbname = $data[2];
        $username = $data[0]; 
        $password = $data[1]; 

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo; 
        } catch (PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
            return null; 
        }
    }

    public function CreateTables(PDO $pdo, string $Query) {
        try {
            $pdo->exec($Query);
        } catch (PDOException $e) {
            echo "Erro ao criar tabela: " . $e->getMessage();
        }
    }
    public function WriteData(PDO $pdo,string $type, string $Table, array $Reference, array $AddValue) {
        if($type == "fullPDO"){
            $columns = implode(',', $Reference);
            $placeholders = ':' . implode(',:', $Reference);
            $sql = "INSERT INTO $Table ($columns) VALUES ($placeholders)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array_combine($Reference, $AddValue));
        }elseif ($type == "simplePDO") {
            $values = implode(",\n", array_map(function($value) {
                return "('$value')";
            }, $AddValue));
            $sql = "INSERT INTO $Table (" . implode(',', $Reference) . ") VALUES $values";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
        }
    }
    public function GetData(PDO $pdo, string $type, string $table, array $reference, array $addValue) {
        if ($type == "simplePDO") {
            try {
                $query = "SELECT * FROM {$table} WHERE {$reference[0]} = :{$reference[0]}";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(":{$reference[0]}", $addValue[0]);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Erro ao buscar usuário: " . $e->getMessage();
                return null;
            }
        }
    }
}