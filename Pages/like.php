<?php
session_start();
$flager=0;
include 'connection.php';
$q_id=$_GET['q_id'];
echo $q_id;
echo '<input type="hidden" id="ider" value='.$q_id.'>';
$id=$_GET['c_id'];
$sql="SELECT * FROM `comments` WHERE q_id='$q_id' AND c_id='$id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
echo "The like is".$row["c_likes"];
// $id=$_POST['likebtn'];
// $q_id=$_POST['likeq'];
$email=$_SESSION['email'];
$checkLikeSql="SELECT * FROM `likes` WHERE user_email='$email' AND c_id='$id'";
$checkLikeResult=mysqli_query($conn,$checkLikeSql);
// echo $id;
// print_r($checkLikeResult);
// print_r(mysqli_fetch_assoc($checkLikeResult));
if(mysqli_num_rows($checkLikeResult)==1){
    $deleteLikeSql="DELETE FROM `likes` WHERE `user_email`='$email' AND `c_id`='$id' ";
    $deletekeResult=mysqli_query($conn,$deleteLikeSql);
    echo $row["c_likes"];
    $newLikes=$row["c_likes"]-1;
    echo $newLikes;
    $sql1="UPDATE `comments` SET `c_likes` ='$newLikes'
    WHERE `comments`.`c_id` = '$id'";
      $result1=mysqli_query($conn,$sql1);
  //    $row['c_likes']=$row['c_likes']-1;

}
else{


  $insertLikeSql="INSERT INTO `likes`(`user_email`, `c_id`) VALUES ('$email','$id')";
  $insertLikeResult=mysqli_query($conn,$insertLikeSql);
  echo $row["c_likes"];  
  $newLikes=$row["c_likes"]+1;
    echo $newLikes;
    $sql1="UPDATE `comments` SET `c_likes` ='$newLikes'
    WHERE `comments`.`c_id` = '$id'";
      $result1=mysqli_query($conn,$sql1);
  //    $row['c_likes']=$row['c_likes']+1;
}
// $url="view_post.php?q_id=".$q_id;
// header('Location : home.php');
$flager=1;
?>
<script>
  function goto()
  {
    let id=document.getElementById("ider");
    let val="../Pages/view_post.php?q_id="
    page=val.concat(id.value);
    window.location.assign(page);
  }
  <?php
  if($flager==1)
  {
    echo 'goto()';
  }
  ?>
</script>