<?php
include_once('conexao.php');
 
if($conexao){
    $texto = "DROP DATABASE ".$_POST['nomebanco'];
    $acao = $conexao -> prepare($texto);
     try{
         $acao->execute();
         echo "Banco ".$_POST['nomebanco']."
         EXCLUÍDO com sucesso.";
     }catch (PDO $th){
         echo $th.getMessage();
     }
}
