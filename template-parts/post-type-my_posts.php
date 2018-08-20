<?php
/*
Template Name: 
*/
// get_header();
?>

<?php

$args = array('post_type' => 'my_post', 'posts_per_page' => 8 );                                              
$the_query = new WP_Query( $args );
?>

<div class="no-container post_type_my_post" style="position: relative; ">
    <div class="row">
        <div class="col s12">
<?php
            // The Loop
            if ( $the_query->have_posts() ) {
                echo '<ul class="list-my_post ">';
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    echo '<li class="col s12 m6 l3 item-post" style="position: relative;">';
                    // echo '<li class="col s12 s6 m4 l3 item-post" style="position: relative;">'; #ff0000
                        // echo '<div class="post-image" style="position: absolute; margin: 0 auto;">' . the_post_thumbnail('thumbnail') .'</div>';
                        echo the_post_thumbnail('thumbnail');
                        // echo '<div>' . get_the_title() . '</div>';
                        echo '<div class="title-post"><a style="color: white; font-weight: bold;  text-shadow: 1px 1px #004A85; width: 68%; z-index: 2;" href="'.get_the_permalink($post->ID).'">' . get_the_title() . '</a></div>';
                    echo '</li>';
                }
                echo '</ul>';
                /* Restore original Post Data */
                wp_reset_postdata();
            } else {
                // no posts found
            }
?>
        </div>
    </div>
</div>


<style type="text/css">
    ul.list-book{
        list-style-type: none;
    }

    ul.list-book li{border: 1px solid black ;}

    ul.list-book li img{
        width: 150px;
        height: 150px;
    }

    .post_type_my_post {margin-bottom: 200px;}
</style>

<style>
	.post-title {height: 100%;}
	.post-title img {width: 100%; height: auto; }

    ul.list-my_post li img {width: 70%; height: auto;}

    .item-post img{margin-left:16.5%;}
    .item-post img:hover {opacity: 0.7;
        filter: brightness(40%);
        transform: scale(1.1);
        -webkit-transition: 0.2s; /*For Safari 3.1 to 6.0 */
        transition: 0.2s;
        
        overflow: hidden;
        /* transition: transform 0.35s; */
        /* webkit-transition: -webkit-transform 0.35s; */
    }

    .title-post{margin-left:16.5%; position: absolute; z-index: 2; margin-top: -40%; width: 68%; 
        /* position: absolute;  */
        /* overflow: hidden;  */
        /* white-space: nowrap; */
        /* word-wrap: break-word; */
    }
</style>

<?php
// get_footer();