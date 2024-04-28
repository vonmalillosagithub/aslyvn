<?php
    include 'db_connect.php';
    extract($_POST);
    if(empty($id)){
        $i = 1;
        while($i == 1){
            $e_num = date('Y') . '-' . mt_rand(1, 9999);
            $chk = $conn->query("SELECT * FROM employee WHERE employee_no = '$e_num'")->num_rows;
            if($chk <= 0){
                $i = 0;
            }
        }
        $save = $conn->query("INSERT INTO employee (employee_no, firstname, middlename, lastname, gender, position, birthdate, province, status, city, barangay, email, emp_type, joining_date) VALUES ('$e_num', '$firstname', '$middlename', '$lastname', '$gender', '$position', '$birthdate', '$province', '$status', '$city', '$barangay', '$email', '$emp_type', '$joining_date')") or die($conn->error);
        if($save){
            echo json_encode(array('status' => 1, 'msg' => "Data successfully Saved"));
        }
    }else{
        $save=$conn->query("UPDATE `employee` set firstname='$firstname', middlename='$middlename', lastname='$lastname', gender='$gender', position='$position', birthdate='$birthdate', province='$province', status='$status', city='$city', barangay='$barangay', email='$email', emp_type='$emp_type', joining_date='$joining_date' where id = $id ") or die($conn->error);
        if($save){
            echo json_encode(array('status'=>1,'msg'=>"Data successfully Updated"));
        }
    }    

    $conn->close();
?>

