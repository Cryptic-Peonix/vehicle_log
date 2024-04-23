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
    $info = get_maintenance($maintenance_id);
?>
<form method="post" action="./model/editor.php">
    <table class="results">
            <tr>
                <th>Maintenance Type ID:</th>
                <td>
                    <select name="type_id" id="type_id" required>
                        <?php foreach ($typeIDS as $id) : ?>
                            <option value="<?php echo $id ?>" <?php if($id == $info['maintenance_type_id']) {echo 'selected="selected"';} ?>><?php echo $id; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Vehicle ID:</th>
                <td>
                    <select name="vehicle_id" id="vehicle_id" required>
                        <?php foreach ($vehicleIDS as $id) : ?>
                            <option value="<?php echo $id ?>" <?php if($id == $info['vehicle_id']) {echo 'selected="selected"';} ?>><?php echo $id; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Maintenance Vendor:</th>
                <td><input type="text" name="main_vendor" <?php echo 'value="' . $info['maintenance_vendor'] . '"'; ?>required></td>
            </tr>
            <tr>
                <th>Maintenance Description:</th>
                <td><input type="text" name="main_desc" <?php echo 'value="' . $info['maintenance_description'] . '"'; ?> required></td>
            </tr>
            <tr>
                <th>Maintenance Vendor Address:</th>
                <td><input type="text" name="main_addr" <?php echo 'value="' . $info['maintenance_vendor_address'] . '"'; ?> required></td>
            </tr>
            <tr>
                <th>Maintenence Cost:</th>
                <td><input type="number" name="main_cost" step="0.05" <?php echo 'value="' . $info['maintenance_cost'] . '"'; ?> required></td>
            </tr>
            <tr>
                <th>Maintenence Date:</th>
                <?php
                    $date = new DateTimeImmutable($info['maintenance_date']);
                    $format = $date->format("Y-m-d");
                ?>
                <td><input type="date" name="main_date" step="0.05" <?php echo 'value="' . $format . '"'; ?> required></td>
            </tr>
    </table>
    <br>
    <input type="hidden" name="table" value="maintenance">
    <input type="hidden" name="maintenance_id" value="<?php echo $maintenance_id; ?>">
    <input type="hidden" name="operation" value="<?php echo $operation; ?>">
    <input type="submit" value="Submit">
</form>