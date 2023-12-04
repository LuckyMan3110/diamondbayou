<?php
class Category_list extends CI_Controller {
    function __construct(){
            parent::__construct();
            $this->load->model('jewelrymodel');
            $this->load->model('diamondmodel');
            $this->load->model('engagementmodel');
            $this->load->model('qualitymodel');
            $this->load->helper('ringsection');
            $this->load->model('braceletmodel');
            $this->session->unset_userdata('whsale_section');
            
            $phone_from_admin = get_site_contact_info('contact_info'); 
            define('CONTACT_NO', $phone_from_admin);
    }	
    
    function index(){
        redirect('/');
    }
    
    function make_category_listing($category_listing){
        
        $items          = '';  
        
        foreach($category_listing as $category_item){
            
            $items .= '<div class="category-product-grid category-product-grid-two">
                          <div class="category-product-grid-wrapper">';
            
            foreach($category_item as $item){
                
                $items .= '<article class="category-product-grid-item category-product-grid-item-two category-product-grid-item-two-first hover-link">
                          <a class="category-product" href="'.SITE_URL.$item[0].'">
                            <div class="product-image-wrapper">
                              <img alt="" class="product-image" src="'.SITE_URL.$item[1].'"/>
                              <img alt="" class="product-image hover" src="'.SITE_URL.$item[2].'"/>
                            </div>
                            <header class="category-grid-item-content">
                              <h2>'.$item[3].'</h2>
                              <p class="eyebrow-link">Shop All</p>
                            </header>
                          </a>
                        </article>';
            }
            
            $items .= '</div>
                    </div>';
            
        }  
        
        return $items;
        
    }
    
    
    function carrolls_collections(){
        
        $data           = $this->getCommonData(); 
        $category_array = 
        array(
            array(
                array("collection/carrolls-collection-listing/740520120","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","360 Engagement Rings"),
                array("collection/carrolls-collection-listing/740520129","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Fine Chains")
            ),
            array(
                array("collection/carrolls-collection-listing/740520271","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Fine Pendants"),
                array("collection/carrolls-collection-listing/740520211","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Fine Bracelets")
            ),
            array(
                array("collection/carrolls-collection-listing/740520259","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Fine Earrings"),
                array("collection/carrolls-collection-listing/740520272","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Fine Necklaces")
            )
        );
        
        $data['category_list']      = '<div class="category-product-grid category-product-grid-three-left">
                                            <div class="category-product-grid-wrapper">
                                                <article class="category-product-grid-item category-product-grid-item-two category-product-grid-item-two-large category-product-grid-item-two-large-left hover-link">
                                                    <a class="category-product" href="'.SITE_URL.'collection/carrolls-collection-listing/740520120">
                                                        <div class="product-image-wrapper">
                                                            <img alt="diamonds-img" class="product-image" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1.png" />
                                                            <img alt="diamonds-img-hover" class="product-image hover" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1-hover.png" />
                                                        </div>
                                                        <header class="category-grid-item-content">
                                                            <h2 data-component-attr-id="title">360 Engagement Rings</h2>
                                                            <p data-component-attr-id="subtitle" class="eyebrow-link">Shop All</p>
                                                        </header>
                                                    </a>
                                                </article>
                                    
                                                <article class="category-product-grid-item category-product-grid-item-two category-product-grid-item-two-first hover-link">
                                                    <a class="category-product" href="'.SITE_URL.'store/collection/carrolls-collection-listing/740520129">
                                                        <div class="product-image-wrapper">
                                                            <img alt="diamonds-img" class="product-image" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1.png" />
                                                            <img alt="diamonds-img-hover" class="product-image hover" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1-hover.png" />
                                                        </div>
                                                        <header class="category-grid-item-content">
                                                            <h2 data-component-attr-id="title">Fine Chains</h2>
                                                            <p data-component-attr-id="subtitle" class="eyebrow-link">Shop All</p>
                                                        </header>
                                                    </a>
                                                </article>
                                    
                                                <article class="category-product-grid-item category-product-grid-item-two hover-link">
                                                    <a class="category-product" href="'.SITE_URL.'collection/carrolls-collection-listing/740520271">
                                                        <div class="product-image-wrapper">
                                                            <img alt="diamonds-img" class="product-image" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1.png" />
                                                            <img alt="diamonds-img-hover" class="product-image hover" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1-hover.png" />
                                                        </div>
                                                        <header class="category-grid-item-content">
                                                            <h2 data-component-attr-id="title">Fine Pendants</h2>
                                                            <p data-component-attr-id="subtitle" class="eyebrow-link">Shop All</p>
                                                        </header>
                                                    </a>
                                                </article>
                                            </div>
                                            <!-- .category-product-grid-wrapper -->
                                        </div>
                                        <!-- .category-product-grid -->
                                    
                                        <div class="category-product-grid category-product-grid-three">
                                            <div class="category-product-grid-wrapper">
                                                <!-- first small image component -->
                                                <article class="category-product-grid-item category-product-grid-item-three hover-link">
                                                    <a class="category-product" href="'.SITE_URL.'collection/carrolls-collection-listing/740520211">
                                                        <div class="product-image-wrapper">
                                                            <img alt="diamonds-img" class="product-image" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1.png" />
                                                            <img alt="diamonds-img-hover" class="product-image hover" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1-hover.png" />
                                                        </div>
                                                        <header class="category-grid-item-content">
                                                            <h2 data-component-attr-id="title">Fine Bracelets</h2>
                                                            <p data-component-attr-id="subtitle" class="eyebrow-link">Shop All</p>
                                                        </header>
                                                    </a>
                                                </article>
                                                <!-- second small image component -->
                                                <article class="category-product-grid-item category-product-grid-item-three hover-link">
                                                    <a class="category-product" href="'.SITE_URL.'collection/carrolls-collection-listing/740520259">
                                                        <div class="product-image-wrapper">
                                                            <img alt="diamonds-img" class="product-image" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1.png" />
                                                            <img alt="diamonds-img-hover" class="product-image hover" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1-hover.png" />
                                                        </div>
                                                        <header class="category-grid-item-content">
                                                            <h2 data-component-attr-id="title">Fine Earrings</h2>
                                                            <p data-component-attr-id="subtitle" class="eyebrow-link">Shop All</p>
                                                        </header>
                                                    </a>
                                                </article>
                                                <!-- third small image component -->
                                                <article class="category-product-grid-item category-product-grid-item-three hover-link">
                                                    <a class="category-product" href="'.SITE_URL.'collection/carrolls-collection-listing/740520272">
                                                        <div class="product-image-wrapper">
                                                            <img alt="diamonds-img" class="product-image" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1.png" />
                                                            <img alt="diamonds-img-hover" class="product-image hover" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1-hover.png" />
                                                        </div>
                                                        <header class="category-grid-item-content">
                                                            <h2 data-component-attr-id="title">Fine Necklaces</h2>
                                                            <p data-component-attr-id="subtitle" class="eyebrow-link">Shop All</p>
                                                        </header>
                                                    </a>
                                                </article>
                                            </div>
                                            <!-- .category-product-grid-wrapper -->
                                        </div>
                                        <!-- .category-product-grid -->';
        $data['banner_image']       = '<img src="'.SITE_URL.'images/carrollsjewelers/04-Fine-Jewelry-Banner.jpg" style="max-width: 100%;">';
        $data['banner_subtitle']    = 'Carroll\'s Collections';
        $data['title']              = 'Carroll\'s Collections';
        
        $output = $this->load->view('category-list' , $data , true);
        $this->output($output, $data);	
    }
    
    
    function create_diamonds_rings(){
        
        $data           = $this->getCommonData(); 
        $category_array = array(
                            array(
                                array("diamonds/search/true","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Diamond Search"),
                                array("engagement/search","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Build Your Own Ring")
                            ),
                            array(
                                array("jewelry/build-earings","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Build Your Own Earrings"),
                                array("jewelry/buildiamond-pendant","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Build Your Own Diamond Pendant")
                            ),
                            array(
                                array("jewelry/buildthree-stonesring","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Build Your Own Three-Stone Ring")
                            )
                        );
        
        $data['category_list']      = '<div class="category-product-grid category-product-grid-three-left">
                                            <div class="category-product-grid-wrapper">
                                                <article class="category-product-grid-item category-product-grid-item-two category-product-grid-item-two-large category-product-grid-item-two-large-left hover-link">
                                                    <a class="category-product" href="'.SITE_URL.'diamonds/search/true">
                                                        <div class="product-image-wrapper">
                                                            <img alt="diamonds-img" class="product-image" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1.png" />
                                                            <img alt="diamonds-img-hover" class="product-image hover" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1-hover.png" />
                                                        </div>
                                                        <header class="category-grid-item-content">
                                                            <h2 data-component-attr-id="title">Diamond Search</h2>
                                                            <p data-component-attr-id="subtitle" class="eyebrow-link">Shop All</p>
                                                        </header>
                                                    </a>
                                                </article>
                                    
                                                <article class="category-product-grid-item category-product-grid-item-two category-product-grid-item-two-first hover-link">
                                                    <a class="category-product" href="'.SITE_URL.'engagement/search">
                                                        <div class="product-image-wrapper">
                                                            <img alt="diamonds-img" class="product-image" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1.png" />
                                                            <img alt="diamonds-img-hover" class="product-image hover" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1-hover.png" />
                                                        </div>
                                                        <header class="category-grid-item-content">
                                                            <h2 data-component-attr-id="title">Build Your Own Ring</h2>
                                                            <p data-component-attr-id="subtitle" class="eyebrow-link">Shop All</p>
                                                        </header>
                                                    </a>
                                                </article>
                                    
                                                <article class="category-product-grid-item category-product-grid-item-two hover-link">
                                                    <a class="category-product" href="'.SITE_URL.'jewelry/build-earings">
                                                        <div class="product-image-wrapper">
                                                            <img alt="diamonds-img" class="product-image" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1.png" />
                                                            <img alt="diamonds-img-hover" class="product-image hover" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1-hover.png" />
                                                        </div>
                                                        <header class="category-grid-item-content">
                                                            <h2 data-component-attr-id="title">Build Your Own Earrings</h2>
                                                            <p data-component-attr-id="subtitle" class="eyebrow-link">Shop All</p>
                                                        </header>
                                                    </a>
                                                </article>
                                            </div>
                                            <!-- .category-product-grid-wrapper -->
                                        </div>
                                        <!-- .category-product-grid -->
                                        
                                        <div class="category-product-grid category-product-grid-two">
                                            <div class="category-product-grid-wrapper">
                                                <!-- first image component -->
                                                <article class="category-product-grid-item category-product-grid-item-two category-product-grid-item-two-first hover-link">
                                                    <a class="category-product" href="'.SITE_URL.'jewelry/buildiamond-pendant">
                                                        <div class="product-image-wrapper">
                                                            <img alt="diamonds-img" class="product-image" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1.png" />
                                                            <img alt="diamonds-img-hover" class="product-image hover" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1-hover.png" />
                                                        </div>
                                                        <header class="category-grid-item-content">
                                                            <h2 data-component-attr-id="title">Build Your Own Diamond Pendant</h2>
                                                            <p data-component-attr-id="subtitle" class="eyebrow-link">Shop All</p>
                                                        </header>
                                                    </a>
                                                </article>
                                                <!-- second image component -->
                                                <article class="category-product-grid-item category-product-grid-item-two category-product-grid-item-two-first hover-link">
                                                    <a class="category-product" href="'.SITE_URL.'jewelry/buildthree-stonesring">
                                                        <div class="product-image-wrapper">
                                                            <img alt="diamonds-img" class="product-image" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1.png" />
                                                            <img alt="diamonds-img-hover" class="product-image hover" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1-hover.png" />
                                                        </div>
                                                        <header class="category-grid-item-content">
                                                            <h2 data-component-attr-id="title">Build Your Own Three-Stone Ring</h2>
                                                            <p data-component-attr-id="subtitle" class="eyebrow-link">Shop All</p>
                                                        </header>
                                                    </a>
                                                </article>
                                            </div>
                                        </div>
                                        </div>
                                        <!-- .category-product-grid -->';
                                        
        $data['banner_image']       = '<img src="'.SITE_URL.'images/carrollsjewelers/01-Create-Banner.jpg" style="max-width: 100%;">';
        $data['banner_subtitle']    = 'Create Your Own Ring';
        $data['title']              = 'Create Your Own Ring';
        
        $output = $this->load->view('category-list' , $data , true);
        $this->output($output, $data);	
    }
    
    function diamonds_rings(){
        
        $data                   = $this->getCommonData(); 
        $category_array         = array(
                                    array(
                                        array("store/wedding-bands-mens","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Wedding Bands Mens"),
                                        array("store/wedding-bands-ladies","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Wedding Bands Ladies")
                                    ),
                                    array(
                                        array("store/wedding-bands-platinum","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Wedding Bands platinum"),
                                        array("selection/engagementrings/63","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Half Diamond Wedding Band")
                                    ),
                                    array(
                                        array("selection/engagementrings/69","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Half Diamond Wedding Band Sets"),
                                        array("selection/engagementrings/67","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Eternity Wedding Bands")
                                    )
                                );
        
        $data['category_list']      = '<div class="category-product-grid category-product-grid-three-left">
                                            <div class="category-product-grid-wrapper">
                                                <article class="category-product-grid-item category-product-grid-item-two category-product-grid-item-two-large category-product-grid-item-two-large-left hover-link">
                                                    <a class="category-product" href="'.SITE_URL.'store/wedding-bands-mens">
                                                        <div class="product-image-wrapper">
                                                            <img alt="diamonds-img" class="product-image" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1.png" />
                                                            <img alt="diamonds-img-hover" class="product-image hover" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1-hover.png" />
                                                        </div>
                                                        <header class="category-grid-item-content">
                                                            <h2 data-component-attr-id="title">Wedding Bands Mens</h2>
                                                            <p data-component-attr-id="subtitle" class="eyebrow-link">Shop All</p>
                                                        </header>
                                                    </a>
                                                </article>
                                    
                                                <article class="category-product-grid-item category-product-grid-item-two category-product-grid-item-two-first hover-link">
                                                    <a class="category-product" href="'.SITE_URL.'store/wedding-bands-ladies">
                                                        <div class="product-image-wrapper">
                                                            <img alt="diamonds-img" class="product-image" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1.png" />
                                                            <img alt="diamonds-img-hover" class="product-image hover" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1-hover.png" />
                                                        </div>
                                                        <header class="category-grid-item-content">
                                                            <h2 data-component-attr-id="title">Wedding Bands Ladies</h2>
                                                            <p data-component-attr-id="subtitle" class="eyebrow-link">Shop All</p>
                                                        </header>
                                                    </a>
                                                </article>
                                    
                                                <article class="category-product-grid-item category-product-grid-item-two hover-link">
                                                    <a class="category-product" href="'.SITE_URL.'store/wedding-bands-platinum">
                                                        <div class="product-image-wrapper">
                                                            <img alt="diamonds-img" class="product-image" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1.png" />
                                                            <img alt="diamonds-img-hover" class="product-image hover" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1-hover.png" />
                                                        </div>
                                                        <header class="category-grid-item-content">
                                                            <h2 data-component-attr-id="title">Wedding Bands platinum</h2>
                                                            <p data-component-attr-id="subtitle" class="eyebrow-link">Shop All</p>
                                                        </header>
                                                    </a>
                                                </article>
                                            </div>
                                            <!-- .category-product-grid-wrapper -->
                                        </div>
                                        <!-- .category-product-grid -->
                                    
                                        <div class="category-product-grid category-product-grid-three">
                                            <div class="category-product-grid-wrapper">
                                                <!-- first small image component -->
                                                <article class="category-product-grid-item category-product-grid-item-three hover-link">
                                                    <a class="category-product" href="'.SITE_URL.'selection/engagementrings/63">
                                                        <div class="product-image-wrapper">
                                                            <img alt="diamonds-img" class="product-image" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1.png" />
                                                            <img alt="diamonds-img-hover" class="product-image hover" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1-hover.png" />
                                                        </div>
                                                        <header class="category-grid-item-content">
                                                            <h2 data-component-attr-id="title">Half Diamond Wedding Band</h2>
                                                            <p data-component-attr-id="subtitle" class="eyebrow-link">Shop All</p>
                                                        </header>
                                                    </a>
                                                </article>
                                                <!-- second small image component -->
                                                <article class="category-product-grid-item category-product-grid-item-three hover-link">
                                                    <a class="category-product" href="'.SITE_URL.'selection/engagementrings/69">
                                                        <div class="product-image-wrapper">
                                                            <img alt="diamonds-img" class="product-image" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1.png" />
                                                            <img alt="diamonds-img-hover" class="product-image hover" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1-hover.png" />
                                                        </div>
                                                        <header class="category-grid-item-content">
                                                            <h2 data-component-attr-id="title">Half Diamond Wedding Band Sets</h2>
                                                            <p data-component-attr-id="subtitle" class="eyebrow-link">Shop All</p>
                                                        </header>
                                                    </a>
                                                </article>
                                                <!-- third small image component -->
                                                <article class="category-product-grid-item category-product-grid-item-three hover-link">
                                                    <a class="category-product" href="'.SITE_URL.'selection/engagementrings/67">
                                                        <div class="product-image-wrapper">
                                                            <img alt="diamonds-img" class="product-image" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1.png" />
                                                            <img alt="diamonds-img-hover" class="product-image hover" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1-hover.png" />
                                                        </div>
                                                        <header class="category-grid-item-content">
                                                            <h2 data-component-attr-id="title">Eternity Wedding Bands</h2>
                                                            <p data-component-attr-id="subtitle" class="eyebrow-link">Shop All</p>
                                                        </header>
                                                    </a>
                                                </article>
                                            </div>
                                            <!-- .category-product-grid-wrapper -->
                                        </div>
                                        <!-- .category-product-grid -->';
        $data['banner_image']       = '<img src="'.SITE_URL.'images/carrollsjewelers/diamonds-banner.png" style="max-width: 100%;">';
        $data['banner_subtitle']    = 'Diamond Rings';
        $data['title']              = 'Diamond Rings';
        
        $output = $this->load->view('category-list' , $data , true);
        $this->output($output, $data);	
    }
    
    
    
    function fine_jewelry(){
        
        $data           = $this->getCommonData(); 
        $category_array = 
        array(
            array(
                array("collection/carrolls-collection-listing/740520120","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","360 Engagement Rings"),
                array("collection/carrolls-collection-listing/740520129","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Fine Chains")
            ),
            array(
                array("collection/carrolls-collection-listing/740520271","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Fine Pendants"),
                array("collection/carrolls-collection-listing/740520211","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Fine Bracelets")
            ),
            array(
                array("collection/carrolls-collection-listing/740520259","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Fine Earrings"),
                array("collection/carrolls-collection-listing/740520272","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Fine Necklaces")
            )
        );
        
        $data['category_list']      = '<div class="category-product-grid category-product-grid-three-left">
                                            <div class="category-product-grid-wrapper">
                                                <article class="category-product-grid-item category-product-grid-item-two category-product-grid-item-two-large category-product-grid-item-two-large-left hover-link">
                                                    <a class="category-product" href="'.SITE_URL.'collection/carrolls-collection-listing/740520120">
                                                        <div class="product-image-wrapper">
                                                            <img alt="diamonds-img" class="product-image" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1.png" />
                                                            <img alt="diamonds-img-hover" class="product-image hover" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1-hover.png" />
                                                        </div>
                                                        <header class="category-grid-item-content">
                                                            <h2 data-component-attr-id="title">360 Engagement Rings</h2>
                                                            <p data-component-attr-id="subtitle" class="eyebrow-link">Shop All</p>
                                                        </header>
                                                    </a>
                                                </article>
                                    
                                                <article class="category-product-grid-item category-product-grid-item-two category-product-grid-item-two-first hover-link">
                                                    <a class="category-product" href="'.SITE_URL.'store/collection/carrolls-collection-listing/740520129">
                                                        <div class="product-image-wrapper">
                                                            <img alt="diamonds-img" class="product-image" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1.png" />
                                                            <img alt="diamonds-img-hover" class="product-image hover" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1-hover.png" />
                                                        </div>
                                                        <header class="category-grid-item-content">
                                                            <h2 data-component-attr-id="title">Fine Chains</h2>
                                                            <p data-component-attr-id="subtitle" class="eyebrow-link">Shop All</p>
                                                        </header>
                                                    </a>
                                                </article>
                                    
                                                <article class="category-product-grid-item category-product-grid-item-two hover-link">
                                                    <a class="category-product" href="'.SITE_URL.'collection/carrolls-collection-listing/740520271">
                                                        <div class="product-image-wrapper">
                                                            <img alt="diamonds-img" class="product-image" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1.png" />
                                                            <img alt="diamonds-img-hover" class="product-image hover" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1-hover.png" />
                                                        </div>
                                                        <header class="category-grid-item-content">
                                                            <h2 data-component-attr-id="title">Fine Pendants</h2>
                                                            <p data-component-attr-id="subtitle" class="eyebrow-link">Shop All</p>
                                                        </header>
                                                    </a>
                                                </article>
                                            </div>
                                            <!-- .category-product-grid-wrapper -->
                                        </div>
                                        <!-- .category-product-grid -->
                                    
                                        <div class="category-product-grid category-product-grid-three">
                                            <div class="category-product-grid-wrapper">
                                                <!-- first small image component -->
                                                <article class="category-product-grid-item category-product-grid-item-three hover-link">
                                                    <a class="category-product" href="'.SITE_URL.'collection/carrolls-collection-listing/740520211">
                                                        <div class="product-image-wrapper">
                                                            <img alt="diamonds-img" class="product-image" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1.png" />
                                                            <img alt="diamonds-img-hover" class="product-image hover" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1-hover.png" />
                                                        </div>
                                                        <header class="category-grid-item-content">
                                                            <h2 data-component-attr-id="title">Fine Bracelets</h2>
                                                            <p data-component-attr-id="subtitle" class="eyebrow-link">Shop All</p>
                                                        </header>
                                                    </a>
                                                </article>
                                                <!-- second small image component -->
                                                <article class="category-product-grid-item category-product-grid-item-three hover-link">
                                                    <a class="category-product" href="'.SITE_URL.'collection/carrolls-collection-listing/740520259">
                                                        <div class="product-image-wrapper">
                                                            <img alt="diamonds-img" class="product-image" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1.png" />
                                                            <img alt="diamonds-img-hover" class="product-image hover" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1-hover.png" />
                                                        </div>
                                                        <header class="category-grid-item-content">
                                                            <h2 data-component-attr-id="title">Fine Earrings</h2>
                                                            <p data-component-attr-id="subtitle" class="eyebrow-link">Shop All</p>
                                                        </header>
                                                    </a>
                                                </article>
                                                <!-- third small image component -->
                                                <article class="category-product-grid-item category-product-grid-item-three hover-link">
                                                    <a class="category-product" href="'.SITE_URL.'collection/carrolls-collection-listing/740520272">
                                                        <div class="product-image-wrapper">
                                                            <img alt="diamonds-img" class="product-image" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1.png" />
                                                            <img alt="diamonds-img-hover" class="product-image hover" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1-hover.png" />
                                                        </div>
                                                        <header class="category-grid-item-content">
                                                            <h2 data-component-attr-id="title">Fine Necklaces</h2>
                                                            <p data-component-attr-id="subtitle" class="eyebrow-link">Shop All</p>
                                                        </header>
                                                    </a>
                                                </article>
                                            </div>
                                            <!-- .category-product-grid-wrapper -->
                                        </div>
                                        <!-- .category-product-grid -->';
        $data['banner_image']       = '<img src="'.SITE_URL.'images/carrollsjewelers/04-Fine-Jewelry-Banner.jpg" style="max-width: 100%;">';
        $data['banner_subtitle']    = 'Fine Jewelry';
        $data['title']              = 'Fine Jewelry';
        
        $output = $this->load->view('category-list' , $data , true);
        $this->output($output, $data);	
    }
    
    function bridal_rings(){
        
        $data           = $this->getCommonData(); 
        $category_array = 
        array(
            array(
                array("collection/carrolls-collection-listing/740520120","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","360 Engagement Rings"),
                array("collection/carrolls-collection-listing/740520129","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Fine Chains")
            ),
            array(
                array("collection/carrolls-collection-listing/740520271","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Fine Pendants"),
                array("collection/carrolls-collection-listing/740520211","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Fine Bracelets")
            ),
            array(
                array("collection/carrolls-collection-listing/740520259","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Fine Earrings"),
                array("collection/carrolls-collection-listing/740520272","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Fine Necklaces")
            )
        );
        
        $data['category_list']      = '<div class="category-product-grid category-product-grid-three-left">
                                            <div class="category-product-grid-wrapper">
                                                <article class="category-product-grid-item category-product-grid-item-two category-product-grid-item-two-large category-product-grid-item-two-large-left hover-link">
                                                    <a class="category-product" href="'.SITE_URL.'collection/carrolls-collection-listing/740520120">
                                                        <div class="product-image-wrapper">
                                                            <img alt="diamonds-img" class="product-image" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1.png" />
                                                            <img alt="diamonds-img-hover" class="product-image hover" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1-hover.png" />
                                                        </div>
                                                        <header class="category-grid-item-content">
                                                            <h2 data-component-attr-id="title">360 Engagement Rings</h2>
                                                            <p data-component-attr-id="subtitle" class="eyebrow-link">Shop All</p>
                                                        </header>
                                                    </a>
                                                </article>
                                    
                                                <article class="category-product-grid-item category-product-grid-item-two category-product-grid-item-two-first hover-link">
                                                    <a class="category-product" href="'.SITE_URL.'store/collection/carrolls-collection-listing/740520129">
                                                        <div class="product-image-wrapper">
                                                            <img alt="diamonds-img" class="product-image" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1.png" />
                                                            <img alt="diamonds-img-hover" class="product-image hover" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1-hover.png" />
                                                        </div>
                                                        <header class="category-grid-item-content">
                                                            <h2 data-component-attr-id="title">Fine Chains</h2>
                                                            <p data-component-attr-id="subtitle" class="eyebrow-link">Shop All</p>
                                                        </header>
                                                    </a>
                                                </article>
                                    
                                                <article class="category-product-grid-item category-product-grid-item-two hover-link">
                                                    <a class="category-product" href="'.SITE_URL.'collection/carrolls-collection-listing/740520271">
                                                        <div class="product-image-wrapper">
                                                            <img alt="diamonds-img" class="product-image" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1.png" />
                                                            <img alt="diamonds-img-hover" class="product-image hover" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1-hover.png" />
                                                        </div>
                                                        <header class="category-grid-item-content">
                                                            <h2 data-component-attr-id="title">Fine Pendants</h2>
                                                            <p data-component-attr-id="subtitle" class="eyebrow-link">Shop All</p>
                                                        </header>
                                                    </a>
                                                </article>
                                            </div>
                                            <!-- .category-product-grid-wrapper -->
                                        </div>
                                        <!-- .category-product-grid -->
                                    
                                        <div class="category-product-grid category-product-grid-three">
                                            <div class="category-product-grid-wrapper">
                                                <!-- first small image component -->
                                                <article class="category-product-grid-item category-product-grid-item-three hover-link">
                                                    <a class="category-product" href="'.SITE_URL.'collection/carrolls-collection-listing/740520211">
                                                        <div class="product-image-wrapper">
                                                            <img alt="diamonds-img" class="product-image" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1.png" />
                                                            <img alt="diamonds-img-hover" class="product-image hover" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1-hover.png" />
                                                        </div>
                                                        <header class="category-grid-item-content">
                                                            <h2 data-component-attr-id="title">Fine Bracelets</h2>
                                                            <p data-component-attr-id="subtitle" class="eyebrow-link">Shop All</p>
                                                        </header>
                                                    </a>
                                                </article>
                                                <!-- second small image component -->
                                                <article class="category-product-grid-item category-product-grid-item-three hover-link">
                                                    <a class="category-product" href="'.SITE_URL.'collection/carrolls-collection-listing/740520259">
                                                        <div class="product-image-wrapper">
                                                            <img alt="diamonds-img" class="product-image" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1.png" />
                                                            <img alt="diamonds-img-hover" class="product-image hover" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1-hover.png" />
                                                        </div>
                                                        <header class="category-grid-item-content">
                                                            <h2 data-component-attr-id="title">Fine Earrings</h2>
                                                            <p data-component-attr-id="subtitle" class="eyebrow-link">Shop All</p>
                                                        </header>
                                                    </a>
                                                </article>
                                                <!-- third small image component -->
                                                <article class="category-product-grid-item category-product-grid-item-three hover-link">
                                                    <a class="category-product" href="'.SITE_URL.'collection/carrolls-collection-listing/740520272">
                                                        <div class="product-image-wrapper">
                                                            <img alt="diamonds-img" class="product-image" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1.png" />
                                                            <img alt="diamonds-img-hover" class="product-image hover" src="https://carrollsjewelers.jbetadev.com/images/carrollsjewelers/diamonds-img1-hover.png" />
                                                        </div>
                                                        <header class="category-grid-item-content">
                                                            <h2 data-component-attr-id="title">Fine Necklaces</h2>
                                                            <p data-component-attr-id="subtitle" class="eyebrow-link">Shop All</p>
                                                        </header>
                                                    </a>
                                                </article>
                                            </div>
                                            <!-- .category-product-grid-wrapper -->
                                        </div>
                                        <!-- .category-product-grid -->';
        $data['banner_image']       = '<img src="'.SITE_URL.'images/carrollsjewelers/03-Bridal-Banner.jpg" style="max-width: 100%;">';
        $data['banner_subtitle']    = 'Bridal Rings';
        $data['title']              = 'Bridal Rings';
        
        $output = $this->load->view('category-list' , $data , true);
        $this->output($output, $data);	
    }
    
    
    function estate_rings(){
        
        $data                   = $this->getCommonData(); 
        $category_array         = array(
                                    array(
                                        array("#","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Silver Jewellery"),
                                        array("#","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Silver Jewellery")
                                    ),
                                    array(
                                        array("#","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Silver Jewellery"),
                                        array("#","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Silver Jewellery")
                                    ),
                                    array(
                                        array("#","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Silver Jewellery"),
                                        array("#","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Silver Jewellery")
                                    )
                                );
        
        $data['category_list']      = $this->make_category_listing($category_array);
        $data['banner_image']       = '<img src="'.SITE_URL.'images/carrollsjewelers/05-Estate-Banner.jpg" style="max-width: 100%;">';
        $data['banner_subtitle']    = 'Estate';
        $data['title']              = 'Estate';
        
        $output = $this->load->view('category-list' , $data , true);
        $this->output($output, $data);	
    }
    
    
    function baby_items(){
        
    $data                   = $this->getCommonData(); 
    $category_array         = array(
                                array(
                                    array("#","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Baby Item1"),
                                    array("#","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Baby Item2")
                                ),
                                array(
                                    array("#","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Baby Item3"),
                                    array("#","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Baby Item4")
                                )
                            );
        
        $data['category_list']      = $this->make_category_listing($category_array);
        $data['banner_image']       = '<img src="'.SITE_URL.'images/carrollsjewelers/06-Baby-Items-Banner.jpg" style="max-width: 100%;">';
        $data['banner_subtitle']    = 'Baby Items';
        $data['title']              = 'Baby Items';
        
        $output = $this->load->view('category-list' , $data , true);
        $this->output($output, $data);	
    }
    
    function gift_items(){
        
    $data                   = $this->getCommonData(); 
    $category_array         = array(
                                array(
                                    array("#","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Gifts Item1"),
                                    array("#","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Gifts Item2")
                                ),
                                array(
                                    array("#","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Gifts Item3"),
                                    array("#","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","Gifts Item4")
                                )
                            );
        
        $data['category_list']      = $this->make_category_listing($category_array);
        $data['banner_image']       = '<img src="'.SITE_URL.'images/carrollsjewelers/07-Gifts-Banner.jpg" style="max-width: 100%;">';
        $data['banner_subtitle']    = 'Gifts';
        $data['title']              = 'Gifts Items';
        
        $output = $this->load->view('category-list' , $data , true);
        $this->output($output, $data);	
    }
    
    
    function about_items(){
        
    $data                   = $this->getCommonData(); 
    $category_array         = array(
                                array(
                                    array("#","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","About Item1"),
                                    array("#","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","About Item2")
                                ),
                                array(
                                    array("#","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","About Item3"),
                                    array("#","images/carrollsjewelers/diamonds-img1.png","images/carrollsjewelers/diamonds-img1-hover.png","About Item4")
                                )
                            );
        
        $data['category_list']      = $this->make_category_listing($category_array);
        $data['banner_image']       = '<img src="'.SITE_URL.'images/carrollsjewelers/08-About-Banner.jpg" style="max-width: 100%;">';
        $data['banner_subtitle']    = 'About';
        $data['title']              = 'About';
        
        $output = $this->load->view('category-list' , $data , true);
        $this->output($output, $data);	
    }
    
    
    function item_details(){
        
        $data                           = $this->getCommonData(); 
        $data['title']                  = 'Example Details Page';
        $data['small_header_option']    = 1;
        
        $output = $this->load->view('details' , $data , true);
        $this->output($output, $data);	
    }
    
    
    private function getCommonData($banner=''){
            $this->load->model('commonmodel');
            $data = array();
            $data = $this->commonmodel->getPageCommonData();
            return $data;
    }
    
    function output($layout = null , $data = array() ,$left='', $isleft = true , $isright = true){
            $this->load->model('user');
            $data['loginlink'] = $this->user->loginhtml();
            $output = $this->load->view($this->config->item('template').'header' , $data , true);
      
            $output .= $layout;
            if($isright)$output .= $this->load->view($this->config->item('template').'right' , $data , true);
            $output .= $this->load->view($this->config->item('template').'footer', $data , true);
            $this->output->set_output($output);
    }
  
}