<!DOCTYPE html>
<html>
    <head>
        <title>Upload Page</title>
        <style>

        body{
            background-color:#E3F2FD;
        } 

        .container {
            margin: auto;
            margin-top: 5%;
            width: 60%;
            padding: 5% 10% 5% 10%;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            background-color:white;
        }

        ul {
            list-style-type: none;
            padding-top: 10px;
            padding-right: 20px;  
        }

        li {
            float: right;
            padding: 10px;
        }

        a {
            text-decoration: none;
        }

        input[type="file"] {
            display: none;
        }

        .custom-file-upload {
            border: 1px solid grey;
            padding: 6px 12px;
            cursor: pointer;
            margin-left: 40%;
        }

        #uploadImage{
            padding-bottom: 3%;
            display: block;
            margin-left: auto;
            margin-right: auto;
            max-width:80%;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            font-family: "Times New Roman", Times, serif;
            font-size: 16px;
        }

        button:hover {
            background-color: #1B5E20;
        }

    </style>
    </head>

    <body>
        <div>
            <ul>
                <li><a href="index.html">Logout</a></li>
            </ul>
        </div>
        <div class="container">
            <h1 style="text-align: center;">Upload an image for designing</h1>
            <img class="imageSharing" id="uploadImage" src="imagePlaceholder.jpg" alt="your image" />
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <label for="img" class="custom-file-upload" >Upload an image</label>
                <input type="file" id="img" name="img" accept="image/*" onchange="loadFile(event);"><br><br><br>
                <button type="submit" name="submit">Next</button>
            </form>
        </div>

        <script>
            var loadFile = function(event) {
                var uploadImage = document.getElementById('uploadImage');
                uploadImage.src = URL.createObjectURL(event.target.files[0]);
                uploadImage.onload = function() {
                URL.revokeObjectURL(uploadImage.src)
                }
            };
        </script>
    </body>
</html>