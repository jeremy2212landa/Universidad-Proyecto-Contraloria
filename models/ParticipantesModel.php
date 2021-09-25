<?php
class ParticipantesModel extends Model {
	public $participantes_ci;
	public $participantes;


	public function create( $participantes_data = array() ) {
		foreach ($participantes_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "INSERT INTO participante ('clave_p', 'cedula', 'nombre', 'apellido', 'correo', 'direccion') VALUES ('$clave_participante', '$cedula_participante', '$nombre_participante', '$apellido_participante', '$correo_participante' , '$direccion_participante')";
		$this->set_query();
	}

	public function read( $participantes_cedula = '' ) {
		$this->query = ($participantes_cedula != '')
    ?"SELECT * FROM participante WHERE cedula = $participantes_cedula"
    :"SELECT * FROM participante";

		$this->get_query();

		// $num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function update( $participantes_data = array() ) {
		foreach ($participantes_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "UPDATE participante SET clave_p = $clave_participante, cedula = $cedula_participante, nombre = '$nombre_participante' , apellido = '$apellido_participante' , correo = '$correo_participante' , direccion = '$direccion_participante' WHERE cedula = $cedula_participante";
		$this->set_query();
	}

	public function delete( $participantes_cedula = '' ) {
		$this->query = "DELETE FROM cursos WHERE cedula = $participantes_cedula";
		$this->set_query();
	}

}

?>
