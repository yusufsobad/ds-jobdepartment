<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Curl extends CI_Model
{
    public function curls($url = '', $data = array())
    {
        if (empty($url)) {
            return '';
        }

        $check = array_filter($data);
        if (empty($check)) {
            return '';
        }

        $ch = curl_init($url);
        # Setup request to send json via POST.
        $payload = json_encode($data);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.52 Safari/537.17');
        # Return response instead of printing.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        # Send request.
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}
