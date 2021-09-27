<?php
class InstructorModel extends Model {
	public $instructor_ci;
	public $instructor;


	public function create( $instructor_data = array() ) {
		foreach ($instructor_data as $key => $value) {
			$$key = $value;
		}

    $this->query = "INSERT INTO instructores ('instructor_id', 'nombre', 'apellido', 'cedula' 'correo', 'instituto', 'cargo') VALUES ('$clave_instructor', '$nombre_instructor', '$apellido_instructor', '$cedula_instructor', '$correo_instructor' , '$instituto_instructor', 'cargo_instructor')";
		$this->set_query();
		$this->set_query();
	}

	public function read( $instructor_cedula = '' ) {
		$this->query = ($instructor_cedula != '')
    ?"SELECT * FROM instructores WHERE cedula = $instructor_cedula"
    :"SELECT * FROM instructores";

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

		$this->query = "UPDATE instructores SET instructor_id = $clave_instructor, nombre = '$nombre_instructor' , apellido = '$apellido_instructor', cedula = '$cedula_instructor', correo = '$correo_instructor', instituto = '$instituto_instructor', cargo = '$cargo_instructor' WHERE cedula = $cedula_instructor";
		$this->set_query();
	}

	public function delete( $instructor_cedula = '' ) {
		$this->query = "DELETE FROM instructores WHERE cedula = $instructor_cedula";
		$this->set_query();
	}

}

?>
