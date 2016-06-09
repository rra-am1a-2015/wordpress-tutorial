<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://adruijter.com
 * @since      1.0.0
 *
 * @package    Wp_Table
 * @subpackage Wp_Table/admin/partials
 */
 
 if (isset($_POST['submit']))
 {
     echo "De hexadecimale code van de gekozen kleur is: ".$_POST["color"];
 }
?>


<h3>Instellingen voor de wp_user tabel</h3>
<form action='http://localhost/voorlichtingsavondmboutrecht/wp-admin/options-general.php?page=wp-table' method='post'>
    <table>
        <tr>
            <td>Kies een kleur:</td>
            <td><input type='color' name='color' ></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type='submit' name='submit' ></td>
        </tr>   
</form>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
