<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8">
        <title> Sistema de comentário </title>
        <link rel="stylesheet" href="estilo.css">
    </head>
    <body>
        <?php echo $_GET['id']; ?>

        <section class="content">
            <div class="box_form">
                <h1> Deixe seu comentário:</h1>
                <form id="form1">
                    <label for="name">Nome</label><br>
                    <input type="text" name="name" id="name" /><br><br>

                    <label for="comment">Comentário</label><br>
                    <textarea name="comment" id="comment"></textarea><br>
                    
                    <input type="submit" form="form1" class="btn-sub" value="Enviar comentario" /><br><br>
                </form>
                <div class="msg"> </div>
            </div>
            <div class="box_comment">
                

            </div>

        </section>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script> 

        $('#form1').submit(function(e){
            e.preventDefault();

            var u_name = $('#name').val();
            var u_comment = $('#comment').val();
            $.ajax({

                url:'http://localhost/ajax_php/inserir.php',
                method:'POST',
                data:{nome:u_name,comentario:u_comment},
                //dataType:'text'
                dataType:'json'
            }).done(function($result){

                //limpa os campos
                $('#name').val('');
                $('#comment').val('');
                
                listarComentario();
            })

        });

        function listarComentario(){

            $.ajax({
                url: 'http://localhost/ajax_php/listar.php',
                method:'GET',

                dataType:'json',


            }).done(function(resultado){

                             
               for(i=0; i <= resultado.length;i++){

                
                 $('.box_comment').prepend('<div class="b_comm"><h4>'+ resultado[i].nome + '</h4><p>'+resultado[i].comentario +'</p><div class="cl_excluir"><a onclick="excluirComentario('+resultado[i].id+')">Excluir</a></div></div>');
                
               }

            })

        }
        listarComentario();
       
        function excluirComentario(id){

            
            
            $.ajax({
                url:'http://localhost/ajax_php/excluir.php',
                method:'GET',
                dataType:'json',
                data:{dataid: id}


            }).done(function(resultado){

                $('.msg').text(resultado);

                

            });

        }

        </script>

    </body>
</html>