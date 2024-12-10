<?php
session_start();
error_reporting(0);
include('../dbconnection.php');
if (strlen($_SESSION['uid']==0)) {
  header('location:logout.php');
  } else{

 // Coding for form Submission  
if(isset($_POST['submit']))
  {
    $uid=$_SESSION['uid'];
    $coursename=$_POST['coursename'];
    $fathername=$_POST['fathername'];
    $mothername=$_POST['mothername'];
    $dob=$_POST['dob'];
    $nationality=$_POST['nationality'];
    $gender=$_POST['gender'];
    $category=$_POST['religeon'];
    $coradd=$_POST['coradd'];
    $peradd=$_POST['peradd'];
    $secboard=$_POST['secondaryboard'];
    $secyop=$_POST['secondarypyear'];
    $secper=$_POST['secondarypercentage'];
    $secstream=$_POST['secondarystream'];
    $ssecboard=$_POST['seniorsecondaryboard'];
    $ssecyop=$_POST['seniorsecondarypyear'];
    $ssecper=$_POST['seniorsecondarypercentage'];
    $ssecstream=$_POST['seniorsecondarystream'];
    $grauni=$_POST['graduation'];
    $grayop=$_POST['graduationpyeaer'];
    $graper=$_POST['graduationpercentage'];
    $grastream=$_POST['graduationstream'];
    $pguni=$_POST['postgraduation'];
    $pgyop=$_POST['pgpyear'];
    $pgper=$_POST['pgpercentage'];
    $pgstream=$_POST['pgstream'];
    $dec=$_POST['declaration'];
    $sign=$_POST['signature'];
    $upic=$_FILES["userpic"]["name"];
    $tc=$_FILES["tcimage"]["name"];
        $tenmarksheet=$_FILES["hscimage"]["name"];
        $twlevemaksheet=$_FILES["sscimage"]["name"];
        $gramarksheet=$_FILES["graimage"]["name"];
        $pgmarksheet=$_FILES["pgraimage"]["name"];
    
$extension = substr($upic,strlen($upic)-4,strlen($upic));
$extensiontc = substr($tc,strlen($tc)-4,strlen($tc));
$extensiontm = substr($tenmarksheet,strlen($tenmarksheet)-4,strlen($tenmarksheet));
$extensiontwm = substr($twlevemaksheet,strlen($twlevemaksheet)-4,strlen($twlevemaksheet));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif",".pdf",".PDF",".JPG","JPEG",".PNG",".GIF");

// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
elseif(!in_array($extensiontc,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif/pdf format allowed');</script>";
}
elseif(!in_array($extensiontm,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif/pdf format allowed');</script>";
}
elseif(!in_array($extensiontwm,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif/pdf format allowed');</script>";
}
else
{
// rename user pic
$userpic=md5($upic).$extension;
$tc=md5($tc).$extensiontc;
$tm=md5($tenmarksheet).$extensiontm;
$twm=md5($twlevemaksheet).$extensiontwm;
if($gramarkshee!=""){
$gra=md5($gramarksheet).$extensiongra;
} else { $gra="";}

if($pgmarksheet!=""){
$pgra=md5($pgmarksheet).$extensionpgra;
} else { $pgra="";}
move_uploaded_file($_FILES["tcimage"]["tmp_name"],"userdocs/".$tc);
     move_uploaded_file($_FILES["hscimage"]["tmp_name"],"userdocs/".$tm);
     move_uploaded_file($_FILES["sscimage"]["tmp_name"],"userdocs/".$twm);
     move_uploaded_file($_FILES["graimage"]["tmp_name"],"userdocs/".$gra);
     move_uploaded_file($_FILES["pgraimage"]["tmp_name"],"userdocs/".$pgra);
     move_uploaded_file($_FILES["userpic"]["tmp_name"],"userimages/".$userpic);
    $query=mysqli_query($con,"insert into tbladmapplications(UserId,CourseApplied,FatherName,MotherName,DOB,Nationality,Gender,Category,CorrespondenceAdd,PermanentAdd,SecondaryBoard,SecondaryBoardyop,SecondaryBoardper,SecondaryBoardstream,SSecondaryBoard,SSecondaryBoardyop,SSecondaryBoardper,SSecondaryBoardstream,GraUni,GraUniyop,GraUnidper,GraUnistream,PGUni,PGUniyop,PGUniper,PGUnistream,Signature,UserPic,TransferCertificate,TenMarksheeet,TwelveMarksheet,GraduationCertificate,PostgraduationCertificate) value('$uid','$coursename','$fathername','$mothername','$dob','$nationality','$gender','$category','$coradd','$peradd','$secboard','$secyop','$secper','$secstream','$ssecboard','$ssecyop','$ssecper','$ssecstream','$grauni','$grayop','$graper','$grastream','$pguni','$pgyop','$pgper','$pgstream','$sign','$userpic','$tc','$tm','$twm','$gra','$pgra')");
    if ($query) {
    
    echo '<script>alert("Data has been added successfully.")</script>';
    echo "<script>window.location.href ='admission_form.php'</script>";
  }
  else
    {
     echo '<script>alert("Something Went Wrong. Please try again.")</script>';
         echo "<script>window.location.href ='admission_form.php'</script>";
    }
}
}
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="logo/png" href="../logo/logo (24).ico">
   <title>
    Hello Dreamy Birds | Admision Form
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.2" rel="stylesheet" >
    <link rel="stylesheet" type="text/css" href="../app-assets/css/plugins/forms/extended/form-extended.css">

</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="" target="_blank">
<!--         <img src="../logo/logo (24).ico" class="navbar-brand-img h-100" alt="main_logo">
 -->        <span class="ms-1 font-weight-bold text-white"> <font face = "Comic sans MS" size = "4">Hello Dreamy Birds</font></span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <!-- <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main"> -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white" href="../index.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons-round opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="admission_form.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons-round opacity-10">description</i></i>
            </div>
            <span class="nav-link-text ms-1">Admission Form</span>
          </a>
        </li>
      <!--   <li class="nav-item">
          <a class="nav-link text-white " href="edit-appform.php?editid=<?php echo $row['ID'];?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons-round opacity-10">edit_note</i>
            </div>
            <span class="nav-link-text ms-1">Edit Application</span>
          </a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link text-white " href="adltr.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">verified</i>
            </div>
            <span class="nav-link-text ms-1">Admission Letter</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="fee.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">payments</i>
            </div>
            <span class="nav-link-text ms-1">Submit Fee</span>
          </a>
        </li>
   
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="profile.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
  <!--       <li class="nav-item">
          <a class="nav-link text-white " href="./pages/sign-in.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">login</i>
            </div>
            <span class="nav-link-text ms-1">Sign In</span>
          </a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link text-white " href="../logout.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">logout</i>
            </div>
            <span class="nav-link-text ms-1">Logout</span>
          </a>
        </li>
  
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Hello Dreamy Birds</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Admission Form</li>
          </ol><br>
          <h6 class="font-weight-bolder mb-0">       
            <i class="material-icons-round opacity-10">description</i> | Admission Form</h6><br>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <!-- <div class="input-group input-group-outline">
              <label class="form-label">Type here...</label>
              <input type="text" class="form-control"> -->
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
 <!--            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Sign In</span>
              </a>
            </li>
             -->
            <li class="nav-item dropdown pe-2 d-flex align-items-center">           
     </a>
              </li>
            </ul>
            <a href="../../index.php">
                    <img src="logo/0.0.png" class="navbar-brand-img h-100" alt="main_logo" height="350"  width="350">
</a>
          </div></nav>
       
    <!-- FORM -->


   <br><div class="card">
  
<?php 
$stuid=$_SESSION['uid'];
$query=mysqli_query($con,"select * from tbladmapplications 
  join tbluser on tbluser.ID=tbladmapplications.UserId where  UserId=$stuid");
$rw=mysqli_num_rows($query);
if($rw>0)
{
while($row=mysqli_fetch_array($query)){
?>
 <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-Gray 100 shadow-success border-radius-lg pt-3 pb-3">
                <h6 style="color:green;" align="center" >                    
<!--                   <img src="logo/0.0.png" class="navbar-brand-img h-100" alt="main_logo" height="300"  width="250">
 -->Your Admission Form Is Uploaded Succesfully</h6>
</div> <br><br> 

<div  id="exampl">  
<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-success shadow-danger border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Personal Informations</h6>
</div>   
<table class="table" border="0.50" width="100%">
<tr>
  <th>Applicant Name</th>
  <td><?php echo $row['FirstName']." ".$row['LastName'];?></td>
  <br>
  <th>Registration Date</th>
  <td><?php echo $row['CourseApplieddate'];?></td>
</tr>


  <th>Course Applied</th>
  <td><?php echo $row['CourseApplied'];?></td> <br><br>
  <th>Student Pic</th>
  <td><img src="userimages/<?php echo $row['UserPic'];?>" width="200" height="150"></td>

<tr>
  <th>Father's Name</th>
  <td><?php echo $row['FatherName'];?></td>
  <th>Mother's Name</th>
  <td><?php echo $row['MotherName'];?></td>
</tr>
<tr>
  <th>DOB</th>
  <td><?php echo $row['DOB'];?></td>
  <th>Nationality</th>
  <td><?php echo $row['Nationality'];?></td>
</tr>
<tr>
  <th>Gender</th>
  <td><?php echo $row['Gender'];?></td>
  <th>Category</th>
  <td><?php echo $row['Category'];?></td>
</tr>
<tr>
  <th>Correspondence Address</th>
  <td><?php echo $row['CorrespondenceAdd'];?></td>
  <th>Permanent Address</th>
  <td><?php echo $row['PermanentAdd'];?></td>
</tr>
<tr>
  <th>Transfer Certificate</th>
  <td><a href="userdocs/<?php echo $row['TransferCertificate'];?>" target="_blank">View File </a></td>

  <th>Secondary Marksheet</th>
  <td><a href="userdocs/<?php echo $row['secondarysheeet'];?>" target="_blank">View File </a></td>
</tr>
<tr>
  <th> Senior Secondary Marksheet</th>
  <td><a href="userdocs/<?php echo $row['seniorsecondaryMarksheet'];?>" target="_blank">View File </a></td>
  <th>Graduation Certificate</th>
  <td>
<?php if($row['GraduationCertificate']==""){ ?>
  NA
<?php } else{ ?>
    <a href="userdocs/<?php echo $row['GraduationCertificate'];?>" target="_blank">View File </a>
<?php } ?>
  </td>
</tr>

<tr>
  <th>Post Graduation Certificate</th>
  <td>
<?php if($row['PostgraduationCertificate']==""){ ?>
  NA
<?php } else{ ?>
    <a href="userdocs/<?php echo $row['PostgraduationCertificate'];?>" target="_blank">View File </a>
<?php } ?>
  </td>
</tr>
</table><br><br><br>

     <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-success shadow-danger border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Education Qualification</h6>

      </div><br>
      </div>
      <div class="card">
<div class="table-responsive">
  <table class="table mb-0">

<!-- <table class="table" border="1" width="100%" style="margin-top:1%">
 --><tr>
  <th>#</th>
   <th>Board / University</th>
    <th>Year</th>
     <th>Percentage</th>
       <th>Stream</th>
</tr>
<th>Secondary</th>
  <td><?php echo $row['SecondaryBoard'];?></td>
  <td><?php echo $row['SecondaryBoardyop'];?></td>
   <td><?php echo $row['SecondaryBoardper'];?></td>
   <td><?php echo $row['SecondaryBoardstream'];?></td>
</tr>
<tr>
  <th>Senior Secondary</th>
  <td><?php echo $row['SSecondaryBoard'];?></td>
   <td><?php echo $row['SSecondaryBoardyop'];?></td>
   <td><?php echo $row['SSecondaryBoardper'];?></td>
    <td><?php echo $row['SSecondaryBoardstream'];?></td>
</tr>
<tr>
  <th>Graduation</th>
  <td><?php echo $row['GraUni'];?></td>
  <td><?php echo $row['GraUniyop'];?></td>
  <td><?php echo $row['GraUnidper'];?></td>
  <td><?php echo $row['GraUnistream'];?></td>
</tr>
<tr>
  <th>Post Graduation</th>
  <td><?php echo $row['PGUni'];?></td>
  <td><?php echo $row['PGUniyop'];?></td>
  <td><?php echo $row['PGUniper'];?></td>
  <td><?php echo $row['PGUnistream'];?></td>
</tr>

</table>

      </div>
    </div>

<br>

    <br><div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-success shadow-danger border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Admin Remarks</h6>

      </div><br>
      </div>
      <div class="card">
<div class="table-responsive">

<?php if($row['AdminStatus']==""):?>
  <?php else: ?>

  <table class="table mb-0">

<tr>
  <th>Admin Remark</th>
  <td><?php echo $row['AdminRemark'];?></td>
</tr>
<tr>
  <th>Admin Status</th>
 <td><?php 
                  if($row['AdminStatus']==""){
echo "admin remark is pending";
} 

 if($row['AdminStatus']=="1"){
  echo "Selected";
}
    
if($row['AdminStatus']=="2"){
  echo "Rejected";
}
                    ?></td>
</tr>
<tr>
  <th>Admin Remark Date</th>
  <td><?php echo $row['AdminRemarkDate'];?></td>
</tr>
<?php endif;?>
  <tr>
  </tr>
</table>
</div>
</div>
<br>

  <br><div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-success shadow-danger border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Student's Self Declaration</h6>
</div><br>
    <th colspan="2">I hereby state that the facts mentioned above are true to the best of my knowledge and belief.<br />
                    [<?php  echo $row['Signature'];?>]
    </th>
  </tr>
</table>


</div>
<div align="center" >
  <button class="btn btn-success" style="cursor: pointer;"  OnClick="CallPrint(this.value)" >Print</button></div>
<?php 

if ($row['AdminStatus']==""){
?>
<p align="center" style="text-align: center;font-size: 10px;" class="btn btn-danger"><a href="edit-appform.php?editid=<?php echo $row['ID'];?>">Edit Details</a></p>
<?php }} } else { ?>










<form name="submit" method="post" enctype="multipart/form-data">        
        <section class="formatter" id="formatter">
          <div class="row">
            <div class="col-12">
              <div class="card">
                  
                     <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Personal Information</h6>
                 <div class="heading-elements">
                    <ul class="list-inline mb-0">
                  
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      
                    </ul>
                  </div>
              </div>
            </div>
                 





             
                <div class="card-content">
                  <div class="card-body">







 

<div class="row">
<div class="col-7 col-md-5">
  Course Appling to       
   <div class="dropdown">
   <select name='coursename' id="coursename" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" required="true">
     <option value="">Course Appling to</option>
      <?php $query=mysqli_query($con,"select * from tblcourse");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['CourseName'];?>"><?php echo $row['CourseName'];?></option>
                  <?php } ?>  
   </select>
    </div>
                   
</div>

<div class="col-7 col-md-5">
 <fieldset>
  Student Pic
  <div class="ajax-file-upload-container">
    <input class="" placeholder="" id="userpic" name="userpic"  type="file" required>
    </div>
</fieldset>                  
</div>
 </div><br>


 <div class="row">

 <div class="col-7 col-md-5">
<div class="input-group input-group-dynamic mb-4">
    <span class="input-group-text">Father's Name</span>
    <input type="text" class="form-control" placeholder="Father's Name" aria-label="fathername" aria-describedby="basic-addon1" id="fathername" name="fathername"  type="text" required >
</div>
</div>

 <div class="col-7 col-md-5">
<div class="input-group input-group-dynamic mb-4">
    <span class="input-group-text">Mother's Name</span>
    <input type="text" class="form-control" placeholder="Mother's Name" aria-label="mothername" aria-describedby="basic-addon1" id="mothername" name="mothername"  type="text" required >
</div>
</div>
</div>
   <br>
<div class="row">
<div class="col-6 col-md-3">
  <div class="input-group input-group-dynamic mb-4">
    <input type="date" class="form-control" id="dob" name="dob" placeholder="YYYY-MM-DD" required>
  </div>
</div>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="col-6 col-md-3">
  <div class="input-group input-group-dynamic mb-4">
  <span class="input-group-text">Nationality</span>
    <label for="nationality" class="input-group-text">
      <i class="fas fa-globe"></i> <!-- World Icon -->
    </label>
    <select class="form-control" id="nationality" name="nationality" required>
      <option value="" disabled selected>Select Country</option>
      <option value="Afghanistan">Afghanistan</option>
      <option value="Albania">Albania</option>
      <option value="Algeria">Algeria</option>
      <option value="Andorra">Andorra</option>
      <option value="Angola">Angola</option>
      <option value="Antigua and Barbuda">Antigua and Barbuda</option>
      <option value="Argentina">Argentina</option>
      <option value="Armenia">Armenia</option>
      <option value="Australia">Australia</option>
      <option value="Austria">Austria</option>
      <option value="Azerbaijan">Azerbaijan</option>
      <option value="Bahamas">Bahamas</option>
      <option value="Bahrain">Bahrain</option>
      <option value="Bangladesh">Bangladesh</option>
      <option value="Barbados">Barbados</option>
      <option value="Belarus">Belarus</option>
      <option value="Belgium">Belgium</option>
      <option value="Belize">Belize</option>
      <option value="Benin">Benin</option>
      <option value="Bhutan">Bhutan</option>
      <option value="Bolivia">Bolivia</option>
      <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
      <option value="Botswana">Botswana</option>
      <option value="Brazil">Brazil</option>
      <option value="Brunei">Brunei</option>
      <option value="Bulgaria">Bulgaria</option>
      <option value="Burkina Faso">Burkina Faso</option>
      <option value="Burundi">Burundi</option>
      <option value="Cabo Verde">Cabo Verde</option>
      <option value="Cambodia">Cambodia</option>
      <option value="Cameroon">Cameroon</option>
      <option value="Canada">Canada</option>
      <option value="Central African Republic">Central African Republic</option>
      <option value="Chad">Chad</option>
      <option value="Chile">Chile</option>
      <option value="China">China</option>
      <option value="Colombia">Colombia</option>
      <option value="Comoros">Comoros</option>
      <option value="Congo (Congo-Brazzaville)">Congo (Congo-Brazzaville)</option>
      <option value="Costa Rica">Costa Rica</option>
      <option value="Croatia">Croatia</option>
      <option value="Cuba">Cuba</option>
      <option value="Cyprus">Cyprus</option>
      <option value="Czechia (Czech Republic)">Czechia (Czech Republic)</option>
      <option value="Denmark">Denmark</option>
      <option value="Djibouti">Djibouti</option>
      <option value="Dominica">Dominica</option>
      <option value="Dominican Republic">Dominican Republic</option>
      <option value="Ecuador">Ecuador</option>
      <option value="Egypt">Egypt</option>
      <option value="El Salvador">El Salvador</option>
      <option value="Equatorial Guinea">Equatorial Guinea</option>
      <option value="Eritrea">Eritrea</option>
      <option value="Estonia">Estonia</option>
      <option value="Eswatini (fmr. Swaziland)">Eswatini (fmr. Swaziland)</option>
      <option value="Ethiopia">Ethiopia</option>
      <option value="Fiji">Fiji</option>
      <option value="Finland">Finland</option>
      <option value="France">France</option>
      <option value="Gabon">Gabon</option>
      <option value="Gambia">Gambia</option>
      <option value="Georgia">Georgia</option>
      <option value="Germany">Germany</option>
      <option value="Ghana">Ghana</option>
      <option value="Greece">Greece</option>
      <option value="Grenada">Grenada</option>
      <option value="Guatemala">Guatemala</option>
      <option value="Guinea">Guinea</option>
      <option value="Guinea-Bissau">Guinea-Bissau</option>
      <option value="Guyana">Guyana</option>
      <option value="Haiti">Haiti</option>
      <option value="Holy See">Holy See</option>
      <option value="Honduras">Honduras</option>
      <option value="Hungary">Hungary</option>
      <option value="Iceland">Iceland</option>
      <option value="India">India</option>
      <option value="Indonesia">Indonesia</option>
      <option value="Iran">Iran</option>
      <option value="Iraq">Iraq</option>
      <option value="Ireland">Ireland</option>
      <option value="Israel">Israel</option>
      <option value="Italy">Italy</option>
      <option value="Jamaica">Jamaica</option>
      <option value="Japan">Japan</option>
      <option value="Jordan">Jordan</option>
      <option value="Kazakhstan">Kazakhstan</option>
      <option value="Kenya">Kenya</option>
      <option value="Kiribati">Kiribati</option>
      <option value="Kuwait">Kuwait</option>
      <option value="Kyrgyzstan">Kyrgyzstan</option>
      <option value="Laos">Laos</option>
      <option value="Latvia">Latvia</option>
      <option value="Lebanon">Lebanon</option>
      <option value="Lesotho">Lesotho</option>
      <option value="Liberia">Liberia</option>
      <option value="Libya">Libya</option>
      <option value="Liechtenstein">Liechtenstein</option>
      <option value="Lithuania">Lithuania</option>
      <option value="Luxembourg">Luxembourg</option>
      <option value="Madagascar">Madagascar</option>
      <option value="Malawi">Malawi</option>
      <option value="Malaysia">Malaysia</option>
      <option value="Maldives">Maldives</option>
      <option value="Mali">Mali</option>
      <option value="Malta">Malta</option>
      <option value="Marshall Islands">Marshall Islands</option>
      <option value="Mauritania">Mauritania</option>
      <option value="Mauritius">Mauritius</option>
      <option value="Mexico">Mexico</option>
      <option value="Micronesia">Micronesia</option>
      <option value="Moldova">Moldova</option>
      <option value="Monaco">Monaco</option>
      <option value="Mongolia">Mongolia</option>
      <option value="Montenegro">Montenegro</option>
      <option value="Morocco">Morocco</option>
      <option value="Mozambique">Mozambique</option>
      <option value="Myanmar (formerly Burma)">Myanmar (formerly Burma)</option>
      <option value="Namibia">Namibia</option>
      <option value="Nauru">Nauru</option>
      <option value="Nepal">Nepal</option>
      <option value="Netherlands">Netherlands</option>
      <option value="New Zealand">New Zealand</option>
      <option value="Nicaragua">Nicaragua</option>
      <option value="Niger">Niger</option>
      <option value="Nigeria">Nigeria</option>
      <option value="North Korea">North Korea</option>
      <option value="North Macedonia">North Macedonia</option>
      <option value="Norway">Norway</option>
      <option value="Oman">Oman</option>
      <option value="Pakistan">Pakistan</option>
      <option value="Palau">Palau</option>
      <option value="Palestine State">Palestine State</option>
      <option value="Panama">Panama</option>
      <option value="Papua New Guinea">Papua New Guinea</option>
      <option value="Paraguay">Paraguay</option>
      <option value="Peru">Peru</option>
      <option value="Philippines">Philippines</option>
      <option value="Poland">Poland</option>
      <option value="Portugal">Portugal</option>
      <option value="Qatar">Qatar</option>
      <option value="Romania">Romania</option>
      <option value="Russia">Russia</option>
      <option value="Rwanda">Rwanda</option>
      <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
      <option value="Saint Lucia">Saint Lucia</option>
      <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
      <option value="Samoa">Samoa</option>
      <option value="San Marino">San Marino</option>
      <option value="Sao Tome and Principe">Sao Tome and Principe</option>
      <option value="Saudi Arabia">Saudi Arabia</option>
      <option value="Senegal">Senegal</option>
      <option value="Serbia">Serbia</option>
      <option value="Seychelles">Seychelles</option>
      <option value="Sierra Leone">Sierra Leone</option>
      <option value="Singapore">Singapore</option>
      <option value="Slovakia">Slovakia</option>
      <option value="Slovenia">Slovenia</option>
      <option value="Solomon Islands">Solomon Islands</option>
      <option value="Somalia">Somalia</option>
      <option value="South Africa">South Africa</option>
      <option value="South Korea">South Korea</option>
      <option value="South Sudan">South Sudan</option>
      <option value="Spain">Spain</option>
      <option value="Sri Lanka">Sri Lanka</option>
      <option value="Sudan">Sudan</option>
      <option value="Suriname">Suriname</option>
      <option value="Sweden">Sweden</option>
      <option value="Switzerland">Switzerland</option>
      <option value="Syria">Syria</option>
      <option value="Tajikistan">Tajikistan</option>
      <option value="Tanzania">Tanzania</option>
      <option value="Thailand">Thailand</option>
      <option value="Timor-Leste">Timor-Leste</option>
      <option value="Togo">Togo</option>
      <option value="Tonga">Tonga</option>
      <option value="Trinidad and Tobago">Trinidad and Tobago</option>
      <option value="Tunisia">Tunisia</option>
      <option value="Turkey">Turkey</option>
      <option value="Turkmenistan">Turkmenistan</option>
      <option value="Tuvalu">Tuvalu</option>
      <option value="Uganda">Uganda</option>
      <option value="Ukraine">Ukraine</option>
      <option value="United Arab Emirates">United Arab Emirates</option>
      <option value="United Kingdom">United Kingdom</option>
      <option value="United States">United States</option>
      <option value="Uruguay">Uruguay</option>
      <option value="Uzbekistan">Uzbekistan</option>
      <option value="Vanuatu">Vanuatu</option>
      <option value="Venezuela">Venezuela</option>
      <option value="Vietnam">Vietnam</option>
      <option value="Yemen">Yemen</option>
      <option value="Zambia">Zambia</option>
      <option value="Zimbabwe">Zimbabwe</option>
    </select>
  </div>
</div>
<br>
<div class="row">
 <div class="col-6 col-md-3">
  Gender  
   <select class="btn btn-outline-secondary dropdown-toggle" aria-labelledby="dropdownMenuButton" id="gender" name="gender"  required>
    <option value="">Select Gender</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Transgender">Transgender</option>
   </select>
                      </div>

                      <div class="col-6 col-md-3">
  <div class="input-group input-group-dynamic mb-4">
    <label for="religion" class="input-group-text">
      <i class="fas fa-praying-hands"></i> <!-- Religion Icon -->
    </label>
    <select class="form-control" id="religion" name="religion" required>
      <option value="" disabled selected>Select Religion</option>
      <option value="Hinduism">Hinduism</option>
      <option value="Islam">Islam</option>
      <option value="Christianity">Christianity</option>
      <option value="Buddhism">Buddhism</option>
      <option value="Sikhism">Sikhism</option>
      <option value="Judaism">Judaism</option>
      <option value="Jainism">Jainism</option>
      <option value="Zoroastrianism">Zoroastrianism</option>
      <option value="Atheism">Atheism</option>
      <option value="Other">Other</option>
    </select>
  </div>
</div> 

</div><br>

<div class="row"> 

  <div class="col-6 col-md-5">
  Correspondence Address         
   <div class="input-group input-group-outline mb-4">
   <input class="form-control" id="coradd" name="coradd"  type="textarea" required rows="4"></input>
    </div>
</div>
  <div class="col-6 col-md-5">
  Permanent Address             
   <div class="input-group input-group-outline mb-4">
   <input class="form-control" id="peradd" name="peradd"  type="text" required rows="4"></input>
    </div>
  </div>




</div><br><br>





     <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Education Qualification</h6>

      </div><br>
      </div>
      <div class="card">
<div class="table-responsive">
  <table class="table mb-0">
<tr>
  <th>Education Name</th>
   <th>Board / University</th>
    <th>Year</th>
     <th>Percentage</th>
       <th>Stream</th>
</tr>
<tr>
  <th>Secondary</th>
  <td>
    <input class="form-control white_bg" id="secondaryboard" name="secondaryboard" placeholder="Board / University" type="text" required>
  </td>
  <td>
    <input class="form-control white_bg" id="secondarypyear" name="secondarypyear" type="date" required>
  </td>
  <td>
    <input class="form-control white_bg" id="secondarypercentage" name="secondarypercentage" placeholder="Percentage" type="number" min="0" max="100" required>
  </td>
  <td>
    <input class="form-control white_bg" id="secondarystream" name="secondarystream" placeholder="Stream" type="text" required>
  </td>
</tr>
<tr>
  <th>Senior Secondary</th>
  <td>
    <input class="form-control white_bg" id="seniorsecondaryboard" name="seniorsecondaryboard" placeholder="Board / University" type="text" required>
  </td>
  <td>
    <input class="form-control white_bg" id="seniorsecondarypyear" name="seniorsecondarypyear" type="date" required>
  </td>
  <td>
    <input class="form-control white_bg" id="seniorsecondarypercentage" name="seniorsecondarypercentage" placeholder="Percentage" type="number" min="0" max="100" required>
  </td>
  <td>
    <input class="form-control white_bg" id="seniorsecondarystream" name="seniorsecondarystream" placeholder="Stream" type="text" required>
  </td>
</tr>
<tr>
  <th>Graduation</th>
  <td>
    <input class="form-control white_bg" id="graduation" name="graduation" placeholder="Board / University" type="text">
  </td>
  <td>
    <input class="form-control white_bg" id="graduationpyear" name="graduationpyear" type="date">
  </td>
  <td>
    <input class="form-control white_bg" id="graduationpercentage" name="graduationpercentage" placeholder="Percentage" type="number" min="0" max="100">
  </td>
  <td>
    <input class="form-control white_bg" id="graduationstream" name="graduationstream" placeholder="Stream" type="text">
  </td>
</tr>
<tr>
  <th>Post Graduation</th>
  <td>
    <input class="form-control white_bg" id="postgraduation" name="postgraduation" placeholder="Board / University" type="text">
  </td>
  <td>
    <input class="form-control white_bg" id="pgpyear" name="pgpyear" type="date">
  </td>
  <td>
    <input class="form-control white_bg" id="pgpercentage" name="pgpercentage" placeholder="Percentage" type="number" min="0" max="100">
  </td>
  <td>
    <input class="form-control white_bg" id="pgstream" name="pgstream" placeholder="Stream" type="text">
  </td>
</tr>
</table>
</div>
</div>
</hr>

<br><br>





     <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Document/Marksheet Upload</h6>

      </div><br>
      </div>




<div class="col-7 col-md-5">
 <fieldset>
 <b> 1 | ID Proof </b><br>
 <small><b>NOTE:</b>Uplode ADHARCARD,PANCARD,VOTINGCARD Etc..</small>
   <div class="ajax-file-upload-container">
    <input class="" id="tcimage" name="tcimage"  type="file" required>
    </div>
</fieldset>
                 
</div>
<br>
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <b>2 | Secondary Marksheet </b>
   <div class="ajax-file-upload-container">
    <input class="" id="hscimage" name="hscimage"  type="file" required>
    </div>
</fieldset>                 
</div><br>

<div class="col-xl-6 col-lg-12">
 <fieldset>
  <b>4 | Senior Secondary Mark Sheet           </b>      
   <div class="ajax-file-upload-container">
    <input class="" id="sscimage" name="sscimage"  type="file" required>
    </div>
</fieldset>                 
</div><br>

<div class="col-xl-6 col-lg-12">
  <fieldset>
  <b>5 | Graduation Certificate(if any)</b> 
     <div class="ajax-file-upload-container">
    <input class="" id="graimage" name="graimage"  type="file">
    </div>
</fieldset>
 </div><br>

<div class="col-xl-4 col-lg-12">
  <fieldset>
<b>6 | Post Graduation Certificate(if any)</b>                
   <div class="ajax-file-upload-container">
    <input class="" id="pgraimage" name="pgraimage"  type="file" >
    </div>
</fieldset>
</div>
<br>
<br>


<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Declaration</h6>

      </div><br>
      </div>

 <div class="row">
<div class="col-xl-12 col-lg-12">
<h5><b>I hereby state that the facts mentioned above are true to the best of my knowledge and belief.</b></h5>
 </div>
 </div>               
<div class="row"> 
<div class="col-xl-4 col-lg-12">


<div class="input-group input-group-outline mb-4">
   <input class="form-control" id="signature" name="signature" placeholder="Signature [Enter Your Full Name]"  type="text">

</div>
</div>
<div class="row" style="margin-top: 2%">
<div class="col-xl-6 col-lg-12">
<button type="submit" name="submit" class="btn bg-gradient-success">Submit</button>
</div>
</div>
 </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <?php } ?>
        <!-- Formatter end -->
      </form>  
      </div>
    </div>
  </div>

  </div>
</div>
 
       <script>
function CallPrint(strid) {
var prtContent = document.getElementById("exampl");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
}

</script>

<?php  } ?>







    <!-- End Navbar -->
     <div class="container-fluid py-4">
      <footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="" class="font-weight-bold" target="_blank">Hello Dreamy Birds</a>
                for a better Future.
              </div>
            </div>
          
          </div>
        </div>
      </footer>
    </div>
  </main>
  
  <!--   Core JS Files   -->
  <script>
document.addEventListener("DOMContentLoaded", function () {
  const currentDate = new Date().toISOString().split("T")[0];
  const secondaryYearField = document.getElementById("secondarypyear");
  const seniorSecondaryYearField = document.getElementById("seniorsecondarypyear");
  const graduationYearField = document.getElementById("graduationpyear");
  const postGraduationYearField = document.getElementById("pgpyear");

  // Restrict future dates for the secondary year
  secondaryYearField.max = currentDate;

  // Initially disable all other fields
  seniorSecondaryYearField.disabled = true;
  graduationYearField.disabled = true;
  postGraduationYearField.disabled = true;

  // Enable senior secondary calendar based on secondary year
  secondaryYearField.addEventListener("change", function () {
    const secondaryYear = new Date(secondaryYearField.value).getFullYear();
    if (!isNaN(secondaryYear)) {
      const minSeniorSecondaryDate = new Date(secondaryYear + 2, 0, 1).toISOString().split("T")[0];
      seniorSecondaryYearField.min = minSeniorSecondaryDate;
      seniorSecondaryYearField.max = currentDate;

      if (new Date(minSeniorSecondaryDate) <= new Date(currentDate)) {
        seniorSecondaryYearField.disabled = false;
      } else {
        seniorSecondaryYearField.disabled = true;
        graduationYearField.disabled = true;
        postGraduationYearField.disabled = true;
      }
    }
  });

  // Enable graduation calendar based on senior secondary year
  seniorSecondaryYearField.addEventListener("change", function () {
    const seniorSecondaryYear = new Date(seniorSecondaryYearField.value).getFullYear();
    if (!isNaN(seniorSecondaryYear)) {
      const minGraduationDate = new Date(seniorSecondaryYear + 3, 0, 1).toISOString().split("T")[0];
      graduationYearField.min = minGraduationDate;
      graduationYearField.max = currentDate;

      if (new Date(minGraduationDate) <= new Date(currentDate)) {
        graduationYearField.disabled = false;
      } else {
        graduationYearField.disabled = true;
        postGraduationYearField.disabled = true;
      }
    }
  });

  // Enable post-graduation calendar based on graduation year
  graduationYearField.addEventListener("change", function () {
    const graduationYear = new Date(graduationYearField.value).getFullYear();
    if (!isNaN(graduationYear)) {
      const minPostGraduationDate = new Date(graduationYear + 2, 0, 1).toISOString().split("T")[0];
      postGraduationYearField.min = minPostGraduationDate;
      postGraduationYearField.max = currentDate;

      if (new Date(minPostGraduationDate) <= new Date(currentDate)) {
        postGraduationYearField.disabled = false;
      } else {
        postGraduationYearField.disabled = true;
      }
    }
  });
});
</script>
   <script src="../app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>

  <script src="../app-assets/vendors/js/forms/extended/typeahead/typeahead.bundle.min.js"
  type="text/javascript"></script>
  <script src="../app-assets/vendors/js/forms/extended/typeahead/bloodhound.min.js"
  type="text/javascript"></script>
  <script src="../app-assets/vendors/js/forms/extended/typeahead/handlebars.js"
  type="text/javascript"></script>
  <script src="../app-assets/vendors/js/forms/extended/inputmask/jquery.inputmask.bundle.min.js"
  type="text/javascript"></script>
  <script src="../app-assets/vendors/js/forms/extended/formatter/formatter.min.js"
  type="text/javascript"></script>
  <script src="../app-assets/vendors/js/forms/extended/maxlength/bootstrap-maxlength.js"
  type="text/javascript"></script>
  <script src="../app-assets/vendors/js/forms/extended/card/jquery.card.js" type="text/javascript"></script>
  <script src="../app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="../app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="../app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <script src="../app-assets/js/scripts/forms/extended/form-typeahead.js" type="text/javascript"></script>
  <script src="../app-assets/js/scripts/forms/extended/form-inputmask.js" type="text/javascript"></script>
  <script src="../app-assets/js/scripts/forms/extended/form-formatter.js" type="text/javascript"></script>
  <script src="../app-assets/js/scripts/forms/extended/form-maxlength.js" type="text/javascript"></script>
  <script src="../app-assets/js/scripts/forms/extended/form-card.js" type="text/javascript"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.2"></script>
</body>

</html>