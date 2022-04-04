<?php

require_once './lib/php/helpers.php';

extract(canvasParameters());

$webPage = <<<HTML
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>自動吸附動態線條</title>
    <meta name="guide" content="在URL設置color（顏色）、opacity（透明度）、count（數量）3個GET參數">
    <meta name="guide" content="color（顏色）：可以是red、yellow等網頁可識別的英文顏色名稱（不區分大小寫），或16進位色碼（如#FFD700），或以逗點分隔的10進位RGB色碼（255,215,0）；預設值為255,255,255（白色）">
    <meta name="guide" content="opacity（透明度）：須大於等於0且小於等於1；預設值為0.75">
    <meta name="guide" content="count（數量）：須大於0且小於等於1000；預設值為200，超過1000時自動代入1000（不建議設置太高，會影響頁面效能）">
    <meta name="guide" content="可在瀏覽器console檢視當前實際套用的設定值">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main></main>
    <script src="lib/js/canvas-nest.js"
            color="{$color}"
            pointColor="{$color}"
            opacity="{$opacity}"
            count="{$count}"
            zIndex="-1"
    ></script>
    <script>
        console.log('{$color}');
        console.log({$opacity});
        console.log({$count});
    </script>
</body>
</html>
HTML;

echo $webPage;
