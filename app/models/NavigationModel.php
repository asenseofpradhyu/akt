<?php
class NavigationModel
{
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}


	public function addMainNav($data)
	{
		$this->db->query('INSERT INTO main_menu (main_menu_name) VALUES(:mainnav)');
		// Bind values
		$this->db->bind(':mainnav', $data['mainnav']);

		// Execute
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function getMainNav()
	{
		$this->db->query('SELECT * FROM main_menu');

		$data['results'] = $this->db->resultSet();
		$data['search_categories'] = $this->getNavSearchCategories(0);
		return $data;
	}

	// Get Main Nav by ID
	public function getMainNavById($id)
	{
		$this->db->query('SELECT * FROM main_menu WHERE main_menu_id = :id');
		// Bind value
		$this->db->bind(':id', $id);

		$row = $this->db->single();

		return $row;
	}

	public function updateMainNav($data)
	{
		$this->db->query('UPDATE main_menu SET main_menu_name = :mainNav WHERE main_menu_id = :id');
		// Bind values
		$this->db->bind(':id', $data['id']);
		$this->db->bind(':mainNav', $data['mainnav']);

		// Execute
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function deleteMainnav($id)
	{
		$this->db->query('DELETE FROM main_menu WHERE main_menu_id = :id');
		// Bind values
		$this->db->bind(':id', $id);

		// Execute
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function getSubNav()
	{
		$this->db->query('SELECT sub_menu.*, main_menu.main_menu_name FROM sub_menu INNER JOIN main_menu ON sub_menu.main_menu_id = main_menu.main_menu_id');

		$results = $this->db->resultSet();

		return $results;
	}

	public function deleteSubnav($id)
	{
		$this->db->query('DELETE FROM sub_menu WHERE sub_menu_id = :id');
		// Bind values
		$this->db->bind(':id', $id);

		// Execute
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function addSubNav($data)
	{
		$this->db->query('INSERT INTO sub_menu (sub_menu_name, main_menu_id, sub_menu_links, parent_id) VALUES(:subnav, :mainnav, :check, :parentid)');
		// Bind values
		$this->db->bind(':subnav', $data['subnav']);
		$this->db->bind(':mainnav', $data['mainNavSelect']);
		$this->db->bind(':check', $data['check']);
		$this->db->bind(':parentid', $data['parent']);

		// Execute
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	// Get Main Nav by ID
	public function getSubNavById($id)
	{
		$this->db->query('SELECT * FROM sub_menu WHERE sub_menu_id = :id');
		// Bind value
		$this->db->bind(':id', $id);

		$row = $this->db->single();

		return $row;
	}

	public function updateSubNav($data)
	{
		$this->db->query('UPDATE sub_menu SET sub_menu_name = :subname, main_menu_id = :mainNav, parent_id = :parent WHERE sub_menu_id = :id');
		// Bind values
		$this->db->bind(':id', $data['id']);
		$this->db->bind(':subname', $data['subnav']);
		$this->db->bind(':mainNav', $data['mainNavSelect']);
		$this->db->bind(':parent', $data['parent']);

		// Execute
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function getNavSearchCategories($id = 0)
	{
		$this->db->query('SELECT * FROM sub_menu where sub_menu_links = :id');
		$this->db->bind(':id', $id);
		$titles = $this->db->resultSet();
		return $titles;
	}

	public function getCategoryFilter(int $current_sub_menu)
	{
		$current_menu = 'SELECT main_menu_id FROM sub_menu WHERE sub_menu_id = :curret';
		$this->db->query($current_menu);
		$this->db->bind(':curret', $current_sub_menu);
		$main_menu = $this->db->single();

		$this->db->query("SELECT * FROM sub_menu WHERE parent_id=0 AND main_menu_id = $main_menu->main_menu_id");
		$main_cats = $this->db->resultSet();

		$html = '';
		if(!empty($main_cats)){
			foreach ($main_cats as $key => $current_category) {
				$this->db->query("SELECT * FROM sub_menu WHERE parent_id=$current_category->sub_menu_id");
				$sub_categories = $this->db->resultSet();

				$html .= '<li class="level1 sub-level"><a href="#;" class="site-nav">'.$current_category->sub_menu_name.'</a>';
				if(!empty($sub_categories)){
					$html .= '<ul class="sublinks" style="display: none;">';
					foreach ($sub_categories as $key => $current_sub_category) {
						$html .= '<li class="level2"><a href="'.URLROOT . "/product/productlist/$current_sub_category->sub_menu_id" .'" class="site-nav">'.$current_sub_category->sub_menu_name.'</a></li>';
					}
					$html .= '</ul>';
				}
				$html .= '</li>';
			}
		}
		return $html;
	}
}
