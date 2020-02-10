<?php

$conn =new mysqli("localhost","root","","pharmacy_inventory") OR die("Error: " . mysqli_error($conn));

session_start();
// code to add new medicine entry into database

##Add Data into database
if(isset($_POST['add'])){
    //check if all field all entered
    if(!empty($_POST['drug_name']) && !empty($_POST['drug_type']) && !empty($_POST['drug_desc']) && !empty($_POST['drug_price']) && !empty($_POST['drug_quantity']) && !empty($_POST['drug_supplier'])){
        //check if price and quantity is 
        $drug_name=$_POST['drug_name'];        
        if(is_numeric($_POST['drug_price']) && is_numeric($_POST['drug_quantity'])){
            $drug_name=$_POST['drug_name'];
            $drug_type=$_POST['drug_type'];
            $drug_desc=$_POST['drug_desc'];
            $drug_price= floatval($_POST['drug_price']);
            $drug_quantity= intval($_POST['drug_quantity']);
            $drug_supplier=($_POST['drug_supplier']);
            if($drug_price>0 && $drug_quantity>0){
                // add to database  
                $insertQuery = "INSERT INTO drug(drug_name,drug_type,drug_desc,drug_price,drug_quantity,drug_supplier) values(?,?,?,?,?,?)";
                $stmt = $conn->prepare($insertQuery);
                echo $drug_price;
                $stmt->bind_param("sssdis",$drug_name,$drug_type,$drug_desc,$drug_price,$drug_quantity,$drug_supplier);
                if ($stmt->execute()) {
                    $_SESSION['msg']= "New medicine is successfully added.";
                    $_SESSION['alert']= "alert alert-success";
                    
                } else {
                    $stmt->close();
                    $conn->close();
                }
                            
            }else{
                //price and quantity must be more than 0
                $_SESSION['msg']= "Price and Quantity must be bigger than 0. ";
                $_SESSION['alert']= "alert alert-warning";
                
            }
        }else{
            // price / quantity must be number
            $_SESSION['msg']= "Price or Quantity must be number. ";
            $_SESSION['alert']= "alert alert-warning";
            
        }
    }else{
        // all field must is required
        $_SESSION['msg']= "All field is required.";
        $_SESSION['alert']= "alert alert-warning";
        
    }
    header("location: inventory.php");
}


# Delete Selected Data

if(isset($_POST['delete'])){
    $drug_id=$_POST['delete'];
    
    $DeleteQuery = "DELETE FROM drug WHERE drug_id = ?";
    $stmt=$conn->prepare($DeleteQuery);
    $stmt->bind_param('i',$drug_id);
    if($stmt->execute()){
       $_SESSION['msg'] = "Selected Record is successfully deleted.";
       $_SESSION['alert'] = "alert alert-danger";
       
    }
    $stmt->close();
    $conn->close();
    
   header("location: inventory.php");
}



# Update Selected Data

if(isset($_POST['edit'])){
    if(!empty($_POST['drug_name']) && !empty($_POST['drug_type']) && !empty($_POST['drug_desc']) && !empty($_POST['drug_price']) && !empty($_POST['drug_quantity']) && !empty($_POST['drug_supplier'])){
        //check if price and quantity is        
        if(is_numeric($_POST['drug_price']) && is_numeric($_POST['drug_quantity'])){
            $drug_id=$_POST['edit'];
            $drug_name=$_POST['drug_name'];
            $drug_type=$_POST['drug_type'];
            $drug_desc=$_POST['drug_desc'];
            $drug_price= floatval($_POST['drug_price']);
            $drug_quantity= intval($_POST['drug_quantity']);
            $drug_supplier=($_POST['drug_supplier']);
            if($drug_price>0 && $drug_quantity>0){
                // add to database  
                $updateQuery = "UPDATE drug SET drug_name = ?, drug_type = ?, drug_desc = ?, drug_price = ?, drug_quantity = ? ,drug_supplier = ? WHERE drug_id = ?";
                $stmt = $conn->prepare($updateQuery);
                $stmt->bind_param('sssdisi',$drug_name,$drug_type,$drug_desc,$drug_price,$drug_quantity,$drug_supplier,$drug_id);
                if ($stmt->execute()) {
                    $_SESSION['msg']= "Selected medicine is successfully Updated.";
                    $_SESSION['alert']= "alert alert-success";
                } else {
                    $stmt->close();
                    $conn->close();
                }
                
            }else{
                //price and quantity must be more than 0
                $_SESSION['msg']= "Price and Quantity must be bigger than 0. ";
                $_SESSION['alert']= "alert alert-warning";
                
            }
        }else{
            // price / quantity must be number
            $_SESSION['msg']= "Price or Quantity must be number. ";
            $_SESSION['alert']= "alert alert-warning";
            
        }
    }else{
        // all field must is required
        $_SESSION['msg']= "All field is required.";
        $_SESSION['alert']= "alert alert-warning";
        
    }
    header("location: inventory.php");
}