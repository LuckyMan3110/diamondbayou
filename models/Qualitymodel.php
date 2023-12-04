<?php  
    class Qualitymodel extends CI_Model {

    function __construct()
    {
            parent::__construct();

    }
    
function qualityGoldRings($cateid='', $offset=0, $limit=15) {
        
        $sql = "SELECT * FROM dev_qg WHERE 1 = 1";
        
        if( !empty($cateid) && $cateid != 's'  ) {
            $sql .= " AND Item_Type LIKE '". qualityCate($cateid) ."'";
        }
        
        $count_sql = $this->db->query($sql);
        $return['total'] = $count_sql->num_rows();
        
        $sql .= " LIMIT $offset, $limit";
        $sqlrings = $this->db->query($sql);
        $return['results'] = $sqlrings->result_array();

        return $return;
    }
function qualitySimilarRings($id=0) {
        
        $sql = "SELECT * FROM dev_qg WHERE qg_id != '{$id}' ORDER BY RAND() LIMIT 3";        
        $query = $this->db->query($sql);
        $results = $query->result_array();

        return $results;
    }
function stullerSimilarRings($id=0, $ringCate='') {
        
        $sql = "SELECT * FROM dev_stuller_test WHERE stuller_id != '{$id}' AND stuller_cate = '{$ringCate}' ORDER BY RAND() LIMIT 3";        
        $query = $this->db->query($sql);
        $results = $query->result_array();

        return $results;
    }
//// quality similar products
function qualitySimilartProduct($id=0, $ringCate='', $limit=3) {
        
        $sql = "SELECT * FROM qgold_products WHERE id != '{$id}' AND catid = '{$ringCate}' ORDER BY RAND() LIMIT $limit";        
        $query = $this->db->query($sql);
        $results = $query->result_array();

        return $results;
    }
    
//// quality metal according to the category
function qualityMetalViaCate($cid=0) {
        
        $sql = "SELECT metal FROM qgold_products WHERE catid = '{$cid}' GROUP BY metal ORDER BY metal ASC";        
        $query = $this->db->query($sql);
        $results = $query->result_array();

        return $results;
    }
function stullerRingsDetail($id=0, $search='') {
        
        $sql = "SELECT * FROM dev_stuller_test WHERE 1 = 1"; 
        if( !empty($search) ) {
            $sql .= " AND Sku LIKE '{$id}'";
        } else {
            $sql .= " AND stuller_id = '{$id}'";
        }
        $sql .= " ORDER BY stuller_id DESC LIMIT 1";
        
        $query = $this->db->query($sql);
        $results = $query->result_array();

        return $results[0];
    }
function qualityRingsDetail($id=0, $searchoption='') {
        
        $sql = "SELECT * FROM dev_qg WHERE 1 = 1"; 
        if( !empty($searchoption) ) {
            $sql .= " AND Item LIKE '{$id}'";
        } else {
            $sql .= " AND qg_id = '{$id}'";
        }
        $query = $this->db->query($sql);
        $return = $query->result_array();

        return $return[0];
    }
////// stuller gold listings
function stullerGoldRings($cateid='', $offset=0, $limit=15, $similar='', $pid='', $metal='', $sort='') {
        
//        $sql = "SELECT * FROM dev_stuller WHERE 1 = 1";
//        if( !empty($cateid) && $cateid != 1 ) {
//            $sql .= " AND MerchandisingCategory1 LIKE '".$cateid."'";
//        }
        $sql = "SELECT * FROM dev_stuller_test WHERE 1 = 1";
        if( !empty($cateid) && $cateid != 1 ) {
            //$sql .= " AND MATCH(stuller_cate) AGAINST('{$cateid}') OR stuller_cate = '{$cateid}'";
            $sql .= " AND stuller_cate = '{$cateid}'";
        }
        if( !empty($pid) && $pid > 0 ) {
            $sql .= " AND stuller_id != '{$pid}'";
        }
        if( !empty($metal) ) {
            $sql .= " AND SearchFilterValue1 = '{$metal}'";
        }
        if( !empty($sort) ) {
            $sql .= " ORDER BY Price $sort";
        }
        //echo $sql;
        
        $count_sql = $this->db->query($sql);
        $return['total'] = $count_sql->num_rows();
        
        $sql .= ( empty($similar) ? " LIMIT $offset, $limit" : " ORDER BY RAND() LIMIT $limit" );
        
        $sqlrings = $this->db->query($sql);
        $return['results'] = $sqlrings->result_array();

        return $return;
    }
////// stuller gold categories
function stullerCategories() {
        
        $sql = "SELECT MerchandisingCategory1 FROM dev_stuller GROUP BY MerchandisingCategory1 ORDER BY MerchandisingCategory1 ASC";
        $cate = $this->db->query($sql);
        $results = $cate->result_array();

        return $results;
    }
    
////// stuller metals
function stullerMetalList($cateid='') {
        
        $sql = "SELECT SearchFilterValue1 metal FROM  dev_stuller_test WHERE SearchFilterName1 = 'Metal Type'";
        
        if( !empty($cateid) && $cateid != 1 ) {
            $sql .= " AND stuller_cate = '{$cateid}'";
        }
        $sql .= " GROUP BY SearchFilterValue1 ORDER BY SearchFilterValue1 ASC";
        
        $cate = $this->db->query($sql);
        $results = $cate->result_array();

        return $results;
    }

/////// quality categories
    function quality_cate($id=0) {
       $results = $this->qualityGoldCateList($id);
       //print_ar($results);
       $cateView = '';
       //$cateView = '<ul>';
       
       foreach ($results as $rowcate) {
           
           $cateView .= '<li><a href="'.SITE_URL.'qualitygold/qgold_cate/'.$rowcate['id'].'">'.$rowcate['title'].'</a>';
           
           $subcate = $this->qualityGoldCateList( $rowcate['id'] );
           if( count($subcate) > 0 ) {
               $cateView .= '<ul>'.$this->quality_cate($rowcate['id']).'</ul>';
           }
           $cateView .= '</li>';
       }
       
       //$cateView .= '</ul>';
      
       return $cateView;
    }    
//// quality gold category list
    function qualityGoldCateList($id=0) {
        $sql     = "SELECT * FROM qgold_categories WHERE pid = '{$id}' ORDER BY title ASC";
        $cate    = $this->db->query($sql);
        $results = $cate->result_array();

        return $results;
    }
    
    //// quality product detail
    function qualityProductDetail($id=0, $search='') {
        $sql = "SELECT * FROM qgold_products WHERE 1 = 1";
        if( !empty($search) ) {
            $sql .= " AND style LIKE '{$id}'";
        } else {
           $sql .= " AND id = '{$id}'"; 
        }
        $sql .= " ORDER BY id DESC LIMIT 1";
        
        $prod    = $this->db->query($sql);
        $results = $prod->result_array();

        return $results[0];
    }
    
    function qualityGoldProdList($cateid='', $offset=0, $limit=15, $metal='', $sort='') {
        
        $sql = "SELECT * FROM qgold_products WHERE 1 = 1";
        $sql .= " AND catid IN ( '{$cateid}' )";
        
        if( !empty( $metal ) ) {
            $sql .= " AND metal = '{$metal}'";
        }
        if( !empty( $sort ) ) {
            $sort_option = ( $sort == 'Name' ? "title ASC" : "price $sort" );
            $sql .= " ORDER BY $sort_option";
        }
        //echo $sql;
        
        $count_sql = $this->db->query($sql);
        $return['total'] = $count_sql->num_rows();
        
        $sql .= " LIMIT $offset, $limit";
        $sqlrings = $this->db->query($sql);
        $return['results'] = $sqlrings->result_array();

        return $return;
    }
    //// get category name
    function getCateName($id) {
       $sql     = "SELECT id, pid, title FROM qgold_categories WHERE id IN ( '{$id}' ) ORDER BY title ASC";
       $prod    = $this->db->query($sql);
       $results = $prod->result_array();

        return $results[0]; 
    }
}