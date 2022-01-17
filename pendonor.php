<?php
Class pendonor extends CI_Controller{
    
    var $API ="";
    
    function __construct() {
        parent::__construct();
        $this->API="http://localhost/cdonor/rest_ci/index.php";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }
    
    // menampilkan data pendonor
    function index(){
        $data['datapendonor'] = json_decode($this->curl->simple_get($this->API.'/pendonor'));
        $this->load->view('pendonor/list',$data);
    }
    // insert data pendonor
    function create(){
        if(isset($_POST['submit'])){
            $data = array(
                'id_pendonor'    =>  $this->input->post('id_pendonor'),
                'nama'           =>  $this->input->post('nama'),
                'alamat'         =>  $this->input->post('alamat'),
                'tanggal_lahir'  =>  $this->input->post('tanggal_lahir'),
                'jenis_kelamin'  =>  $this->input->post('jenis_kelamin'),
                'gol_darah'      =>  $this->input->post('gol_darah'),);
            $insert =  $this->curl->simple_post($this->API.'/pendonor', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('pendonor');
        }else{
            $this->load->view('pendonor/create');
        }
    }
    
    // edit data pendonor
    function edit(){
        if(isset($_POST['submit'])){
            $data = array(
                'id_pendonor'     =>  $this->input->post('id_pendonor'),
                'nama'        =>  $this->input->post('nama'),
                'alamat'  =>  $this->input->post('alamat'),
                'tanggal_lahir'     =>  $this->input->post('tanggal_lahir'),
                'jenis_kelamin'        =>  $this->input->post('jenis_kelamin'),
                'gol_darah'  =>  $this->input->post('gol_darah'),);
            $update =  $this->curl->simple_put($this->API.'/pendonor', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('pendonor');
        }else{
            $params = array('id_pendonor'=>  $this->uri->segment(3));
            $data['datapendonor'] = json_decode($this->curl->simple_get($this->API.'/pendonor',$params));
            $this->load->view('pendonor/edit',$data);
        }
    }
    
    // delete data pendonor
    function delete($id_pendonor){
        if(empty($id_pendonor)){
            redirect('pendonor');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/pendonor', array('id_pendonor'=>$id_pendonor), array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('pendonor');
        }
    }
}