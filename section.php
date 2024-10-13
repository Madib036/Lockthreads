<?php
// The most generic form of designing a website
function titan_section( $atts, $content = null ) {
	// Reference global data and shortcode defaults
	global $titan_client_data;
    $a = shortcode_atts( array(
        'package' => 'none',
        'template' => 'none', // Section
		'id' => '',
		'class' => '',
		'style' => ''		
    ), $atts );
    $section = $a['package']."***".$a['template'];
	ob_start(); /////////////////////////////////////////////////////////////
	?> <div class="titan-admin-parallaxing"></div> <?php
	// Start Element
	echo "<div ";
	// Add an ID
	if($a['id'] != ''){ 
		$thisID = $a['id'];
	} else {
		$thisID = $titan_client_data['archive'][$section]['id'];
	}
	echo "id='".$thisID."' ";
	// Add an Class
	if($a['class'] != ''){ 
		echo "class='".$a['class']." ".$titan_client_data['archive'][$section]['class']."' ";
	}	
    // Add a Style
	    // Extra video background style
		$required_video_position_style = "";
	    if(isset($section)){
		if(strlen($titan_client_data['archive'][$section]['video']['source']) > 1){
			$required_video_position_style = "position:relative;";
		}
		}
	if($a['template'] == 'none'){ 
		if($a['style'] != ''){ 
			echo  "style='".$required_video_position_style.$a['style'];
		}	
	} 
	// Add a style + template
	else {
        if(isset($titan_client_data['archive'][$section]['css'])){
            echo "style=\"".$required_video_position_style;
			/* Extract background size and re initailize */
			$in_style = $titan_client_data['archive'][$section]['css'];
			if(strpos($in_style, "background:") !== false) {
			$bg_sizes = array("cover", "contain", "auto");
			for($i = 0; $i < count($bg_sizes);$i++){  
			if (strpos($in_style, $bg_sizes[$i]) !== false) {
			$bg_size = $bg_sizes[$i];
			}
			}
			$in_style = explode("background:", $in_style);
			$in_style_2 = explode(";", $in_style[1], 2);
			$in_new_bg = str_replace($bg_size,"",$in_style_2[0]);
			// Create new formated style with seperate background-size
			echo $in_style[0]."background:".$in_new_bg.";background-size:" . $bg_size .";".$in_style_2[1];  
			} else {
				echo $in_style;	
			}
            /* Extract background size and re initailize */		
			echo $a['style']."\"";
        }
	}
	
	/* Add Paralaxing Background ################################ */
	if(isset($section)){
		if(isset($titan_client_data['archive'][$section]['parallax'])){
			if(strlen($titan_client_data['archive'][$section]['parallax']['image']) > 4){
    			echo " data-parallax='scroll' data-speed='".$titan_client_data['archive'][$section]['parallax']['speed']."' data-image-src='".$titan_client_data['archive'][$section]['parallax']['image']."'";
				if($thisID == "titan-preview"){ echo " data-bleed='0'"; } 
				else { echo " data-bleed='".$titan_client_data['archive'][$section]['parallax']['bleed']."'"; }
				echo "data-natural-height='' data-natural-width=''";
			}
		}
	}
	
	echo ">"; // End Titan Section
    
    // Add special feeatures from template
    if(isset($section)){
		// Enable video background
		if(strlen($titan_client_data['archive'][$section]['video']['source']) > 1){
			?>
			<style>
			.video-container { position:absolute; left:0px; top:0px; height:100%; width:100%; overflow: hidden;z-index:0; text-align: center;background:url('<?php echo $titan_client_data['archive'][$section]['video']['poster']; ?>');background-size: cover;}
			.video-container video {min-width: 100%; min-height: 100%; }
			@media screen and (max-width:768px){ /* mobile */
			.video-container video{display:none;}
			}
			</style>
			<div class="video-container">
			<video autoplay loop="loop">
				<source  src="<?php echo $titan_client_data['archive'][$section]['video']['source'];  ?>" >
			</video>
			</div>
			<?php              
		}
		echo "<div style='z-index:1;position:relative;height:100%;'>";
		// Print Advanced HTML/PHP and Javascript
		if(isset($titan_client_data['archive'][$section]['content'])){
			eval(" ?>".$titan_client_data['archive'][$section]['content']."<?php ");
			
		}
		if(isset($titan_client_data['archive'][$section]['script'])){
			echo '<script>'.$titan_client_data['archive'][$section]['script']."</script>";
		}
		// Load modules based on data
		if(isset($titan_client_data['archive'][$section]['element'])){
			$elementData =  $data = str_replace("'", '"', $titan_client_data['archive'][$section]['element']);
			do_action( 'titan_elements_queue', json_decode($elementData, TRUE));
			}
		/* Setup extra state styles ######################################### */
		echo "<style>".
		$titan_client_data['archive'][$section]['classStandard'] .
		$titan_client_data['archive'][$section]['classMobile'] .
		"</style>";
		/* Parallax Background Load Script ############################################## */
		if(isset($titan_client_data['archive'][$section]['parallax'])){
			if(strlen($titan_client_data['archive'][$section]['parallax']['image']) > 4){
				wp_enqueue_script( 'titan-parallax-bg-js', WP_TITAN_ROOT . '/resources/js/parallax.min.js', array('jquery'));	
			}
		}
		/* & Not Implemented Puppet Show Load Script & init ############################################## */
		if(isset($titan_client_data['archive'][$section]['puppetShow'])){
			if($titan_client_data['archive'][$section]['puppetShow'] == true){		
			wp_enqueue_script( 'titan-parallax-js', WP_TITAN_ROOT . '/resources/js/jquery.parallax.min.js', array('jquery'));	
			echo "<script>jQuery( document ).ready(function($) { $('#".$thisID."').puppetShow({calibrateX: false, calibrateY: true, invertX: false, invertY: true, limitX: false, limitY: 10, scalarX: 2, scalarY: 8, frictionX: 0.2, frictionY: 0.8, originX: 0.0, originY: 1.0}); });</script>";
			}
		}
    } // Make sure section exists
	
    // Print transcluded content
	if(isset($content)){ echo $content; }
	// Debug data echo "<div style='color:#F60'>".print_r($titan_client_data['archive'][$section])."</div>";
    // Close section
    echo  "</div></div>";	
	
/* Setup extra state styles ######################################### */
	return ob_get_clean(); ///////////////////////////////////////////////////	
}
?>