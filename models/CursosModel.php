<?php
class CursosModel extends Model {


	public function create( $cursos_data = array() ) {
		foreach ($cursos_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "INSERT INTO cursos (curso_id, curso_name, curso_description, curso_contralor, curso_fecha, curso_horas) VALUES ($curso_id, '$curso_nombre', '$curso_descripcion', '$curso_contralor', '$curso_fecha', $curso_horas)";
		$this->set_query();
	}

	public function read( $cursos_id = '' ) {
		$this->query = ($cursos_id != '')
    ?"SELECT * FROM cursos WHERE curso_id = $cursos_id
		ORDER BY curso_fecha"
    :"SELECT * FROM cursos
		 ORDER BY curso_fecha DESC";

		$this->get_query();

		// $num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function update( $cursos_data = array() ) {
		foreach ($cursos_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "UPDATE cursos SET curso_id = $curso_id, curso_name = '$curso_nombre' , curso_description = '$curso_descripcion' , curso_contralor = '$curso_contralor' , curso_fecha = '$curso_fecha', curso_horas = $curso_horas WHERE curso_id = $curso_id";
		$this->set_query();
	}

	public function delete( $cursos_id = '' ) {
		$this->query = "DELETE FROM cursos WHERE curso_id = $cursos_id";
		$this->set_query();
	}

	public function read_mes( $cursos_date = '' ) {
		$this->query = ($cursos_date != '')
    ?"SELECT c.curso_id, c.curso_name, c.curso_contralor, c.curso_fecha, c.curso_horas, i.nombre, i.apellido, i.cedula
	FROM cursos AS c
	INNER JOIN curso_instructor AS ci ON c.curso_id = ci.ci_curso
	INNER JOIN instructores as i ON ci.ci_instructor = i.cedula
WHERE c.curso_fecha LIKE '$cursos_date%'
		ORDER BY curso_fecha"
    :"SELECT * FROM cursos
		 ORDER BY curso_fecha DESC";

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
