<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Sobad_project extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Curl');
    }

    public function get_id($id = 0, $args = [])
    {
        $url = 'http://192.168.20.200/system-beta/include/curl.php';
        $data = array(
            'object' => 'sobad_project',
            'func' => 'get_id',
            'data' => array($id, $args)
        );
        $data = $this->Curl->curls($url, $data);
        $mydata = json_decode($data, true);
        return $mydata['msg'];
    }

    public function get_all($args = [], $where = '')
    {
        $url = 'http://192.168.20.200/system-beta/include/curl.php';
        $data = array(
            'object' => 'sobad_project',
            'func' => 'get_all',
            'data' => array($args, $where)
        );
        $data = $this->Curl->curls($url, $data);
        $mydata = json_decode($data, true);
        return $mydata['msg'];
    }
}
