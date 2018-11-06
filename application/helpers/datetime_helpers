<?php
defined('BASEPATH') or exit('No direct script access allowed');

function convert_timestamp($data)
{
    return strtotime(str_replace('/', '-', $data));
}

function convert_datetime_db($data)
{
    return date("Y-m-d H:i", strtotime(str_replace('/', '-', $data)));
}

function convert_datetime_view($datetime)
{
    return date("d/m/Y H:i", strtotime($datetime));
}

function custom_date_diff($date_start, $data_end)
{
	if(!$date_start) {
		$date_start = date('Y-m-d H:i:s');
	}
	return strtotime($data_end) - strtotime($date_start);
}
