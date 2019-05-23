<?php
/**
 * @version     1.4
 * @package     mod_jumbotron
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @author      Brad Traversy <support@joomdigi.com> - http://www.bootstrapjoomla.com
 */
//No Direct Access
defined('_JEXEC') or die;

if($img_or_svg=='2') {
	$document = JFactory::getDocument();
	$document->addStylesheet(JUri::base()."/templates/jumbotron/css/particle-style.css");
}
?>
<style>
	<?php
		if($foreground_image_width != 'auto'|| $foreground_image_width != ''){
			//$foreground_image_width = $foreground_image_width.'px';
		}
	?>

	.foreground_image{
		max-width:<?php echo $foreground_image_width; ?>
	}

	<?php if(isset($background_image) && $background_image != '') : ?>
	    /*.jumbotron{
	    	background:url(<?php echo $background_image; ?>);
			min-height: <?php echo $div_size; ?> !important;
			background-size: <?php echo $image_size; ?> !important;
			background-position: <?php echo $image_position; ?> !important;
			background-repeat: no-repeat !important;
		}*/
	<?php endif; ?>

    /*.jumbotron{
        <?php if(!isset($background_image) && isset($background_color)) echo "background-color: ".$background_color." !important"; ?>
	}*/

	.jumbotron h1{
		/*color:<?php echo $headingtextcolor; ?>;*/
		/*<?php echo ($center_text == 1 ? 'text-align:center;' : ''); ?>*/
	}
	.jumbotron p{
		/*color:<?php echo $paragraphtextcolor; ?>;*/
		/*<?php echo ($center_text == 1 ? 'text-align:center;' : ''); ?>*/
	}
	/*.jumbotron .btn{
		color:#fff !important;
		<?php echo ($center_text == 1 ? 'text-align:center;' : ''); ?>
	}*/
	.jumbotron .foreground_image_wrap{
		<?php echo ($center_text == 1 ? 'text-align:center;' : ''); ?>
	}
	.intro-section {
	    <?php if($intro_section_style != 0) : ?>
	    	background-color: rgb(0,0,0); /* Fallback color */
		    background-color: rgba(0,0,0, 0.7);
		    border: 3px solid #f1f1f1; /* Black w/opacity/see-through */
	    <?php endif; ?>
	    /*color: white;
	    font-weight: bold;
	    padding: 20px;
	    text-align: center;*/
	    position: absolute;
	    top: 50%;
	    left: 50%;
	    transform: translate(-50%, -50%);
	    z-index: 2;
	    width: 90%;
	    height: 50%;
	}
	
</style>

<?php
	$temp_style = "";
	$temp_class = "visible jumbotron ";
	$temp_class .= $moduleclass_sfx;
	if(isset($featured_product) && $featured_product!=0) {
		$temp_class .= "featured_product";
	}
	if(isset($featured_product) && $featured_product!=0 && isset($div_size) && $div_size != 0) {
		$temp_style = "min-height:".$div_size."!important;";
	}
	if(($img_or_svg=='0' || $img_or_svg=='1') && isset($background_image) && $background_image != '') {
		$temp_style .= "background:url(".$background_image.") repeat 0px 0px;";
		$temp_style .= "background-size: ".$image_size." !important;";
		$temp_style .= "background-attachment: fixed;";
		$temp_style .= "background-repeat: no-repeat;";
		if($intro_section != 0) {
			$temp_style .= "filter: blur(3px);";
		}
	}elseif($img_or_svg=='2') {
		$temp_style .= "background-size: ".$image_size." !important;";
		$temp_style .= "background-attachment: fixed;";
		$temp_style .= "background-repeat: no-repeat;";
		$temp_style .= "height: 0;";
		$temp_style .= "background: linear-gradient(45deg, #DA70D6, #FF8200);";		
	}
	if(!isset($background_image) && isset($background_color)) {
		$temp_style .= "background-color: ".$background_color." !important";
	}
	/*if(strpos(strtolower($section_id), 'particles-js')) {
		$temp_style .= "display: contents;";
	}*/
?>

<!-- <div class="count-particles">
  <span class="js-count-particles">--</span> particles
</div> -->

<!-- particles.js container -->
<!-- <div id="particles-js"></div> -->

<section <?php if(isset($section_id)) echo "id=\"".$section_id."\""; echo "title=\"".$section_name."\"";?> data-aos="fade-in" class="url-to-div <?php if($intro_section == 0) echo $temp_class; ?>"
							style="<?php if($intro_section == 0) echo $temp_style; ?>">

	<section <?php if($img_or_svg=='2') echo "id=\"particles-js\"";?> class="<?php if($intro_section != 0) echo $temp_class; ?>"
				style="<?php if($intro_section != 0) echo $temp_style; ?>" ></section>

	<section <?php if(isset($article_text_v_alignment) && $article_text_v_alignment!=1) : ?> 
	      		style=" <?php if($intro_section == 0) echo "height: 100%" ?> "
	      	<?php endif; ?> " class="<?php if($intro_section != 0) echo "intro-section"; ?> d-flex text-center">
  		<div class="container d-flex justify-content-center <?php echo $isreversed; ?>">
		  	<?php 
		  		if(isset($is_img_with_heading) && $is_img_with_heading ==1 ) { ?>
		  			<div class="row article_text align-items-center justify-content-center" 
			    	style="text-align: <?php echo $article_text_alignment?> !important; ">
			    		<h1 style="color: <?php echo $headingtextcolor; ?>"><?php echo $header_text; ?></h1>
			  			<div class="article_image align-items-center justify-content-center">			      	
					      	<picture>
				                <?php if(isset($foreground_image)) { ?>
						      		<img class="foreground_image" src="<?php echo $foreground_image; ?>" alt="<?php echo $header_text; ?>" />
					      		<?php }else if(isset($svg_file)) { ?>
					      			<embed class="foreground_image" src="/joomla-4/images/<?php echo $svg_file; ?>" type="image/svg+xml"></embed>
					      		<?php } ?>
				            </picture>
					    </div>
			    	</div>

		  	<?php /*end if*/ } else { ?>
		  		<div class="row article_text align-items-center justify-content-center" 
		    	style="text-align: <?php echo $article_text_alignment?> !important; ">
			      <div class="col-12 <?php if(!isset($paragraph_text)) : ?>main-content<?php endif; ?>">
			      	<h1 style="color: <?php echo $headingtextcolor; ?>"><?php echo $header_text; ?></h1>

					<<?php echo $sub_heading_tag; ?>
						<?php if(isset($paragraphtextcolor)) : ?>
		  					style="color:<?php echo $paragraphtextcolor; ?> !important;
		  							<?php if(isset($featured_product) && $featured_product != 0) echo "width: 90%;";?>
		  							margin-left: auto;
	  								margin-right: auto;"
		  				<?php endif; ?>
						><?php echo $paragraph_text; ?>
					</<?php echo $sub_heading_tag; ?>>

			  		<?php if($show_read_more) : ?>
			  			<p 
			  				<?php if(isset($paragraphtextcolor)) : ?>
			  					style="color:<?php echo $paragraphtextcolor; ?> !important"
			  				<?php endif; ?>
		 				><a class="<?php echo $buttonstyle; ?>" role="button" href="<?php echo $read_more_link; ?>"><?php echo $read_more_text; ?></a>
		 				</p>
					<?php endif; ?>
			      </div>
			    </div>

			    <?php if(isset($foreground_image) || isset($svg_file)) { ?>
			    	<div class="row article_image align-items-center justify-content-center">
				      <div class="col-16 foreground_picture_holder">
				      	
				      	<picture>
			                <?php if(isset($foreground_image)) { ?>
					      		<img class="foreground_image" src="<?php echo $foreground_image; ?>" alt="<?php echo $header_text; ?>" />
				      		<?php }else if(isset($svg_file)) { ?>
				      			<embed class="foreground_image" src="/joomla-4/images/<?php echo $svg_file; ?>" type="image/svg+xml"></embed>
				      		<?php } ?>
			            </picture>
				      </div>
				    </div>
			    <?php } ?>

		  	<?php }//end else ?>
	   	
	  	</div>
	</section>
</section>

<?php if($img_or_svg=='2') {
	?>
		<script type="text/javascript" src="<?php echo JUri::base()?>/templates/jumbotron/js/particles.js"></script>
		<script type="text/javascript" src="<?php echo JUri::base()?>//templates/jumbotron/js/app.js"></script>
	<?php
} ?>