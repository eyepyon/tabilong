{* Extend our master template *}
{extends file="master.tpl"}

{* This block is defined in the master.tpl template *}
{block name=title}VR{/block}

{block name=javascript}
{*<script src="/dist/aframe.min.js?dummyx={date("U")}"></script>*}
{*<script src="/dist/aframe-v1.0.4.min.js?dummyx={date("U")}"></script>*}
<script src="/dist/aframe-v1.4.2.min.js?dummyx={date("U")}"></script>
{*<script src="/dist/aframe-master.js?dummyx={date("U")}"></script>*}
{/block}

{block name=header}
{* include file="navi_header.tpl" *}
    <style>
        #overlay {
            position: absolute;
            z-index: 1;
            top: 0;
            left: 0;
            width: 100%;
            height:100%;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 1;
            background-color: #000000;
            color: #ffffff;
        }
        #overlay > div {
            text-align: center;
        }
        #overlay > div > button {
            height: 20px;
            width: 100px;
            background: transparent;
            color: #ffffff;
            outline: 1px solid #ffffff;
            border: 0px;
            cursor: pointer;
        }
        #overlay > div > p {
            color: #777777;
            font-size: 12px;
        }
    </style>
{/block}


{block name=body}
    <a-scene>
{*        <a-sky src="/file/R0010035.JPG" rotation="0 -90 0"></a-sky>
        <a-sky src="/file/R0010028.MP4" rotation="0 -90 0"></a-sky>*}
        <assets>
            {* <a-assets>*}
            {* <video id="video" src="{$url}" preload="auto" loop="true" webkit-playsinline playsinline></video>*}
            {* <video id="video" autoplay loop="true" src="{$url}">*}
            <video id="video" loop crossorigin="anonymous" webkit-playsinline src="{$url}">
            </video>
            {* </a-assets>*}
        </assets>
{*        <a-videosphere id="videosphere" src="#video"></a-videosphere>*}
        <a-videosphere src="#video" rotation="0 -90 0"></a-videosphere>
    </a-scene>

    <div id="overlay">
        <div>
            <button id="startButton">Click to Play</button>
            <p>Automatic video playback with audio requires a user interaction.</p>
        </div>
    </div>

    <script>
        var overlay = document.getElementById('overlay');
        var startButton = document.getElementById( 'startButton' );

        var video = document.getElementById('video');
        startButton.addEventListener( 'click', function () {
            video.play();
            overlay.style = 'display:none';
        }, false );


        // var scene = document.querySelector("a-scene");
        // var video = document.getElementById("video");
        //
        // if (scene.hasLoaded) {
        //     run();
        // } else {
        //     scene.addEventListener("loaded", playvideo);
        // }
        //
        // function playvideo() {
        //     scene.querySelector(".a-enter-vr-button").addEventListener("click", function (e) {
        //         video.play();
        //     }, false);
        // }
    </script>
{/block}



{block name=footer}{/block}
