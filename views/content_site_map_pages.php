<style>
.corporate-template .content-area {
    line-height: 24px;
}
@import url('https://fonts.googleapis.com/css?family=Oswald');

body {
 position: relative;
 font-family: 'Oswald', sans-serif;
 background: #111111;
 color: #fff;
 font-size: 20px;
}

.grid {
 list-style: none;
 margin-left: -40px;
}

.gc {
 box-sizing: border-box;
 display: inline-block;
 margin-right: -.25em;
 min-height: 1px;
 padding-left: 40px;
 vertical-align: top;
}

.gc--1-of-3 {
 width: 25%;
}

.gc--2-of-3 {
 width: 75%;
}

.naccs {
 position: relative;
 max-width: 100%;
 margin: 40px auto 0;
}

.naccs .menu div {
 padding: 15px 20px 15px 40px;
 margin-bottom: 1px;
 color: #ffffff;
 background: #141414;
 box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
 cursor: pointer;
 position: relative;
 vertical-align: middle;
 font-weight: 700;
 transition: 1s all cubic-bezier(0.075, 0.82, 0.165, 1);
}

.naccs .menu div:hover {
 box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.naccs .menu div span.light {
 height: 10px;
 width: 10px;
 position: absolute;
 top: 24px;
 left: 15px;
 background-color: #37B1F2;
 border-radius: 100%;
 transition: 1s all cubic-bezier(0.075, 0.82, 0.165, 1);
}

.naccs .menu div.active span.light {
 background-color: #37B1F2;
 left: 0;
 height: 100%;
 width: 3px;
 top: 0;
 border-radius: 0;
}

.naccs .menu div.active {
 color: #37B1F2;
 padding: 15px 20px 15px 20px;
}

ul.nacc {
 position: relative;
 height: 0px;
 list-style: none;
 margin: 0;
 padding: 0;
 transition: .5s all cubic-bezier(0.075, 0.82, 0.165, 1);
}
.corporate-template {
    padding-bottom: 60px;
    padding-top: 60px;
}
ul.nacc li {
 opacity: 0;
 transform: translateX(50px);
 position: absolute;
 list-style: none;
 transition: 1s all cubic-bezier(0.075, 0.82, 0.165, 1);
}

ul.nacc li.active {
 transition-delay: .3s;
 z-index: 2;
 opacity: 1;
 transform: translateX(0px);
}

ul.nacc li p {
 margin: 0;
 font-size: 17px;
}
ul.nacc li a{
 margin: 0;
 font-size: 15px;
 margin-left: 15px;
}
</style>
<section class="corporate-template content">

 <h2>Site Map</h2>

 <div class="naccs">
  <div class="grid">
   <div class="gc gc--1-of-3">
    <div class="menu">
        
        <div class="active"><span class="light"></span><span>Create</span></div>
        <div><span class="light"></span><span>Diamonds</span></div>
        <div><span class="light"></span><span>Bridal</span></div>
        <div><span class="light"></span><span>Fine Jewelry</span></div>
        <div><span class="light"></span><span>Sterling Silver</span></div>
        <div><span class="light"></span><span>Estate</span></div>
        <div><span class="light"></span><span>Jewelry</span></div>
        <div><span class="light"></span><span>Gifts</span></div>
        <div><span class="light"></span><span>Carroll's Items</span></div>
        <div><span class="light"></span><span>About Carroll's</span></div>
        
    </div>
   </div>
   <div class="gc gc--2-of-3">
    <ul class="nacc">
        
    <li class="active">
      <div>
          <p><b>Diamond Engagement Rings</b></p>
          <p><a href="<?php echo SITE_URL?>diamonds/search/true"> Diamond Search</a></p>
          <p><a href="<?php echo SITE_URL?>diamonds/search/true"> Diamond Search</a></p>
          <p><a href="<?php echo SITE_URL?>engagement/search"> Build Your Own Ring</a></p>
          <p><a href="<?php echo SITE_URL?>jewelry/buildthree-stonesring"> Build Your Own Three-Stone Ring</a></p>
          
           <p><b>Diamond Engagement Rings</b></p>
           <p><a href="<?php echo SITE_URL?>diamonds/search/true"> Diamond Search</a></p>
           <p><a href="<?php echo SITE_URL?>engagement/search"> Build Your Own Ring</a></p>
           <p><a href="<?php echo SITE_URL?>jewelry/buildthree-stonesring"> Build Your Own Three-Stone Ring</a></p>
           
            <p><b>Featured Collections</b></p>
            <p><a href="<?php echo SITE_URL?>selection/engagementrings/63"> Eternity Wedding Bands</a></p>
            <p><a href="<?php echo SITE_URL?>selection/engagementrings/52">Solitaire Engagement Rings</a></p>
            <p><a href="<?php echo SITE_URL?>selection/engagementrings/40">Halo Engagement Rings</a></p>
            <p><a href="<?php echo SITE_URL?>selection/engagementrings/9">Semi Mount</a></p>
            <p><a href="<?php echo SITE_URL?>selection/engagementrings/67">Eternity Wedding Bands</a></p>
            <p><a href="<?php echo SITE_URL?>selection/engagement-ring-listings/8">Fancy Engagement Rings</a></p>
            <p><a href="<?php echo SITE_URL?>selection/engagement-ring-listings/39">Antique Engagement Rings</a></p>
            <p><a href="<?php echo SITE_URL?>selection/engagementrings/179">Petite Engagement rings</a></p>
          
      </div>
    </li>    
        
    <li>
      <div>
            <p><b>Search All Diamonds</b></p>  
            <p><a href="<?php echo SITE_URL; ?>diamonds/search/true/B"><img src="<?php echo SITE_URL; ?>images/carrollsjewelers/diamond-icon1.png" style="width:35px;height:auto;padding-right:10px;">Round</a></p>
            <p><a href="<?php echo SITE_URL; ?>diamonds/search/true/O"><img src="<?php echo SITE_URL; ?>images/carrollsjewelers/diamond-icon4.png" style="width:35px;height:auto;padding-right:10px;">Oval</a></p>
            <p><a href="<?php echo SITE_URL; ?>diamonds/search/true/C"><img src="<?php echo SITE_URL; ?>images/carrollsjewelers/diamond-icon3.png" style="width:35px;height:auto;padding-right:10px;">Cushion</a></p>
            <p><a href="<?php echo SITE_URL; ?>diamonds/search/true/PR"><img src="<?php echo SITE_URL; ?>images/carrollsjewelers/diamond-icon2.png" style="width:35px;height:auto;padding-right:10px;">Princess</a></p>
            <p><a href="<?php echo SITE_URL; ?>diamonds/search/true/P"><img src="<?php echo SITE_URL; ?>images/carrollsjewelers/diamond-icon7.png" style="width:35px;height:auto;padding-right:10px;">Pear</a></p>
          
            <p><a href="<?php echo SITE_URL; ?>diamonds/search/true/E"><img src="<?php echo SITE_URL; ?>images/carrollsjewelers/diamond-icon8.png" style="width:35px;height:auto;padding-right:10px;">Emerald</a></p>
            <p><a href="<?php echo SITE_URL; ?>diamonds/search/true/M"><img src="<?php echo SITE_URL; ?>images/carrollsjewelers/diamond-icon10.png" style="width:35px;height:auto;padding-right:10px;">Marquise</a></p>
            <p><a href="<?php echo SITE_URL; ?>diamonds/search/true/AS"><img src="<?php echo SITE_URL; ?>images/carrollsjewelers/diamond-icon5.png" style="width:35px;height:auto;padding-right:10px;">Asscher</a></p>
            <p><a href="<?php echo SITE_URL; ?>diamonds/search/true/R"><img src="<?php echo SITE_URL; ?>images/carrollsjewelers/diamond-icon6.png" style="width:35px;height:auto;padding-right:10px;">Radiant</a></p>
            <p><a href="<?php echo SITE_URL; ?>diamonds/search/true/H"><img src="<?php echo SITE_URL; ?>images/carrollsjewelers/diamond-icon9.png" style="width:35px;height:auto;padding-right:10px;">Heart</a></p>
            
            
            <p><b>Lab Diamond</b></p> 
            <?php
                $get_all_cats = array(740520290);  
                foreach($get_all_cats as $get_all_cats_val){ 
                    
                    $where_dev_main_cat         = array('category_id' => $get_all_cats_val);
                    $dev_main_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_main_cat, 'dev_ebaycategories');   
                                    
                    $where_dev_ring_cat         = array('parent_id' => $get_all_cats_val);
                    $dev_ring_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_ring_cat, 'dev_ebaycategories');   
                    
                    $ring_cat_list = '';
                    foreach($dev_ring_cat_data as $ring_cat_data){
                        if( strpos($ring_cat_data->category_name, 'Silver') !== false OR strpos($ring_cat_data->category_name, 'Estate') !== false OR strpos($ring_cat_data->category_name, 'Gift') !== false){
                        
                        }else{
                            if( $this->catemodel->count_any_table( array('subcategory' => $ring_cat_data->category_id), 'dev_jewelries') > 0 AND $ring_cat_data->category_id == 740520314){
                                $ring_cat_list .= '<p><a href="'.SITE_URL.'collection/carrolls-collection-listing/'.$ring_cat_data->category_id .'/"> '.$ring_cat_data->category_name.' </a></p>';
                            }
                        }
                    }
                
                    echo $collection_cate = ''.$ring_cat_list.''; 
                }
            ?>
            
            <?php
                $get_all_cats = array(740520290);  
                foreach($get_all_cats as $get_all_cats_val){ 
                    
                    $where_dev_main_cat         = array('category_id' => $get_all_cats_val);
                    $dev_main_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_main_cat, 'dev_ebaycategories');   
                                    
                    $where_dev_ring_cat         = array('parent_id' => $get_all_cats_val);
                    $dev_ring_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_ring_cat, 'dev_ebaycategories');   
                    
                    $ring_cat_list = '';
                    foreach($dev_ring_cat_data as $ring_cat_data){
                        if( strpos($ring_cat_data->category_name, 'Silver') !== false OR strpos($ring_cat_data->category_name, 'Estate') !== false OR strpos($ring_cat_data->category_name, 'Gift') !== false){
                        
                        }else{
                            if( $this->catemodel->count_any_table( array('subcategory' => $ring_cat_data->category_id), 'dev_jewelries') > 0  AND $ring_cat_data->category_id != 740520314){
                                $ring_cat_list .= '<p><a href="'.SITE_URL.'collection/carrolls-collection-listing/'.$ring_cat_data->category_id .'/"> '.$ring_cat_data->category_name.' </a></p>';
                            }
                        }
                    }
                
                    echo $collection_cate = '<p><b>'.$dev_main_cat_data['0']->category_name.'</b></p> '.$ring_cat_list.''; 
                }
            ?>
          
      </div>
    </li>
     
    <li>
        <div>
            <p><b>Diamond Engagement Rings</b></p>
            <p><a href="<?php echo SITE_URL; ?>diamonds/search/true"> Diamond Search</a></p>
            <p><a href="<?php echo SITE_URL?>engagement/search"> Build Your Own Ring</a></p>
            <p><a href="<?php echo SITE_URL?>jewelry/build-earings"> Build Your Own Earrings</a></p>
            <p><a href="<?php echo SITE_URL?>jewelry/buildiamond-pendant"> Build Your Own Diamond Pendant</a></p>
            <p><a href="<?php echo SITE_URL?>jewelry/buildthree-stonesring"> Build Your Own Three-Stone Ring</a></p>
            
            <p><b>Shop By Style</b></p>
            <p><a href="<?php echo SITE_URL?>store/wedding-bands-mens"> Diamond Shape Mens</a></p>
            <p><a href="<?php echo SITE_URL?>store/wedding-bands-ladies"> Diamond Shape Ladies</a></p>
            <p><a href="<?php echo SITE_URL?>store/wedding-bands-platinum"> Diamond Shape Platinum</a></p>
            <p><a href="<?php echo SITE_URL?>selection/engagementrings/63"> Eternity Diamond Shape</a></p>
            
            <?php
                $get_all_cats = array(740520294);  
                foreach($get_all_cats as $get_all_cats_val){ 
                    
                    $where_dev_main_cat         = array('category_id' => $get_all_cats_val);
                    $dev_main_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_main_cat, 'dev_ebaycategories');   
                                    
                    $where_dev_ring_cat         = array('parent_id' => $get_all_cats_val);
                    $dev_ring_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_ring_cat, 'dev_ebaycategories');   
                    
                    $ring_cat_list = '';
                    foreach($dev_ring_cat_data as $ring_cat_data){
                        if( strpos($ring_cat_data->category_name, 'Silver') !== false OR strpos($ring_cat_data->category_name, 'Estate') !== false OR strpos($ring_cat_data->category_name, 'Gift') !== false){
                        
                        }else{
                            if( $this->catemodel->count_any_table( array('subcategory' => $ring_cat_data->category_id), 'dev_jewelries') > 0){
                                $ring_cat_list .= '<p><a href="'.SITE_URL.'collection/carrolls-collection-listing/'.$ring_cat_data->category_id .'/"> '.$ring_cat_data->category_name.' </a></p>';
                            }
                        }
                    }
                
                    echo $collection_cate = '<p><b>'.$dev_main_cat_data['0']->category_name.'</b></p>'.$ring_cat_list.''; 
                }
            ?>
            
            <p><b>Diamond Wedding Bands</b></p>
            <p><a href="<?php echo SITE_URL?>selection/engagementrings/63">Half Diamond Wedding Band</a></p>
            
            <?php
                $get_all_cats = array(740520283);  
                foreach($get_all_cats as $get_all_cats_val){ 
                    
                    $where_dev_main_cat         = array('category_id' => $get_all_cats_val);
                    $dev_main_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_main_cat, 'dev_ebaycategories');   
                                    
                    $where_dev_ring_cat         = array('parent_id' => $get_all_cats_val);
                    $dev_ring_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_ring_cat, 'dev_ebaycategories');   
                    
                    $ring_cat_list = '';
                    foreach($dev_ring_cat_data as $ring_cat_data){
                        if( strpos($ring_cat_data->category_name, 'Silver') !== false OR strpos($ring_cat_data->category_name, 'Estate') !== false OR strpos($ring_cat_data->category_name, 'Gift') !== false){
                        
                        }else{
                            if( $this->catemodel->count_any_table( array('subcategory' => $ring_cat_data->category_id), 'dev_jewelries') > 0){
                                $ring_cat_list .= '<p><a href="'.SITE_URL.'collection/carrolls-collection-listing/'.$ring_cat_data->category_id .'/"> '.$ring_cat_data->category_name.' </a></p>';
                            }
                        }
                    }
                
                    echo $collection_cate = '<p><b>'.$dev_main_cat_data['0']->category_name.'</b></p>'.$ring_cat_list.''; 
                }
            ?>
            
            <?php
                $get_all_cats = array(740520287, 740520293);  
                foreach($get_all_cats as $get_all_cats_val){ 
                    
                    $where_dev_main_cat         = array('category_id' => $get_all_cats_val);
                    $dev_main_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_main_cat, 'dev_ebaycategories');   
                                    
                    $where_dev_ring_cat         = array('parent_id' => $get_all_cats_val);
                    $dev_ring_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_ring_cat, 'dev_ebaycategories');   
                    
                    $ring_cat_list = '';
                    foreach($dev_ring_cat_data as $ring_cat_data){
                        if( strpos($ring_cat_data->category_name, 'Silver') !== false OR strpos($ring_cat_data->category_name, 'Estate') !== false OR strpos($ring_cat_data->category_name, 'Gift') !== false){
                        
                        }else{
                            if( $this->catemodel->count_any_table( array('subcategory' => $ring_cat_data->category_id), 'dev_jewelries') > 0){
                                $ring_cat_list .= '<p><a href="'.SITE_URL.'collection/carrolls-collection-listing/'.$ring_cat_data->category_id .'/"> '.$ring_cat_data->category_name.' </a></p>';
                            }
                        }
                    }
                
                    echo $collection_cate = '<p><b>'.$dev_main_cat_data['0']->category_name.'</b></p>'.$ring_cat_list.''; 
                }
            ?>
            
        </div>
    </li>
    
    <li>
        <div>
            <p><b>Diamond Engagement Rings</b></p>
            <p><a href="<?php echo SITE_URL; ?>selection/engagement-ring-listings/192">Fancy Rings</a></p>
            <p><a href="<?php echo SITE_URL?>selection/engagement-ring-listings/201">Color Stone Rings</a></p>
            <p><a href="<?php echo SITE_URL?>selection/engagementrings/57">Pendants</a></p>
            <p><a href="<?php echo SITE_URL?>selection/engagementrings/74">Mens Rings</a></p>
            <?php
                $get_all_cats = array(740520285);  
                foreach($get_all_cats as $get_all_cats_val){ 
                    
                    $where_dev_main_cat         = array('category_id' => $get_all_cats_val);
                    $dev_main_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_main_cat, 'dev_ebaycategories');   
                                    
                    $where_dev_ring_cat         = array('parent_id' => $get_all_cats_val);
                    $dev_ring_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_ring_cat, 'dev_ebaycategories');   
                    
                    $ring_cat_list = '';
                    foreach($dev_ring_cat_data as $ring_cat_data){
                        if( strpos($ring_cat_data->category_name, 'Silver') !== false OR strpos($ring_cat_data->category_name, 'Estate') !== false OR strpos($ring_cat_data->category_name, 'Gift') !== false){
                        
                        }else{
                            if( $this->catemodel->count_any_table( array('subcategory' => $ring_cat_data->category_id), 'dev_jewelries') > 0){
                                $ring_cat_list .= '<p><a href="'.SITE_URL.'collection/carrolls-collection-listing/'.$ring_cat_data->category_id .'/"> '.$ring_cat_data->category_name.' </a></p>';
                            }
                        }
                    }
                
                    echo $collection_cate = '<p><b>'.$dev_main_cat_data['0']->category_name.'</b></p>'.$ring_cat_list.''; 
                }
            ?>
            
            <p><b>Shop By Style</b></p>
            <p><a href="<?php echo SITE_URL?>collection/carrolls-collection-listing/740520129">Chains</a></p>
            <p><a href="<?php echo SITE_URL?>collection/carrolls-collection-listing/740520271">Pendants</a></p>
            <p><a href="<?php echo SITE_URL?>collection/carrolls-collection-listing/740520211">Bracelets</a></p>
            <p><a href="<?php echo SITE_URL?>collection/carrolls-collection-listing/740520259">Earrings</a></p>
            <p><a href="<?php echo SITE_URL?>collection/carrolls-collection-listing/740520272">Necklaces</a></p>
           <?php
                $get_all_cats = array(740520291);  
                foreach($get_all_cats as $get_all_cats_val){ 
                    
                    $where_dev_main_cat         = array('category_id' => $get_all_cats_val);
                    $dev_main_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_main_cat, 'dev_ebaycategories');   
                                    
                    $where_dev_ring_cat         = array('parent_id' => $get_all_cats_val);
                    $dev_ring_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_ring_cat, 'dev_ebaycategories');   
                    
                    $ring_cat_list = '';
                    foreach($dev_ring_cat_data as $ring_cat_data){
                        if( strpos($ring_cat_data->category_name, 'Silver') !== false OR strpos($ring_cat_data->category_name, 'Estate') !== false OR strpos($ring_cat_data->category_name, 'Gift') !== false){
                        
                        }else{
                            if( $this->catemodel->count_any_table( array('subcategory' => $ring_cat_data->category_id), 'dev_jewelries') > 0){
                                $ring_cat_list .= '<p><a href="'.SITE_URL.'collection/carrolls-collection-listing/'.$ring_cat_data->category_id .'/"> '.$ring_cat_data->category_name.' </a></p>';
                            }
                        }
                    }
                
                    echo $collection_cate = '<p><b>'.$dev_main_cat_data['0']->category_name.'</b></p>'.$ring_cat_list.''; 
                }
            ?>
            <p><b>Featured Collections</b></p>
            <p><a href="<?php echo SITE_URL?>store/wedding-bands-mens"> Men's Wedding Bands</a></p>
            <p><a href="<?php echo SITE_URL?>store/wedding-bands-ladies"> Ladies Wedding Band</a></p>
            <p><a href="<?php echo SITE_URL?>store/wedding-bands-platinum"> Exclusive Design Collections</a></p>
            <?php
                $get_all_cats = array(740520289);  
                foreach($get_all_cats as $get_all_cats_val){ 
                    
                    $where_dev_main_cat         = array('category_id' => $get_all_cats_val);
                    $dev_main_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_main_cat, 'dev_ebaycategories');   
                                    
                    $where_dev_ring_cat         = array('parent_id' => $get_all_cats_val);
                    $dev_ring_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_ring_cat, 'dev_ebaycategories');   
                    
                    $ring_cat_list = '';
                    foreach($dev_ring_cat_data as $ring_cat_data){
                        if( strpos($ring_cat_data->category_name, 'Silver') !== false OR strpos($ring_cat_data->category_name, 'Estate') !== false OR strpos($ring_cat_data->category_name, 'Gift') !== false){
                        
                        }else{
                            if( $this->catemodel->count_any_table( array('subcategory' => $ring_cat_data->category_id), 'dev_jewelries') > 0  AND $ring_cat_data->category_id != 740520314){
                                $ring_cat_list .= '<p><a href="'.SITE_URL.'collection/carrolls-collection-listing/'.$ring_cat_data->category_id .'/"> '.$ring_cat_data->category_name.' </a></p>';
                            }
                        }
                    }
                
                    echo $collection_cate = '<p><b>'.$dev_main_cat_data['0']->category_name.'</b></p>'.$ring_cat_list.''; 
                }
            ?>
            <?php
                $get_all_cats = array(740520288);  
                foreach($get_all_cats as $get_all_cats_val){ 
                    
                    $where_dev_main_cat         = array('category_id' => $get_all_cats_val);
                    $dev_main_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_main_cat, 'dev_ebaycategories');   
                                    
                    $where_dev_ring_cat         = array('parent_id' => $get_all_cats_val);
                    $dev_ring_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_ring_cat, 'dev_ebaycategories');   
                    
                    $ring_cat_list = '';
                    foreach($dev_ring_cat_data as $ring_cat_data){
                        if( strpos($ring_cat_data->category_name, 'Silver') !== false OR strpos($ring_cat_data->category_name, 'Estate') !== false OR strpos($ring_cat_data->category_name, 'Gift') !== false){
                        
                        }else{
                            if( $this->catemodel->count_any_table( array('subcategory' => $ring_cat_data->category_id), 'dev_jewelries') > 0){
                                $ring_cat_list .= '<p><a href="'.SITE_URL.'collection/carrolls-collection-listing/'.$ring_cat_data->category_id .'/"> '.$ring_cat_data->category_name.' </a></p>';
                            }
                        }
                    }
                
                    echo $collection_cate = '<p><b>'.$dev_main_cat_data['0']->category_name.'</b></p>'.$ring_cat_list.''; 
                }
            ?>
            <?php
                $get_all_cats = array(740520286);  
                foreach($get_all_cats as $get_all_cats_val){ 
                    
                    $where_dev_main_cat         = array('category_id' => $get_all_cats_val);
                    $dev_main_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_main_cat, 'dev_ebaycategories');   
                                    
                    $where_dev_ring_cat         = array('parent_id' => $get_all_cats_val);
                    $dev_ring_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_ring_cat, 'dev_ebaycategories');   
                    
                    $ring_cat_list = '';
                    foreach($dev_ring_cat_data as $ring_cat_data){
                        if( strpos($ring_cat_data->category_name, 'Silver') !== false OR strpos($ring_cat_data->category_name, 'Estate') !== false OR strpos($ring_cat_data->category_name, 'Gift') !== false){
                        
                        }else{
                            if( $this->catemodel->count_any_table( array('subcategory' => $ring_cat_data->category_id), 'dev_jewelries') > 0){
                                $ring_cat_list .= '<p><a href="'.SITE_URL.'collection/carrolls-collection-listing/'.$ring_cat_data->category_id .'/"> '.$ring_cat_data->category_name.' </a></p>';
                            }
                        }
                    }
                
                    echo $collection_cate = '<p><b>'.$dev_main_cat_data['0']->category_name.'</b></p>'.$ring_cat_list.''; 
                }
            ?>
            
        </div>
    </li>
    
    <li>
        <div>
            <?php
                $get_all_cats = array(740520282, 740520283);  
                foreach($get_all_cats as $get_all_cats_val){ 
                    
                    $where_dev_main_cat         = array('category_id' => $get_all_cats_val);
                    $dev_main_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_main_cat, 'dev_ebaycategories');   
                                    
                    $where_dev_ring_cat         = array('parent_id' => $get_all_cats_val);
                    $dev_ring_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_ring_cat, 'dev_ebaycategories');   
                    
                    $ring_cat_list = '';
                    foreach($dev_ring_cat_data as $ring_cat_data){
                        if( $this->catemodel->count_any_table( array('subcategory' => $ring_cat_data->category_id), 'dev_jewelries') > 0 AND strpos($ring_cat_data->category_name, 'Silver') !== false){
                            $ring_cat_list .= '<p><a href="'.SITE_URL.'collection/carrolls-collection-listing/'.$ring_cat_data->category_id .'/"> '.$ring_cat_data->category_name.' </a></p>';
                        }
                    }
                
                    echo $collection_cate = '<p><b>'.$dev_main_cat_data['0']->category_name.'</b></p>'.$ring_cat_list.''; 
                }
            ?>
            <?php
                $get_all_cats = array(740520285, 740520287);  
                foreach($get_all_cats as $get_all_cats_val){ 
                    
                    $where_dev_main_cat         = array('category_id' => $get_all_cats_val);
                    $dev_main_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_main_cat, 'dev_ebaycategories');   
                                    
                    $where_dev_ring_cat         = array('parent_id' => $get_all_cats_val);
                    $dev_ring_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_ring_cat, 'dev_ebaycategories');   
                    
                    $ring_cat_list = '';
                    foreach($dev_ring_cat_data as $ring_cat_data){
                        if( $this->catemodel->count_any_table( array('subcategory' => $ring_cat_data->category_id), 'dev_jewelries') > 0  AND strpos($ring_cat_data->category_name, 'Silver') !== false){
                            $ring_cat_list .= '<p><a href="'.SITE_URL.'collection/carrolls-collection-listing/'.$ring_cat_data->category_id .'/"> '.$ring_cat_data->category_name.' </a></p>';
                        }
                    }
                
                    echo $collection_cate = '<p><b>'.$dev_main_cat_data['0']->category_name.'</b></p>'.$ring_cat_list.''; 
                }
            ?>
            <?php
                $get_all_cats = array(740520288);  
                foreach($get_all_cats as $get_all_cats_val){ 
                    
                    $where_dev_main_cat         = array('category_id' => $get_all_cats_val);
                    $dev_main_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_main_cat, 'dev_ebaycategories');   
                                    
                    $where_dev_ring_cat         = array('parent_id' => $get_all_cats_val);
                    $dev_ring_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_ring_cat, 'dev_ebaycategories');   
                    
                    $ring_cat_list = '';
                    foreach($dev_ring_cat_data as $ring_cat_data){
                        if( $this->catemodel->count_any_table( array('subcategory' => $ring_cat_data->category_id), 'dev_jewelries') > 0  AND strpos($ring_cat_data->category_name, 'Silver') !== false){
                            $ring_cat_list .= '<p><a href="'.SITE_URL.'collection/carrolls-collection-listing/'.$ring_cat_data->category_id .'/"> '.$ring_cat_data->category_name.' </a></p>';
                        }
                    }
                
                    echo $collection_cate = '<p><b>'.$dev_main_cat_data['0']->category_name.'</b></p>'.$ring_cat_list.''; 
                }
            ?>
            
            <?php
                $get_all_cats = array(740520284);  
                foreach($get_all_cats as $get_all_cats_val){ 
                    
                    $where_dev_main_cat         = array('category_id' => $get_all_cats_val);
                    $dev_main_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_main_cat, 'dev_ebaycategories');   
                                    
                    $where_dev_ring_cat         = array('parent_id' => $get_all_cats_val);
                    $dev_ring_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_ring_cat, 'dev_ebaycategories');   
                    
                    $ring_cat_list = '';
                    $fdsfsdf = 1;
                    foreach($dev_ring_cat_data as $ring_cat_data){
                        if( $this->catemodel->count_any_table( array('subcategory' => $ring_cat_data->category_id), 'dev_jewelries') > 0 AND strpos($ring_cat_data->category_name, 'Silver') !== false AND $ring_cat_data->category_id != '740520374' AND $ring_cat_data->category_id != '740520375' AND $ring_cat_data->category_id != '740520403' AND $ring_cat_data->category_name != 'Test'){
                            if($fdsfsdf == 2){
                                $ring_cat_list .= '<p><a href="'.SITE_URL.'collection/carrolls-collection-listing/'.$ring_cat_data->category_id .'/"> '.$ring_cat_data->category_name.' </a></p>';
                            }
                            $fdsfsdf++;
                        }
                        
                    }
                
                    echo $collection_cate = '<p><b>Baby Items</b></p>'.$ring_cat_list.''; 
                }
            ?>
            <?php
                $get_all_cats = array(740520284);  
                foreach($get_all_cats as $get_all_cats_val){ 
                    
                    $where_dev_main_cat         = array('category_id' => $get_all_cats_val);
                    $dev_main_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_main_cat, 'dev_ebaycategories');   
                                    
                    $where_dev_ring_cat         = array('parent_id' => $get_all_cats_val);
                    $dev_ring_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_ring_cat, 'dev_ebaycategories');   
                    
                    $ring_cat_list = '';
                    foreach($dev_ring_cat_data as $ring_cat_data){
                        if( $this->catemodel->count_any_table( array('subcategory' => $ring_cat_data->category_id), 'dev_jewelries') > 0  AND strpos($ring_cat_data->category_name, 'Silver') !== false AND $ring_cat_data->category_id != '740520375'){
                            $ring_cat_list .= '<p><a href="'.SITE_URL.'collection/carrolls-collection-listing/'.$ring_cat_data->category_id .'/"> '.$ring_cat_data->category_name.' </a></p>';
                        }
                    }
                
                    echo $collection_cate = '<p><b>'.$dev_main_cat_data['0']->category_name.'</b></p>'.$ring_cat_list.''; 
                }
            ?>
        </div>
    </li>
    
    <li>
        <div>
            <?php
                $get_all_cats = array(740520282, 740520283, 740520291);  
                foreach($get_all_cats as $get_all_cats_val){ 
                    
                    $where_dev_main_cat         = array('category_id' => $get_all_cats_val);
                    $dev_main_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_main_cat, 'dev_ebaycategories');   
                                    
                    $where_dev_ring_cat         = array('parent_id' => $get_all_cats_val);
                    $dev_ring_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_ring_cat, 'dev_ebaycategories');   
                    
                    $ring_cat_list = '';
                    foreach($dev_ring_cat_data as $ring_cat_data){
                        
                        if( $this->catemodel->count_any_table( array('subcategory' => $ring_cat_data->category_id), 'dev_jewelries') > 0 AND strpos($ring_cat_data->category_name, 'Estate') !== false){
                            $ring_cat_list .= '<p><a href="'.SITE_URL.'collection/carrolls-collection-listing/'.$ring_cat_data->category_id .'/"> '.$ring_cat_data->category_name.' </a></p>';
                        }
                    }
                
                    echo $collection_cate = '<p><b>'.$dev_main_cat_data['0']->category_name.'</b></p>'.$ring_cat_list.''; 
                }
            ?>
            <?php
                $get_all_cats = array(740520285, 740520287);  
                foreach($get_all_cats as $get_all_cats_val){ 
                    
                    $where_dev_main_cat         = array('category_id' => $get_all_cats_val);
                    $dev_main_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_main_cat, 'dev_ebaycategories');   
                                    
                    $where_dev_ring_cat         = array('parent_id' => $get_all_cats_val);
                    $dev_ring_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_ring_cat, 'dev_ebaycategories');   
                    
                    $ring_cat_list = '';
                    foreach($dev_ring_cat_data as $ring_cat_data){
                        if( $this->catemodel->count_any_table( array('subcategory' => $ring_cat_data->category_id), 'dev_jewelries') > 0 AND strpos($ring_cat_data->category_name, 'Estate') !== false){
                            $ring_cat_list .= '<p><a href="'.SITE_URL.'collection/carrolls-collection-listing/'.$ring_cat_data->category_id .'/"> '.$ring_cat_data->category_name.' </a></p>';
                        }
                    }
                
                    echo $collection_cate = '<p><b>'.$dev_main_cat_data['0']->category_name.'</b></p>'.$ring_cat_list.''; 
                }
            ?>
            <?php
                $get_all_cats = array(740520288, 740520289);  
                foreach($get_all_cats as $get_all_cats_val){ 
                    
                    $where_dev_main_cat         = array('category_id' => $get_all_cats_val);
                    $dev_main_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_main_cat, 'dev_ebaycategories');   
                                    
                    $where_dev_ring_cat         = array('parent_id' => $get_all_cats_val);
                    $dev_ring_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_ring_cat, 'dev_ebaycategories');   
                    
                    $ring_cat_list = '';
                    foreach($dev_ring_cat_data as $ring_cat_data){
                        if( $this->catemodel->count_any_table( array('subcategory' => $ring_cat_data->category_id), 'dev_jewelries') > 0 AND strpos($ring_cat_data->category_name, 'Estate') !== false){
                            $ring_cat_list .= '<p><a href="'.SITE_URL.'collection/carrolls-collection-listing/'.$ring_cat_data->category_id .'/"> '.$ring_cat_data->category_name.' </a></p>';
                        }
                    }
                
                    echo $collection_cate = '<p><b>'.$dev_main_cat_data['0']->category_name.'</b></p>'.$ring_cat_list.''; 
                }
            ?>
            <?php
                $get_all_cats = array(740520284, 740520292, 740520293);  
                foreach($get_all_cats as $get_all_cats_val){ 
                    
                    $where_dev_main_cat         = array('category_id' => $get_all_cats_val);
                    $dev_main_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_main_cat, 'dev_ebaycategories');   
                                    
                    $where_dev_ring_cat         = array('parent_id' => $get_all_cats_val);
                    $dev_ring_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_ring_cat, 'dev_ebaycategories');   
                    
                    $ring_cat_list = '';
                    foreach($dev_ring_cat_data as $ring_cat_data){
                        if( $this->catemodel->count_any_table( array('subcategory' => $ring_cat_data->category_id), 'dev_jewelries') > 0 AND strpos($ring_cat_data->category_name, 'Estate') !== false){
                            $ring_cat_list .= '<p><a href="'.SITE_URL.'collection/carrolls-collection-listing/'.$ring_cat_data->category_id .'/"> '.$ring_cat_data->category_name.' </a></p>';
                        }
                    }
                
                    echo $collection_cate = '<p><b>'.$dev_main_cat_data['0']->category_name.'</b></p>'.$ring_cat_list.''; 
                }
            ?>
        </div>
    </li>
    
    <li>
        <div>
            <?php
                $get_all_cats = array(740520284);  
                foreach($get_all_cats as $get_all_cats_val){ 
                    
                    $where_dev_main_cat         = array('category_id' => $get_all_cats_val);
                    $dev_main_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_main_cat, 'dev_ebaycategories');   
                                    
                    $where_dev_ring_cat         = array('parent_id' => $get_all_cats_val);
                    $dev_ring_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_ring_cat, 'dev_ebaycategories');   
                    
                    $ring_cat_list = '';
                    foreach($dev_ring_cat_data as $ring_cat_data){
                        if( strpos($ring_cat_data->category_name, 'Silver') !== false OR strpos($ring_cat_data->category_name, 'Estate') !== false OR strpos($ring_cat_data->category_name, 'Gift') !== false AND $ring_cat_data->category_id != '740520382'){
                        
                        }else if($ring_cat_data->category_id != '740520382'){
                            if( $this->catemodel->count_any_table( array('subcategory' => $ring_cat_data->category_id), 'dev_jewelries') > 0){
                                $ring_cat_list .= '<p><a href="'.SITE_URL.'collection/carrolls-collection-listing/'.$ring_cat_data->category_id .'/"> '.$ring_cat_data->category_name.' </a></p>';
                            }
                        }
                    }
                
                    echo $collection_cate = '<p><b>'.$dev_main_cat_data['0']->category_name.'</b></p>'.$ring_cat_list.''; 
                }
            ?>
            <?php
                $get_all_cats = array(740520282);  
                foreach($get_all_cats as $get_all_cats_val){ 
                    
                    $where_dev_main_cat         = array('category_id' => $get_all_cats_val);
                    $dev_main_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_main_cat, 'dev_ebaycategories');   
                                    
                    $where_dev_ring_cat         = array('parent_id' => $get_all_cats_val);
                    $dev_ring_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_ring_cat, 'dev_ebaycategories');   
                    
                    $ring_cat_list = '';
                    $incree = 1;
                    foreach($dev_ring_cat_data as $ring_cat_data){
                        if( strpos($ring_cat_data->category_name, 'Silver') !== false OR strpos($ring_cat_data->category_name, 'Estate') !== false OR strpos($ring_cat_data->category_name, 'Gift') !== false){
                        
                        }else{
                            if( $this->catemodel->count_any_table( array('subcategory' => $ring_cat_data->category_id), 'dev_jewelries') > 0 AND $incree < 13){
                                $ring_cat_list .= '<p><a href="'.SITE_URL.'collection/carrolls-collection-listing/'.$ring_cat_data->category_id .'/"> '.$ring_cat_data->category_name.' </a></p>';
                                $incree++;
                            }
                        }   
                    }
                
                    echo $collection_cate = '<p><b>'.$dev_main_cat_data['0']->category_name.'</b></p>'.$ring_cat_list.''; 
                }
            ?>
            <?php
                $get_all_cats = array(740520282);  
                foreach($get_all_cats as $get_all_cats_val){ 
                    
                    $where_dev_main_cat         = array('category_id' => $get_all_cats_val);
                    $dev_main_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_main_cat, 'dev_ebaycategories');   
                                    
                    $where_dev_ring_cat         = array('parent_id' => $get_all_cats_val);
                    $dev_ring_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_ring_cat, 'dev_ebaycategories');   
                    
                    $ring_cat_list = '';
                    $incree = 1;
                    foreach($dev_ring_cat_data as $ring_cat_data){
                        if( strpos($ring_cat_data->category_name, 'Silver') !== false OR strpos($ring_cat_data->category_name, 'Estate') !== false OR strpos($ring_cat_data->category_name, 'Gift') !== false){
                        
                        }else{
                            if( $this->catemodel->count_any_table( array('subcategory' => $ring_cat_data->category_id), 'dev_jewelries') > 0 AND $incree > 13){
                                $ring_cat_list .= '<p><a href="'.SITE_URL.'collection/carrolls-collection-listing/'.$ring_cat_data->category_id .'/"> '.$ring_cat_data->category_name.' </a></p>';
                                
                            }
                            $incree++;
                        }   
                    }
                
                    echo $collection_cate = ''.$ring_cat_list.''; 
                }
            ?>
        </div>
    </li>
    
    <li>
        <div>
            <?php
                $get_all_cats = array(740520284);  
                foreach($get_all_cats as $get_all_cats_val){ 
                    
                    $where_dev_main_cat         = array('category_id' => $get_all_cats_val);
                    $dev_main_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_main_cat, 'dev_ebaycategories');   
                                    
                    $where_dev_ring_cat         = array('parent_id' => $get_all_cats_val);
                    $dev_ring_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_ring_cat, 'dev_ebaycategories');   
                    
                    $ring_cat_list = '';
                    foreach($dev_ring_cat_data as $ring_cat_data){
                        if( $this->catemodel->count_any_table( array('subcategory' => $ring_cat_data->category_id), 'dev_jewelries') > 0 AND strpos($ring_cat_data->category_name, 'Gift') !== false){

                            $category_name   =  str_replace('Porcelan', 'Porcelain', $ring_cat_data->category_name);

                            $ring_cat_list .= '<p><a href="'.SITE_URL.'collection/carrolls-collection-listing/'.$ring_cat_data->category_id .'/"> '.$category_name.' </a></p>';
                        }
                    }
                
                    echo $collection_cate = '<p><b>Gift</b></p>'.$ring_cat_list.''; 
                }
            ?>
            <?php
                $get_all_cats = array(740520284);  
                foreach($get_all_cats as $get_all_cats_val){ 
                    
                    $where_dev_main_cat         = array('category_id' => $get_all_cats_val);
                    $dev_main_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_main_cat, 'dev_ebaycategories');   
                                    
                    $where_dev_ring_cat         = array('parent_id' => $get_all_cats_val);
                    $dev_ring_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_ring_cat, 'dev_ebaycategories');   
                    
                    $ring_cat_list = '';
                    foreach($dev_ring_cat_data as $ring_cat_data){
                        if( $this->catemodel->count_any_table( array('subcategory' => $ring_cat_data->category_id), 'dev_jewelries') > 0 AND strpos($ring_cat_data->category_name, 'Gift') !== false  AND strpos($ring_cat_data->category_name, 'Silver') !== false AND $ring_cat_data->category_id != '740520374' AND $ring_cat_data->category_id != '740520375' AND $ring_cat_data->category_id != '740520403' AND $ring_cat_data->category_name != 'Test'){
                            $ring_cat_list .= '<p><a href="'.SITE_URL.'collection/carrolls-collection-listing/'.$ring_cat_data->category_id .'/"> '.$ring_cat_data->category_name.' </a></p>';
                        }
                    }
                
                    echo $collection_cate = '<p><b>Baby Items</b></p>'.$ring_cat_list.''; 
                }
            ?>
        </div>
    </li>
    
    <li>
        <div>
            <?php
                $get_all_cats = array(740520282, 740520285, 740520286, 740520287, 740520288, 740520289, 740520284, 740520290, 740520291, 740520283, 740520292, 740520293, 740520294);  
                foreach($get_all_cats as $get_all_cats_val){ 
                    
                    $where_dev_main_cat         = array('category_id' => $get_all_cats_val);
                    $dev_main_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_main_cat, 'dev_ebaycategories');   
                                    
                    $where_dev_ring_cat         = array('parent_id' => $get_all_cats_val);
                    $dev_ring_cat_data          = $this->catemodel->getdata_any_table_where($where_dev_ring_cat, 'dev_ebaycategories');   
                    
                    $ring_cat_list = '';
                    foreach($dev_ring_cat_data as $ring_cat_data){
                        if( $this->catemodel->count_any_table( array('subcategory' => $ring_cat_data->category_id), 'dev_jewelries') > 0){
                            $ring_cat_list .= '<p><a href="'.SITE_URL.'collection/carrolls-collection-listing/'.$ring_cat_data->category_id .'/"> '.$ring_cat_data->category_name.' </a></p>';
                        }
                    }
                
                    echo $collection_cate = '<p><b>'.$dev_main_cat_data['0']->category_name.'</b></p>'.$ring_cat_list.''; 
                }
            ?>
        </div>
    </li>
    
    <li>
        <div>
            <p><b>May We Help You?</b></p>
                <p><a href="<?php echo SITE_URL?>payment-billing">Payment &amp; Billing</a></p>
                <p><a href="<?php echo SITE_URL?>privacy-cookies">Privacy Policy</a></p>
                <p><a href="<?php echo SITE_URL?>return-and-exchanges">Return Policy</a></p>
            
            <p><b>The Company</b></p>
                <p><a href="<?php echo SITE_URL?>terms-and-conditions">Terms and Conditions</a></p>
                <p><a href="<?php echo SITE_URL?>faqs">F.A.Q.</a></p>
                <p><a href="<?php echo SITE_URL?>shipping-services">Shipping</a></p>
                <p><a href="<?php echo SITE_URL?>promotions">Promotions</a></p>
            
        </div>
    </li>
        
        
    </ul>
   </div>
  </div>
 </div>

<script>
// Acc
$(document).on("click", ".naccs .menu div", function() {
	var numberIndex = $(this).index();

	if (!$(this).is("active")) {
		$(".naccs .menu div").removeClass("active");
		$(".naccs ul li").removeClass("active");

		$(this).addClass("active");
		$(".naccs ul").find("li:eq(" + numberIndex + ")").addClass("active");

		var listItemHeight = $(".naccs ul")
			.find("li:eq(" + numberIndex + ")")
			.innerHeight();
		$(".naccs ul").height(listItemHeight + "px");
	}
});

</script>
	
	
	
</section>
