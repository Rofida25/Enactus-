<?php include 'layout/header.php' ?>
<?php include 'layout/conn.php' ?>



<?php 




if(isset($_POST['apply'])){
    $name=$_POST['name'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $number=$_POST['number'];
    $personal_email=$_POST['personalEmail'];
    $univesrty_email=$_POST['univesrtyEmail'];
    $univesrty_id=$_POST['universtyID'];
    $faculty=$_POST['faculty'];
    $academic_year=$_POST['academicYear'];
    $center=$_POST['center'];
    $about_enactus=$_POST['aboutEnactus'];
    $personal_skills=$_POST['personalSkills'];
    $committe=$_POST['committe'];
    $check = "SELECT * FROM `join_us` WHERE `personal_email`='$personal_email' OR `universty_email`='$univesrty_email' OR `universty_id` = '$univesrty_id';";
    $run = mysqli_query($conn, $check);
    $row = mysqli_fetch_assoc($run);
    $numRow = mysqli_num_rows($run);
    $valid=False;
    if($numRow > 0){
        
    }else{
        $insert = "INSERT INTO join_us VALUES (NULL ,'$name','$age','$gender' ,'$number','$personal_email','$univesrty_email','$univesrty_id','$faculty','$academic_year','$center','$about_enactus','$personal_skills' ,'$committe');";
        $insertionNewStudentQuery=mysqli_query($conn, $insert);
        if($insertionNewStudentQuery){
            $valid=True;
            
            // function filterData(&$str){ 
            //     $str = preg_replace("/\t/", "\\t", $str); 
            //     $str = preg_replace("/\r?\n/", "\\n", $str); 
            //     if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
            // }

            // $filename="studentsApplied".date('Y-m-d H:i:s').".xlsx";
            // $fields = array('ID','NAME','AGE','GENDER','MOB_NUMBER','PERSONAL_EMAIL','UNIVERSTY_EMAIL','UNIVERSTY_ID',
            //                 'FACULTY','ACADEMIC_YEAR','CENTER','ABOUT_ENACTUS','SKILLS','COMMITTE');
            // $excelData=implode("\t",array_values($fields))."\n";

            // $query="SELECT * FROM `join_us`";
            // $excRun = mysqli_query($conn, $query);

            // foreach($excRun as $excDataf){
            //     $lineData=array($excDataf['id'],$excDataf['name'],$excDataf['age'],$excDataf['gender'],$excDataf['mob_number'],$excDataf['personal_email'],
            //     $excDataf['universty_email'],$excDataf['universty_id'],$excDataf['faculty'],$excDataf['academic_year'],$excDataf['center'],
            //     $excDataf['about_enactus'],$excDataf['skills'],$excDataf['committe']);
            //     array_walk($lineData,'filterData');
            //     $excelData.=implode("\t",array_values($lineData))."\n";
            // }

            // header("Content-Disposition: attachment; filename=\"$filename\""); 
            // header("Content-Type: application/vnd.ms-excel");
            // echo $excelData;
        }
    }
    
}
?>




<nav id="form-nav">

    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label>
    <label class="logo"><a href="/Final Enactus Website"><img src="img/Group 89.png" alt=""></a></label>
    <ul>
        <li><a class="active" href="/Final Enactus Website">Home</a></li>
        <li>
            <a href="/Final Enactus Website#infosection">Who We Are</a>
        </li>
        <li>
            <a href="/Final Enactus Website/about.php">Team</a>
        </li>
        <li>
            <a href="/Final Enactus Website#commettesInfoSection">Commettiee</a>
        </li>
        <li>
            <a href="/Final Enactus Website/apply-Form.php">Join Us</a>
        </li>
    </ul>
</nav>
<section class="apply-form-section p-container">
    <h1 class="p-py-2 p-xl p-text-center">Join To Our <span class="p-spec-text">Community</span></h1>
    <p class="form-paragraph p-text-center">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aspernatur quisquam esse minus minima modi, et ea,
        accusantium culpa, .
    </p>


    <form class="p-card p-grid" method="POST">
        <?php
        if(isset($valid)){
            if($valid){
                echo "
                    <div class='success'>
                        <strong>Added successfully</strong>
                    </div>";
            }else{
                echo "
                <div class='alert'>
                    <strong>Unvalid data!</strong>This user informarion is already used
                </div>";
            }
        }
            
        ?>
        <div class="personal-question">
            <h3 class="p-spec-text p-md">Personal Question</h3>
            <table>
                <tr>
                    <td><label for="">Name:</label></td>
                    <td><input type="text" placeholder="Enter Your Name" name="name" required></td>
                </tr>
                <tr>
                    <td><label for="">Age:</label></td>
                    <td>
                        <input type="number" placeholder="Your Age" name="age" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="">Gender</label>

                    </td>
                    <td>
                        <input type="radio" name="gender" value="male" checked>Male
                        <input type="radio" name="gender" value="female">Fmale
                    </td>
                </tr>
                <tr>
                    <td><label for="">Mobile Number:</label></td>
                    <td><input type="text" placeholder="Enter Your Phone Number" name="number" required></td>
                </tr>
                <tr>
                    <td><label for="">Personal Email:</label></td>
                    <td><input type="email" placeholder="Enter Your Personal Email" name="personalEmail" required></td>
                </tr>
                <tr>
                    <td><label for="">University Email:</label></td>
                    <td><input type="email" placeholder="Enter Your University  Email" name="univesrtyEmail" required>
                    </td>
                </tr>
                <tr>
                    <td><label for="">University ID</label></td>
                    <td><input type="text" placeholder="Enter Your University  ID" name="universtyID" required></td>
                </tr>
                <tr>
                    <td><label for="">Faculty:</label></td>
                    <td>
                        <select name="faculty">
                            <option>faculty of computers and information technology</option>
                            <option>faculty of commercial studies and business administration</option>
                            <option>faculty of educational studies </option>
                        </select>

                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="">Academic year</label>
                    </td>
                    <td>

                        <select name="academicYear">
                            <option>Frist Year</option>
                            <option>Secand Year</option>
                            <option>Third Year </option>
                            <option>Fuird Year </option>
                        </select>

                    </td>
                </tr>
                <tr>
                    <td><label for="">Center:</label>
                    </td>
                    <td>
                        <select name="center">
                            <option>Ain Shams</option>
                            <option>Asyut</option>
                            <option>Alexandria</option>
                            <option>Menoufia</option>
                            <option>Bani Sweif</option>
                            <option>Qana</option>
                            <option>Hurghada</option>
                            <option>aswan</option>
                            <option>Sohag</option>
                            <option>Ismailia</option>
                            <option>Sadat</option>
                            <option>Fayoum</option>
                        </select>

                    </td>
                </tr>
            </table>
        </div>
        <hr>
        <div class="general-question">
            <h3 class="p-spec-text p-md">Question Question</h3>
            <table>
                <tr>
                    <td>
                        <p>What Do You Know About Enactus?</p>
                    </td>
                </tr>
                <tr>
                    <td> <textarea name="aboutEnactus" required></textarea></td>
                </tr>
                <tr>
                    <td>
                        <p>What's Your Personal Sklls ?</p>
                    </td>
                </tr>
                <tr>
                    <td><textarea name="personalSkills" required></textarea></td>
                </tr>
                <tr>
                    <td>
                        <p>Which Committes Are You Applying To ?</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <select name="committe">
                            <option>HR</option>
                            <option>marketing & Pr</option>
                            <option>project</option>
                            <option>IT</option>
                            <option>presentation</option>
                            <option>media</option>
                        </select>
                    </td>
                </tr>
            </table>
        </div>
        <button class="p-btn" name="apply">Apply Now</button>
    </form>
</section>


<?php include 'layout/script.php' ?>