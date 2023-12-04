<!DOCTYPE html>
<html>
    <head>
        <title>Managed Jewelry Sub Category</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo ADMIN_LIB; ?>css/adminstyle.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo ADMIN_LIB; ?>js/jquery-1.12.4.js" type="text/javascript"></script>
        <script>
            var baselink = '<?php echo SITE_URL; ?>';
            function showSubCateList(optionid) {
                //var optionid = $('parentCateList').val();
                
                var url_link = baselink + 'adminjewelry/mainCategoryList/'+optionid+'/options';
                //alert(url_link);
                
                $.ajax({
                type: "POST",
                url: decodeURI(url_link),
                success: function(response) {
                         $("#subcate_options").html(response);
               },
                         error: function(){alert('Error ');}
                    });
            }
            function closeWindow() {
                window.close();
            }
        </script>
    </head>
    <body>
        <div class="main_form_block">
            <h2>Add Jewelry Sub Category</h2><br>
            <div class="submit_msg"><?php echo $submit_form; ?></div>
            
            <div class="categform_block">
                <form name="jewelryform" method="post" action="">
                    <div class="formslabel">Jewelery Category:</div>
                    <div class="formsfield">
                        <select name="cmb_parentcate" id="parentCateList" onchange="showSubCateList(this.value)"><?php echo $options_list; ?></select>
                    </div>
                    <div class="clear"></div>
                    <div class="formslabel">Sub Category:</div>
                    <div class="formsfield">
                        <select name="cmb_subcate" id="subcate_options" onchange=""></select>
                    </div>
                    <div class="clear"></div>
                    <div class="formslabel">Sub Category Name:</div>
                    <div class="formsfield">
                        <input type="text" name="sub_catename" required="" />
                    </div>
                    <div class="clear"></div>
                    <div class="formslabel">&nbsp;</div>
                    <div class="formsfield"><br>
<!--                        <a href="#javascript" onclick="closeWindow()">Close</a>-->
                        <input type="submit" name="btn_submit" value="Add Sub Category" />
                    </div>
                    <div class="clear"></div>
                </form>
                <div class="clear"></div>
            </div>
        </div>
    </body>
</html>
