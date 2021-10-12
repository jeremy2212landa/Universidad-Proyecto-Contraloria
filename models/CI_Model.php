<?php
class CI_Model extends Model {


	public function create( $ci_data = array() ) {
		foreach ($ci_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "INSERT INTO curso_instructor (ci_id, ci_curso, ci_instructor) VALUES ($ci_id, $ci_curso, $ci_instructor)";
		$this->set_query();
	}

	public function read( $ci_id = '' ) {
		$this->query = ($ci_id != '')
    ?"SELECT c.curso_id, c.curso_name, c.curso_fecha, i.instructor_id, i.nombre, i.apellido, i.cedula, i.correo, i.instituto, i.cargo
		FROM cursos AS c
		INNER JOIN curso_instructor AS ci ON c.curso_id = ci.ci_curso
		INNER JOIN intructores as i ON ci.ci_instructor = i.instructor_id
    WHERE c.curso_id = $ci_id
		ORDER BY i.apellido"

    :"SELECT c.curso_id, c.curso_name, c.curso_fecha, i.instructor_id, i.nombre, i.apellido, i.cedula, i.correo, i.instituto, i.cargo
		FROM cursos AS c
		INNER JOIN curso_instructor AS ci ON c.curso_id = ci.ci_curso
		INNER JOIN intructores as i ON ci.ci_instructor = i.instructor_id";

		$this->get_query();

		// $num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function update( $ci_data = array() ) {
		foreach ($cp_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "UPDATE curso_instructor SET ci_id = $ci_id, ci_curso = $ci_curso, ci_instructor = $ci_instructor WHERE ci_id = $ci_id";
		$this->set_query();
	}

	public function delete( $ci_id = '' ) {
		$this->query = "DELETE FROM curso_instructor WHERE ci_id = $ci_id";
		$this->set_query();
	}

}

?>
