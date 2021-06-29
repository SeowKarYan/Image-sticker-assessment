<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Page</title>
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

        .fa-whatsapp {
            background: #25D366;
            color: white;
        }

        .fa-twitter {
            background: #55ACEE;
            color: white;
        }

        .fa-pinterest {
            background: #cb2027;
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
            <h1 style="padding-top: 30px; text-align: center;">Add the sticker into the image</h1>
            <div class="column left">
                <p id="sticker1" style="font-size:48px; text-align: center;">&#128514;</p>
                <p id="sticker2" style="font-size:48px; text-align: center;">&#128516;</p>
                <p id="sticker3" style="font-size:48px; text-align: center;">&#128525;</p>
                <p id="sticker4" style="font-size:48px; text-align: center;">&#128526;</p>
                <p id="sticker5" style="font-size:48px; text-align: center;">&#128151;</p>
            </div>
            <div class="column right">
                <div id="stickers" style="font-size:48px;">
                    <img class="imageSharing" id="uploadImage" src="images/<?php echo $_SESSION["image"]; ?>" alt="your image" />
                </div>
                <button onclick="screenshot()">Done</button>
            </div>
        </div>
        <div class="share">
            <h2>Share to your social media:</h2>
            <a class="facebook-btn" onclick="socialMediaShare()"><i class="fa fa-facebook"></i></a>
            <a class="whatsapp-btn" onclick="socialMediaShare()"><i class="fa fa-whatsapp"></i></a>
            <a class="twitter-btn" onclick="socialMediaShare()"><i class="fa fa-twitter"></i></a>
            <a class="pinterest-btn" onclick="socialMediaShare()"><i class="fa fa-pinterest"></i></a>
        </div>
        <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
        <script>
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

            const facebookBtn = document.querySelector(".facebook-btn");
            const whatsappBtn = document.querySelector(".whatsapp-btn");
            const twitterBtn = document.querySelector(".twitter-btn");
            const pinterestBtn = document.querySelector(".pinterest-btn");
        
            function socialMediaShare(){ 
                let postUrl = encodeURI("http://127.0.0.1/assessment/homepage.php");
                let postTitle = encodeURI("");
                let image = encodeURI(document.querySelector(".imageSharing").src);

                facebookBtn.setAttribute("href",`https://www.facebook.com/sharer.php?u=${postUrl}`);
                whatsappBtn.setAttribute("href",`https://api.whatsapp.com/send?text=${postTitle} ${postUrl}`);
                twitterBtn.setAttribute("href",`https://twitter.com/share?url=${postUrl}&text=${postTitle}`);
                pinterestBtn.setAttribute("href",`https://pinterest.com/pin/create/bookmarklet/?media=${image}&url=${postUrl}&description=${postTitle}`);
            }

            function screenshot(){
                html2canvas(document.getElementById('stickers')).then(function(canvas){
                    document.body.appendChild(canvas)
                })
            }

        </script>
    </body>
</html>