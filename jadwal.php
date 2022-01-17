<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class jadwal extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get() {
        $id_jadwal = $this->get('id_jadwal');
        if ($id_jadwal == '') {
            $jadwal = $this->db->get('jadwal')->result();
        } else {
            $this->db->where('id_jadwal', $id_jadwal);
            $jadwal = $this->db->get('jadwal')->result();
        }
        $this->response($jadwal,);
    }

    function index_post() {
        $data = array(
                    'id_jadwal'     => $this->post('id_jadwal'),
                    'jadwal'        => $this->post('jadwal'),
                    'tempat_donor'  => $this->post('tempat_donor'));
        $insert = $this->db->insert('jadwal', $data);
        if ($insert) {
            $this->response($data, REST_Controller::HTTP_OK);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_put() {
        $id_jadwal = $this->put('id_jadwal');
        $data = array(
                    'id_jadwal'     => $this->put('id_jadwal'),
                    'jadwal'        => $this->put('jadwal'),
                    'tempat_donor'  => $this->put('tempat_donor'));
        $this->db->where('id_jadwal', $id_jadwal);
        $update = $this->db->update('jadwal', $data);
        if ($update) {
            $this->response($data,);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete() {
        $id_jadwal = $this->delete('id_jadwal');
        $this->db->where('id_jadwal', $id_jadwal);
        $delete = $this->db->delete('jadwal');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
?>