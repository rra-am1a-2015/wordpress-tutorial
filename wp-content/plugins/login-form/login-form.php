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
    ob_start();
    
    function login_form_shortcode()
    {
        
        //var_dump($_POST);
        global $wpdb;
        
        if (isset($_GET["id"]))
        {
            if ($_GET['action'] == "delete")
            {
                $wpdb->query(
                    $wpdb->prepare("DELETE FROM `wp_users` WHERE `id` = '%d'", $_GET["id"])               
                );
                wp_redirect("http://localhost/voorlichtingsavondmboutrecht/index.php/loginform/");
            }
            elseif ($_GET["action"] == "update") 
            {
                echo "Updaten maar..............";
                $result =  $wpdb->get_results(
                                $wpdb->prepare("SELECT * FROM `wp_users` WHERE `id` = '%d'", $_GET["id"]), ARRAY_A            
                          );                         
                //var_dump($result);
                $record = array_shift($result);
                //var_dump($record);
                
                $output = "";
                $output .= "<form action='http://localhost/voorlichtingsavondmboutrecht/index.php/loginform?id=".$_GET['id']."&action=write' method='post'>
                                <table>
                                    <tr>
                                        <td style='width:200px'>User Login:</td>
                                        <td><input type='text' name='user_login' value='".$record["user_login"]."' ></td>
                                    </tr>
                                    <tr>
                                        <td>User Nice Name:</td>
                                        <td><input type='text' name='user_nicename' value='".$record["user_nicename"]."' ></td>
                                    </tr>
                                    <tr>
                                        <td>User E-mail:</td>
                                        <td><input type='text' name='user_email' value='".$record["user_email"]."' ></td>
                                    </tr>
                                    <tr>
                                        <td>User Registered:</td>
                                        <td><input type='text' name='user_registered' value='".$record["user_registered"]."' ></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><input type='submit' name='updateSubmit' ></td>
                                    </tr>                                    
                                </table>       
                            </form>";                            
                echo $output;                
            }
            elseif ($_GET["action"] == "write" && isset($_POST["updateSubmit"]))
            {
                $wpdb->query(
                    $wpdb->prepare(
                        "UPDATE `wp_users` SET `user_login` = '%s',
                                               `user_nicename` = '%s',
                                               `user_email` = '%s',
                                               `user_registered` = '%s'
                                               WHERE `ID` = '%d'",
                        $_POST['user_login'],
                        $_POST['user_nicename'],
                        $_POST['user_email'],
                        $_POST['user_registered'],
                        $_GET['id']
                    )                    
                );
                wp_redirect("http://localhost/voorlichtingsavondmboutrecht/index.php/loginform");
            }          
        }
        
        if (isset($_POST["submit"]))
        {
            date_default_timezone_set("Europe/Amsterdam");
            $date = date("Y-m-d H:i:s");
            echo $date;
            
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
        
        $result = $wpdb->get_results("SELECT `ID`, `user_login`, `user_email` FROM `wp_users`", ARRAY_A);
        
         
        //var_dump($result);
        echo "<table>
                <tr>
                    <th style='width: 50px;'>ID</th>
                    <th>User Login</th>
                    <th style='width: 400px;'>User Email</th>
                    <th style='width: 50px;'></th>
                    <th style='width: 50px;'></th>
                </tr>";
        for ($i = 0; $i < sizeof($result); $i++)
        {
            echo "<tr>
                       <td>".$result[$i]["ID"]."</td>
                       <td>".$result[$i]["user_login"]."</td>
                       <td>".$result[$i]["user_email"]."</td>
                       <td>
                           <a href='http://localhost/voorlichtingsavondmboutrecht/index.php/loginform?id=".$result[$i]["ID"]."&action=delete'>
                               <img src='http://localhost/voorlichtingsavondmboutrecht/wp-content/themes/twentysixteen/images/b_drop.png' alt='kruis'>
                           </a>
                       </td>
                       <td>
                           <a href='http://localhost/voorlichtingsavondmboutrecht/index.php/loginform?id=".$result[$i]["ID"]."&action=update'>
                               <img src='http://localhost/voorlichtingsavondmboutrecht/wp-content/themes/twentysixteen/images/b_edit.png' alt='kruis'>
                           </a>
                       </td>              
                  </tr>";            
        }
        echo "</table>";
            
        
        
        $output1 .= "<form method='post' action='http://localhost/voorlichtingsavondmboutrecht/index.php/loginform/'>
                        voornaam: <input type='text' name='firstname' >
                        tussenvoegsel: <input type='text' name='infix' >
                        achternaam: <input type='text' name='lastname'>
                        email: <input type='email' name='email' >
                        wachtwoord: <input type='password' name='password' >
                        <input type='submit' name='submit'>";               
        return $output1;
    
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