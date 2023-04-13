<?php

include('config.php');

    if($_SERVER['REQUEST_METHOD']=='POST'){

        if(isset($_POST['title'])){
    
          $title=$_POST['title'];
          $article=$_POST['article'];
          $avatar_path='image/' .$_FILES["fileToUpload"]["name"];
    
          //$user=mysqli_real_escape_string($conn,$user);
          $title=mysqli_real_escape_string($conn,$title);
          //$idea=mysqli_real_escape_string($conn,$idea);
          $avatar_path=mysqli_real_escape_string($conn,$avatar_path);
    
          if(preg_match("!image!", $_FILES['fileToUpload']['type'])){
    
            if(copy($_FILES['fileToUpload']['tmp_name'],$avatar_path)){
    
              //$_SESSION['user']=$user;
              $_SESSION['title']=$title;
              //$_SESSION['idea']=$idea;
              $_SESSION['avatar']=$avatar_path;
    
              $sql="INSERT INTO articles(title,article,image)VALUES
              ('$title','$article','$avatar_path')";
    
              if(mysqli_query($conn,$sql)){
                $_SESSION['message']="Article Successfully Submitted";
                header("location:account.php");
              }
              else{
                $_SESSION['message']="Article could not be added!";
                header("location:account.php");

              }
            } else{
                $_SESSION['message']="Article Upload Failed!";
                header("location:account.php");

            }
    
          }
          else{
            $_SESSION['message']="Please upload only JPG, PNG or GIF image!";
            header("location:account.php");

          }
    
        }
      }

    ?>
