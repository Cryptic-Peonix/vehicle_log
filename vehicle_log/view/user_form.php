<form method="post" action="./model/editor.php">
    <table class="results">
            <tr>
                <th>First Name:</th>
                <td><input type="text" name="fname" required></td>
            </tr>
            <tr>
                <th>Last Name:</th>
                <td><input type="text" name="lname" required></td>
            </tr>
            <tr>
                <th>Password:</th>
                <td><input type="password" name="pwd" required></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><input type="email" name="email" required></td>
            </tr>
    </table>
    <br>
    <input type="hidden" name="table" value="users">
    <input type="hidden" name="operation" value="<?php echo $operation; ?>">
    <input type="submit" value="Submit">
</form>