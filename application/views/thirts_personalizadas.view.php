<form action="imagens.php" method="post" enctype="multipart/form-data">
    <input type="file"name="nomeCampo">
    <input type="submit" value="Uploaddo Ficheiro">
</form>

<?php
foreach ($Path as $value) {
    echo "<img style = 'width:30%'src='".$value['Path']. "''>";
}
var_dump($Path);
?>
