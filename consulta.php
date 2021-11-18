<?php

try{

    $conn = new PDO("mysql:dbname=db_php;host=localhost","root","");
     
    $stmt = $conn->prepare("SELECT * FROM usuarios");

    $stmt->execute();
    
    foreach($stmt as $valor){

        var_dump($valor);

    }

  
    
    /*
    $data = Date('d/m/Y H:i:m');

    $sql = "INSERT INTO usuarios(nome,usuario,senha,dt_cadastro) values(:nome,:usuario,:senha,:dt_cadastro)";
    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':nome','José');
    $stmt->bindValue(':usuario','jose.sse');
    $stmt->bindValue(':senha','abcdef');
    $stmt->bindValue(':dt_cadastro',$data);
    $stmt->execute();
    */
   



}catch(PDOException $e){

    echo $e->getMessage();
}

?>