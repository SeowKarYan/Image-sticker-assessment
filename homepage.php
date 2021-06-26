<!DOCTYPE html>
<html>
    <head>
        <title>Homepage</title>
        <style>

        * {
            box-sizing: border-box;
        }

        body{
            position: relative;
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
            width: 20%;
        }

        .right {
            width: 60%;
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
            max-width:80%;
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