<?php
/**
 * take out the stick-top category
 */
function xigua_get_the_category()
{
    $categories = get_the_category();
    if (!defined('STICK_TOP_CAT_ID'))
    {
        return $categories;
    }
    foreach ($categories as $key => $cat)
    {
        if ($cat->term_id == STICK_TOP_CAT_ID)
        {
            unset($categories[$key]);
            break;
        }
    }
    return $categories;
}

function xigua_get_the_excerpt($length = NULL)
{
    $excerpt = get_the_excerpt();
    $moreLink = '...<a href="'.get_permalink().'">[Read More ->]</a>';
   
    if (mb_strlen($excerpt) <= $length)
    {
        return $excerpt;
    }
    elseif (ctype_digit(strval($length)) && $length > 0)
    {
         return  mb_substr($excerpt, 0, $length).$moreLink;
    }
    return $excerpt.$moreLink;
}