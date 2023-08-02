<?php

if (!function_exists('is_logged_in')) {
    function is_logged_in()
    {
        $CI = get_instance();
        if (!$CI->session->userdata('username')) {
            redirect('auth');
        }
    }
}

if (!function_exists('is_not_user')) {
    function is_not_user()
    {
        $CI = get_instance();
        if (!$CI->session->userdata('username')) {
            return true;
        }

        return false;
    }
}

if (!function_exists('get_super')) {
    function get_super()
    {
        $CI = get_instance();
        return $CI->session->userdata('is_super');
    }
}

if (!function_exists('is_super')) {
    function is_super()
    {
        $is_super_ = (get_super() == '1') ? true : false;
        return $is_super_;
    }
}

if (!function_exists('is_public')) {
    function is_public()
    {
        return true;
    }
}
