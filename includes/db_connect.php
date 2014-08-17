<?php
    require 'config.php';
    $id = 1;
    try{
        $conn = new PDO('mysql:host=localhost;dbname=pollingdb', $config['DB_USERNAME'], $config['DB_PASSWORD']);    

        // $results = $conn->query('SELECT * FROM tbl_user WHERE id=' . $conn->quote($id));
        $stmt = $conn->prepare('SELECT * FROM tbl_users WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);  
        $stmt->execute();


        // foreach ($stmt as $key => $row) {
        //     print_r($row);
        // }
        while ($row = $stmt->fetch()) {
            print_r($row);
        }

    }catch(PDOException  $e){
        echo "ERROR:" . $e->getMessage();
    }

?>