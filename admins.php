<?php
$title = 'Pages';
include('adminShared/header.php');

// connect
include('shared/db.php');

// set up query to fetch show data
$sql = "SELECT * FROM user";
$cmd = $db->prepare($sql);

// run query & store results in var called $shows
$cmd->execute();
$users = $cmd->fetchAll();

// start the list
echo '<h1>Administrators</h1>';

echo '<table><thead>
        <th>Email</th>
        <th>Edit</th>
        <th>Delete</th>';
echo '</thead>';

// loop through the dataresult from the query, and display each show name
foreach ($users as $user) {
    echo '<tr>
        <td>' . $user['username'] . '</td>'.
       '<td>
                <a href="edit-admin.php?username=' . $user['username'] . '">
                    Edit
                </a>&nbsp;
        </td>'.
        '<td>        
                <a href="delete-admin.php?username=' .$user['username'] . '" onclick="return confirmDelete();">
                    Delete
                </a>
        </td>';
        
        echo '</tr>';
}

// end list
echo '</table>';

//disconnect
$db = null;
?>
</main>
</body>
</html>