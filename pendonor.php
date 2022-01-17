<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class pendonor extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get() {
        $id_pendonor = $this->get('id_pendonor');
        if ($id_pendonor == '') {
            $pendonor = $this->db->get('pendonor')->result();
        } else {
            $this->db->where('id_pendonor', $id_pendonor);
            $pendonor = $this->db->get('pendonor')->result();
        }
        $this->response($pendonor,);
    }

    function index_post() {
        $data = array(
                    'id_pendonor'    => $this->post('id_pendonor'),
                    'nama'           => $this->post('nama'),
                    'alamat'         => $this->post('alamat'),
                    'tanggal_lahir'  => $this->post('tanggal_lahir'),
                    'jenis_kelamin'  => $this->post('jenis_kelamin'),
                    'gol_darah'      => $this->post('gol_darah'));
        $insert = $this->db->insert('pendonor', $data);
        if ($insert) {
            $this->response($data, REST_Controller::HTTP_OK);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_put() {
        $id_pendonor = $this->put('id_pendonor');
        $data = array(
                    'id_pendonor'    => $this->put('id_pendonor'),
                    'nama'           => $this->put('nama'),
                    'alamat'         => $this->put('alamat'),
                    'tanggal_lahir'  => $this->put('tanggal_lahir'),
                    'jenis_kelamin'  => $this->put('jenis_kelamin'),
                    'gol_darah'      => $this->put('gol_darah'));
        $this->db->where('id_pendonor', $id_pendonor);
        $update = $this->db->update('pendonor', $data);
        if ($update) {
            $this->response($data,);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete() {
        $id_pendonor = $this->delete('id_pendonor');
        $this->db->where('id_pendonor', $id_pendonor);
        $delete = $this->db->delete('pendonor');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
?>