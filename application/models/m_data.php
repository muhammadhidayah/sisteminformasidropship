function edit_data($where,$table){		
	return $this->db->get_where($table,$where);
}