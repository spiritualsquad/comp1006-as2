<?php
$title = 'Pages';
include('shared/header.php');

// connect
include('shared/db.php');

// set up query to fetch show data
$sql = "SELECT * FROM pageInformation";
$cmd = $db->prepare($sql);

// run query & store results in var called $shows
$cmd->execute();
$pages = $cmd->fetchAll();

// start the list
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
                <a href="edit-page.php?showId=' . $page['pageId'] . '">
                    Edit
                </a>&nbsp;
        </td>'.
        '<td>        
                <a href="delete-page.php?showId=' .$page['pageId'] . '" onclick="return confirmDelete();">
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