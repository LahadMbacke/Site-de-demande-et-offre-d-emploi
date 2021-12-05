<?php 


if(isset($_POST["action"]))
{
 $query = "
  SELECT * FROM DB";

 if(isset($_POST["producer"]))
 {
  $producer_filter = implode("','", $_POST["producer"]);
  $query .= "
   WHERE producer=('".$producer_filter."')
  ";
 }
 if(isset($_POST["size"]))
 {
  $size_filter = implode("','", $_POST["size"]);
  $query .= " OR size=('".$size_filter."')
  ";
 }
 if(isset($_POST["model"]))
 {
  $model_filter = implode("','", $_POST["model"]);
  $query .= "OR model=('".$model_filter."')";
 }
 if(isset($_POST["year"]))
 {
  $year_filter = implode("','", $_POST["year"]);
  $query .= "OR year=('".$year_filter."')";
 }

 $statement = $conn->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $total_row = $statement->rowCount();
 $output = '';
 if($total_row > 0)
 {
  foreach($result as $row)
  {
   $output .= '
   <tr><td>'.$row['producer'].'</td>
   <td>'.$row['size'].'</td>
   <td>'.$row['model'].'</td>
   <td>'.$row['year'].'</td>
   <td>'.$row['salesman'].'</td>
   <td>'.$row['country'].'</td></tr>

   ';
  }
 }
 else
 {
  $output = 'Please User Filters to Search for Parts';
 }
 echo $output;
}

?>