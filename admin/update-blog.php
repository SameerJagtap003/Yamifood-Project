<?php include('login-check.php'); ?>
<?php 

    include('../constant/coneection.php');
    $_SESSION['blog_id'] = $_GET['blog_id'];
    $blog_id = $_SESSION['blog_id'];

    $result = pg_query($pgcon,"SELECT * FROM tbl_blog WHERE blog_id = $blog_id");
    while ($rows = pg_fetch_assoc($result)) {
        
        $blog_id = $rows['blog_id'];
        $blog_title = $rows['blog_title'];
        $content = $rows['content'];

    }


?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="admin-css/img-upload.css">

    <title>Add Blog</title>
</head>
<style>
    body{
        padding: 1%;
    }
        
    .profile-pic-div{
        height: 200px;
        width: 200px;
        position: absolute;
        top: 35%;
        left: 65%;
        transform: translate(-50%,-50%);
        border-radius: 50%;
        overflow: hidden;
        border: 1px solid grey;
    }
</style>
<body>

    <div class="container mt-4">
        <h3>Please Update Here:</h3>
        <hr>
        <form action="blog-update-process.php" method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Blog Title</label>
                    <input type="text" class="form-control" name="blog_title" id="inputEmail4" value="<?php echo $blog_title ?>" required>
                </div>
                <label for="inputEmail4">Select Image</label><br>

                <div class="profile-pic-div">
                    <img src="../images/default-blog.jpg" id="photo">
                    <input type="file" id="file" name="img" required>
                    <label for="file" id="uploadBtn">Choose Photo</label>
                </div>
            </div>
            
            <div class="form-group" style="width: 50%;">
                <label for="exampleFormControlTextarea1">Content</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="15" name="content" placeholder="Write Your Blog" required></textarea>
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <!-- img upload js -->
    <script src="admin-js/app.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

