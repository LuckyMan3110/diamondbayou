<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Coverpage extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Coverpagemodel');
	}

	function home_cover() {
		$data['content'] = $this->Coverpagemodel->make_content_page_return('home');

        $output	= $this->load->view($this->config->item('template') .'header_demo', $data, true);
        $output	.= $this->load->view('cover_pages/home_cover', $data, true);
        $output	.= $this->load->view($this->config->item('template') .'footer_demo', $data, true);
        $this->output->set_output($output);
		$this->output->cache(n);
    }

	function loose_diamonds() {
		$data['content'] = $this->Coverpagemodel->make_content_page_return('diamonds');

        $output	= $this->load->view($this->config->item('template') .'header_demo', $data, true);
        $output	.= $this->load->view('cover_pages/loose-diamonds', $data, true);
        $output	.= $this->load->view($this->config->item('template') .'footer_demo', $data, true);
        $this->output->set_output($output);
		$this->output->cache(n);
    }

	function engagement_ring() {
		$data['content'] = $this->Coverpagemodel->make_content_page_return('engagement');

        $output = $this->load->view($this->config->item('template') .'header_demo', $data, true);
        $output .= $this->load->view('cover_pages/engagement-ring', $data, true);
        //$output .= $this->load->view($this->config->item('template') .'footer_demo', $data, true);
        $this->output->set_output($output);
		$this->output->cache(n);
    }

	function wedding_rings() {
		$data['content'] = $this->Coverpagemodel->make_content_page_return('wedding');

        $output = $this->load->view($this->config->item('template') .'header_demo', $data, true);
        $output .= $this->load->view('cover_pages/wedding-rings', $data, true);
        //$output .= $this->load->view($this->config->item('template') .'footer_demo', $data, true);
        $this->output->set_output($output);
		$this->output->cache(n);
    }

	function fine_jewelry() {
		$data['content'] = $this->Coverpagemodel->make_content_page_return('jewelry');

        $output = $this->load->view($this->config->item('template') .'header_demo', $data, true);
        $output .= $this->load->view('cover_pages/fine-jewelry', $data, true);
        //$output .= $this->load->view($this->config->item('template') .'footer_demo', $data, true);
        $this->output->set_output($output);
		$this->output->cache(n);
    }

	function learn() {
		$data['content'] = $this->Coverpagemodel->make_content_page_return('learn');

        $output = $this->load->view($this->config->item('template') .'header_demo', $data, true);
        $output .= $this->load->view('cover_pages/learn', $data, true);
        $output .= $this->load->view($this->config->item('template') .'footer_demo', $data, true);
        $this->output->set_output($output);
		$this->output->cache(n);
    }

	function faq() {
        $output = $this->load->view($this->config->item('template') .'header_demo', $data, true);
      $output .= $this->load->view('cover_pages/faq', $data, true);
        $output .= $this->load->view($this->config->item('template') .'footer_demo', $data, true);
        $this->output->set_output($output);
		$this->output->cache(n);
    }

}