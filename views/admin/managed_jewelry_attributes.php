<!DOCTYPE html>
<html>
    <head>
        <title>Managed Jewelry Attributes</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo ADMIN_LIB; ?>css/adminstyle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ADMIN_LIB; ?>css/admin.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo ADMIN_LIB; ?>js/jquery-1.12.4.js" type="text/javascript"></script>
        <script>
            var baselink = '<?php echo SITE_URL; ?>';
            function showSubCateList(optionid, option_box) {
                //var optionid = $('parentCateList').val();
                
                var url_link = baselink + 'adminjewelry/mainCategoryList/'+optionid+'/options';
                //alert(url_link);
                
                $.ajax({
                type: "POST",
                url: decodeURI(url_link),
                success: function(response) {
                         $("#" + option_box).html(response);
               },
                         error: function(){alert('Error ');}
                    });
            }
            //// show attribute list
            function showAttributeList(optionid) {
                //var optionid = $('parentCateList').val();
                
                var url_link = baselink + 'adminsection/getAttributeList/'+optionid;
                //alert(url_link);
                $("#show_attribute_list").html("<tr><td colspan='6'>Loading attribute list plz wait......</td></tr>");
                
                $.ajax({
                type: "POST",
                url: decodeURI(url_link),
                success: function(response) {
                         $("#show_attribute_list").html(response);
               },
                         error: function(){alert('Error ');}
                    });
            }
            function closeWindow() {
                window.close();
            }
            function confirmRecord(id, sub_category_id) {
                if( confirm('Are you want to delete this recrod!') ) {
                    window.location = '<?php echo SITE_URL; ?>adminsection/manageRingAttribute/false/' + id + '/delete/'+sub_category_id;
                }
            }
            
            /// submit form
            function submit_form(global_btn) {
                $('#global_attr').val( global_btn );
                
                if( global_btn == 'category' ) {
                    if( $('#parentCateList').val() == '' ) {
                        alert('Plz select Jewelry Category!');
                        $('#parentCateList').focus();
                        return false;
                    }
                    if( $('#parent_sub_cate').val() == '' ) {
                        alert('Plz Select Parent Sub Category!');
                        $('#parent_sub_cate').focus();
                        return false;
                    }
                    if( $('#subcate_options').val() == '' ) {
                        alert('Plz Select Sub Category!');
                        $('#subcate_options').focus();
                        return false;
                    }
                }
                
                if( $('#attribute_name').val( ) == '' ) {
                        alert('Plz Enter The attriubute Title!');
                        $('#attribute_name').focus();
                        return false;
                    }
                
                document.getElementById('jewelryform').submit();
            }
        </script>
        <style>
            .main_form_block{width: 700px !important; margin-bottom: 20px; padding-bottom: 20px;}
            body{background: #fff !important;}
            .orderdt_block{width: 100% !important;}
        </style>
    </head>
    <body>
        <div class="main_form_block">
            <h2>Managed Jewelry Attributes</h2><br>
            <div class="submit_msg"><?php echo $submit_form; ?></div>
            
            <div class="categform_block">
                <form name="jewelryform" id="jewelryform" method="post" action="">
                    <div class="formslabel">Jewelery Category:</div>
                    <div class="formsfield">
                        <?php
                        if( !empty($jewelry_category) ) {
                            echo $jewelry_category;
                        } else {
                            
                        ?>
                        <select name="cmb_parentcate" id="parentCateList" onchange="showSubCateList(this.value, 'parent_sub_cate')"><?php echo $options_list; ?>
                        </select>
                        <?php } ?>
                    </div>
                    <div class="clear"></div>
                    <div class="formslabel">Parent Sub Category:</div>
                    <div class="formsfield">
                        <?php
                        if( !empty($parent_sub_cate) ) {
                            echo $parent_sub_cate;
                        } else {
                            
                        ?>
                        <select name="parent_sub_cate" id="parent_sub_cate" onchange="showSubCateList(this.value, 'subcate_options')"></select>
                        <?php } ?>
                    </div>
                    <div class="clear"></div>
                    <div class="formslabel">Sub Category:</div>
                    <div class="formsfield">
                        <?php
                        if( !empty($sub_category) ) {
                            echo $sub_category;
                        } else {
                            
                        ?>
                        <select name="subcate_options" id="subcate_options" onchange="showAttributeList(this.value)"></select>
                        <?php } ?>
                    </div>
                    <div class="clear"></div>
                    <div class="formslabel">Attribute Title:</div>
                    <div class="formsfield">
                        <input type="text" name="attribute_name" id="attribute_name" value="<?php echo $attribute_name; ?>" required="" />
                    </div>
                    <div class="clear"></div>
                    <div class="formslabel">&nbsp;</div>
                    <div class="formsfield"><br>
                        <!-- <a href="#javascript" onclick="closeWindow()">Close</a>-->
                        <input type="hidden" name="txt_id" value="<?php echo $attriubte_id; ?>" />
                        <input type="hidden" name="btn_submit" value="submitform" />
                        <input type="hidden" name="global_attr" id="global_attr" value="" />
                        
                        <a href="#javascript" onclick="submit_form('category')" class="button_style"><?php echo $button_label; ?></a>
                        <a href="#javascript" onclick="submit_form('global')" class="button_style"><?php echo $global_button; ?></a>
                        
<!--                        <input type="submit" name="btn_submit" value="<?php echo $button_label; ?>" />
                        <input type="submit" name="global_submit" value="<?php echo $global_button; ?>" />-->
                        
                    </div>
                    <div class="clear"></div>
                </form>
                <div class="clear"></div><br>
                <div class=""><a href="<?php echo SITE_URL; ?>adminsection/manageRingAttribute">View All Attribute</a></div><br>
                <div class="orderdt_block">
                    <table class="attribute_list">
                        <thead>
                        <tr>
                            <th>Sr#</th>
                            <th>Jewelry Category</th>
                            <th>Parent Sub Cate.</th>
                            <th>Sub Category</th>
                            <th>Attribute Title</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="show_attribute_list">
                            <?php echo $attribute_list; ?>
                        </tbody>
                    </table>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </body>
</html>
