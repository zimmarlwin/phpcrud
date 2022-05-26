<?php
namespace MyApp;

class Data{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        Token::createToken();
    }
    public function getAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM datas ORDER BY id DESC");
        $datas = $stmt->fetchAll();    
        return $datas;
    }
 
    public function processData()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                Token::validateToken();
                $action = filter_input(INPUT_GET, 'action');
            
                switch($action)
                {
                    case'data_action':  
                        $this->add();
                        break;
                    case'checkbox_action':
                        $this->addCheckdata();
                        break;
                    case'data_delete':
                        $this->delete();
                        break;
                    case'data_purge':
                        $this->purge();
                        break;
                    case'data_edit':                
                        $this->edit();
                        break;                
                    default:
                        exit;
                }   
                exit;
            }
    }


    private function add()
        {
            $title = trim(filter_input(INPUT_POST, 'title'));
            $description = trim(filter_input(INPUT_POST, 'description'));        
            $stmt = $this->pdo->prepare("INSERT INTO datas (title,description) VALUES (:title, :description)");
            $stmt->bindValue('title', $title, \PDO::PARAM_STR);
            $stmt->bindValue('description', $description, \PDO::PARAM_STR);
            $stmt->execute();  
            header('Location:http://localhost/php_crud/web/');
        }
    private function addCheckdata()
        {
            $id = filter_input(INPUT_POST, 'id');
            if(empty($id)){
                return;
            }
            $stmt = $this->pdo->prepare("UPDATE datas SET is_done = NOT is_done WHERE id = :id");
            $stmt->bindValue('id', $id, \PDO::PARAM_INT);
            $stmt->execute();
        }
        
    private function delete()
        {
            $id = filter_input(INPUT_POST, 'id');
            if(empty($id)){
                return;
            }
            $stmt = $this->pdo->prepare("DELETE FROM datas WHERE id = :id");
            $stmt->bindValue('id', $id, \PDO::PARAM_INT);
            $stmt->execute();
        }
    private function purge()
        {
            $this->pdo->query("DELETE FROM datas WHERE is_done = 1 ");
        }
    private function edit()
        {
            $id = filter_input(INPUT_POST, 'id');
            $title = trim(filter_input(INPUT_POST, 'title'));
            $description = trim(filter_input(INPUT_POST, 'description'));
            $stmt = $this->pdo->prepare("UPDATE datas SET title = :title, description = :description WHERE id = :id");
            $stmt->bindValue('id', $id, \PDO::PARAM_INT);
            $stmt->bindValue('title', $title, \PDO::PARAM_STR);
            $stmt->bindValue('description', $description, \PDO::PARAM_STR);
            $stmt->execute();
            header('Location:http://localhost/php_crud/web/');
        }
}