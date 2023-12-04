<link href="<?php echo ADMIN_LIB; ?>css/light_box_style.css" rel="stylesheet" type="text/css" />
<style>
    a.close {
        color: red !important;
        opacity: 0.6 !important;
    }
    a.close:hover {
        color: red !important;
        opacity: 1 !important;
    }
</style>
<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel">
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
    <div class="pull-left breadcrumb_admin clear_both">
      <div class="pull-left page_title theme_color">
        <h1><a href="<?php echo SITE_URL; ?>admin">Admin</a></h1>
        <h2 class="">Website Theme</h2>
      </div>
      <!--<div class="pull-right">
        <ol class="breadcrumb">
          <li><a href="<?php echo SITE_URL; ?>admin">Home</a></li>
          <li>Profile Settings</li>
        </ol>
      </div>-->
    </div>
    <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->
        <div class="page-content">
            <?php
            $snaplist_view = array(
                'demo_jewelercart' => array('name'=>'Jewelercart 5.0', 'link'=>'http://demo.jewelercart.com/'),
                'it_shot' => array('name'=>'IT SHOT', 'link'=>'http://www.itshot.com/'), 
                'sheona_diamond' => array('name'=>'Shenoa Diamonds', 'link'=>'http://www.shenoadiamonds.com/'), 
                'trax_nyc' => array('name'=>'TRAXNYC', 'link'=>'http://www.traxnyc.com/'), 
                'avianneandco_view' => array('name'=>'Avianne AND CO', 'link'=>'http://www.avianneandco.com/'),
                'lioridiamonds_site' => array('name'=>'Liori Diamonds', 'link'=>'http://www.lioridiamonds.com'),
                'kay_site' => array('name'=>'Kay Jewelers', 'link'=>'http://www.kay.com/'), 
                'zales_site' => array('name'=>'ZALES', 'link'=>'http://www.zales.com/'), 
                'jared_site' => array('name'=>'JARED', 'link'=>'http://www.jared.com/'),
                'bluenile_site' => array('name'=>'Bluenile', 'link'=>'http://www.bluenile.com/'), 
                'jamesallen_site' => array('name'=>'Jamesallen', 'link'=>'http://www.jamesallen.com/'), 
                'uniondiamond_site' => array('name'=>'Union Diamond', 'link'=>'https://www.uniondiamond.com/'),
                'whiteflash_site' => array('name'=>'White Flash', 'link'=>'http://www.whiteflash.com/'), 
                'briangavin_site' => array('name'=>'Brian Gavin Diamonds', 'link'=>'http://www.briangavindiamonds.com/'),
                'davidyurman_site' => array('name'=>'David Yurman', 'link'=>'http://www.davidyurman.com/'), 
                'jacobandco_site' => array('name'=>'Jacob and CO', 'link'=>'http://jacobandco.com/'), 
                'leonmege_site' => array('name'=>'Leon MEGE', 'link'=>'https://www.leonmege.com/'), 
                'martinkatz_site' => array('name'=>'Martin Katz', 'link'=>'http://martinkatz.com/'),
                'tiffany_site' => array('name'=>'Tiffany and CO', 'link'=>'http://www.tiffany.com'), 
                'brilliantearth_site' => array('name'=>'Brilliant Earth', 'link'=>'http://www.brilliantearth.com') );
                
                $snaplist = array(
                    'Jewelercart 5.0' => array('demo_jewelercart'),
                    'Theme 1: Modern Mega Store' => array('it_shot', 'sheona_diamond', 'trax_nyc', 'avianneandco_view', 'lioridiamonds_site'),
                    'Theme 2: Traditional Department Store' => array('kay_site', 'zales_site', 'jared_site' ),
                    'Theme 3: Classic' => array('bluenile_site', 'jamesallen_site', 'uniondiamond_site', 'brilliantearth_site' ),
                    'Theme 4: Streamline retailer' => array('whiteflash_site', 'briangavin_site' ),
                    'Theme 5: Branded Theme Based around your Name' => array('davidyurman_site', 'jacobandco_site', 'leonmege_site', 'martinkatz_site' ),
                    'Theme 6: Sophisticated' => array('tiffany_site' )
                    );
                
                $theme_content = '';
                $i = 1;
                //print_ar($snaplist);
                
                foreach( $snaplist as $theme_title => $theme_img ) {
                    $theme_content .= '<div class="theme_content">';
                    if( $i == 1 ) {
                        $theme_content .= '<h3>Step 1</h3>';
                        $theme_content .= '<h3>' . $theme_title . '</h3><br>';
                    } else if( $i == 2 ) {                         
                        $theme_content .= '<br><br><h3>Step 2 = Design Inspirations</h3>';
                        $theme_content .= '<h3>' . $theme_title . '</h3><br>';
                    } else {
                        $theme_content .= '<br><br><h3>' . $theme_title . '</h3><br>';
                    }
                    
                    $r = 1;
                    foreach( $theme_img as $themeimg ) {
                        $themeImage = ADMIN_LIB.'temp/' . $themeimg . '.jpg';
                        $theme_content .= '<div class="snap_block">
                           <a href="#javascript;" id="' . $r . '" data-modal-id="' . $themeimg . '" onClick="setContenClass()"><img src="' . $themeImage . '" alt="'.$themeimg.'" /></a>
                               <br><span>'.$r.'</span>';
                        if( $i > 1 ) {
                        $theme_content .= '<br><span>1/4 = 25 hrs<br>
                                    1/2 = 50 hrs<br>
                                    3/4 = 75 hrs<br>
                                    whole = 100 hrs</span>';
                        }
                        
                        $theme_content .= '</div>';
                        
                        $r++;
                    } /// end inner foreach loop
                    
                    $theme_content .= '<div class="clear"></div>';
                    $theme_content .= '</div>';
                    $theme_content .= '<div class="clear"></div><br><br>';
                    
                    $i++;
                }
                
                echo $theme_content;
                
                ?>
         </div>
</section>
<?php
$popup_view = '';
    foreach( $snaplist_view as $snapimg => $viewtheme ) {
        $snap_img = ADMIN_LIB.'temp/' . $snapimg . '.jpg';
        $popup_view .= '<div id="' . $snapimg . '" class="modal-box">
                        <header> <a href="#" class="js-modal-close close">X</a>
                          <h3><a href="'.$viewtheme['link'].'" target="_blank">'.$viewtheme['name'].'</a></h3>
                        </header>
                        <div class="modal-body">
                        <div><span class="theme_title"></span>: '.$viewtheme['name'].'</div>
                        <div>URL: <a href="'.$viewtheme['link'].'" target="_blank">'.$viewtheme['link'].'</a></div><br>
                        <div><center><img src="' . $snap_img . '" width="800px" alt="' . $snapimg . '" /></center></div>                          
                        </div>
                      </div>';
    }
        echo $popup_view;
        
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    function setContenClass() {
        $(".page-content").addClass('modal_outside');
    }
$(function(){

var appendthis =  ("<div class='modal-overlay js-modal-close'></div>");

	$('a[data-modal-id]').click(function(e) {
		e.preventDefault();
    $("body").append(appendthis);
    $(".modal-overlay").fadeTo(500, 0.7);
    //$(".js-modalbox").fadeIn(500);
		var modalBox = $(this).attr('data-modal-id');
		var tid = $(this).attr('id');
		$('#'+modalBox).fadeIn($(this).data());
		$('#'+modalBox+' .theme_title').html('Theme '+tid);
	});  
  
  
$(".js-modal-close, .modal-overlay, .modal-box, .modal_outside").click(function() {
    $(".modal-box, .modal-overlay").fadeOut(500, function() {
        $(".modal-overlay").remove();
        $(".page-content").removeClass('modal_outside');
    });
});
    
$(window).resize(function() {
    $(".modal-box").css({
        top: '90px',
        left: 'auto'
    });
});
 
$(window).resize();
 
});
</script>


            <div class="row">
                
            </div>
          <!--/row-->
        </div>
      </div>
      <!--\\\\\\\ container  end \\\\\\-->
  </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<?php echo popupsOtherBlockData(); ?>