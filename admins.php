<?php
$title = 'Pages';
//include password protection
include('shared/auth.php');
include('adminShared/header.php');
try{
    // connect
    include('shared/db.php');

    // set up query to fetch show data
    $sql = "SELECT * FROM user";
    $cmd = $db->prepare($sql);

    // run query & store results in var called $users
    $cmd->execute();
    $users = $cmd->fetchAll();

    // create table
    echo '<h1>Administrators</h1>';

    echo '<table><thead>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>';
    echo '</thead>';

    // loop through the result and display the username
    foreach ($users as $user) {
        echo '<tr>
            <td>' . $user['username'] . '</td>'.
        '<td>
                    <a href="edit-admin.php?userId=' . $user['userId'] . '">
                        Edit
                    </a>&nbsp;
            </td>'.
            '<td>        
                    <a href="delete-admin.php?userId=' .$user['userId'] . '" onclick="return confirmDelete();">
                        Delete
                    </a>
            </td>';
            
            echo '</tr>';
            //javascript function for comfirm delete
            echo '<script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this?");
            }
            </script>';
    }

    // end list
    echo '</table>';

    //disconnect
    $db = null;
}catch (Exception $error) {
    header('location:error.php');
    exit();
}
?>

</body>
</html>