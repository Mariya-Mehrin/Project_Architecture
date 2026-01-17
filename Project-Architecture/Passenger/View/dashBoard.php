
<?php 
 include "../Model/dataBaseConnection.php";
session_start();
$email = $_SESSION["email"] ??"";
$password=$_REQUEST["password"] ?? "";

 $db = new DatabaseConnection();
    $connection = $db->openConnection();
    $result = $db->checkExistingUser($connection, "users", $email);
if(!$result || $result->num_rows ==0){
    echo "User not found";
    exit;
 }
$user = $result->fetch_assoc();

if (isset($_FILES["link"])) {
    $image = $_FILES["link"];
    $targetDir = "../ProfilePictures/";
    $targetFile = $targetDir . basename($image["name"]);

    if (move_uploaded_file($image["tmp_name"], $targetFile)) {
        $db = new DatabaseConnection();
        $connection = $db->openConnection();
        $db->addProfilePicture($connection, "users", $email, $targetFile);
    } 
}


else{
$image="";
}
?>

<html>
    <head>
        <link rel="stylesheet" href="../Public/css/DashBoard.css">
    </head>

<body >
    <form method="post" action="..\Model\dataBaseConnection.php" enctype="multipart/form-data">
    <div class="container">
     <h2 id="h2">Welcome <?php echo $user['name'];?></h2>
    <table style="border:1px solid  #d6f5f4">
        <tr>
            <td>
   
    <section>
        <nav id="nav1">
            <div style="height:10px"></div>

<br><br><br>
<a href="..\Controller\logout.php" style="color:red" style="background-color:blue" >Logout</a>
        </nav>
    </td>
    <td rowspan="2">
        <nav id="nav2">
            <h3 style="display:block;border:2px dashed gray;text-align:center;background:lightblue">Profile Info</h3>
           <?php
            $imageDefault="data:image/jpeg;base64,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
     ";

     $selectImage= isset($user["profilePicture"]) && !empty($user["profilePicture"]) ? $user["profilePicture"] : $imageDefault;
     ?>
             <img class="pic" src="<?php echo $selectImage ?> "  style="height:100px;width:100px;border-radius:5000px;display:center" > 

 <button  type="button" style="margin-left:200px;font-weight:bold;height:15px;width:50px;font-size:10px" onclick="window.location.href='changePic.php'">Change</button>

<br><br><br>
    ID: <?php echo $user['id'];?><br><br>
    NAME: <?php echo $user['name'];?><br><br>
    EMAIL: <?php echo $user['email'];?><br><br>
    PHONE NO.: <?php echo $user['phone'];?><br><br>
    ROLE: <?php echo $user['role'];?><br><br>
    <?php echo $user['filepath'];?>
     <img src="<?php echo $user['filepath'];?>" alt="Picture" width="200" height="200"><br><br>
    </nav>
    </td>
    <tr>
    <td id="td3">
        <nav  id="nav3">

<div style="height:50px"></div>
<button type="button" onclick="window.location.href='changePassword.php'" style="background:lightblue" >
    Change Password
</button>
<div style="height:10px"></div>
<button type="button" onclick="window.location.href='journeyDetails.php'" style="background:lightblue;width:125px" >
    Book Ticket
</button>
<div style="height:10px"></div>
<button type="button" onclick="window.location.href='editProfile.php'" style="background:lightblue;width:125px" >
    Edit Profile
</button>
        </nav>
    </td>
    </tr>
    </section>
    </table>
    </div>
        </form>
</body>
</html>