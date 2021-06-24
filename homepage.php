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
                <img id="uploadImage" src="imagePlaceholder.jpg" alt="your image" />
                <div id="stickers" style="font-size:48px; text-align: center;"></div>
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

            document.getElementById("sticker1").addEventListener("click", addSticker1);
            function addSticker1(){
                const sticker = document.createElement("p");
                const node = document.createTextNode(String.fromCodePoint(0x1F602));
                sticker.appendChild(node);
                document.getElementById("stickers").appendChild(sticker);
            }

            document.getElementById("sticker2").addEventListener("click", addSticker2);
            function addSticker2(){
                const sticker = document.createElement("p");
                const node = document.createTextNode(String.fromCodePoint(0x1F604));
                sticker.appendChild(node);
                document.getElementById("stickers").appendChild(sticker);
            }

            document.getElementById("sticker3").addEventListener("click", addSticker3);
            function addSticker3(){
                const sticker = document.createElement("p");
                const node = document.createTextNode(String.fromCodePoint(0x1F60D));
                sticker.appendChild(node);
                document.getElementById("stickers").appendChild(sticker);
            }

            document.getElementById("sticker4").addEventListener("click", addSticker4);
            function addSticker4(){
                const sticker = document.createElement("p");
                const node = document.createTextNode(String.fromCodePoint(0x1F60E));
                sticker.appendChild(node);
                document.getElementById("stickers").appendChild(sticker);
            }

            document.getElementById("sticker5").addEventListener("click", addSticker5);
            function addSticker5(){
                const sticker = document.createElement("p");
                const node = document.createTextNode(String.fromCodePoint(0x1F497));
                sticker.appendChild(node);
                document.getElementById("stickers").appendChild(sticker);
            }
        </script>
    </body>
</html>