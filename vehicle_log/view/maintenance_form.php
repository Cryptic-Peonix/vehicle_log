<?php
    $vehicles = get_table('vehicles');
    $vehicleIDS = [];
    foreach ($vehicles as $entry) {
        foreach($entry as $key => $val) {
            if ($key == 'vehicle_id') {
                array_push($vehicleIDS, $val);
                break;
            }
        }
    }
    $types = get_table('maintenance_type');
    $typeIDS = [];
    foreach ($types as $ent) {
        foreach($ent as $key => $val) {
            if ($key == 'maintenance_type_id') {
                array_push($typeIDS, $val);
                break;
            }
        }
    }
?>
<form method="post" action="./model/editor.php">
    <table class="results">
            <tr>
                <th>Maintenance Type ID:</th>
                <td>
                    <select name="type_id" id="type_id" required>
                        <?php foreach ($typeIDS as $id) : ?>
                            <option value="<?php echo $id ?>"><?php echo $id; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Vehicle ID:</th>
                <td>
                    <select name="vehicle_id" id="vehicle_id" required>
                        <?php foreach ($vehicleIDS as $id) : ?>
                            <option value="<?php echo $id ?>"><?php echo $id; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Maintenance Vendor:</th>
                <td><input type="text" name="main_vendor" required></td>
            </tr>
            <tr>
                <th>Maintenance Description:</th>
                <td><input type="text" name="main_desc" required></td>
            </tr>
            <tr>
                <th>Maintenance Vendor Address:</th>
                <td><input type="text" name="main_addr" required></td>
            </tr>
            <tr>
                <th>Maintenence Cost:</th>
                <td><input type="number" name="main_cost" step="0.05" required></td>
            </tr>
            <tr>
                <th>Maintenence Date:</th>
                <td><input type="date" name="main_date" step="0.05" required></td>
            </tr>
    </table>
    <br>
    <input type="hidden" name="table" value="maintenance">
    <input type="hidden" name="operation" value="<?php echo $operation; ?>">
    <input type="submit" value="Submit">
</form>