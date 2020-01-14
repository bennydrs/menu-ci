<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model', 'menu');
    }

    public function index()
    {
        $data['title'] = "Menu";
        $data['menu'] = $this->menu->getMenu();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required|trim|is_unique[menus.nama_menu]', array('is_unique' => 'Nama menu ini sudah ada'));
        $this->form_validation->set_rules('icon', 'Icon', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah Menu";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/add', $data);
            $this->load->view('templates/footer');
        } else {
            $this->menu->addMenu();
            $this->session->set_flashdata('message', 'New menu added');
            echo "berhasil";
            redirect('menu/index');
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required|trim');
        $this->form_validation->set_rules('icon', 'Icon', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit Menu";
            $data['menu'] = $this->menu->getMenuById($id);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $nama_menu_lama = $this->input->post('nama_menu_lama');
            $nama = $this->input->post('nama_menu');

            // cek unique
            if ($nama != $nama_menu_lama) {
                $name_check = $this->db->get_where('menus', ['nama_menu' => $nama]);
                if ($name_check->num_rows() > 0) {
                    $this->session->set_flashdata('error', 'name menu "' . $nama . '" already exist');
                    // $this->error['th_slug'] = 'Slug "' . $data['th_slug'] . '" sudah digunakan';
                    redirect('menu/edit/' . $id);
                }
            }
            $this->menu->editMenu($id);
            $this->session->set_flashdata('message', 'Data menu updated');
            echo "berhasil";
            redirect('menu/index');
        }
    }

    public function delete($id)
    {
        $this->session->set_flashdata('confirm', 'Delete?');
        $this->db->where('id', $id);
        $this->db->delete('menus');
        $this->session->set_flashdata('message', 'Menu has been deleted');
        redirect('menu/index');
    }

    public function sortMenu()
    {
        $data['title'] = "Atur Menu";
        $data['menu'] = $this->menu->getMenu();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/sortMenu', $data);
        $this->load->view('templates/footer');
    }

    public function updateSortMenu()
    {
        $menu = $this->menu->getMenu();

        foreach ($menu as $task) {
            // $task->timestamps = false; // To disable update_at field updation
            $id = $task['id'];

            foreach ($this->input->post('order') as $order) {
                if ($order['id'] == $id) {
                    $this->db->where('id', $order['id']);
                    $this->db->update('menus', ['orderby' => $order['position']]);
                    $this->session->set_flashdata('message', 'Urutan menu berhasil diubah');
                }
            }
        }
    }
}
