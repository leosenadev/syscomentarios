<?php 

    $id = $_GET['dataid'];
    $conn = new PDO("mysql:dbname=db_comentario;host=localhost","root","");

    $stmt = $conn->prepare("DELETE FROM comentarios WHERE id=:ID");
    $stmt->bindValue(':ID',$id);
    $stmt->execute();
  
    
    echo json_encode("Comentário excluido!");

?>