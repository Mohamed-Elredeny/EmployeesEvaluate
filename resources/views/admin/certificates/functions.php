<?php
$con = mysqli_connect('localhost','busine36_certificate_user','3IemqDv1ufGL','busine36_certificates');
//Add New Subject
if(isset($_POST['add'])){
    $name_ar = $_POST['name_ar'];
    $name_en = $_POST['name_en'];
    $program_en = $_POST['program_en'];
    $program_ar = $_POST['program_ar'];
    $number = $_POST['number'];

    $date = $_POST['date'];
    $real_date = 'Date ' . $date;

    $num = 1;

    $Add_New_Subject = mysqli_query($con,"INSERT INTO certificates( name_ar, name_en, program_ar,program_en, date , number,id ) VALUES ('$name_ar','$name_en','$program_ar','$program_en','$date','$number',1) ");
    if($Add_New_Subject){
       echo 'DONE';
    }else{
        echo 'sad';
    }

}
$name_ar = '1';
$name_en = '1';
$program_en = '1';
$program_ar = '1';
$number = '1';

$date = '1';
$real_date = 'Date ' . $date;

$num = 1;
