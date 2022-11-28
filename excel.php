
<?php include 'layout/conn.php' ?>
<?php

function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '\t')) $str = str_replace('\t', ',', $str); 
}

$filename="studentsApplied".date('Y-m-d H:i:s').".csv";
$fields = array('ID','NAME','AGE','GENDER','MOB_NUMBER','PERSONAL_EMAIL','UNIVERSTY_EMAIL','UNIVERSTY_ID',
                'FACULTY','ACADEMIC_YEAR','CENTER','ABOUT_ENACTUS','SKILLS','COMMITTE');
$excelData=implode(",",array_values($fields))."\n";

$query="SELECT * FROM `join_us`";
$excRun = mysqli_query($conn, $query);
while($row=$excRun->fetch_assoc()){
    $lineData=array($row['id'],$row['name'],$row['age'],$row['gender'],$row['mob_number'],$row['personal_email'],
    $row['universty_email'],$row['universty_id'],$row['faculty'],$row['academic_year'],$row['center'],
    $row['about_enactus'],$row['skills'],$row['committe']);
    array_walk($lineData,'filterData');
    $excelData.=implode(",",array_values($lineData))."\n";
}



header("Content-Disposition: attachment; filename=\"$filename\""); 
header("Content-Type: application/vnd.ms-excel");
echo $excelData;

?>
