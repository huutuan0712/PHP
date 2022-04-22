<?php
    function cart_list(){
      $conn = mysqli_connect("localhost", "root", "", "qlbh");
      $sql = "SELECT * FROM tbl_product";
      $result = $conn->query($sql);
      while ($row = mysqli_fetch_array($result)) { 
           $data [] =$row ;
      }
    foreach ($data as $key => $value) {
      $output = "
      <tr class='text-center'>
      <td>" . $key . "</td>
      <td>" . $value['name'] . "</td>
      <td  class='text-center'><img src=\"../img/" . $value['image'] . "\" style ='width:100px; height:100px; '></td>
      <td>$" . $value['price'] . "</td>
      <td>
        <a href='../components/update-product.php?action=update&id=" . $value['id'] . "'>
        <button class = 'btn btn-primary '><i class='fa-solid fa-pen-to-square'></i></button>
        </a>   
      </td>
      <td>
      <form method='post'> <button class = 'btn btn-primary 'name ='delete'><i class='fa-solid fa-trash-can'></i> </button></form>
      </td>
    </tr>
    ";
    echo $output;
      }
    } 
    
?>