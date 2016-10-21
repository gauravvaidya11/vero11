<?php
function format_address($fields)
{
    if(empty($fields))
    {
        return ;
    }

    $html = '<table>';

    foreach ($fields as $key => $value) {
    	$html.='<tr>';	
    	$html.='<td>';	
    	$html.= $key;
    	$html.=':</td>';
    	$html.='<td>';
    	$html.= $value;	
    	$html.='</td>';
    	$html.='<tr>';	
    }

    $html .= '</table>';
    return $html;
}
function format_currency($value, $symbol=true)
{
    $fmt = numfmt_create( config_item('locale'), NumberFormatter::CURRENCY );
    return numfmt_format_currency($fmt, round($value,2), config_item('currency_iso'));
}