<?php $footertxt = get_option("jn_footer_txt"); ?>
<footer>   
                <div id="footer-content">
                    <p><?php echo $footertxt; ?></p>
                    <a href="<?php echo admin_url(); ?>">Login</a>
                </div>
            </footer>      
        </div><!--#page--->
        <?php wp_footer(); ?>
    </body>
</html>

