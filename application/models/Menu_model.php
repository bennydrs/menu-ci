<?php
class Menu_model extends CI_Model
{
    public function getMenu()
    {
        $this->db->order_by("orderby", "asc");
        $query = $this->db->get('menus');
        return $query->result_array();
    }

    public function getMenuById($id)
    {
        return $this->db->get_where('menus', ['id' => $id])->row_array();
    }

    public function addMenu()
    {
        $data = [
            'nama_menu' => ucwords($this->input->post('nama_menu')),
            'icon' => $this->input->post('icon'),
            'url' => $this->input->post('url'),
            'is_active' => $this->input->post('aktif')
        ];

        $this->db->insert('menus', $data);
    }

    public function editMenu($id)
    {
        $data = [
            'nama_menu' => ucwords($this->input->post('nama_menu')),
            'icon' => $this->input->post('icon'),
            'url' => $this->input->post('url'),
            'is_active' => $this->input->post('aktif')
        ];

        $this->db->where('id', $id);
        $this->db->update('menus', $data);
    }

    public function getSubMenu()
    {
        $this->db->select('submenus.*, menus.nama_menu');
        $this->db->join('menus', 'menus.id = submenus.menu_id');
        $query = $this->db->get('submenus');
        return $query->result_array();
    }

    public function getSubMenuById($id)
    {
        $this->db->select('submenus.*, menus.nama_menu');
        $this->db->join('menus', 'menus.id = submenus.menu_id');
        $this->db->where('submenus.id', $id);
        $query = $this->db->get('submenus');
        return $query->row_array();
    }

    public function addSubMenu()
    {
        $data = [
            'nama_submenu' => ucwords($this->input->post('nama_submenu')),
            'menu_id' => $this->input->post('menu_id'),
            'icon' => $this->input->post('icon'),
            'url' => $this->input->post('url'),
            'is_active' => $this->input->post('aktif')
        ];

        $this->db->insert('submenus', $data);
    }

    public function editSubMenu($id)
    {
        $data = [
            'nama_submenu' => ucwords($this->input->post('nama_submenu')),
            'menu_id' => $this->input->post('menu_id'),
            'icon' => $this->input->post('icon'),
            'url' => $this->input->post('url'),
            'is_active' => $this->input->post('aktif')
        ];

        $this->db->where('id', $id);
        $this->db->update('submenus', $data);
    }
}
