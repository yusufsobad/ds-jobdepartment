<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Blueprint extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Curl');
    }

    public function count($divisi = 0, $status = 0)
    {
        $url = 'http://192.168.20.200/system-beta/include/curl.php';
        $data = array(
            'object'     => 'sobad_project',
            'func'     => '_count_project_department',
            'data'    => array($divisi, $status)
        );
        $data = $this->Curl->curls($url, $data);
        $mydata = json_decode($data, true);
        return $mydata['msg'];
    }

    public function get_project_dpartement($divisi = 0, $column = [])
    {
        $url = 'http://192.168.20.200/system-beta/include/curl.php';
        $data = array(
            'object'   => 'sobad_project',
            'func'     => '_get_projects_department',
            'data'     => array($divisi, $column)
        );
        $data = $this->Curl->curls($url, $data);
        $mydata = json_decode($data, true);
        return $mydata['msg'];
    }

    public function count_project_status($divisi = 0, $status = 0, $column = [])
    {
        $url = 'http://192.168.20.200/system-beta/include/curl.php';
        $data = array(
            'object'   => 'sobad_project',
            'func'     => '_count_project_department',
            'data'     => array($divisi, $status, $column)
        );
        $data = $this->Curl->curls($url, $data);
        $mydata = json_decode($data, true);
        return $mydata['msg'];
    }

    public function url_image($id)
    {

        $url = 'http://192.168.20.200/system-beta/include/curl.php';
        $data = array(
            'object'     => 'jobdesk_dashboard',
            'func'     => '_getProject',
            'data'    => array($id)
        );
        $data = $this->Curl->curls($url, $data);
        $mydata = json_decode($data, true);
        return $mydata['msg'];
    }
}
