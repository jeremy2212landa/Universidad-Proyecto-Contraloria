<?php
class ParticipantesModel extends Model {
	public $participantes_ci;
	public $participantes;


	public function create( $participantes_data = array() ) {
		foreach ($participantes_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "INSERT INTO participantes ('participante_id', 'nombre', 'apellido', 'cedula', 'correo', 'direccion') VALUES ('$clave_participante', '$nombre_participante', '$apellido_participante', '$cedula_participante', '$correo_participante' , '$direccion_participante')";
		$this->set_query();
	}

	public function read( $participantes_cedula = '' ) {
		$this->query = ($participantes_cedula != '')
    ?"SELECT * FROM participantes WHERE cedula = $participantes_cedula"
    :"SELECT * FROM participantes";

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

		$this->query = "UPDATE participantes SET participante_id = $clave_participante, nombre = '$nombre_participante', apellido = '$apellido_participante' , cedula = $cedula_participante , correo = '$correo_participante' , direccion = '$direccion_participante' WHERE cedula = $cedula_participante";
		$this->set_query();
	}

	public function delete( $participantes_cedula = '' ) {
		$this->query = "DELETE FROM participantes WHERE cedula = $participantes_cedula";
		$this->set_query();
	}

}

?>
