<?php
class CP_Model extends Model {


	public function create( $cp_data = array() ) {
		foreach ($cp_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "INSERT INTO curso_participante (cp_curso, cp_participante) VALUES ($cp_curso, $cp_participante)";
		$this->set_query();
	}

	public function read( $cp_id = '' ) {
		$this->query = ($cp_id != '')
    ?"SELECT c.curso_id, c.curso_name, c.curso_fecha, p.nombre, p.apellido, p.cedula, p.correo, p.direccion, cp.cp_id
		FROM cursos AS c
		INNER JOIN curso_participante AS cp ON c.curso_id=cp.cp_curso
		INNER JOIN participantes as p ON cp.cp_participante=p.cedula
		WHERE c.curso_id = $cp_id
		ORDER BY p.apellido"

    :"SELECT c.curso_id, c.curso_name, c.curso_fecha, p.nombre, p.apellido, p.cedula, p.correo, p.direccion, cp.cp_id
		FROM cursos AS c
		INNER JOIN curso_participante AS cp ON c.curso_id=cp.cp_curso
		INNER JOIN participantes as p ON cp.cp_participante=p.cedula";

		$this->get_query();

		// $num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function update( $cp_data = array() ) {
		foreach ($cp_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "UPDATE curso_participante SET cp_id = $cp_id, cp_curso = $cp_curso, cp_participante = $cp_participante WHERE cp_id = $cp_id";
		$this->set_query();
	}

	public function delete( $cp_id = '' ) {
		$this->query = "DELETE FROM curso_participante WHERE cp_id = $cp_id";
		$this->set_query();
	}

	public function verify( $cp_data = array() ) {
		$this->rows =  NULL;
		foreach ($cp_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "SELECT cp_id FROM curso_participante WHERE cp_participante = $participante AND cp_curso = $curso";

		$this->get_query();
		//var_dump($this->rows);
		// $num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function delete_relation( $cp_curso = '' ) {
		$this->query = "DELETE FROM curso_participante WHERE cp_curso = $cp_curso";
		$this->set_query();
	}
	public function read_parti( $cedula = '' ) {
		$this->query = ($cp_id != '')
		?"SELECT c.curso_id, c.curso_name, c.curso_fecha, p.nombre, p.apellido, p.cedula, p.correo, p.direccion, cp.cp_id
		FROM cursos AS c
		INNER JOIN curso_participante AS cp ON c.curso_id=cp.cp_curso
		INNER JOIN participantes as p ON cp.cp_participante=p.cedula
		WHERE p.cedula = $cedula
		ORDER BY p.apellido"

		:"SELECT c.curso_id, c.curso_name, c.curso_fecha, p.nombre, p.apellido, p.cedula, p.correo, p.direccion, cp.cp_id
		FROM cursos AS c
		INNER JOIN curso_participante AS cp ON c.curso_id=cp.cp_curso
		INNER JOIN participantes as p ON cp.cp_participante=p.cedula";

		$this->get_query();

		// $num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}


}

?>
