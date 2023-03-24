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

    public function get_team($id)
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

    public function get_meta($type = '', $args = [], $limit = '')
    {
        $url = 'http://192.168.20.200/system-beta/include/curl.php';
        $data = array(
            'object'     => 'sobad_meta',
            'func'     => '_gets',
            'data'    => array($type, $args, $limit)
        );
        $data = $this->Curl->curls($url, $data);
        $mydata = json_decode($data, true);
        return $mydata['msg'];
    }

    public function get_projects_team($id = 0, $args = [])
    {
        $url = 'http://192.168.20.200/system-beta/include/curl.php';
        $data = array(
            'object'     => 'sobad_project_detail',
            'func'     => 'get_projects_team',
            'data'    => array($id, $args)
        );
        $data = $this->Curl->curls($url, $data);
        $mydata = json_decode($data, true);
        return $mydata['msg'];
    }

    public function get_url_image($id = 0)
    {
        $url = 'http://s.soloabadi.com/system-absen/include/curl.php';
        $data = array(
            'object' => 'sobad_user',
            'func' => 'get_id',
            'data' => array($id, array('picture', '_nickname'))
        );
        $data = $this->Curl->curls($url, $data);
        $mydata = json_decode($data, true);
        return $mydata['msg'];
    }

    public function get_project_detail($id, $args = [])
    {
        $url = 'http://192.168.20.200/system-beta/include/curl.php';
        $data = array(
            'object' => 'sobad_project_detail',
            'func' => 'get_id',
            'data' => array($id, $args)
        );
        $data = $this->Curl->curls($url, $data);
        $mydata = json_decode($data, true);
        return $mydata['msg'];
    }

    public function get_jbd_module($args = [], $where = '')
    {
        $url = 'http://192.168.20.200/system-beta/include/curl.php';
        $data = array(
            'object' => 'sobad_module',
            'func' => 'get_all',
            'data' => array($args, $where)
        );
        $data = $this->Curl->curls($url, $data);
        $mydata = json_decode($data, true);
        return $mydata['msg'];
    }

    public function get_team_work($user = 0)
    {
        $date = date('Y-m-d');
        $url = 'http://s.soloabadi.com/system-absen/include/curl.php';
        $data = array(
            'object' => 'sobad_user',
            'func' => 'check_user_work',
            'data' => array($user, $date)
        );
        $data = $this->Curl->curls($url, $data);
        $mydata = json_decode($data, true);
        return $mydata['msg'];
    }

    public function get_post($id = 0)
    {
        $url = 'http://s.soloabadi.com/system-beta/include/curl.php';
        $data = array(
            'object' => 'group_post',
            'func' => 'get_id',
            'data' => array($id)
        );
        $data = $this->Curl->curls($url, $data);
        $mydata = json_decode($data, true);
        return $mydata['msg'];
    }
}
