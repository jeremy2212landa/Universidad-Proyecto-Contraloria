<?php
abstract class Model {
	private static $db_host = 'localhost';
	private static $db_user = 'root';
	private static $db_pass = '';
	private static $db_name = 'contraloria';
	private static $db_charset = 'utf8';
	private $conn;
	protected $query;
	public $last_id;
	protected $rows = array();

  abstract protected function create();
  abstract protected function read();
  abstract protected function update();
  abstract protected function delete();

	public function db_open() {
		$this->conn = new mysqli(
			self::$db_host,
			self::$db_user,
			self::$db_pass,
			self::$db_name
		);

		$this->conn->set_charset(self::$db_charset);
	}

	public function db_close() {
		$this->conn->close();
	}

	protected function set_query() {
		$this->db_open();
		$this->conn->query($this->query);
		$this->last_id = $this->conn->insert_id;
		$this->db_close();
	}

	protected function get_query() {
		$this->db_open();

		$result = $this->conn->query($this->query);
		while( $this->rows[] = $result->fetch_assoc() );
		$result->close();

		$this->db_close();

		return array_pop($this->rows);
	}
}
