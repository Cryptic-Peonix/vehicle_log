<?php
    $info = get_user($user_id);
?>
<form method="post" action="./model/editor.php">
    <table class="results">
            <tr>
                <th>First Name:</th>
                <td><input type="text" name="fname" <?php echo 'value="' . $info['first_name'] . '"'; ?> required></td>
            </tr>
            <tr>
                <th>Last Name:</th>
                <td><input type="text" name="lname" <?php echo 'value="' . $info['last_name'] . '"'; ?> required></td>
            </tr>
            <tr>
                <th>Password:</th>
                <td><input type="password" name="pwd" <?php echo 'value="' . $info['user_password'] . '"'; ?> required></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><input type="email" name="email" <?php echo 'value="' . $info['email'] . '"'; ?> required></td>
            </tr>
    </table>
    <br>
    <input type="hidden" name="table" value="users">
    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <input type="hidden" name="operation" value="<?php echo $operation; ?>">
    <input type="submit" value="Submit">
</form>