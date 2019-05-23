<?php
/**
 * @version     1.4
 * @package     mod_aboutus_col
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @author      Brad Traversy <support@joomdigi.com> - http://www.bootstrapjoomla.com
 */
//No Direct Access
defined('_JEXEC') or die;
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

	<?php if(!isset($background_image) && isset($background_color)) : ?>
	    .jumbotron{
	        background-color: <?php echo $background_color; ?>;
		}
	<?php endif; ?>

	.jumbotron h1{
		/*color:<?php echo $headingtextcolor; ?>;*/
		/*<?php echo ($center_text == 1 ? 'text-align:center;' : ''); ?>*/
	}
	.jumbotron p{
		/*color:<?php echo $paragraphtextcolor; ?>;*/
		/*<?php echo ($center_text == 1 ? 'text-align:center;' : ''); ?>*/
	}
	.jumbotron .btn{
		color:#fff !important;
		<?php echo ($center_text == 1 ? 'text-align:center;' : ''); ?>
	}
	.jumbotron .foreground_image_wrap{
		<?php echo ($center_text == 1 ? 'text-align:center;' : ''); ?>
	}
	
</style>
<div class="jumbotron <?php echo $moduleclass_sfx; ?><?php if(isset($featured_product) && $featured_product!=0) echo "featured_product"; ?>" style="<?php if(isset($featured_product) && $featured_product!=0 && isset($div_size) && $div_size != 0) echo "min-height:".$div_size."!important;"; ?>
	<?php if(isset($background_image) && $background_image != '') : ?>
		background:url(<?php echo $background_image; ?>) repeat 0px 0px;
		<?php if(isset($div_size) && $div_size > 0) : ?>
		<?php endif; ?>
		background-size: <?php echo $image_size; ?> !important;
	    background-attachment: fixed;
	    background-repeat: no-repeat;

	<?php endif; ?> ">

	<section data-aos="fade-in"  <?php if(isset($article_text_v_alignment) && $article_text_v_alignment!=1) : ?> 
	      		style="height: 100%"
	      	<?php endif; ?> " class="d-flex text-center">
	  <div class="container d-flex justify-content-center <?php echo $isreversed; ?>">
	    <div class="row article_text align-items-center justify-content-center" 
	    	style="text-align: <?php echo $article_text_alignment?> !important; ">
	      <div class="col-10 <?php if(!isset($paragraph_text)) : ?>main-content<?php endif; ?>">
	      	<h1 style="color: <?php echo $headingtextcolor; ?>"><?php echo $header_text; ?></h1>

			<<?php echo $sub_heading_tag; ?>
				<?php if(isset($paragraphtextcolor)) : ?>
  					style="color:<?php echo $paragraphtextcolor; ?> !important"
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
	   	
	  </div>
	</section>

	<!--<div class="container">
		<div class="d-flex flex-column align-items-end justify-content-between p-3 block">
			<div class="article">
				<h1><?php echo $header_text; ?></h1>
				<p><?php echo $paragraph_text; ?></p>
				<?php if(isset($foreground_image)) : ?>
				     <p class="foreground_image_wrap"><img class="foreground_image" src="<?php echo JURI::base(); ?><?php echo $foreground_image; ?>" alt="<?php echo $header_text; ?>" /></p>
				<?php endif; ?>
		  		<?php if($show_read_more) : ?>
		  			<p><a class="<?php echo $buttonstyle; ?>" role="button" href="<?php echo $read_more_link; ?>"><?php echo $read_more_text; ?></a></p>
				<?php endif; ?>
			</div>
			<div class="image">
				<h1><?php echo $header_text; ?></h1>
				<p><?php echo $paragraph_text; ?></p>
				<?php if(isset($foreground_image)) : ?>
				     <p class="foreground_image_wrap"><img class="foreground_image" src="<?php echo JURI::base(); ?><?php echo $foreground_image; ?>" alt="<?php echo $header_text; ?>" /></p>
				<?php endif; ?>
		  		<?php if($show_read_more) : ?>
		  			<p><a class="<?php echo $buttonstyle; ?>" role="button" href="<?php echo $read_more_link; ?>"><?php echo $read_more_text; ?></a></p>
				<?php endif; ?>
			</div>
		</div>-->
	</div>
</div>
