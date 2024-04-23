<form method="post" action="./model/editor.php">
    <table class="results">
            <tr>
                <th>Vehicle Type:</th>
                <td><input type="text" name="vtype" required></td>
            </tr>
            <tr>
                <th>Vehicle Model:</th>
                <td><input type="text" name="vmodel" required></td>
            </tr>
            <tr>
                <th>Vehicle Year:</th>
                <td><input type="number" name="vyear" min="1900" max="2099" step="1" required></td>
            </tr>
            <tr>
                <th>Date Purchased:</th>
                <td><input type="date" name="dpurch" required></td>
            </tr>
            <tr>
                <th>Vehicle Color:</th>
                <td><input type="text" name="vcolor" required></td>
            </tr>
            <tr>
                <th>Vehicle VIN:</th>
                <td><input type="text" name="vin" required></td>
            </tr>
            <tr>
                <th>Vehicle License Tag:</th>
                <td><input type="text" name="vtag" required></td>
            </tr>
            <tr>
                <th>Vehicle License State:</th>
                <td><input type="text" name="vstate" required></td>
            </tr>
            <tr>
                <th>Purchase Price:</th>
                <td><input type="number" name="pPrice" step="0.05" required></td>
            </tr>
            <tr>
                <th>Current Price:</th>
                <td><input type="number" name="cPrice" step="0.05" required></td>
            </tr>
            <tr>
                <th>Purchase Mileage:</th>
                <td><input type="number" name="pMiles" step="0.5" required></td>
            </tr>
            <tr>
                <th>Current Mileage:</th>
                <td><input type="number" name="cMiles" step="0.5" required></td>
            </tr>
    </table>
    <br>
    <input type="hidden" name="table" value="vehicles">
    <input type="hidden" name="operation" value="<?php echo $operation; ?>">
    <input type="submit" value="Submit">
</form>