<?php echo head(array('bodyid'=>'home')); ?>    
            <!--About-->       
	<!-- Featured Item -->
<div id="primary">
	<div id="greeting" >
    	<h1>Online Exhibits</h1>
    	<h2>collected. curated. <span>celebrated.</span></h2>
	    <p>explore and discover inspiring collections of <strong>art</strong>, <strong>literature</strong>, <strong>culture</strong>, and <strong>history</strong>! Brought to you by the <a href="http://www.lib.umich.edu">University of Michigan Library</a>.</p>
    	<ul>
    		<li class="browse-icon">
    		<a href="<?php echo url('exhibits'); ?>"><img src="<?php echo img('icon-browse.gif','images/layout') ?>" alt="browse icon" width="20" heigh="20"/></a>
    		<a href="<?php echo url('exhibits'); ?>">browse</a> all the exhibits to find what inspires you! 
        </li>
    		
		 		<li class="items-icon">
    		<a href="<?php echo url('items'); ?>"><img src="<?php echo img('icon-archive.gif','images/layout') ?>" alt="archive icon" width="20" heigh="20"/></a>
    		flip through the <a href="<?php echo url('items'); ?>">archive</a> to see the full listing of items! 
        </li>        
     </ul>
	</div><!-- end greeting -->	    
  <!-- Featured Exhibits -->
  <h3 id="featured-title"><span>Featured</span> Exhibits</h3>
  <div id="showcase" class="showcase">
         <?php if ((get_theme_option('Display Featured Exhibit')) && function_exists('exhibit_builder_display_random_featured_exhibit')):
                   // get feature exhibits, limit to 4 exhibits
                  $feature_exhibits =  mlibrary_exhibit_builder_display_random_featured_exhibit();
                  foreach (loop('exhibit',$feature_exhibits) as $feature_exhibit):?>
                  <?php //get_image_attached_to_exhibits is built in the mlibrary plugin to get the image attached to each Exhibit.
                  $Exhibit_image='';
                  $Exhibit_image = get_image_attached_to_exhibits($feature_exhibit->id);
                  if (!empty($Exhibit_image)):?>            
		                  <div class="showcase-slide">	
    	              	<?php //Both exhibit_builder_exhibit_uri and exhibit_builder_link_to_exhibit used from Exhibit_builder helper function    	              
		  	                	echo '<a href="'.exhibit_builder_exhibit_uri($feature_exhibit).'"><img src="'.WEB_FILES.$Exhibit_image['image_name'].'" alt="'.$Exhibit_image['image_title'].'" /></a>';
        	                echo '<div class="showcase-caption">';
          	              echo '<h4>'.exhibit_builder_link_to_exhibit($feature_exhibit).'</h4>';
	          	            echo '</div>';//SHOWCASE-CAPTION?>
              	     	   <div class="showcase-thumbnail active" style="width:100px;">
                		      <?php if (!empty($Exhibit_image))
                		      {
		                		      	     echo '<img src="'.WEB_FILES.$Exhibit_image['image_name'].'" alt="'.$Exhibit_image['image_title'].'" width="44" height="44" />';
    	            	      }
                    	          else
      	              	             echo('<img src="'.img("mlibrary_galleryDefault.jpg").'" alt="Mlibrary default image"/>');  ?>
                      	</div><!-- SHOWCASE-THUMBNAIL-->    			    	
	  			          <?php echo '</div>'; // SHOW-CASE SLIDE			        
	  			       endif;   
                  endforeach;
               //   exit;
              endif;?>			
</div><!-- end showcase -->
</div><!-- primary-->

<h3> Recent Exhibits </h3>
<div id="recent-exhibits"> 
<?php   
		$first_exhibit='false';
        set_loop_records('exhibits', exhibit_builder_recent_exhibits(4));
        if (has_loop_records('exhibits')): ?>
        		<ul class="exhibits-list">
		        <?php foreach (loop('exhibits') as $exhibits): ?>
    					    <li class="exhibits <?php if ($first_exhibit=='false') echo 'first';  ?>">
					  		  <?php $first_exhibit='true';?>
				        	<h3><?php echo link_to_exhibit(); ?></h3>
		          		<?php $Exhibit_image = get_image_attached_to_exhibits($exhibits->id);
      				    if (!empty($Exhibit_image))
			            	   echo '<img src="'.WEB_FILES.$Exhibit_image['image_name'].'" alt="'.$Exhibit_image['image_title'].'" />';
      		        else
          			       echo('<img src="'.img("mlibrary_galleryDefault.jpg").'" alt="Mlibrary default image"/>');  ?> 
                           
			            <?php if($exhibitDescription = metadata('exhibit', 'description', array('snippet'=>300))): ?>
      			             <p class="exhibits-description"><?php echo $exhibitDescription; ?></p>
			            <?php endif; ?>			
            
      			      <?php echo '<p class="tags">'.tag_string($exhibits,url('exhibits/browse')).'</p>';?>			
				          </li>
	          <?php endforeach; ?>
  	        </ul>
        <?php endif; ?>
        <div class="button-wrap"><div class="button"><a href="<?php echo url('exhibits'); ?>">Browse All Exhibits</a></div></div>
</div>
 
 <!-- Start Awkward Gallery load/config -->
<script type="text/javascript">
jQuery.noConflict();
jQuery(document).ready(function()
{
	jQuery("#showcase").awShowcase(
	{
		width:					475,
		height:					393,
		auto:					false,
		interval:				6500,
		continuous:				false,
		loading:				true,
		tooltip_width:			200,
		tooltip_icon_width:		32,
		tooltip_icon_height:	32,
		tooltip_offsetx:		18,
		tooltip_offsety:		0,
		arrows:					true, 
		buttons:				false,
		btn_numbers:			true,
		keybord_keys:			true,
		mousetrace:				false,
		pauseonover:			true,
		transition:				'fade', /* vslide/hslide/fade */
		transition_speed:		250,
		show_caption:			'onload', /* onload/onhover/show */
		thumbnails:				true,
		thumbnails_position:	'inside-last', /* outside-last/outside-first/inside-last/inside-first */
		thumbnails_direction:	'horizontal', /* vertical/horizontal */
		thumbnails_slidex:		0 /* 0 = auto / 1 = slide one thumbnail / 2 = slide two thumbnails / etc. */
	});
});
</script>
<!-- end Awkward Gallery load/config -->
   
    
<?php echo foot(); ?>