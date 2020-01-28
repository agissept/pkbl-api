<!DOCTYPE html>
<html>
<head>
    <title>Upload File</title> 
</head>

<body>
    <form action="postfile.php" method="post" enctype="multipart/form-data">
        Pilih file: <input type="file" name="file" />
        <input type="text" name="id" value="1" />
        <input type="submit" name="upload" value="upload" />
    </form> 
</body> 
</html>