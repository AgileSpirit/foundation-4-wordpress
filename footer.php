<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Agile_spirit
 * @since Agile Spirit 1.0
 */
?>
  </div><!-- #main  -->
  <br>
  <footer id="site-footer" role="contentinfo">
    <div id="site-footer-top">
      <div class="row">
        <!--
        <div class="large-4 columns">
          <h3><a href="http://agile-spirit.fr"> Agile Spirit</a></h3>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum hendrerit mi iaculis, congue orci nec, interdum enim. Proin a elit placerat, placerat risus at, gravida purus. Aliquam suscipit metus elit, in lobortis purus aliquet et. Quisque egestas elit sit amet mattis dapibus. Proin scelerisque urna at lacinia pharetra. Phasellus ultricies elit nisl, ut bibendum purus faucibus vitae. Donec non vestibulum arcu. Suspendisse potenti. Sed eu interdum ipsum. Mauris purus nulla, imperdiet eget nisi ac, tristique feugiat orci. Aenean egestas porta nunc ut mattis. Duis mattis volutpat dui, vitae lacinia orci dictum et. Fusce nisi nisl, eleifend quis est ut, tincidunt imperdiet mauris. Cras a odio nec mauris vulputate viverra. Duis tempus posuere ornare.
          </p>
        </div>
        <div class="large-4 columns">
          <h3>En savoir plus</h3>
          <p>
            Aliquam nec tempus magna. Aliquam sit amet purus vehicula diam suscipit cursus. Cras fermentum felis et tortor tincidunt tincidunt. Phasellus congue felis eget justo congue sollicitudin et a metus. In hac habitasse platea dictumst. Maecenas commodo condimentum felis. Pellentesque tincidunt libero sit amet lacus molestie luctus sit amet quis lorem. Sed eget arcu orci. Suspendisse felis turpis, porta tempor gravida venenatis, aliquet eget sem. Etiam a purus adipiscing, volutpat eros sed, lobortis dui. Sed ultricies nunc eu viverra sollicitudin. Cras quis odio ante. Mauris sollicitudin vehicula leo in blandit.
          </p>
        </div>
        <div class="large-4 columns">
          <h3>Nous contacter</h3>
          <p>
            Ut fringilla euismod mi, ac egestas est sagittis ut. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque nec ligula mollis ipsum bibendum imperdiet eget sed turpis. Maecenas metus odio, faucibus id scelerisque in, faucibus iaculis massa. Ut sollicitudin tellus sit amet quam suscipit venenatis. Fusce vestibulum tempus egestas. Nunc rhoncus ullamcorper nibh, ac pellentesque leo viverra sed. Nulla tincidunt nunc dui, nec aliquet felis mollis in. Suspendisse vulputate tellus id justo laoreet, gravida blandit est commodo. Maecenas sapien diam, accumsan malesuada erat eu, vehicula tempus dui. Quisque sed lacus quis orci volutpat elementum.
          </p>
        </div>
        -->
      </div>
    </div><!-- #site-footer-top -->

    <div id="site-footer-bottom">
      <div class="row">
        © 2012-2013 Agile Spirit
      </div>
    </div><!-- #site-footer-bottom -->

  </footer><!-- #site-footer -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script>
document.write('<script src=' +
('__proto__' in {} ? '<?php echo get_template_directory_uri(); ?>/js/vendor/zepto' : '<?php echo get_template_directory_uri(); ?>/js/vendor/jquery') +
'.js><\/script>')
</script>

<script src="<?php bloginfo('template_directory'); ?>/js/foundation.min.js"></script>
<script>
  $(document).foundation();
</script>

</body>
</html>