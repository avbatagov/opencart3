<?php
class ModelSettingModule extends Model {
	public function getModule($module_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "module WHERE module_id = '" . (int)$module_id . "'");
		
		if ($query->row) {
			return json_decode($query->row['setting'], true);
		} else {
			return array();	
		}
	}

	public function getModuleCode($module_code) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "module WHERE code = '" . $module_code . "'");

		$data_blocs = array();

		foreach ($query->rows as $result) {
			$data_blocs[] = json_decode($result['setting'], true); 
		}

		return $data_blocs;		
	}		
}