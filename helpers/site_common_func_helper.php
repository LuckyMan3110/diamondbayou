<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');


function getAanalytiCodeDyanmicaly($analyticCode='', $heart_cate_id='') {
    $CI = & get_instance();
    $CI->load->model("adminsection_newmodel");
    
    $analytiCode = $CI->adminsection_newmodel->getAnalyticodeViaId($heart_cate_id);
    
    if( !empty($analytiCode) ) {
        $analytic_code = $analytiCode;
    } else if( isset($analyticCode) && !empty($analyticCode) ) {
        $analytic_code = $analyticCode;  /// content pages analytic code
    } else {
        $analytic_code = "(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

                    ga('create', 'UA-97246540-1', 'auto');
                    ga('send', 'pageview');";
    }
    return $analytic_code;
    
}

    function get_earing_measurement($measurement='') {
        $meas = explode('x', $measurement);
        $min_width = $meas[0] - 0.10;
        $max_width = $meas[0] + 0.10;
        $min_length = $meas[1] - 0.10;
        $max_length = $meas[1] + 0.10;

        $return['min_meas'] = $min_width . 'x' . $min_length . 'x' . $meas[2];
        $return['max_meas'] = $max_width . 'x' . $max_length . 'x' . $meas[2];
        
        return $return;
    }
    
