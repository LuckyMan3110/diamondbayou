<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Router extends CI_Router {
  function _set_request($segments = array()) {
    if (isset($segments[0]))
      $segments[0] = str_replace('-','_',$segments[0]);

    if (isset($segments[1])) {
      $segments[1] = str_replace('-','_',$segments[1]);
    }

    return parent::_set_request($segments);
  }
}