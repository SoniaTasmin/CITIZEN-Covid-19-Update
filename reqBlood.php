<?php
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
  {
$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$needed=$_POST['needed'];
$noBags=$_POST['noBags'];
$blodgroup=$_POST['bloodgroup'];
$address=$_POST['address'];
$note=$_POST['note'];

$sql="INSERT INTO  reqblood (name, bloodgroup, noBags, needed,  phone,email,address,note) VALUES(:name,:bloodgroup, :noBags, :needed,:phone,:email,:address,:note)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':bloodgroup',$blodgroup,PDO::PARAM_STR);
$query->bindParam(':noBags',$noBags,PDO::PARAM_STR);
$query->bindParam(':needed',$needed,PDO::PARAM_STR);
$query->bindParam(':phone',$phone,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':note',$note,PDO::PARAM_STR);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Your info submitted successfully";
}
else
{
$error="Something went wrong. Please try again";
}

}
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>req blood</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/modern-business.css" rel="stylesheet">
    <style>
    .navbar-toggler {
        z-index: 1;
    }

    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    </style>
        <style>
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>


</head>

<body>

<?php include('includes/header.php');?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">request <small>blood</small></h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
               <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active">request blood</li>
        </ol>
            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
        <!-- Content Row -->
        <form name="donar" method="post">
<div class="row">
<div class="col-lg-4 mb-4">
<div class="font-italic">Full Name<span style="color:red">*</span></div>
<div><input type="text" name="name" class="form-control" required></div>
</div>
<div class="col-lg-4 mb-4">
<div class="font-italic">Blood Group<span style="color:red">*</span> </div>
<div><select name="bloodgroup" class="form-control" required>
<?php $sql = "SELECT * from  tblbloodgroup ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>
<option value="<?php echo htmlentities($result->BloodGroup);?>"><?php echo htmlentities($result->BloodGroup);?></option>
<?php }} ?>
</select>
</div>
</div>
</div>
<div class="col-lg-4 mb-4">
<div class="font-italic">no of bags<span style="color:red">*</span></div>
<div><input type="number" name="noBags" class="form-control" required></div>
</div>
<div class="col-lg-4 mb-4">
<div class="font-italic">Date and time<span style="color:red">*</span></div>
<div><input type="datetime" name="needed" class="form-control" required></div>
</div>
<div class="col-lg-4 mb-4">
<div class="font-italic">phone Number<span style="color:red">*</span></div>
<div><input type="number" name="phone" class="form-control" required></div>
</div>
<div class="col-lg-4 mb-4">
<div class="font-italic">Email</div>
<div><input type="email" name="email" class="form-control"></div>
</div>

<div class="col-lg-4 mb-4">
<div class="font-italic">Address<span style="color:red">*</span></div>
<div><textarea class="form-control" name="address" required></textarea></div>
</div>

<div class="col-lg-8 mb-4">
<div class="font-italic">note(e.g Emergency)</div>
<div><textarea class="form-control" name="note" > </textarea></div>
</div>


<div class="row">
<div class="col-lg-4 mb-4">
<div><input type="submit" name="submit" class="btn btn-primary" value="submit" style="cursor:pointer"></div>
</div>



</div>



        <!-- /.row -->
</form>
        <!-- /.row -->
</div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
