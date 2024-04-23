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
    $info = get_fuel($fuel_id);
?>
<form method="post" action="./model/editor.php">
    <table class="results">
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
                <th>Fuel Source:</th>
                <td><input type="text" name="fuel_source" <?php echo 'value="' . $info['fuel_source'] . '"'; ?> required></td>
            </tr>
            <tr>
                <th>Fuel Gallons:</th>
                <td><input type="number" name="fuel_gallons" <?php echo 'value="' . $info['fuel_gallons'] . '"'; ?> required></td>
            </tr>
            <tr>
                <th>Fuel Cost:</th>
                <td><input type="number" name="fuel_cost" step="0.05" <?php echo 'value="' . $info['fuel_cost'] . '"'; ?> required></td>
            </tr>
            <tr>
                <th>Fuel Mileage:</th>
                <td><input type="number" name="fuel_mileage" step="0.05" <?php echo 'value="' . $info['fuel_mileage'] . '"'; ?> required></td>
            </tr>
    </table>
    <br>
    <input type="hidden" name="table" value="fuel">
    <input type="hidden" name="fuel_id" value="<?php echo $fuel_id; ?>">
    <input type="hidden" name="operation" value="<?php echo $operation; ?>">
    <input type="submit" value="Submit">
</form>