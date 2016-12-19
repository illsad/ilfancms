<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Motor controllers class
 *
 * @package     SYSCMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Sistiandy Syahbana nugraha <sistiandy.web.id>
 */
class Motor extends CI_Controller {

    public function __construct() {
        parent::__construct(TRUE);
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('admin/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        $this->load->model(array('Motor_model', 'Activity_log_model'));
        $this->load->library('upload');
    }

    // Motor view in list
    public function index($offset = NULL) {
        $this->load->library('pagination');
        $data['motor'] = $this->Motor_model->get(array('limit' => 10, 'offset' => $offset));
        $config['base_url'] = site_url('admin/motor/index');
        $config['total_rows'] = count($this->Motor_model->get());
        $this->pagination->initialize($config);

        $data['title'] = 'Motor';
        $data['main'] = 'admin/motor/motor_list';
        $this->load->view('admin/layout', $data);
    }

    function detail($id = NULL) {
        if ($this->Motor_model->get(array('id' => $id)) == NULL) {
            redirect('admin/motor');
        }
        $data['motor'] = $this->Motor_model->get(array('id' => $id));
        $data['title'] = 'Detail Motor';
        $data['main'] = 'admin/motor/motor_view';
        $this->load->view('admin/layout', $data);
    }

    // Add Motor and Update
    public function add($id = NULL) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('motor_merk', 'Merek', 'trim|required|xss_clean');
        $this->form_validation->set_rules('motor_number_police', 'Plat Nomor', 'trim|required|xss_clean');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        $data['operation'] = is_null($id) ? 'Tambah' : 'Sunting';

        if ($_POST AND $this->form_validation->run() == TRUE) {
            if ($this->input->post('motor_id')) {
                $params['motor_id'] = $this->input->post('motor_id');
            }

            $params['motor_merk'] = $this->input->post('motor_merk');
            $params['motor_number_police'] = $this->input->post('motor_number_police');
            $status = $this->Motor_model->add($params);


            // activity log
            $this->Activity_log_model->add(
                    array(
                        'log_date' => date('Y-m-d H:i:s'),
                        'user_id' => $this->session->userdata('user_id'),
                        'log_module' => 'Motor',
                        'log_action' => $data['operation'],
                        'log_info' => 'ID:null;Title:' . $params['motor_merk']
                    )
            );

            $this->session->set_flashdata('success', $data['operation'] . ' Motor berhasil');
            redirect('admin/motor');
        } else {
            if ($this->input->post('motor_id')) {
                redirect('admin/motor/edit/' . $this->input->post('motor_id'));
            }

            // Edit mode
            if (!is_null($id)) {
                $data['motor'] = $this->Motor_model->get(array('id' => $id));
            }
            $data['title'] = $data['operation'] . ' Motor';
            $data['main'] = 'admin/motor/motor_add';
            $this->load->view('admin/layout', $data);
        }
    }

    // Delete Motor
    public function delete($id = NULL) {
        if ($_POST) {
            $this->Motor_model->delete($this->input->post('del_id'));
            // activity log
            $this->Activity_log_model->add(
                    array(
                        'log_date' => date('Y-m-d H:i:s'),
                        'user_id' => $this->session->userdata('user_id'),
                        'log_module' => 'Motor',
                        'log_action' => 'Hapus',
                        'log_info' => 'ID:' . $this->input->post('del_id') . ';Title:' . $this->input->post('del_name')
                    )
            );
            $this->session->set_flashdata('success', 'Hapus Motor berhasil');
            redirect('admin/motor');
        } elseif (!$_POST) {
            $this->session->set_flashdata('delete', 'Delete');
            redirect('admin/motor/edit/' . $id);
        }
    }

}

/* End of file motor.php */
/* Location: ./application/controllers/admin/motor.php */
