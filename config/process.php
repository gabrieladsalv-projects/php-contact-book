<?php

    session_start();

    include_once("connection.php");
    include_once("url.php");

    $data = $_POST;

    // Modifications to the code

    if(!empty($data)) {

        if($data['type'] === 'create') {
            $nome = $data['nome'];
            $phone = $data['phone'];
            $observations = $data['observations'];

            $query = "INSERT INTO contacts (nome, phone, observations) VALUES (:nome, :phone, :observations)";
    
            $stmt = $conn->prepare($query);
    
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":observations",$observations);
    
            try {

                $stmt->execute();
    
                $_SESSION["msg"] = "Contato adicionado com sucesso!";

            
            } catch (PDOException $e) {
                $error = $e->getMessage();
                echo "Erro: $error";
            }

            header("Location: $BASE_URL" . "../index.php");
    
        } else if($data['type'] === 'edit') {

            $nome = $data['nome'];
            $phone = $data['phone'];
            $observations = $data['observations'];
            $id = $data['id'];


            $query = "UPDATE contacts SET nome = :nome, phone = :phone, observations = :observations WHERE id = :id";
    
            $stmt = $conn->prepare($query);
    
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":observations", $observations);
            $stmt->bindParam(":id", $id);
    
            try {

                $stmt->execute();
    
                $_SESSION["msg"] = "Contato atualizado com sucesso!";

            
            } catch (PDOException $e) {
                $error = $e->getMessage();
                echo "Erro: $error";
            }

            header("Location: $BASE_URL" . "../index.php");

    
        } else if($data['type'] === 'delete') {
            $id = $data['id'];

            $query = "DELETE FROM contacts WHERE id = :id";
    
            $stmt = $conn->prepare($query);
    
            $stmt->bindParam(":id", $id);

    
            try {

                $stmt->execute();
    
                $_SESSION["msg"] = "Contato removido com sucesso!";

            
            } catch (PDOException $e) {
                $error = $e->getMessage();
                echo "Erro: $error";
            }
            header("Location: $BASE_URL" . "../index.php");
    
        }

    // data selection
    } else {
        $id;

        if(!empty($_GET)) {
            $id = $_GET["id"];
        }
    
    
        // data contact return
    
        if(!empty($id)) {
    
            $query = "SELECT * FROM contacts WHERE id = :id";
    
            $stmt = $conn->prepare($query);
    
            $stmt->bindParam(":id", $id);
    
            $stmt->execute();
    
            $contact = $stmt->fetch();
    
    
        } else {
            // return all contacts
    
            $contacts = [];
    
            $query = "SELECT * FROM contacts";
    
            $stmt = $conn->prepare($query);
    
            $stmt->execute();
    
            $contacts = $stmt->fetchAll();
        }
    
        
    }

   
// close connection
$conn = null;