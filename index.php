<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Bootstrap 101 Template</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <?php
        /*
          $mm = '<p><img alt="" src="/web-ckeditor/upload/images/Sir_Bossalot.jpg" style="height:109px; width:100px" /></p>

          <p>asfsdfsadf</p>

          <p><span style="color:#ff8c00">asdfsafdsdf</span></p>
          ';
         */
        ?>

        <div class="container">
            <form action="" method="post">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                </div>
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea class="form-control ckeditor" name="content" class="ckeditor" id="editor"><?php //echo $mm;  ?></textarea>
                </div>


                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>


        <?php
        error_reporting(error_reporting() & ~E_NOTICE);
//isset($_POST['textarea']) ? $name = $_POST['textarea'] : $name = '';

        $title = $_POST['title'];
        $content = $_POST['content'];



        $con = mysqli_connect("localhost", "root", "mohara", "web-ckeditor");
        $query = "insert into post(title,content) values('$title','$content')";

        if (mysqli_query($con, $query)) {

            $con = mysqli_connect("localhost", "root", "mohara", "web-ckeditor");
            $query2 = "select * from post";
            $result2 = mysqli_query($con, $query2);
            while($row2 = mysqli_fetch_array($result2)){
                echo $row2['title']."<br>";
                echo $row2['content']."============================"."<br>";
            }
            
        } else {
            echo "error";
        }
        ?>

        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>