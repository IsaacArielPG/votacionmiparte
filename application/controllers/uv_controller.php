<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class uv_controller extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('uv_model');
	}


	public function index(){
		$data = array(
			'title'   => 'Votación || Alumnos', 
			'urnas_votacion'  => $this->uv_model->get_urnas_votacion(),
			'votacion'    => $this->uv_model->get_votacion(),
			'urnas' => $this->uv_model->get_urnas());
		$this->load->view('template/header',$data);
		$this->load->view('uv_view');
		$this->load->view('template/footer');
	}

	public function ingresar(){
		$datos['votacion']       = $_POST['votacion'];
		$datos['urnas']     = $_POST['urnas'];
		
		$result = $this->uv_model->set_votacion_urnas($datos);
		if ($result == "success") {
			$data = array(
				'title'   => 'Votación || Alumnos', 
				'urnas_votacion'  => $this->uv_model->get_urnas_votacion(),
				'votacion'    => $this->uv_model->get_votacion(),
				'urnas' => $this->uv_model->get_urnas(),
				'msj'     => "set");
			$this->load->view('template/header',$data);
			$this->load->view('uv_view');
			$this->load->view('template/footer');

		}

	}

	public function eliminar($id){
		$this->uv_model->eliminar($id);
		redirect('/uv_controller/index','refresh');
	}

	public function actualizar(){
		$datos['id_alumno']   = $_POST['id_alumno'];
		$datos['votacion']      = $_POST['votacion'];
		$datos['urnas']      = $_POST['urnas'];
		
		$result = $this->uv_model->actualizar($datos);
		if ($result == "success") {
			$data = array(
				'title'   => 'Votación || Alumnos',  
				'urnas_votacion'  => $this->uv_model->get_urnas_votacion(),
				'votacion'    => $this->uv_model->get_votacion(),
				'urnas' => $this->uv_model->get_urnas(),
				'msj'     => "modi");
		}else{
			$data = array(
				'title'   => 'Votación || Alumnos',  
				'urnas_votacion'  => $this->uv_model->get_urnas_votacion(),
				'votacion'    => $this->uv_model->get_votacion(),
				'urnas' => $this->uv_model->get_urnas(),
				'msj'     => "ErrorM");

		}
		$this->load->view('template/header',$data);
		$this->load->view('uv_view');
		$this->load->view('template/footer');


	}
}

?>