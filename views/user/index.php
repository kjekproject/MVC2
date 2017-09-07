<h1>User</h1>

<form method="POST" action="<?php echo URL; ?>user/create">
    <label>Login</label><input type="text" name="login"/><br />
    <label>Password</label><input type="text" name="password" /><br />
    <label>Role</label>
        <select name="role">
            <option value="default">Default</option>
            <option value="admin">Admin</option>
        </select><br />
        <label>&nbsp;</label><input type="submit" value="Submit"/>
</form>

<hr/>

<table>
    <tr>
        <th>id</th>
        <th>login</th>
        <th>role</th>
        <th></th>
        <th></th>
    </tr>
<?php
    foreach ($this->userList as $key => $value) {
        echo '<tr>';
        echo '<td>' . $value['id'] . '</td>';
        echo '<td>' . $value['login'] . '</td>';
        echo '<td>' . $value['role'] . '</td>';
        echo '<td><a href="' . URL . 'user/edit/' . $value['id'] . '">Edit</a></td>';
        echo '<td><a href="' . URL . 'user/delete/' . $value['id'] . '">Delete</a></td>';
        echo '<tr/>';
    }
?>
</table>