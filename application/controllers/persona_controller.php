<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class persona_controller extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('persona_model');
	}

	public function index(){
		$data = array(
			'title' => 'Votación || Personas',
			'persona' => $this->persona_model->get_persona(),
			'estado' => $this->persona_model->get_estado_persona(),
			'sexo' => $this->persona_model->get_sexo(),
			'municipio' => $this->persona_model->get_municipio(),
			'departamento' => $this->persona_model->get_departamento());

		$this->load->view('template/header',$data);
		$this->load->view('persona_view');
		$this->load->view('template/footer');
	}

	public function eliminar($id){
		foreach ($this->persona_model->get_datos($_REQUEST["id"]) as $k) {
			unlink("../props/persona/".$k[0]."/".$k[17]);
			rmdir("../props/persona/".$k[0]);
		}

		$this->persona_model->eliminar($id);
		redirect('persona_controller/index','refresh');
	}

	public function ingresar(){

		$limite_kb = 200;

		if ($_FILES["img"]["size"] <= $limite_kb * 1024){

			$datos["DUI_persona"] = $_POST["DUI_persona"];
			$datos["nombre1"] = $_POST["nombre1"];
			$datos["nombre2"] = $_POST["nombre2"];
			$datos["nombre3"] = $_POST["nombre3"];
			$datos["nombre4"] = $_POST["nombre4"];
			$datos["apellido1"] = $_POST["apellido1"];
			$datos["apellido2"] = $_POST["apellido2"];
			$datos["apellido3"] = $_POST["apellido3"];
			$datos["telefono"] = $_POST["telefono"]; 
			$datos["direccion"] = $_POST["direccion"]; 
			$datos["fnacimiento"] = $_POST["fnacimiento"]; 
			$fa = date("Y-m-d"); 
			$fe = date("Y-m-d", strtotime('+ 8 years'));
			$datos["estado"] = $_POST["estado"]; 
			$datos["sexo"] = $_POST["sexo"]; 
			$datos["municipio"] = $_POST["municipio"];


			$img =$_FILES["img"]["name"];
			$ruta =$_FILES["img"]["tmp_name"];
			mkdir("props/persona/".$datos["DUI_persona"]);
			$destino = "props/persona/".$datos["DUI_persona"]."/".$img;
			copy($ruta,$destino);

			$datos["foto"] = $img;
			$datos["ruta"] = $destino;


			$result = $this->persona_model->set_persona($datos, $fa, $fe);
			if ($result == 'set'){
				$data = array(
					'title' => 'Votación || Personas',
					'persona' => $this->persona_model->get_persona(),
					'estado' => $this->persona_model->get_estado_persona(),
					'sexo' => $this->persona_model->get_sexo(),
					'municipio' => $this->persona_model->get_municipio(),
					'departamento' => $this->persona_model->get_departamento(),
					'msj' => "set");

				$this->load->view('template/header',$data);
				$this->load->view('persona_view');
				$this->load->view('template/footer');
			}

			//redirect('/persona_controller/index','refresh');
		}
	}

	public function get_datos($id){
		$data = array(
			'title' => 'Votación || Personas',
			'persona' => $this->persona_model->get_persona(),
			'estado' => $this->persona_model->get_estado_persona(),
			'sexo' => $this->persona_model->get_sexo(),
			'municipio' => $this->persona_model->get_municipio(),
			'departamento' => $this->persona_model->get_departamento());

		$this->load->view('template/header',$data);
		$this->load->view('persona_viewact');
		$this->load->view('template/footer');
	}

	public function actualizar(){
		$datos["DUI_persona"] = $_POST["DUI_persona"];
		$datos["nombre1"] = $_POST["nombre1"];
		$datos["nombre2"] = $_POST["nombre2"];
		$datos["nombre3"] = $_POST["nombre3"];
		$datos["nombre4"] = $_POST["nombre4"];
		$datos["apellido1"] = $_POST["apellido1"];
		$datos["apellido2"] = $_POST["apellido2"];
		$datos["apellido3"] = $_POST["apellido3"];
		$datos["telefono"] = $_POST["telefono"]; 
		$datos["direccion"] = $_POST["direccion"]; 
		$datos["fnacimiento"] = $_POST["fnacimiento"]; 
		$fa = date("Y-m-d"); 
		$fe = date("Y-m-d", strtotime('+ 8 years'));
		$datos["estado"] = $_POST["estado"]; 
		$datos["sexo"] = $_POST["sexo"]; 
		$datos["municipio"] = $_POST["municipio"];

		if (isset($datos["img"])){

			foreach ($this->persona_model->get_datos($datos["DUI_persona"]) as $k) {
				unlink("../props/persona/".$k[0]."/".$k[17]);
				rmdir("../props/persona/".$k[0]);
			}

			$img =$_FILES["img"]["name"];
			$ruta =$_FILES["img"]["tmp_name"];
			mkdir("props/persona/".$datos["DUI_persona"]);
			$destino = "props/persona/".$datos["DUI_persona"]."/".$img;
			copy($ruta,$destino);

			$datos["foto"] = $img;
			$datos["ruta"] = $destino;
		}

		$result = $this->persona_model->act_persona($datos);
		if ($result == 'act'){
			$data = array(
				'title' => 'Votación || Personas',
				'persona' => $this->persona_model->get_persona(),
				'estado' => $this->persona_model->get_estado_persona(),
				'sexo' => $this->persona_model->get_sexo(),
				'municipio' => $this->persona_model->get_municipio(),
				'departamento' => $this->persona_model->get_departamento(),
				'msj' => 'act');

			$this->load->view('template/header',$data);
			$this->load->view('persona_view');
			$this->load->view('template/footer');
		}
		redirect('/persona_controller/index','refresh');
	}


}//Fin clase

?>