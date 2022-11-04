<?php get_header();?>




<!--=====================================
                    BANNER PART START
        =======================================-->
        <section class="single-banner inner-section" style="background: url(<?php echo bloginfo('template_url') ?>/images/single-banner.jpg) no-repeat center;">
            <div class="container">
                <h2><?php the_title(); ?></h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><?php woocommerce_breadcrumb(); ?></a></li>
                 
                </ol>
            </div>
        </section>
        <!--=====================================
                    BANNER PART END
        =======================================-->


        <!--=====================================
                PRODUCT DETAILS PART START
        =======================================-->


        <div class="summary entry-summary">
        <?php
        /**
         * Hook: woocommerce_single_product_summary.
         *
         * @hooked woocommerce_template_single_title - 5
         * @hooked woocommerce_template_single_rating - 10
         * @hooked woocommerce_template_single_price - 10
         * @hooked woocommerce_template_single_excerpt - 20
         * @hooked woocommerce_template_single_add_to_cart - 30
         * @hooked woocommerce_template_single_meta - 40
         * @hooked woocommerce_template_single_sharing - 50
         * @hooked WC_Structured_Data::generate_product_data() - 60
         */
        ?>
    </div>



    
<?php
   while ( have_posts() ) :
            the_post();

     ?>


        <section class="inner-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="details-gallery">
                            <div class="details-label-group">
                               <?php if ($product->is_on_sale() ) : ?> <label class="details-label new">
                                <?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sales!', 'woocommerce' ) . '</span>', $post, $product ); ?><?php endif;?></label>
                                <!-- <label class="details-label off">-10%</label> -->
                            </div>
                            <ul class="details-preview"> 
                                <?php
                                global $product;
                                $id = $product->get_id();
                                $product_id = $id;
                                $product = new WC_product($product_id);
                                $attachment_ids = $product->get_gallery_image_ids();

                                    foreach( $attachment_ids as $attachment_id ) 
                                    {
                                        ?>
                                       <li><img src="<?php echo wp_get_attachment_image($attachment_id, 'full');?></li>

                                    <?php }  ?>
                                    
                            </ul>



                            <ul class="details-thumb">
                            <?php
                                global $product;
                                $id = $product->get_id();
                                $product_id = $id;
                                $product = new WC_product($product_id);
                                $attachment_ids = $product->get_gallery_image_ids();

                                    foreach( $attachment_ids as $attachment_id ){ 
                                        ?>
                                         <li><img src="<?php echo wp_get_attachment_image($attachment_id, 'thumbnail');?></li>
                                    <?php }  ?>


                    

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="product-navigation">
                            <li class="product-nav-prev">
                                <a href="#">
                                    <i class="icofont-arrow-left"></i>
                                    prev product
                                    <span class="product-nav-popup">
                                        <img src="<?php $product->get_image_id()?>" alt="product">
                                        <small>green chilis</small>
                                    </span>
                                </a>
                            </li>
                            <li class="product-nav-next">
                                <a href="#">
                                    next product
                                    <i class="icofont-arrow-right"></i>
                                    <span class="product-nav-popup">
                                        <img src="images/product/03.jpg" alt="product">
                                        <small>green chilis</small>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="details-content">
                            <h3 class="details-name"><a href="#"><?php the_title(); ?></a></h3>
                            <div class="details-meta">
                                <p>SKU:<span><?php echo $product->get_sku(); ?></span></p>
                                <p><a href="#"><?php global $post;
$terms = get_the_terms( $post->ID, 'product_cat' );
foreach ($terms as $term) {
    $product_cat_id = $term->term_id;
    break;
}?></a><?php echo $product->get_categories( ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', sizeof( get_the_terms( $post->ID, 'product_cat' ) ), 'woocommerce' ) . ' ', '.</span>' ); ?>
</p>
                            </div>
                            <div class="details-rating">
                                <i class="active icofont-star"></i>
                                <i class="active icofont-star"></i>
                                <i class="active icofont-star"></i>
                                <i class="active icofont-star"></i>
                                <i class="icofont-star"></i>
                                <a href="#">(3 reviews)</a>
                            </div>


                                                <h3 class="details-price">
                                <del>₹<?php echo $product->regular_price;?></del>
                                <span> ₹<?php echo $product->sale_price; ?></span>
                            </h3>
                            <p class="details-desc"><?php the_content(); ?></p>
                            <div class="details-list-group">
                                <label class="details-list-title">tags:</label>
                                <ul class="details-tag-list">
                                <?php global $product; ?>

                            <li><?php echo wc_get_product_tag_list( $product->get_id(), ', ' ); ?></li>
                                    
                                </ul>
                            </div>
                            <div class="details-list-group">
                                <label class="details-list-title">Share:</label>
                                <ul class="details-share-list">
                                    <li><a href="#" class="icofont-facebook" title="Facebook"></a></li>
                                    <li><a href="#" class="icofont-twitter" title="Twitter"></a></li>
                                    <li><a href="#" class="icofont-linkedin" title="Linkedin"></a></li>
                                    <li><a href="#" class="icofont-instagram" title="Instagram"></a></li>
                                </ul>
                            </div>
                            <div class="details-add-group">
                                <button class="product-add" title="Add to Cart">
                                    <i class="fas fa-shopping-basket"></i>
                                    <span>add to cart</span>

                                </button>
                                <?php $id = get_the_ID();
echo do_shortcode( '[add_to_cart id='.$id.']' ); ?>
                                <div class="product-action">
                                    <button class="action-minus" title="Quantity Minus"><i class="icofont-minus"></i></button>
                                    <input class="action-input" title="Quantity Number" type="text" name="quantity" value="1">
                                    <button class="action-plus" title="Quantity Plus"><i class="icofont-plus"></i></button>
                                </div>
                            </div>
                            <div class="details-action-group">
                                <a class="details-wish wish" href="#" title="Add Your Wishlist">
                                    <i class="icofont-heart"></i>
                                    <span>add to wish</span>
                                </a>
                                <a class="details-compare" href="compare.html" title="Compare This Item">
                                    <i class="fas fa-random"></i>
                                    <span>Compare This</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


            <?php endwhile; 

            // end of the loop. ?>
            <div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
    <div class="container mt-3">
        <div class="row">
            
            
        <!--=====================================
                PRODUCT DETAILS PART END
        =======================================-->


        <!--=====================================
                  PRODUCT TAB PART START
        =======================================-->
        <section class="inner-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="nav nav-tabs">
                            <li><a href="#tab-desc" class="tab-link active" data-bs-toggle="tab">descriptions</a></li>
                            <li><a href="#tab-spec" class="tab-link" data-bs-toggle="tab">Specifications</a></li>
                            <li><a href="#tab-reve" class="tab-link" data-bs-toggle="tab">reviews (2)</a></li>
                        </ul>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="tab-desc">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-details-frame">
                                <div class="tab-descrip">
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur, ex! Incidunt nemo aspernatur fugiat, saepe suscipit sit perferendis illum magnam voluptates aliquid blanditiis, dolor assumenda dolorem ullam harum, doloribus molestiae! Unde voluptas maiores exercitationem aperiam debitis accusantium, placeat vero neque, atque eius numquam incidunt, culpa a odit consequatur nostrum aut nisi quisquam sequi dignissimos sed. Odio necessitatibus officiis repudiandae omnis soluta fugiat aliquam eius quae. Unde, ipsam atque assumenda consequuntur quia alias nulla, cupiditate ab quos eveniet pariatur expedita repellendus fugit. Quisquam fuga et, dolore aut temporibus atque itaque nesciunt reiciendis nobis, deleniti nihil vel qui perferendis molestias aliquam doloremque.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-spec">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-details-frame">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Product code</th>
                                            <td>SKU: 101783</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Weight</th>
                                            <td>1kg, 2kg</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Styles</th>
                                            <td>@Girly</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Properties</th>
                                            <td>Short Dress</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-reve">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-details-frame">
                                <ul class="review-list">
                                    <li class="review-item">
                                        <div class="review-media">
                                            <a class="review-avatar" href="#">
                                                <img src="images/avatar/01.jpg" alt="review">
                                            </a>
                                            <h5 class="review-meta">
                                                <a href="#">miron mahmud</a>
                                                <span>June 02, 2020</span>
                                            </h5>
                                        </div>
                                        <ul class="review-rating">
                                            <li class="icofont-ui-rating"></li>
                                            <li class="icofont-ui-rating"></li>
                                            <li class="icofont-ui-rating"></li>
                                            <li class="icofont-ui-rating"></li>
                                            <li class="icofont-ui-rate-blank"></li>
                                        </ul>
                                        <p class="review-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus hic amet qui velit, molestiae suscipit perferendis, autem doloremque blanditiis dolores nulla excepturi ea nobis!</p>
                                        <form class="review-reply">
                                            <input type="text" placeholder="reply your thoughts">
                                            <button><i class="icofont-reply"></i>reply</button>
                                        </form>
                                        <ul class="review-reply-list">
                                            <li class="review-reply-item">
                                                <div class="review-media">
                                                    <a class="review-avatar" href="#">
                                                        <img src="images/avatar/02.jpg" alt="review">
                                                    </a>
                                                    <h5 class="review-meta">
                                                        <a href="#">labonno khan</a>
                                                        <span><b>author -</b> June 02, 2020</span>
                                                    </h5>
                                                </div>
                                                <p class="review-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus hic amet qui velit, molestiae suscipit perferendis, autem doloremque blanditiis dolores nulla excepturi ea nobis!</p>
                                                <form class="review-reply">
                                                    <input type="text" placeholder="reply your thoughts">
                                                    <button><i class="icofont-reply"></i>reply</button>
                                                </form>
                                            </li>
                                            <li class="review-reply-item">
                                                <div class="review-media">
                                                    <a class="review-avatar" href="#">
                                                        <img src="images/avatar/03.jpg" alt="review">
                                                    </a>
                                                    <h5 class="review-meta">
                                                        <a href="#">tahmina bonny</a>
                                                        <span>June 02, 2020</span>
                                                    </h5>
                                                </div>
                                                <p class="review-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus hic amet qui velit, molestiae suscipit perferendis, autem doloremque blanditiis dolores nulla excepturi ea nobis!</p>
                                                <form class="review-reply">
                                                    <input type="text" placeholder="reply your thoughts">
                                                    <button><i class="icofont-reply"></i>reply</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="review-item">
                                        <div class="review-media">
                                            <a class="review-avatar" href="#">
                                                <img src="images/avatar/04.jpg" alt="review">
                                            </a>
                                            <h5 class="review-meta">
                                                <a href="#">shipu shikdar</a>
                                                <span>June 02, 2020</span>
                                            </h5>
                                        </div>
                                        <ul class="review-rating">
                                            <li class="icofont-ui-rating"></li>
                                            <li class="icofont-ui-rating"></li>
                                            <li class="icofont-ui-rating"></li>
                                            <li class="icofont-ui-rating"></li>
                                            <li class="icofont-ui-rate-blank"></li>
                                        </ul>
                                        <p class="review-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus hic amet qui velit, molestiae suscipit perferendis, autem doloremque blanditiis dolores nulla excepturi ea nobis!</p>
                                        <form class="review-reply">
                                            <input type="text" placeholder="reply your thoughts">
                                            <button><i class="icofont-reply"></i>reply</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details-frame">
                                <h3 class="frame-title">add your review</h3>
                                <form class="review-form">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="star-rating">
                                                <input type="radio" name="rating" id="star-1"><label for="star-1"></label>
                                                <input type="radio" name="rating" id="star-2"><label for="star-2"></label>
                                                <input type="radio" name="rating" id="star-3"><label for="star-3"></label>
                                                <input type="radio" name="rating" id="star-4"><label for="star-4"></label>
                                                <input type="radio" name="rating" id="star-5"><label for="star-5"></label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <textarea class="form-control" placeholder="Describe"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <button class="btn btn-inline">
                                                <i class="icofont-water-drop"></i>
                                                <span>drop your review</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=====================================
                    PRODUCT TAB PART END
        =======================================-->


        <!--=====================================
                 PRODUCT RELATED PART START
        =======================================-->
        <section class="inner-section">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section-heading">
                            <h2>related this items</h2>
                        </div>
                    </div>
                </div>
                  <div class="row row-cols-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-4">
                            





<?php
$args = array(
    'post_type'      => 'product',
    'post_status'    => 'publish',
    'hide_empty' => true,
    'orderby'=>'random',
    'posts_per_page' => 4,
    'columns'        => 4,
    'orderby'        => 'rand'
);

$loop = new WP_Query($args);
while ( $loop->have_posts() ) {
    $loop->the_post();
      $regular_price = get_post_meta(get_the_ID(), '_regular_price', true);
      $sale_price = get_post_meta(get_the_ID(), '_sale_price', true);
      $terms = get_the_terms($post->ID, 'product_cat');
      foreach ($terms as $term) 
      {
           $product_cat_name = $term->name;
            $product_cat_id = $term->term_id;
            break;
    }

    ?>
    

                            <!-- Product loop start here -->
                            <div class="col">
                                <div class="product-card">
                                    <div class="product-media">
                                        <div class="product-label">
                                            <label class="label-text new">new</label>
                                        </div>
                                        <button class="product-wish wish">
                                            <i class="fas fa-heart"></i>
                                        </button>
                                        <a class="product-image" href="<?php echo get_permalink($id); ?>">
                             <img src="<?php the_post_thumbnail('full', array('class' => 'img-fluid w-100','alt'=>'product'));?>

                                         </a>
                                        <div class="product-widget">
                                            <a title="Product Compare" href="compare.html" class="fas fa-random"></a>
                                            <a title="Product Video" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a>
                                            <a title="Product View" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-rating">
                                            <i class="active icofont-star"></i>
                                            <i class="active icofont-star"></i>
                                            <i class="active icofont-star"></i>
                                            <i class="active icofont-star"></i>
                                            <i class="icofont-star"></i>
                                            <a href="product-video.html">(3)</a><br>
                                            
                                        </div>
                                        <div><small>
                                             <a href="<?php echo esc_url(get_term_link($product_cat_id, 'product_cat')); ?>" ><?php echo $product_cat_name ?></a>
</small></div>
                                        <h6 class="product-name">
                                            <a href="product-video.html"><?php the_title(); ?></a>
                                        </h6>
                                        <h6 class="product-price">
                                            <del>₹<?php echo $sale_price ?> </del>
                                            <span>₹<?php echo $regular_price ?></span>
                                        </h6>
                                        <button  href="<?php echo get_permalink(wc_get_page_id('cart'))  . "?add-to-cart=" .  get_the_ID(); ?> " class="product-add" title="Add to Cart">
                                            <i class="fas fa-shopping-basket"></i>
                                            <span>add</span>
                                        </button>
                                        <div class="product-action">
                                            <button class="action-minus" title="Quantity Minus"><i class="icofont-minus"></i></button>
                                            <input class="action-input" title="Quantity Number" type="text" name="quantity" value="1">
                                            <button class="action-plus" title="Quantity Plus"><i class="icofont-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <?php
}?>

                 <!-- Product loop End here -->

                  
              <!--   <div class="row">
                    <div class="col-lg-12">
                        <div class="section-btn-25">
                            <a href="shop-4column.html" class="btn btn-outline">
                                <i class="fas fa-eye"></i>
                                <span>view all related</span>
                            </a>
                        </div>
                    </div>
                </div> -->
            </div>
        </section>
        <!--=====================================
                 PRODUCT RELATED PART END
        =======================================-->


    
<?php get_footer();?>