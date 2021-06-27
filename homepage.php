<!DOCTYPE html>
<html>
    <head>
        <title>Homepage</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>

        * {
            box-sizing: border-box;
        }

        body{
            position: relative;
            background-color:#E3F2FD;
        }

        .column{
            margin-top: 3%;
            margin-left:3%;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            padding-top: 5%;
            padding-bottom: 5%;
            float: left;
            background-color:white;
        }

        .left {
            width: 15%;
        }

        .right {
            width: 70%;
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

        .share{
            padding: 5% 5% 5% 5%;
        }

        .fa {
            padding-top: 10px;
            padding-bottom: 7px;
            font-size: 40px;
            width: 60px;
            text-align: center;
            text-decoration: none;
            margin-left: 5%;
            border-radius: 50%;
        }

        .fa:hover {
            opacity: 0.7;
        }

        .fa-facebook {
            background: #3B5998;
            color: white;
        }

        .fa-twitter {
            background: #55ACEE;
            color: white;
        }

        .fa-linkedin {
            background: #007bb5;
            color: white;
        }

        .fa-pinterest {
            background: #cb2027;
            color: white;
        }

        .fa-whatsapp {
            background: #25D366;
            color: white;
        }

    </style>
    </head>

    <body>
        <div>
            <ul>
                <li><a href="index.html">Logout</a></li>
            </ul>
        </div>
        <div class="row">
            <h1 style="padding-top: 30px; text-align: center;">Upload an image and add the sticker to design your image</h1>
            <div class="column left">
                <p id="sticker1" style="font-size:48px; text-align: center;">&#128514;</p>
                <p id="sticker2" style="font-size:48px; text-align: center;">&#128516;</p>
                <p id="sticker3" style="font-size:48px; text-align: center;">&#128525;</p>
                <p id="sticker4" style="font-size:48px; text-align: center;">&#128526;</p>
                <p id="sticker5" style="font-size:48px; text-align: center;">&#128151;</p>
            </div>
            <div class="column right">
                <div id="stickers" style="font-size:48px;"></div>
                <img id="uploadImage" src="imagePlaceholder.jpg" alt="your image" />
                <form>
                    <label for="img" class="custom-file-upload" >Upload an image</label>
                    <input type="file" id="img" name="img" accept="image/*" onchange="loadFile(event);">
                </form>
            </div>
        </div>
        <div class="share">
            <h2>Share image to your social media:</h2>
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-linkedin"></a>
            <a href="#" class="fa fa-pinterest"></a>
            <a href="#" class="fa fa-whatsapp"></a>
        </div>

        <script>
            var loadFile = function(event) {
                var uploadImage = document.getElementById('uploadImage');
                uploadImage.src = URL.createObjectURL(event.target.files[0]);
                uploadImage.onload = function() {
                URL.revokeObjectURL(uploadImage.src)
                }
            };

            var stickerId = 1;

            function addSticker(stickercode) {
                var sticker = document.createElement("p");
                sticker.setAttribute("id",stickerId);
                sticker.onmousedown = function() {
                    var dragValue = sticker;

                        document.onmousemove = function(e){
                            var x = e.pageX;
                            var y = e.pageY;

                            dragValue.style.left = x + "px";
                            dragValue.style.top = y + "px";
                        }

                        document.onmouseup = function(e){
                            document.onmousemove = null;
                            dragValue = null;
                        }
                }

                sticker.style.position = "absolute";
                const node = document.createTextNode(String.fromCodePoint(stickercode));
                sticker.appendChild(node);
                document.getElementById("stickers").appendChild(sticker);
                stickerId ++;
            }

            document.getElementById("sticker1").addEventListener("click", function(){
                addSticker(0x1F602);
            });

            document.getElementById("sticker2").addEventListener("click", function(){
                addSticker(0x1F604);
            });

            document.getElementById("sticker3").addEventListener("click", function(){
                addSticker(0x1F60D);
            });

            document.getElementById("sticker4").addEventListener("click", function(){
                addSticker(0x1F60E);
            });

            document.getElementById("sticker5").addEventListener("click", function(){
                addSticker(0x1F497);
            });

        </script>
    </body>
</html>