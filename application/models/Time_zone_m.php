<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Time_zone_m extends CI_Model {
	function __construct()
     {
         // Call the Model constructor
         parent::__construct();
         $this->db->query("SET time_zone='+7:00'");
     }
}
