<?php
	class UsersModel extends Model {

		public function create( $user_data = array() ) {
			foreach ($user_data as $key => $value) {
				$$key = $value;
			}

			$this->query = "UPDATE INTO users (user_id, user_name, user_email, user_pass, role) VALUES ($user_id, '$user_name', '$user_email', MD5('$user_pass'), '$role')";
			$this->set_query();
		}

		public function read( $user_name = '' ) {
			$this->query = ($user_name != '')
	    ?"SELECT * FROM users WHERE user_name = '$user_name'"
	    :"SELECT * FROM users";

			$this->get_query();

			// $num_rows = count($this->rows);

			$data = array();

			foreach ($this->rows as $key => $value) {
				array_push($data, $value);
			}

			return $data;
		}

		public function update( $user_data = array() ) {
			foreach ($user_data as $key => $value) {
				$$key = $value;
			}
			$this->query = "UPDATE users SET user_id = $user_id, user_name = '$user_name', user_email = '$user_email', user_pass = MD5('$user_pass'), role = '$role'  WHERE user_name = '$user_name'";
			$this->set_query();
		}

		public function delete( $user_name = '' ) {
			$this->query = "DELETE FROM users WHERE user_name = $user_name";
			$this->set_query();
		}

		public function validate_user($user, $pass) {
		$this->query = "SELECT * FROM users WHERE user_name = '$user' AND user_pass = MD5('$pass')";
		$this->get_query();

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}

}
?>
