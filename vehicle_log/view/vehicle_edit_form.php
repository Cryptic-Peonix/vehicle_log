<?php
    $info = get_vehicle($vehicle_id);
?>
<form method="post" action="./model/editor.php">
    <table class="results">
            <tr>
                <th>Vehicle Type:</th>
                <td><input type="text" name="vtype" <?php echo 'value="' . $info['vehicle_type'] . '"'; ?> required></td>
            </tr>
            <tr>
                <th>Vehicle Model:</th>
                <td><input type="text" name="vmodel" <?php echo 'value="' . $info['vehicle_model'] . '"'; ?> required></td>
            </tr>
            <tr>
                <th>Vehicle Year:</th>
                <td><input type="number" name="vyear" min="1900" max="2099" step="1" <?php echo 'value="' . $info['vehicle_year'] . '"'; ?> required></td>
            </tr>
            <tr>
                <th>Date Purchased:</th>
                <?php
                    $date = new DateTimeImmutable($info['vehicle_date_purchased']);
                    $format = $date->format("Y-m-d");
                ?>
                <td><input type="date" name="dpurch" <?php echo 'value="' . $format . '"'; ?> required></td>
            </tr>
            <tr>
                <th>Vehicle Color:</th>
                <td><input type="text" name="vcolor" <?php echo 'value="' . $info['vehicle_color'] . '"'; ?> required></td>
            </tr>
            <tr>
                <th>Vehicle VIN:</th>
                <td><input type="text" name="vin" <?php echo 'value="' . $info['vehicle_VIN'] . '"'; ?> required></td>
            </tr>
            <tr>
                <th>Vehicle License Tag:</th>
                <td><input type="text" name="vtag" <?php echo 'value="' . $info['vehicle_license_tag'] . '"'; ?> required></td>
            </tr>
            <tr>
                <th>Vehicle License State:</th>
                <td><input type="text" name="vstate" <?php echo 'value="' . $info['vehicle_license_state'] . '"'; ?> required></td>
            </tr>
            <tr>
                <th>Purchase Price:</th>
                <td><input type="number" name="pPrice" step="0.05" <?php echo 'value="' . $info['vehicle_purchase_price'] . '"'; ?> required></td>
            </tr>
            <tr>
                <th>Current Price:</th>
                <td><input type="number" name="cPrice" step="0.05" <?php echo 'value="' . $info['vehicle_current_price'] . '"'; ?> required></td>
            </tr>
            <tr>
                <th>Purchase Mileage:</th>
                <td><input type="number" name="pMiles" step="0.5" <?php echo 'value="' . $info['vehicle_purchase_mileage'] . '"'; ?> required></td>
            </tr>
            <tr>
                <th>Current Mileage:</th>
                <td><input type="number" name="cMiles" step="0.5" <?php echo 'value="' . $info['vehicle_current_mileage'] . '"'; ?> required></td>
            </tr>
    </table>
    <br>
    <input type="hidden" name="table" value="vehicles">
    <input type="hidden" name="vehicle_id" value="<?php echo $vehicle_id; ?>">
    <input type="hidden" name="operation" value="<?php echo $operation; ?>">
    <input type="submit" value="Submit">
</form>