<?php 
	/**
	 * m_authenticate()
	 * 	looks for logged_in session to verify whether user is logged in or not
	 * 	return true/false
	 */
	function m_authenticate()
	{
		if(!isset($_SESSION['logged_in']))
			return false;
		return $_SESSION['logged_in'] == true;
	}
	function m_authenticate_and_redirect($where = "login")
	{
		if(!m_authenticate())
			m_redirect($where);
	}

	function m_redirect($where = "")
	{
		header("Location: " . APPROOT . "/" . $where);
	}
	function m_post($key)
	{
		if(isset($_POST[$key]))
		{
			$value = $_POST[$key];
			$value = m_mysql_escape($value);
			return $value;
		}

		else return NULL;
	}

	function m_mysql_escape($string)
	{
		if (function_exists('mb_ereg_replace'))
		{
	        return mb_ereg_replace('[\x00\x0A\x0D\x1A\x22\x27\x5C]', '\\\0', $string);
		} else {
	        return preg_replace('~[\x00\x0A\x0D\x1A\x22\x27\x5C]~u', '\\\$0', $string);
		}
	}

	function m_insert_builder($table, $row)
	{
		$query = "INSERT INTO $table(";
		$keys = array_keys($row);
		$values = array_values($row);
		for($i = 0; $i < count($values); $i++)
			$values[$i] = "'$values[$i]'";

		$keys = join(", ", $keys);
		$values = join(", ", $values);

		return $query . $keys . " ) " . " VALUES (" . $values . ");";
	}
	function m_post_isset($arr)
	{
		foreach ($arr as $key) {
			if(!isset($_POST[$key]) || empty($_POST[$key]))
				return false;
		}
		return true;
		
	}

	function m_get_flashdata($key)
	{
		if(isset($_SESSION) && isset($_SESSION[$key])){
			$value = $_SESSION[$key];
			unset($_SESSION[$key]);
			return $value;

		}
		return NULL;
	}
	function m_set_flashdata($key, $value)
	{
		$_SESSION[$key] = $value;
	}
	function m_set_form_values($arr)
	{
		foreach ($arr as $key => $value) {
			$_SESSION['form_values'][$key] = $value;
		}
	}
	function m_get_form_values($key)
	{
		if(isset($_SESSION['form_values'][$key]))
		{
			$value = $_SESSION['form_values'][$key];
			unset($_SESSION['form_values'][$key]);
			return $value;
		}return NULL;
	}
	function m_create_img_url($image_path)
	{
		if(!filter_var($image_path, FILTER_VALIDATE_URL))
			return $row['image'] = APPROOT . "/admin/" . $image_path;
		else return $image_path;
	}
	function m_empty_validation($arr)
	{
		foreach ($arr as $element) {
			if(empty($element))
				return false;
		}
		return true;
	}

?>
