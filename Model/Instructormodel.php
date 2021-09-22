<?php
 require_once('Model.php');

class InstructorModel extends Model {
	public $instructor_ci;
	public $instructor;


	public function create( $instructor_data = array() ) {
		foreach ($instructor_data as $key => $value) {
			$$key = $value;
		}

    $this->query = "INSERT INTO instructor ('clave_ins', 'cedula', 'nombre', 'apellido', 'correo', 'instituto', 'cargo') VALUES ('$clave_instructor', '$cedula_instructor', '$nombre_instructor', '$apellido_instructor', '$correo_instructor' , '$instituto_instructor', 'cargo_instructor')";
		$this->set_query();
		$this->set_query();
	}

	public function read( $instructor_cedula = '' ) {
		$this->query = ($instructor_cedula != '')
    ?"SELECT * FROM instructor WHERE cedula = $instructor_cedula"
    :"SELECT * FROM instructor";

		$this->get_query();

		// $num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function update( $instructor_data = array() ) {
		foreach ($instructor_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "UPDATE instructor SET clave_ins = $clave_instructor, cedula = '$cedula_instructor' , nombre = '$nombre_instructor' , apellido = '$apellido_instructor' , correo = '$correo_instructor', instituto = '$instituto_instructor', cargo = '$cargo_instructor' WHERE cedula = $cedula_instructor";
		$this->set_query();
	}

	public function delete( $instructor_cedula = '' ) {
		$this->query = "DELETE FROM instructor WHERE cedula = $instructor_cedula";
		$this->set_query();
	}

}

?>
