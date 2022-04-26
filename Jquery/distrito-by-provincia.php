<?php
require_once "Db.php";

$provincia_id = $_POST["provincia_id"];
echo $provincia_id;
$result = mysqli_query($conn, "SELECT * FROM distrito where provincia_id=$provincia_id");
?>
<option value="">Selecione O Distrito</option>
<?php
while ($row = mysqli_fetch_array($result)) {
?>
    <option  value="<?php echo $row["id"]; ?>"><?php echo $row["designacao"]; ?></option>
<?php
}
?>