<?php

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');        
}
function createToken()
{
    if(!isset($_SESSION['token']))
        {
        $_SESSION['token'] = bin2hex(random_bytes(32));
        }
}
function validateToken()
{
    if(
        empty($_SESSION['token']) ||
        $_SESSION['token'] !== filter_input(INPUT_POST, 'token')
    ){
    exit ('Invalid post request');
    }
}
function getPdo()
{
    try{
        $pdo = new PDO(
            DSN,
            DB_USR,
            DB_PASS,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]
           );
           return $pdo;

    }catch(PDOException $e){
        echo $e->getMessage();
        exit;
    }   
}
function getData($pdo)
{
    $stmt = $pdo->query("SELECT * FROM datas ORDER BY id DESC");
    $datas = $stmt->fetchAll();    
    return $datas;
}
function addData($pdo)
{
    $title = trim(filter_input(INPUT_POST, 'title'));
    $description = trim(filter_input(INPUT_POST, 'description'));

    $stmt = $pdo->prepare("INSERT INTO datas (title,description) VALUES (:title, :description)");
    $stmt->bindValue('title', $title, PDO::PARAM_STR);
    $stmt->bindValue('description', $description, PDO::PARAM_STR);
    $stmt->execute();  
}
function addCheckdata($pdo)
{
    $id = filter_input(INPUT_POST, 'id');
    if(empty($id)){
        return;
    }
    $stmt = $pdo->prepare("UPDATE datas SET is_done = NOT is_done WHERE id = :id");
    $stmt->bindValue('id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function deleteCheckdata($pdo)
{
    $id = filter_input(INPUT_POST, 'id');
    if(empty($id)){
        return;
    }
    $stmt = $pdo->prepare("DELETE FROM datas WHERE id = :id");
    $stmt->bindValue('id', $id, PDO::PARAM_INT);
    $stmt->execute();
}
function editData($pdo)
{
    $id = filter_input(INPUT_POST, 'id');
    $title = trim(filter_input(INPUT_POST, 'title'));
    $description = trim(filter_input(INPUT_POST, 'description'));
    $stmt = $pdo->prepare("UPDATE datas SET title = :title, description = :description WHERE id = :id");
    $stmt->bindValue('id', $id, PDO::PARAM_INT);
    $stmt->bindValue('title', $title, PDO::PARAM_STR);
    $stmt->bindValue('description', $description, PDO::PARAM_STR);
    $stmt->execute(); 
    
}