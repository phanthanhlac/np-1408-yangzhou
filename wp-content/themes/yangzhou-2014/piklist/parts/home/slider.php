<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12/14/14
 * Time: 7:20 PM
 */
$slider = get_field('slider-banner');

$strResult = '';
$strSlider01 = $strSlider02 = $strSlider03 = '';
foreach ($slider as $key => $slider_item) {
    $strSlider01 .= '<div class="slider-item">';
    $strSlider01 .=   '<div class="slider-item-image">';
    $strSlider01 .=     wp_get_attachment_image($slider_item['image'], 'large-banner');
    $strSlider01 .=   '</div>';
    $strSlider01 .= '</div>';

    $strSlider02 .= '<div class="slider-item">';
    $strSlider02 .=   '<div class="slider-item-text">';
    $strSlider02 .=       '<div class="intro-text">';
    $strSlider02 .=           '<p>'.$slider_item['intro'].'</p>';
    $strSlider02 .=       '</div>';
    $strSlider02 .=   '</div>';
    $strSlider02 .= '</div>';
}

if ($strSlider01) $strSlider01 = '<div class="slider01"><div class="carousel">'.$strSlider01.'</div></div>';
if ($strSlider02) $strSlider02 = '<div class="slider02"><div class="carousel">'.$strSlider02.'</div></div>';
if ($strSlider01) $strResult = '<div class="home-slider">'. $strSlider01 .$strSlider02 .'</div>';
echo $strResult;