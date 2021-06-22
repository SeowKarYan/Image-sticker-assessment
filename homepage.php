<!DOCTYPE html>
<html>
    <head>
        <title>Homepage</title>
        <style>

        * {
            box-sizing: border-box;
        }

        .column{
            margin-top: 5%;
            margin-left:3%;
            border: 1px solid grey;
            padding-top: 5%;
            padding-bottom: 5%;
            float: left;
        }

        .left {
            width: 30%;
        }

        .right {
            width: 50%;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        ul {
            list-style-type: none;
            padding-top: 10px;
            padding-right: 20px;  
        }

        li {
            float: right;
            padding: 8px;
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
            max-width:70%;
        }
    </style>
    </head>

    <body>

        <script>
            var loadFile = function(event) {
            var uploadImage = document.getElementById('uploadImage');
            uploadImage.src = URL.createObjectURL(event.target.files[0]);
            uploadImage.onload = function() {
            URL.revokeObjectURL(uploadImage.src)
            }
        };
        </script>

        <div>
            <ul>
                <li><a href="index.html">Logout</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="column left">

            </div>
            <div class="column right">
                <img id="uploadImage" src="https://i.stack.imgur.com/y9DpT.jpg" alt="your image" />
                
                <form>
                    <label for="img" class="custom-file-upload" >Upload an image</label>
                    <input type="file" id="img" name="img" accept="image/*" onchange="loadFile(event);">
                </form>
            </div>
        </div>
    </body>
</html>