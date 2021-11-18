<?php 
header('Content-type: application/json');

$nome = $_POST['nome'];
$descricao = $_POST['comentario'];



/* dataType: text
echo $nome.'-'.$descricao;
*/

/* dataType : Json
$data = array($nome,$descricao);
echo json_encode($data);

*/

if($_POST['nome'] != null && $_POST['comentario'] != null){

    

    $conn = new PDO('mysql:host=localhost; dbname=db_comentario','root','');

    $sql = 'INSERT INTO comentarios(nome,comentario) VALUES(:nome,:comentario)';

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':nome',$nome);
    $stmt->bindValue(':comentario',$descricao);
    $stmt->execute();

    if($stmt->rowCount() >= 1){

        echo json_encode('Comentário salvo com sucesso !');
    }else{

        echo json_encode('Erro ao inserir dados !');
    }

}else{


    echo json_encode('Preencha os campos : nome e comentário !');
}