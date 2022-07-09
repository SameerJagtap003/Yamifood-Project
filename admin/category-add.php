<?php include('login-check.php'); ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Add Category</title>
</head>
    <style>
        body{
            padding: 1%;
        }
    </style>
<body>

    <div class="container mt-4">
        <h3>Please Add Here:</h3>
        <hr>
        <form action="category-add-process.php" method="get">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Category Name</label>
                    <input type="text" class="form-control" name="category_name" id="inputEmail4" placeholder="Category Name" required>
                </div>
            </div>

                <label for="inputEmail4">Active</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="Active" value="Active" checked>
                    <label class="form-check-label" for="Active">Active</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="NotActive" value="Not Active">
                    <label class="form-check-label" for="NotActive">NotActive</label>
                </div>

            <br><br>
            
            <button type="submit" name="submit" class="btn btn-primary">Add</button>
        </form>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

