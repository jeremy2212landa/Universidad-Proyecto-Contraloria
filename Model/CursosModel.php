<?php
 require_once('Model.php');

class CursosModel extends Model {
	public $cursos_id;
	public $cursos;


	public function create( $cursos_data = array() ) {
		foreach ($cursos_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "INSERT INTO cursos ('id', 'nombre_curso', 'descripcion_curso', 'contralor', 'fecha') VALUES ($curso_id, '$curso_nombre', '$curso_descripcion', '$curso_contralor', '$curso_fecha')";
		$this->set_query();
	}

	public function read( $cursos_id = '' ) {
		$this->query = ($cursos_id != '')
    ?"SELECT * FROM cursos WHERE id = $cursos_id"
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

		$this->query = "UPDATE cursos SET id = $curso_id, nombre_curso = '$curso_nombre' , descripcion_curso = '$curso_descripcion' , contralor = '$curso_contralor' , fecha = '$curso_fecha' WHERE id = $curso_id";
		$this->set_query();
	}

	public function delete( $cursos_id = '' ) {
		$this->query = "DELETE FROM cursos WHERE id = $cursos_id";
		$this->set_query();
	}

}

?>
