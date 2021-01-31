<?php 
class ModelInformationCountryquote extends Model {
	
	public function getCountries($filter_name = '', $limit = 5) {
		$where = '';
		if ($filter_name) {
			$where = "AND name LIKE '%" . $this->db->escape($filter_name) . "%'";
		}
		$sql = "SELECT * FROM " . DB_PREFIX . "country WHERE status = '1' $where ORDER BY name ASC LIMIT $limit";
		$query = $this->db->query($sql);

		return $query->rows;
	}
}
?>
