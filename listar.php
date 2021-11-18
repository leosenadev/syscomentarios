<?php 

    $conn = new PDO('mysql:dbname=db_comentario;host=localhost','root','');

    $stmt = $conn->prepare("SELECT * FROM comentarios");

    $stmt->execute();

    if($stmt->rowCount() >= 1){

        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
      
    }else{

       echo json_encode('Nenhum comentário!');
    }

    


?>