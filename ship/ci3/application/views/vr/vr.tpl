{* Extend our master template *}
{extends file="master.tpl"}

{* This block is defined in the master.tpl template *}
{block name=title}VR{/block}

{block name=javascript}
{*    <script src="/dist/aframe-master.js"></script>*}
<script src="/dist/aframe-v1.4.2.min.js?dummyx={date("U")}"></script>
{/block}

{block name=header}
<meta name="apple-mobile-web-app-capable"content="yes"/>
{* include file="navi_header.tpl" *}
{/block}


{block name=body}
    <a-scene>
{*        <a-sky src="/file/R0010035.JPG" rotation="0 -90 0"></a-sky>
        <a-sky src="/file/R0010028_er.MP4" rotation="0 -90 0"></a-sky>
        <a-sky src="/file/R0010028.MP4" rotation="0 -90 0"></a-sky>

        *}

        <a-assets>
            <video crossorigin="anonymous" id="v" webkit-playsinline="true" playsinline="true" autoplay="true" loop="true" src="{$url}" type="application/x-mpegurl"></video>
        </a-assets>

        <a-videosphere id="videosphere" ios10hls rotation="180 -90 0" src="#v" visible="true" autoplay="true" loop="true"></a-videosphere>

        {*<a-camera mouse-cursor wasd-controls-enabled="false">*}
        {*</a-camera>*}

        {*<a-assets>*}
            {*<video id="video" autoplay="" loop="true" src="{$url}">*}
            {*</video></a-assets>*}
        {*<a-videosphere src="#video"></a-videosphere>*}
    </a-scene>
{/block}



{block name=footer}{/block}
