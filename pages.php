<?php
$title = 'Pages';
include('shared/auth.php');
include('adminShared/header.php');
try{
    // connect
    include('shared/db.php');

    // set up query to fetch data
    $sql = "SELECT * FROM pageInformation";
    $cmd = $db->prepare($sql);

    // run query & store results
    $cmd->execute();
    $pages = $cmd->fetchAll();

    // create table
    echo '<h1>Pages</h1>';
    echo'<h3><a href="addPage.php">Add Page</a></h3>';
    echo '<table><thead>
            <th>Page Name</th>
            <th>Edit</th>
            <th>Delete</th>';
    echo '</thead>';

    // loop through the dataresult from the query, and display each show name
    foreach ($pages as $page) {
        echo '<tr>
            <td>' . $page['pageName'] . '</td>'.
        '<td>
                    <a href="edit-page.php?pageId=' . $page['pageId'] . '">
                        Edit
                    </a>&nbsp;
            </td>'.
            '<td>        
                    <a href="delete-page.php?pageId=' .$page['pageId'] . '" onclick="return confirmDelete();">
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
</main>
</body>
</html>