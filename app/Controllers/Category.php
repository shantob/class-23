<?php

namespace Project\Controllers;

use PDO;

class Category
{
    public $id;
    public $name;

    public function __construct()
    {
        session_start();
        $this->conn = new PDO('mysql:host=localhost;dbname=products', 'root', '');

    }
    public function index()
    {
     //database connect.........
    //  select query..........
    $statement = $this->conn->query("SELECT * FROM categories ORDER BY category_id desc");
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    // print_r($data);
    // die();
    //$statement->execute();
    return $data;
    }

    public function store(array $data)
    {


        $_SESSION['old'] = $data;

        if (empty($data['category_id'])) {
            $_SESSION['errors']['category_id'] = 'Required';
        } elseif (!is_numeric($data['category_id'])) {
            $_SESSION['errors']['category_id'] = 'Must be an integer';
        }

        if (empty($data['category_name'])) {
            $_SESSION['errors']['category_name'] = 'Required';
        }

        if (isset($_SESSION['errors'])) {
            return false;
        }


        //$_SESSION['category'][] = $data;

        //database connect
        //cdatabase insert//
        //$pdo = new PDO('mysql:host=localhost;dbname=products', 'root', '');
        //cdatabase insert//
        // $query = "INSERT INTO categories (category_id, category_name) VALUES ('{$data['category_id']}','{$data['category_name']}')";

        // $statement = $pdo->prepare($query);
        // $statement->execute();

        // another system////////////

        $statement = $this->conn->prepare("INSERT INTO categories (category_id, category_name) VALUES (:C_id, :C_name)");
        $statement->execute([
            'C_id'=>$data['category_id'],
            'C_name'=>$data['category_name'],
        ]);

        //for one line//
        // (new PDO('mysql:host=localhost;dbname=products', 'root', ''))->prepare("INSERT INTO categories (category_id, category_name) VALUES ('{$data['category_id']}','{$data['category_name']}')")->execute();


        // $servername = "localhost";
        // $username = "root";
        // $password = "";

        // // try {
        //     $conn = new PDO("mysql:host=$servername;dbname=products", $username, $password);
        //     // set the PDO error mode to exception
        //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //     echo "Connected successfully";
        // // } catch (PDOException $e) {
        // //     echo "Connection failed: " . $e->getMessage();
        // // }


        unset($_SESSION['old']);
        $_SESSION['message'] = 'Successfully Created';
        return true;
    }

    public function details(int $id)
    {
        $sql = "SELECT * FROM categories where category_id=$id";
        $stmt = $this->conn->query($sql);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        //    echo "<pre>";
        //    print_r($data);
        //    die();
        return $data;
    }

    public function update(array $data, int $id)
    {
        $statement = $this->conn->prepare("UPDATE categories SET (category_id=:C_id, category_name=:C_name) WHERE id =category_id");
        $statement->execute([
            'C_id'=>$data['category_id'],
            'C_name'=>$data['category_name']
        ]);
        $_SESSION['message'] = 'Successfully Updated';
    }

    public function destroy(int $id)
    {
        unset($_SESSION['students'][$this->findIndex($id)]);
        $_SESSION['message'] = 'Successfully Deleted';
    }

    public function findIndex(int $id): int
    {
        $students = $_SESSION['students'];
        $index = null;
        foreach ($students as $key => $student) {
            if ($student['id'] == $id) {
                $index = $key;
            }
        }

        return $index;
    }
}
