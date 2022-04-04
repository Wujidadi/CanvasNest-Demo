<?php

require_once 'colors.php';

/**
 * 轉換 GET 參數供前端 canvas 取用
 *
 * @return array
 */
function canvasParameters()
{
    $color = '255,255,255';
    $opacity = 0.75;
    $count = 200;
    $maxCount = 1000;

    if (isset($_GET['color']))
    {
        $inputColor = strtolower($_GET['color']);
        $validRgbCounter = 0;
        if (in_array($inputColor, COLOR_NAMES))
        {
            $color = COLORS_BY_NAME[$inputColor]['RGB'];
        }
        else if (in_array($inputColor, COLOR_HEXS))
        {
            $color = COLORS_BY_HEX[$inputColor]['RGB'];
        }
        else if (preg_match('/^(\d{1,3}),(\d{1,3}),(\d{1,3})$/', $inputColor, $matches))
        {
            for ($i = 1; $i <= 3; $i++)
            {
                if ($matches[$i] >= 0 && $matches[$i] <= 255)
                {
                    $validRgbCounter++;
                }
            }
            if ($validRgbCounter >= 3)
            {
                $color = $inputColor;
            }
        }
    }

    if (isset($_GET['opacity']) && is_numeric($_GET['opacity']))
    {
        $inputOpacity = (double) $_GET['opacity'];
        if ($inputOpacity >= 0 && $inputOpacity <= 1)
        {
            $opacity = $inputOpacity;
        }
    }

    if (isset($_GET['count']) && is_numeric($_GET['count']))
    {
        $inputCount = (int) $_GET['count'];
        if ($inputCount > 0)
        {
            if ($inputCount > $maxCount)
            {
                $count = $maxCount;
            }
            else
            {
                $count = $inputCount;
            }
        }
    }

    return compact('color', 'opacity', 'count');
}
