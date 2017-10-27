<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package OnePress
 */
?>
    <footer id="colophon" class="site-footer" role="contentinfo">
        <?php
        $onepress_btt_disable = get_theme_mod('onepress_btt_disable');
        $onepress_social_footer_title = get_theme_mod('onepress_social_footer_title', esc_html__('Keep Updated', 'onepress'));

        $onepress_newsletter_disable = get_theme_mod('onepress_newsletter_disable', '1');
        $onepress_social_disable = get_theme_mod('onepress_social_disable', '1');
        $onepress_newsletter_title = get_theme_mod('onepress_newsletter_title', esc_html__('Join our Newsletter', 'onepress'));
        $onepress_newsletter_mailchimp = get_theme_mod('onepress_newsletter_mailchimp');

        if ( $onepress_newsletter_disable != '1' || $onepress_social_disable != '1' ) : ?>
            <div class="footer-connect">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <?php if ($onepress_newsletter_disable != '1') : ?>
                            <div class="col-sm-4">
                                <div class="footer-subscribe">
                                    <?php if ($onepress_newsletter_title != '') echo '<h5 class="follow-heading">' . $onepress_newsletter_title . '</h5>'; ?>
                                    <form novalidate="" target="_blank" class="" name="mc-embedded-subscribe-form" id="mc-embedded-subscribe-form" method="post"
                                          action="<?php if ($onepress_newsletter_mailchimp != '') echo $onepress_newsletter_mailchimp; ?>">
                                        <input type="text" placeholder="<?php esc_attr_e('Enter your e-mail address', 'onepress'); ?>" id="mce-EMAIL" class="subs_input" name="EMAIL" value="">
                                        <input type="submit" class="subs-button" value="<?php esc_attr_e('Subscribe', 'onepress'); ?>" name="subscribe">
                                    </form>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="<?php if ( $onepress_newsletter_disable == '1' ) {
                            echo 'col-sm-8';
                        } else {
                            echo 'col-sm-4';
                        } ?>">
                            <?php
                            if ($onepress_social_disable != '1') {
                                ?>
                                <div class="footer-social">
                                    <?php
                                    if ($onepress_social_footer_title != '') echo '<h5 class="follow-heading">' . $onepress_social_footer_title . '</h5>';

                                    $socials = onepress_get_social_profiles();
                                    /**
                                     * New Socials profiles
                                     *
                                     * @since 1.1.4
                                     * @change 1.2.1
                                     */
                                    echo '<div class="footer-social-icons">';
                                    if ( $socials ) {
                                        echo $socials;
                                    } else {
                                        /**
                                         * Deprecated
                                         * @since 1.1.4
                                         */
                                        $twitter = get_theme_mod('onepress_social_twitter');
                                        $facebook = get_theme_mod('onepress_social_facebook');
                                        $google = get_theme_mod('onepress_social_google');
                                        $instagram = get_theme_mod('onepress_social_instagram');
                                        $rss = get_theme_mod('onepress_social_rss');

                                        if ($twitter != '') echo '<a target="_blank" href="' . $twitter . '" title="Twitter"><i class="fa fa-twitter"></i></a>';
                                        if ($facebook != '') echo '<a target="_blank" href="' . $facebook . '" title="Facebook"><i class="fa fa-facebook"></i></a>';
                                        if ($google != '') echo '<a target="_blank" href="' . $google . '" title="Google Plus"><i class="fa fa-google-plus"></i></a>';
                                        if ($instagram != '') echo '<a target="_blank" href="' . $instagram . '" title="Instagram"><i class="fa fa-instagram"></i></a>';
                                        if ($rss != '') echo '<a target="_blank" href="' . $rss . '"><i class="fa fa-rss"></i></a>';
                                    }
                                    echo '</div>';
                                    ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="site-info">
          <div class="container">
            <div class="btt">
              <a class="back-top-top" href="#page" title="Back To Top"><i class="fa fa-angle-double-up wow flash" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-name: flash;"></i></a>
            </div>
            <div class="ctp-footer-cta">
              <ul class="no-bullet">
                <li>
                  <a href="http://ch.atosconsulting.com/#!/competencies" class="button cta" target="_blank">
                    <i class="icon icon-trophy"></i>
                    <span>Compe&shy;tencies</span>
                  </a>
                </li>
                <li>
                  <a href="http://ch.atosconsulting.com/#!/home?section=events" class="button cta" target="_blank">
                    <i class="icon icon-newspaper-o"></i>
                    <span>News &amp; Events</span>
                  </a>
                </li>
                <li>
                  <a href="http://ch.atosconsulting.com/#!/career?section=jobs" class="button cta" target="_blank">
                    <i class="icon icon-child"></i>
                    <span>Jobs</span>
                  </a>
                </li>
                <li>
                  <a href="http://ch.atosconsulting.com/#!/about?section=contact" class="button cta" target="_blank">
                    <i class="icon icon-envelope"></i>
                    <span>Contact</span>
                  </a>
                </li>
                <li>
                  <a href="http://ch.atosconsulting.com/#!/home" class="button cta" target="_blank">
                    <i class="icon icon-home"></i>
                    <span>Atos Consulting CH</span>
                  </a>
                </li>
              </ul>
            </div>
            <div class="ctp-hr">
              <hr>
            </div>
            <div class="ctp-footer-address">
              <ul class="no-bullet">
                <li>
                  <h6>Nyon</h6>
                  <p>27 ch. de Précossy<br>
                    CH-1260 Nyon<br>
                    Tel +41 22 306 4646<br>
                    <a href="&#10;https://www.google.ch/maps/place/Chemin+de+precossy+27,+1260+Nyon/@46.3899562,6.2240407,17z/data=!3m1!4b1!4m2!3m1!1s0x478c5cd4acc16f4b:0xf379c14bf37dc4e3" target="_blank">Plan Route</a>
                  </p>
                </li>
                <li>
                  <h6>Zurich</h6>
                  <p>Freilagerstrasse 28<br>
                    CH-8047 Zürich<br>
                    Tel +41 58 702 2222<br>
                    <a href="https://www.google.ch/maps/place/Freilagerstrasse+28,+8047+Z%C3%BCrich/@47.3788507,8.4898923,17z/data=!3m1!4b1!4m2!3m1!1s0x47900bd25e6cf419:0x4b4c6ff0aa3af934" target="_blank">Plan Route</a>
                  </p>
                </li>
                <li>
                  <h6>Basel </h6>
                  <p>Aeschenvorstadt 71<br>
                    CH-4051 Basel<br>
                    Tel +41 61 271 9140<br>
                    <a href="https://www.google.ch/maps/place/Aeschenvorstadt+71,+4051+Basel/@47.5518987,7.5922319,17z/data=!3m1!4b1!4m2!3m1!1s0x4791b84ccada0915:0xbd88b41006126d19" target="_blank">Plan Route</a>
                  </p>
                </li>
                <li>
                  <h6>Budapest </h6>
                  <p>Infopark A<br>
                    Neumann Janos u 1.<br>
                    1117 Budapest<br>
                    Tel +36 1 920 2500<br>
                    <a href="https://www.google.ch/maps/place/Budapest,+1117+Hungary/@47.4693965,19.058717,17z/data=!3m1!4b1!4m2!3m1!1s0x4741dd07818cfbe7:0x58c6b4918fcfefa" target="_blank">Plan Route</a>
                  </p>
                </li>
              </ul>
            </div>
            Copyright © 2017 Atos Consulting CH </div>
        </div>
        <!-- .site-info -->

    </footer><!-- #colophon -->
<?php
/**
 * Hooked: onepress_site_footer
 *
 * @see onepress_site_footer
 */
do_action( 'onepress_site_end' );
?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
