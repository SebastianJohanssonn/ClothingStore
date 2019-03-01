<?php


$connect = mysqli_connect("localhost", "root","","clothingstore")

$query = "SELECT *FROM picture order by imageId desc";
$result =  mysqli_query($connect, $query);
dd($result;)
while($row = mysqli_fetch_array($result))
     {
         echo ' 
            <tr>
                <td>
                        <img src="data:image/jpeg;base64; ' .base64_encode($row['name']).'"/>
                </td>
         
            </tr>
         '
     }
?>


