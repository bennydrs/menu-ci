<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SubMenu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model', 'menu');
    }

    public function index()
    {
        $data['title'] = "Tambah Sub Menu";
        $data['subMenu'] = $this->menu->getSubMenu();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('submenu/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_submenu', 'Nama Sub Menu', 'required|trim|is_unique[submenus.nama_submenu]', array('is_unique' => 'Nama submenu ini sudah ada'));
        $this->form_validation->set_rules('menu_id', 'Parent Menu', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah Sub Menu";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('submenu/add', $data);
            $this->load->view('templates/footer');
        } else {
            $this->menu->addSubMenu();
            redirect('submenu/index');
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('nama_submenu', 'Nama Sub Menu', 'required');
        $this->form_validation->set_rules('menu_id', 'Parent Menu', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit Sub Menu";
            $data['submenu'] = $this->menu->getSubMenuById($id);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('submenu/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $nama_submenu_lama = $this->input->post('nama_submenu_lama');
            $nama = $this->input->post('nama_submenu');

            // cek unique
            if ($nama != $nama_submenu_lama) {
                $name_check = $this->db->get_where('submenus', ['nama_submenu' => $nama]);
                if ($name_check->num_rows() > 0) {
                    $this->session->set_flashdata('error', 'name submenu "' . $nama . '" already exist');
                    // $this->error['th_slug'] = 'Slug "' . $data['th_slug'] . '" sudah digunakan';
                    redirect('submenu/edit/' . $id);
                }
            }

            $this->menu->editSubMenu($id);
            $this->session->set_flashdata('message', 'submenu has been updated');
            redirect('submenu/index');
        }
    }

    public function delete($id)
    {
        $this->session->set_flashdata('confirm', 'Delete?');
        $this->db->where('id', $id);
        $this->db->delete('submenus');
        $this->session->set_flashdata('message', 'submenu has been deleted');
        redirect('submenu/index');
    }
}
