<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Image Gallery</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- References: https://github.com/fancyapps/fancyBox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-3.1.1.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Animations/Using_CSS_animations">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">
    75% {
    font-size: 200%;
    margin-right: 25%;
    width: 150%;
  }
  .p1 {
    animation-duration: 3s;
    animation-name: slidein;
  }

  @keyframes slidein {
    from {
      margin-right: 100%;
      width: 200%;
    }

    75% {
      font-size: 200%;
      margin-right: 25%;
      width: 150%;
    }

    to {
      margin-right: 0%;
      width: 100%;
    }
  }


    .gallery
    {
        display: inline-block;
        margin-top: 20px;
    }
    .close-icon{
    border-radius: 50%;
        position: absolute;
        right: 5px;
        top: -10px;
        padding: 5px 8px;
    }
        .form-image-upload{
            background: #60949e57 none repeat scroll 0 0;
            padding: 15px;
        }


        body{
            /*background-image: url("images/doctorimg.jpg") no-repeat center center fixed;
            background-size: cover;*/
            background: url("images/bluebg1.jpg") no-repeat center center fixed;
            background-size: 1500px 750px;
            background-repeat: no-repeat;
             overflow-x:hidden;


        }

        .fa {
            font-size: 50px;
            cursor: pointer;
            user-select: none;
        }

        .fa:hover {
          color: darkblue;
        }


        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
            position: relative;
        }

        img.avatar {
            width: 30%;
            border-radius: 50%;
            height:100px;
            width:100px;
            float:right;;
        }
        .desc {
          padding: 5px;
          text-align: right;
          color:black;
        }


        .container {
            padding: 16px;
        }


        .w3-light-blue, .w3-hover-light-blue:hover {
            color: #000!important;
            background-color:white!important;
        }
        .w3-light-grey, .w3-hover-light-grey:hover, .w3-light-gray, .w3-hover-light-gray:hover {
            color: #000!important;
            background-color: white!important;
        }


        .thumbnail {
      display: block;
      padding: 4px;
      margin-bottom: 20px;
      line-height: 1.42857143;
      background-color:   #f36fcc24;
      border: 1px solid #ecdada33;
      border-radius: 4px;
      -webkit-transition: border .2s ease-in-out;
      -o-transition: border .2s ease-in-out;
      transition: border .2s ease-in-out;
  }
    </style>
</head>

<body>


  <script>
  var app = angular.module("myShoppingList", []);
  app.controller("myCtrl", function($scope) {
      $scope.products = ["Comments"];
      $scope.addItem = function () {
          $scope.errortext = "";
          if (!$scope.addMe) {return;}
          if ($scope.products.indexOf($scope.addMe) == -1) {
              $scope.products.push($scope.addMe);
          } else {
              $scope.errortext = "Same Comment you already posted...";
          }
      }
      $scope.removeItem = function (x) {
          $scope.errortext = "";
          $scope.products.splice(x, 1);
      }
  });

  function myFunction(x) {
      x.classList.toggle("fa-thumbs-down");
  }





  $(function () {
      $(":file").change(function () {
          if (this.files && this.files[0]) {
              var reader = new FileReader();
              reader.onload = imageIsLoaded;
              reader.readAsDataURL(this.files[0]);
          }
      });
  });

  function imageIsLoaded(e) {
      $('#myImg').attr('src', e.target.result);
  };

  </script>

  <div>
    <center><h1 class="p1" style="color:#9297ded1;"><b><i>Tag Application</i></b></h1></center>
  </div>
</br>
<div class="container">
<div>
 <img src="images/user.png" alt="Avatar" class="avatar" height="42px" width="12px">
<div class="desc" > <a href="logout.html" >Logout</a></div>
</div>

     <h3>Post Your Status</h3>
    <form action="./imageUpload.php" class="form-image-upload" method="POST" enctype="multipart/form-data">

        <?php if(!empty($_SESSION['error'])){   ?>
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    <li><?php echo $_SESSION['error']; ?></li>
                </ul>
            </div>
        <?php unset($_SESSION['error']); } ?>

        <?php if(!empty($_SESSION['success'])){ ?>
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">�</button>
                <strong><?php echo $_SESSION['success']; ?></strong>
        </div>
        <?php unset($_SESSION['success']); } ?>

        <div class="row">
            <div class="col-md-5">
                <strong>Title:</strong>
                <input type="text" name="title" class="form-control" placeholder="Title">
            </div>

            <div class="col-md-5">
                <strong>Tag:</strong>
                <input type="text" name="tag" class="form-control" placeholder="Tag">
            </div>

            <div class="col-md-5">
                <strong>Text:</strong>
                <textarea rows="4" cols="50" name="comments" class="form-control" placeholder="text"></textarea>
              <!-- <input type="textarea" name="comments" class="form-control" placeholder="text"> -->
            </div>

            <div class="col-md-5">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control" >
            </div>
            <div class="col-md-2">
                <br/>
                <button type="submit" class="btn btn-info">Upload</button>
            </div>
        </div>

    </form>

    <div class="row">
    <div class='list-group gallery'>

            <?php
              require('db_config.php');

            $sql = "SELECT * FROM image_gallery";
            $images = $mysqli->query($sql);

            while($image = $images->fetch_assoc()){

            ?>
                <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                    <a class="thumbnail fancybox" rel="ligthbox" href="./uploads/<?php echo $image['image'] ?>">
                        <img class="img-responsive" alt="" src="./uploads/<?php echo $image['image'] ?>" />
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $image['title'] ?></small>&nbsp;&nbsp;&nbsp; </br>
                            <small class='text-muted'>#<?php echo $image['tag'] ?></small> &nbsp;&nbsp;&nbsp; <br/>
                             <!-- <small class='text-muted'>#<?php echo $image['comments'] ?></small> -->
                        </div> <!-- text-center / end -->
                    </a>
                    <form action="./imageDelete.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $image['id'] ?>">
                    <button type="submit" class="close-icon btn btn-primary"><i class="glyphicon glyphicon-remove">Remove</i></button>
                    </form>
                </div> <!-- col-6 / end -->
            <?php } ?>
</div>


<!--
<div>
            <div ng-app="myShoppingList" ng-cloak ng-controller="myCtrl" class="w3-card-22 w3-margin" style="max-width:450px; card-align:center">
              <header class="w3-container  w3-padding-16">

              </header>

              <ul class="w3-ul">
                <li ng-repeat="x in products" class="w3-padding-16">{{x}}<span ng-click="removeItem($index)" style="cursor:pointer;" class="w3-right w3-margin-right"> <span class="glyphicon glyphicon-trash"></span>Remove</span></li>

                    <li>   <i onclick="myFunction(this)" class="fa fa-thumbs-up"></i> &nbsp; &nbsp;  &nbsp;

                      <a href="#">
                     <span class="glyphicon glyphicon-save" style="font-size: 2.1em;"></span>  &nbsp; &nbsp;  &nbsp;
                       </a>
                       <a href="#">
                      <span class="glyphicon glyphicon-share-alt" style="font-size: 2.1em;"></span>
                    </a>
                    </li>
              </ul>

              <div class="w3-container w3-light-grey w3-padding-16">
                <div class="w3-row w3-margin-top">
                  <div class="w3-col s8">
                    <input placeholder="place your comment" ng-model="addMe" class="w3-input w3-border w3-padding">
                  </div>
                  <div class="w3-col s2">
                    <button ng-click="addItem()" class="w3-btn w3-padding w3-green">Comment</button>
                  </div>
                </div>
                <p class="w3-text-red">{{errortext}}</p>
              </div>
            </div>


</div>  -->


<form  name="search_form"  action="./index.php" method = "POST">
<input type="text" name="tagser" placeholder="Enter Tag" >
<input type="submit"  value="search by tag" >
</form>
<div> </br></br>
  <?php
  require('db_config.php');
  $myArray;
$myArray = explode(',', $_REQUEST['tagser']);

foreach ($myArray as $value) {
  if( $value) {
     echo "<br<br/>Searching Related To Post: ". $value. "<br />";
  }

  //$sql1 = "SELECT * FROM image_gallery where tag='".$_REQUEST['tagser']."'";
  $sql1 = "SELECT * FROM image_gallery where  FIND_IN_SET('".$value."',tag) > 0";

  echo "<script>console.log( 'Debug Objects: " . $sql1 . "' );</script>";
  $images1 = $mysqli->query($sql1);

  while($image1 = $images1->fetch_assoc()){
              // echo "<script>console.log( 'Debug Objects: " . $image1 . "' );</script>";
  ?>

    <div>

       <a class="thumbnail fancybox" rel="ligthbox" href="./uploads/<?php echo $image1['image'] ?>">
            <img class="img-responsive" alt="" src="./uploads/<?php echo $image1['image'] ?>" />
            <div class='text-center'>
            </b>  <small class='text-muted p1' style="color:#d0141b9e;  font-weight: bold;  font-size: 150%;"><?php echo $image1['title'] ?></small></b> </br></br>&nbsp;&nbsp;&nbsp;

               <small class='text-muted p2'  style="color:#484848;  font-weight: bold;  font-size: 100%;"><?php echo $image1['comments'] ?></small>
            </div>
        </a>
    </div> <!-- col-6 / end -->
<?php }
}

      ?>



</div>



<div>

</div>







  </div> <!-- list-group / end -->
    </div> <!-- row / end -->
</div> <!-- container / end -->

</body>


<script type="text/javascript">
    $(document).ready(function(){
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    });


    $(document).ready(function(){
    $("button").click(function(){
        $("h2").toggle();
    });
});


// function funcal(){
//
// var arr = ["HTML", "CSS", "PHP"];
// var str = JSON.stringify(arr);
// document.write(str);
// document.write ("<br/>");
//
// var newArr = JSON.parse(str);
//
// while (newArr.length > 0) {
//     document.write(newArr.pop() + "<br/>");
// }
// }
</script>
</html>
