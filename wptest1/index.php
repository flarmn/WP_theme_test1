<?php
/*
Template Name: wptest1
*/



get_header(); ?>

<?php 
echo("
<style>
html, body, h1{
margin:0px;
padding:0px;
}
</style>

<body>
  <header style = 'background:green; height:auto'>
   
");

wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); 

echo("
     <section>
      <p class = '' style = 'text-align:left; margin-left: 20px; padding-top:10px; font-size: 5vw; color: white; text-transform: uppercase;'>Your logo</p>
      </section>
  </header>

");



echo '<div class = "container">';

?>



<!-- Start the Loop. -->
 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

 	<!-- Test if the current post is in category 3. -->
 	<!-- If it is, the div box is given the CSS class "post-cat-three". -->
 	<!-- Otherwise, the div box is given the CSS class "post". -->



 	<?php if ( in_category( '3' ) ) : ?>
 		<div class="post-cat-three">
 	<?php else : ?>
        
 		<div class="post">
 	<?php endif; ?>


 	<!-- Display the Title as a link to the Post's permalink. -->
 	<?php
    // get a thumbnail or intermediate image if there is one
    $image = image_downsize( $attachment_id, $size );
    if ( ! $image ) {
        $src = false;
 
        if ( $icon && $src = wp_mime_type_icon( $attachment_id ) ) {
            /** This filter is documented in wp-includes/post.php */
            $icon_dir = apply_filters( 'icon_dir', ABSPATH . WPINC . '/images/media' );
 
            $src_file = $icon_dir . '/' . wp_basename( $src );
            @list( $width, $height ) = getimagesize( $src_file );
        }
 
        if ( $src && $width && $height ) {
            $image = array( $src, $width, $height );
        }
    }

 

?>

 	<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>


 	<!-- Display the date (November 16th, 2009 format) and a link to other posts by this posts author. -->

 	<small><?php the_time('F jS, Y'); ?> by <?php the_author_posts_link(); ?></small>


 	<!-- Display the Post's content in a div box. -->

 	<div class="entry">
    <!-- Display a comma separated list of the Post's Categories. -->
    <p class="postmetadata"><?php _e( 'Posted in' ); ?> <?php the_category( ', ' ); ?></p>
    <!-- Dispalaing THeme thumbnail -->
<?php
if ( has_post_thumbnail() ) {
    the_post_thumbnail('thumbnail');
}
?>
 		<?php the_content(); ?>
 	</div>


 

 	</div> <!-- closes the first div box -->



 	<!-- Stop The Loop (but note the "else:" - see next line). -->

 <?php endwhile; else : ?>


 	<!-- The very first "if" tested to see if there were any Posts to -->
 	<!-- display.  This "else" part tells what do if there weren't any. -->
 	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>


 	<!-- REALLY stop The Loop. -->
 <?php endif; ?>

<ul id="sidebar">
    <?php if ( ! dynamic_sidebar() ) : ?>
        <li>{static sidebar item 1}</li>
        <li>{static sidebar item 2}</li>
    <?php endif; ?>
</ul>

<?php get_footer(); ?>