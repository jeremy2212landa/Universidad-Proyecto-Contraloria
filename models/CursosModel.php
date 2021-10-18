<?php
class CursosModel extends Model {
	public $cursos_id;
	public $cursos;


	public function create( $cursos_data = array() ) {
		foreach ($cursos_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "INSERT INTO cursos (curso_id, curso_name, curso_description, curso_contralor, curso_fecha) VALUES ($curso_id, '$curso_nombre', '$curso_descripcion', '$curso_contralor', '$curso_fecha')";
		$this->set_query();
	}

	public function read( $cursos_id = '' ) {
		$this->query = ($cursos_id != '')
    ?"SELECT * FROM cursos WHERE curso_id = $cursos_id"
    :"SELECT * FROM cursos";

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

		$this->query = "UPDATE cursos SET curso_id = $curso_id, curso_name = '$curso_nombre' , curso_description = '$curso_descripcion' , curso_contralor = '$curso_contralor' , curso_fecha = '$curso_fecha' WHERE curso_id = $curso_id";
		$this->set_query();
	}

	public function delete( $cursos_id = '' ) {
		$this->query = "DELETE FROM cursos WHERE curso_id = $cursos_id";
		$this->set_query();
	}
}

?>
