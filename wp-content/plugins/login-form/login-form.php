<?php
    /*
        Plugin Name: Login Form
        Plugin URI: localhost/am1a/index.php?content=login
        Version: 1.0
        Author: Arjan de Ruijter  
        Author URI: localhost/am1a
        Description: Dit is een login form plugin. 
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
    
    
    function login_form_shortcode()
    {
        
        //var_dump($_POST);
        if (isset($_POST["submit"]))
        {
            date_default_timezone_set("Europe/Amsterdam");
            $date = date("Y-m-d H:i:s");
            echo $date;
            global $wpdb;
            /*
            $wpdb->insert("wp_users", array(
                "user_login" => $_POST["firstname"],
                "user_registered" => $date,
                "user_email" => $_POST["email"],
                "user_pass" => MD5($_POST["password"])
            ));
            */
            $wpdb->query(
            $wpdb->prepare("INSERT INTO `wp_users` ( `user_login`,
                                                     `user_registered`,
                                                     `user_email`,
                                                     `user_pass`)
                                        VALUES     ( '%s',
                                                     '%s',
                                                     '%s',
                                                     '%s')",
                                                     $_POST["firstname"],
                                                     $date,
                                                     $_POST["email"],
                                                     MD5($_POST["password"]))
            );
                                                     
            $output = "<p>Mijn naam is: ".$_POST["firstname"]." "
                                         .$_POST["infix"]." "
                                         .$_POST["lastname"]."</p>";
        }
        
        $output .= "<form method='post' action='http://localhost/voorlichtingsavondmboutrecht/index.php/loginform/'>
                        voornaam: <input type='text' name='firstname' >
                        tussenvoegsel: <input type='text' name='infix' >
                        achternaam: <input type='text' name='lastname'>
                        email: <input type='email' name='email' >
                        wachtwoord: <input type='password' name='password' >
                        <input type='submit' name='submit'>";               
        return $output;
    
    }
    
    function login_form_register_shortcode()
    {
        add_shortcode('login-form', 'login_form_shortcode');
    }
    
    add_action('init', 'login_form_register_shortcode');
    
    /*
            [hallo_wereld  firstname="Arjan" infix="de" lastname="Ruijter" picture="panda1.jpg"]
    */
?>