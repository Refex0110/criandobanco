<?php
include_once('conexao.php');
 
if($conexao){
    $texto = "CREATE DATABASE ".$_POST['nomebanco'];
    $acao = $conexao -> prepare($texto);
     try{
         $acao->execute();
         echo "Banco".$_POST['nomebanco']."
         criado com sucesso.";
     }catch (PDO $th){
         echo $th.getMessage();
     }
}

$dbname = $_POST['nomebanco'];

try{
    $conexao = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
    echo "<br>Banco".$dbname."conectado com sucesso";
}catch (PDOException $th){
}
?>

<form action="criartabela.php" method="post">
<input type="text" name="tabela" id="tabela"
placeholder="Nome da Tabela">
<input type="text" name="campo" id="campo" 
placeholder="Coluna 1">
<input type="text" name="campo2" id="campo2"
placeholder="Coluna 2">
<input type="text" name="tipo" id="tipo"
placeholder="INT(11)">
<input type="hidden" name="banco" value="<?php echo $_POST['nomebanco'];?>">
<input type="submit" value="Enviar">
</form>