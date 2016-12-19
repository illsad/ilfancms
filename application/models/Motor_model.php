<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Motor Model Class
 *
 * @package     SYSCMS
 * @subpackage  Models
 * @category    Models
 * @author      Sistiandy Syahbana nugraha <sistiandy.web.id>
 */

class Motor_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // Get From Databases
    function get($params = array())
    {
        if(isset($params['id']))
        {
            $this->db->where('motor.motor_id', $params['id']);
        }

        if(isset($params['limit']))
        {
            if(!isset($params['offset']))
            {
                $params['offset'] = NULL;
            }

            $this->db->limit($params['limit'], $params['offset']);
        }

        if(isset($params['order_by']))
        {
            $this->db->order_by($params['order_by'], 'desc');
        }
        else
        {
            $this->db->order_by('motor_id', 'desc');
        }

        $this->db->select('motor.motor_id, motor_merk, motor_number_police');
        $res = $this->db->get('motor');

        if(isset($params['id']))
        {
            return $res->row_array();
        }
        else
        {
            return $res->result_array();
        }
    }

    // Add and update to database
    function add($data = array()) {

         if(isset($data['motor_id'])) {
            $this->db->set('motor_id', $data['motor_id']);
        }

         if(isset($data['motor_merk'])) {
            $this->db->set('motor_merk', $data['motor_merk']);
        }

         if(isset($data['motor_number_police'])) {
            $this->db->set('motor_number_police', $data['motor_number_police']);
        }
        if (isset($data['motor_id'])) {
            $this->db->where('motor_id', $data['motor_id']);
            $this->db->update('motor');
            $id = $data['motor_id'];
        } else {
            $this->db->insert('motor');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }

    // Delete to database
    function delete($id) {
        $this->db->where('motor_id', $id);
        $this->db->delete('motor');
    }
    
}
