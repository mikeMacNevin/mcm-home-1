    <div class="topbar">
        <div class="top-one">
            <span class="span-up">THE</span><span class="top-hash">HASH TEAM</span><span class="span-up">OF</span>
        </div>

        <div class="top-two"  x-ms-format-detection="none">
        <i class="fas fa-phone"></i> 703-555-5555
        </div>
    </div>

<?php
/**
 * Template Name: Property Listing Template (Style 2) Full Width
 * Created by PhpStorm.
 * User: waqasriaz
 * Date: 04/10/16
 * Time: 6:02 PM
 */



get_header();
global $post, $current_page_template;
$listing_view = get_post_meta( $post->ID, 'fave_default_view', true );
$listings_tabs = get_post_meta( $post->ID, 'fave_listings_tabs', true );
$listings_tab_1 = get_post_meta( $post->ID, 'fave_listings_tab_1', true );
$listings_tab_2 = get_post_meta( $post->ID, 'fave_listings_tab_2', true );
$fave_featured_listing = get_post_meta( $post->ID, 'fave_featured_listing', true );
$fave_featured_prop_no = get_post_meta( $post->ID, 'fave_featured_prop_no', true );
$fave_prop_no = get_post_meta( $post->ID, 'fave_prop_no', true );

$listing_page_link = get_the_permalink( $post->ID );

$active = $listing_view;

if( $listing_view == 'grid_view' ) {
    $listing_view = 'grid-view grid-view-2-col';
} elseif( $listing_view == 'grid_view_3_col' ) {
    $listing_view = 'grid-view grid-view-3-col';
} else {
    $listing_view = 'list-view';
}
$current_page_template = get_post_meta( $post->ID, '_wp_page_template', true );
?>
  
<?php get_template_part('template-parts/properties-head');  ?>
 
    <div class="row">
    <h2 id="ActiveListingsH2">Active Listings</h2>

        <div class="col-lg-12 col-md-12 col-sm-12 list-grid-area">

            <div id="content-area">

                <!--start list tabs-->
                <?php get_template_part( 'template-parts/listing', 'tabs' ); ?>
                <!--end list tabs-->

                <!--start featured property items-->
                <?php
                global $wp_query, $paged;
                if ( is_front_page()  ) {
                    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
                }

                if( $fave_featured_listing != 'disable' ) {
                    $number_of_featured_prop = $fave_featured_prop_no;
                    if (!$number_of_featured_prop) {
                        $number_of_featured_prop = '4';
                    }

                    $prop_featured_args = array(
                        'post_type' => 'property',
                        'posts_per_page' => $number_of_featured_prop,
                        'paged' => $paged,
                        'post_status' => 'publish'
                    );

                    $prop_featured_args = apply_filters( 'houzez_featured_property_filter', $prop_featured_args );

                    $prop_featured_args = houzez_prop_sort($prop_featured_args);
                    $wp_query = new WP_Query($prop_featured_args);

                    if ($wp_query->have_posts()) : ?>
                        <div class="property-listing <?php echo esc_attr($listing_view); ?>">
                            <div class="row">

                                <?php
                                while ($wp_query->have_posts()) : $wp_query->the_post();

                                    get_template_part('template-parts/property-for-listing', 'v2');

                                endwhile;
                                ?>

                            </div>
                        </div>
                        <hr>
                        <?php
                        wp_reset_query();
                    endif;
                }
                ?>
                <!--end featured property items-->



                <!--start property items-->
                <div class="property-listing listings-wrapper <?php echo esc_attr($listing_view); ?>">

                    <div class="row">

                        <?php
                        if(!$fave_prop_no){
                            $posts_per_page  = 9;
                        } else {
                            $posts_per_page = $fave_prop_no;
                        }

                        $latest_listing_args = array(
                            'post_type' => 'property',
                            'posts_per_page' => $posts_per_page,
                            'paged' => $paged,
                            'post_status' => 'publish'
                        );

                        $latest_listing_args = apply_filters( 'houzez_property_filter', $latest_listing_args );


                        $latest_listing_args = houzez_prop_sort ( $latest_listing_args );
                        $wp_query = new WP_Query( $latest_listing_args );

                        if ( $wp_query->have_posts() ) :
                            while ( $wp_query->have_posts() ) : $wp_query->the_post();

                                get_template_part('template-parts/property-for-listing', 'v2');

                            endwhile;
                            wp_reset_postdata();
                        else:
                            get_template_part('template-parts/property', 'none');
                        endif;
                        ?>

                    </div>
                    <div class="row">
                        <div class="listings-about">
                            <h3>Our Experience</h3>
                            <p>
                        As longtime residents of the DC metro area, we have expert knowledge of this powerful market. We have witnessed the incredible demographic and economic changes that have occurred in the area since the 1980’s and the veritable explosion of DC’s real estate development within the city limits over the last few years. To stay on top of the game, we attend several economic seminars per year devoted to economic analysis and projection of the DC area in both the residential and commercial real estate development. While we have a strong presence in the high end sector of the DC area’s housing market (above $2 million), we handle many smaller transactions – condos, townhouses, tear-downs – and we guarantee the same focus and effort to our sellers of smaller properties as the multi-million dollar properties. At the end of the day, for us, it’s all about service to our loyal client base -- not a one time commission.
                        </p>

                        <h4>Listings</h4>
                        <p>If you are thinking of listing your home, we will first come out to the property and do a full analysis of what we think the value of your home is in relation to the current market. We are very property specific and location specific. We will give you our best evaluation of what your optimum list price should be (according to your own circumstances and timeline) as well as what we realistically think your likely sale price will be. We will never try to overestimate the value of your home in order to get the listing (like many agents do) and then end up with disappointed clients when the home doesn’t sell, and we are forced to lower the price multiple times to get a sale. We both do our pre-listing market analysis independently and then compare our results to get what we think is the best objective evaluation.</p> <p>
In our pre-listing visit to your property, we will also give you our professional opinion on how to best prepare your home to sell. We will advise you on what we believe are necessary repairs and improvements to maximize the appeal of your home as well as your net number. We will also advise you on what we believe is not necessary to do, as your return on your money spent will not necessarily come back to you in the sale.
</p>
                        </div>
                     
                    </div>
                </div>
                <!--end property items-->

                <hr>

                <!--start Pagination-->
                <?php houzez_pagination( $wp_query->max_num_pages, $range = 2 ); ?>
                <!--start Pagination-->

            </div>
        </div><!-- end container-content -->

    </div>


<?php get_footer(); ?>