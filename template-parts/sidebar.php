<?php
/**
 * @package Anila
 *
 */
 
/* ========================
 * Header Template Page 
 * ========================
 */
?>
<div class="sidebar">
    <div class="sidebar-wrapper container-fluid">
        <div class="row">
            <col>
            <a class="navbar-brand mx-auto text-center" href="<?php echo get_site_url(); ?>">
                <?php if ( ! empty ( get_option( 'logo' ) )) { ?>

                <img class="img-fluid" style="max-width: <?php echo get_option( 'logosize' ); ?>" src="<?php echo get_option( 'logo' ); ?>"
                    alt="logo">

                <?php } else {

                                        bloginfo();

                                } ?>

            </a>
            </col>
            <col>

            </col>
        </div>
    </div>
    <div class="sidebar-button">
        <button class="hamburger hamburger--spin" id="hamburger" type="button">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </button>
    </div>
    <!-- <div class="sidebar-book-button">
        <button type="button" class="btn btn-secondary btn-lg border-0">Book now</button>
    </div> -->
    <div class="sidebar-socials">
        <?php
            social_display();
        ?>
    <!-- <span class="simple-svg" data-icon="typcn-social-facebook-circular" data-inline="false"></span> -->
    </div>
    <div class="sidebar-contact">
        <div class="side-elements text-uppercase">
            <p class="lead mx-2 side-el-email">
                me@email
            </p>
            <p class="lead mx-2 side-el-phone">
                +1234567890
                </span>
            </p>
        </div>
    </div>
</div>