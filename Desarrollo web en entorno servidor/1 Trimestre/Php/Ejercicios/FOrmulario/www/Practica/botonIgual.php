<?php
echo "<form>";
if(isset($_POST["valor"])){
    echo $_POST["valor"];
}
for ($i=0; $i < 7; $i++) { 

    echo "<button type= 'submit' name='valor' value='$i'>Hola</button>";

}
echo "</form>";

?>