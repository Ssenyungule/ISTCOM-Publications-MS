<?php

include("header.php");

?>

<style>

    .content-table{
        
        border-collapse: collapse;
        margin: 25px o;
        font-size: 0.9em;
        min-width: 400px;
        border-radius: 5px 5px 0 0;
        overflow: hidden;
        box-shadow: 0 0 20px 50% black;
    }

    .content-table thead tr{
        
        background-color: forestgreen;
        color: whitesmoke;
/*        text-align: left;*/
        font-weight: bold;
    }
    
    .content-table th,
    .content-table td {
        
        padding: 12px 15px;
    }
    
    .content-table tbody tr{
        
        border-bottom: 1px solid grey;
    }
    
    .content-table tbody tr:nth-of-type(even){
        
        background-color: #f3f3f3;
    }
    
    .content-table tbody tr:last-of-type{
        
        border-bottom: 2px solid green;
    }
    
</style>

<table border="0" class="content-table">
        <thead>
            <tr>
                <th>Publication Name</th>
                <th>Date of Publication</th>
                <th>Action</th>
                
                
            </tr>
        </thead>
    
<tbody>
            <?php
            
    include ("config.php");

            $sql = "select * from publication;";
            $result = mysqli_query($con, $sql);
            
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row['pub_name']."</td>";
                echo "<td>".$row['date']."</td>";
                
                ?>
                <td><a href="editPub.php?pub_id=<?php echo $row['pub_id']; ?>">Edit</a>

                <a href="delPub.php?pub_id=<?php echo $row['pub_id']; ?>" onclick='return confirm("Are you sure you want to delete")'>Delete</a>
                </td>
                
                <?php
                echo "</tr>";
            }

        ?>
        </tbody>
    </table>
            
<?php include("footer.php"); ?>