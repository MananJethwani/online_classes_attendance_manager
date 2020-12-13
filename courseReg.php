<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form method="post" action="courseRegScript.php" enctype="multipart/form-data">
            <div class="form-group row">
              <h1 class="font-weight-normal">Please Enter Course Details</h1>
            </div>
            <div class="form-group row">
              <label for="Email" class="sr-only">Course Name</label>
              <input name="courseName" type="text" id="courseName" class="form-control" placeholder="Course Name" required autofocus>
            </div>
            <div class="form-group row">
                <label for="formFile" class="form-label">Student List</label>
                <input class="form-control" type="file" name="fromFile" id="formFile">
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Reg"> Create Course</button>
        </form>
    </div>
</body>
</html>