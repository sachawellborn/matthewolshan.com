<?php
		/*
		Plugin Name: Bulk Remove Pending Comments
		Plugin URI: https://www.supremo.tv/insights/wordpress-plugin-bulk-remove-comments
		Description: Simple plugin to remove any pending comments from your database
		Author: Mike Strand
		Version: 2
		Author URI: https://www.supremo.tv
		*/
		
function brc_admin() { 

	global $wpdb;

	$com_number = $wpdb->query("SELECT comment_ID FROM $wpdb->comments WHERE comment_approved = '0'");

	
	if($_POST['brc_hidden'] == 'Y' && $_POST['remove'] == 'Y'){ ?>
    
        <div class="wrap">

            <h2>Bulk Remove Comments</h2>

            <?php if($wpdb->query("DELETE FROM $wpdb->comments WHERE comment_approved = '0'") != FALSE){ ?>

                <p style="color:green"><strong>All pending comments have now been removed.</strong></p>

            <?php }else{ ?>

                <p style="color:red"><strong>There was an error, please try again.</strong></p>

                <?php echo brc_form(); ?>

            <?php
                }
            ?>

        </div>

        <?php

	}else if($_POST['brc_hidden'] == 'Y' && $_POST['remove'] != 'Y'){ ?>
	
    
	<div class="wrap">
        <?php    echo "<h2>Bulk Remove Comments (" . $com_number . " Pending)</h2>" ; ?>
			<p><strong>Note: Once you have ticked the box below and click remove all pending comments will be removed from your database.</strong></p>
            <p style="color:red"><strong>Please tick the checkbox if you would like to remove pending comments.</strong></p>
            <?php echo brc_form(); ?>
    <?php
	
	}else{

    ?>
			
			
            
            <div class="wrap">
			<?php    echo "<h2>Bulk Remove Comments (" . $com_number . " Pending)</h2>" ; ?>
			<?php if($com_number > 0){ ?>

            <p><strong>Note: Once you have ticked the box below and click remove all pending comments will be removed from your database.</strong></p>
            
            
            <?php echo brc_form(); ?>


		</div>
        
        <?php }else{ ?>
        
            <p><strong>You have 0 pending comments to remove.</strong></p>
        
        <?php } ?>
	
			
<?php
}

}

function brc_form(){

    $form = '<form name="brc_form" method="post" action="' . str_replace( '%7E', '~', $_SERVER['REQUEST_URI']) . '">';
    $form .= '<input type="hidden" name="brc_hidden" value="Y">';
    $form .= '<input type="checkbox" name="remove" value="Y" /> Remove all pending comments';
    $form .= '<p class="submit"><input type="submit" name="Submit" value="Remove" /></p>';
    $form .= '</form>';
    return $form;

}


function brc_admin_actions() {
    add_submenu_page('tools.php', "Bulk Remove Comments", "Bulk Remove Comments", 1, "Bulk_Remove_Comments", "brc_admin");
}

add_action('admin_menu', 'brc_admin_actions');


?>