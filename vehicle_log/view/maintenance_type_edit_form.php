?<?php
    $type = get_maintenance_type($type_id);
?>
<form method="post" action="./model/editor.php">
    <table class="results">
            <tr>
                <th>Maintenance Type Name:</th>
                <td><input type="text" name="main_type" value="<?php echo $type['maintenance_type']; ?>" required></td>
            </tr>
    </table>
    <br>
    <input type="hidden" name="table" value="maintenance_type">
    <input type="hidden" name="maintenance_type_id" value="<?php echo $type_id; ?>">
    <input type="hidden" name="operation" value="<?php echo $operation; ?>">
    <input type="submit" value="Submit">
</form>