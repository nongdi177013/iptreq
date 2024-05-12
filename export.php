<?php  
//export.php  
include 'config.php';
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM student_data order by 1 desc";
 $result = mysqli_query($con, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>#</th>  
                         <th>Student ID</th>
                         <th>Course</th>   
                         <th>Last Name</th>  
                         <th>First Name</th> 
                         <th>Middle Initial</th> 
                         <th>Email ID</th>  
                         <th>Mobile No</th>
                         <th>Fathers Name</th>  
                         <th>Mothers Name</th>                     
                         <th>Gender</th> 
                         <th>Age</th> 
                         <th>Birthday</th>
                         <th>Place of Birth</th>                                                   
                         <th>Address</th>
                         <th>Country</th>
                         <th>Zip</th>                         
                         <th>Issue Date:</th>

                    </tr>
  ';
  $i = 0;
  while($row = mysqli_fetch_array($result))
  {
    $sl = ++$i;
   $output .= '
    <tr>  
                         <td > '.$sl.' </td>
                         <td>'.$row["u_card"].'</td>
                         <td>'.$row["staff_id"].'</td>  
                         <td>'.$row["u_l_name"].'</td>  
                         <td>'.$row["u_f_name"].'</td>
                         <td>'.$row["u_family"].'</td> 
                         <td>'.$row["u_email"].'</td>  
                         <td>'.$row["u_phone"].'</td> 
                         <td>'.$row["u_father"].'</td>  
                         <td>'.$row["u_mother"].'</td>                       
                         <td>'.$row["u_gender"].'</td> 
                         <td>'.$row["u_aadhar"].'</td> 
                         <td>'.$row["u_birthday"].'</td> 
                         <td>'.$row["u_police"].'</td>                                      
                         <td>'.$row["u_village"].'</td>
                         <td>'.$row["u_dist"].'</td>
                         <td>'.$row["u_pincode"].'</td>
                         <td>'.$row["uploaded"].'</td>                                                                       
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Students Record.xls');
  echo $output;
 }
}
?>