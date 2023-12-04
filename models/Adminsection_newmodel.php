<?php
class Adminsection_newmodel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('analytic_code_section');
    }
    
    function save_analytic_code($data, $action, $id) {
        $retuen = array();
        $retuen['error'] = '';
        $retuen['success'] = '';
        if ($action == 'delete') {
            $items = $data['items'];
            $itemsArr = explode(',', $items);
            foreach ($itemsArr AS $index => $value) {
                if ($value != '') {
                    $sql = "DELETE FROM dev_analytic_code WHERE id = $value ";
                    $this->db->query($sql);
                }
            }
            $items_id = rtrim($data['items'], ",");
            $total = count(explode(",", $items_id));
            $retuen['total'] = $total;
        } else {
            if (is_array($data)) {
                $page_title = getSitePagesTitleList( $data['page_name_id'] ); //analytic_code_section
                $fields_data = array(
                        'page_title' => $page_title,
                        'page_link_id' => $data['page_name_id'],
                        'analytic_code' => str_replace('[removed]', '', $data['analytic_code']),
                        'add_date' => date("Y-m-d")
                            );
                if ($action == 'add') {
                    $isinsert = $this->db->insert('dev_analytic_code', $fields_data);

                    $rid = $this->db->insert_id();
                } else {
                    $rid = $id;
                    $this->db->where('id', $id);
                    $isinsert = $this->db->update('dev_analytic_code', $fields_data);
                }
            }
            $retuen['success'] .= 'Analytic code row has been ' . ucfirst($action) . 'ed successfully';
        }

        return $retuen;
    }
    
    function getAnalyticsRowsList($page = 1, $rp = 10, $sortname = 'page_title', $sortorder = 'desc', $query = '', $qtype = 'page_title', $oid = '') {
        $results = array();

        $sort = "ORDER BY $sortname $sortorder";

        $start = (($page - 1) * $rp);

        $limit = "LIMIT $start, $rp";

        $qwhere = "";
        if ($query) {
            $qwhere .= " AND $qtype LIKE '%$query%'";
        }
        if ($oid != '') {
            $qwhere .= " AND id = $oid";
        }

        $sql = 'SELECT * FROM dev_analytic_code where 1=1 ' . $qwhere . ' ' . $sort . ' ' . $limit;
        //var_dump($sql);
        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        $sql2 = 'SELECT id FROM dev_analytic_code where 1=1 ' . $qwhere;
        $result2 = $this->db->query($sql2);
        $results['count'] = $result2->num_rows();

        return $results;
    }
    
    function getAnalyticRowById($id=0) {
        $sql = $this->db->query("SELECT * FROM dev_analytic_code where id = '{$id}' ORDER BY id DESC LIMIT 1");
        $results = $sql->result_array();
        
        return $results[0];
    }
    
    function getAnalyticodeViaId($heart_cate_id='') {
        $method_name = $this->router->fetch_method();
        $class_name  = $this->router->fetch_class();
        $page_link_id = $class_name . '_' . $method_name;
        
        $query = "SELECT analytic_code FROM dev_analytic_code WHERE 1 = 1";
        if( !empty($heart_cate_id) ) {
            $query .= " AND page_link_id IN ('{$heart_cate_id}')";
        } else {
            $query .= " AND page_link_id IN ('{$page_link_id}', '{$method_name}')";
        }
        
        $query .= " ORDER BY id DESC LIMIT 1";
        //echo $query; exit;
        
        $sql = $this->db->query( $query );
        $results = $sql->result_array();
        
        return ( !empty($results[0]['analytic_code']) ? $results[0]['analytic_code'] : '' );
    }
}