<?php
    /*
        Plugin Name: Hallo Wereld
        Plugin URI: localhost/am1a/index.php?content=login
        Version: 1.0
        Author: Arjan de Ruijter  
        Author URI: localhost/am1a
        Description: Dit is de meest geweldig plugin die er bestaat en is geheel gratis. 
        License:     GPL2 
        {Plugin Name} is free software: you can redistribute it and/or modify
        it under the terms of the GNU General Public License as published by
        the Free Software Foundation, either version 2 of the License, or
        any later version.
        
        {Plugin Name} is distributed in the hope that it will be useful,
        but WITHOUT ANY WARRANTY; without even the implied warranty of
        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
        GNU General Public License for more details.
        
        You should have received a copy of the GNU General Public License
        along with {Plugin Name}. If not, see {License URI}.   
        License URI: https://www.gnu.org/licenses/gpl-2.0.html 
    */
    
    
    function hallo_world_shortcode($atts)
    {
        $hallo_world_atts = shortcode_atts(array(
            "firstname" => "Harry",
            "infix" => "de",
            "lastname" => "Ruijter",
            "picture" => "panda1"
        ), $atts);
        
        return "Dit is mijn eerste plugin met wordpress. Helemaal zelf gemaakt. <br>
                Mijn naam is ".$hallo_world_atts["firstname"]." ".$hallo_world_atts["infix"]." ".$hallo_world_atts["lastname"]."<br>
                <img class='alignnone size-medium wp-image-34' src='http://localhost/voorlichtingsavondmboutrecht/wp-content/uploads/2016/05/".$hallo_world_atts["picture"]."' />";        
    }
    
    function hallo_world_register_shortcode()
    {
        add_shortcode('hallo_wereld', 'hallo_world_shortcode');
    }
    
    add_action('init', 'hallo_world_register_shortcode');
    
    

?>