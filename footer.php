    <div class="footer">
            <div class="text-center">
                copywrite &copy : <?php echo date("Y ") ; bloginfo("name") ?>
            </div>
                <ul class="d-flex justify-content-around mt-4">
                    <?php
                        $pages = get_pages();
                        foreach($pages as $page){
                    ?>
                        <li class="list-unstyled pb-3 cursor-pointer ">
                            <?php echo $page->post_title;?>
                        </li>
                    <?php } ?>
                </ul>
        </div>
    <?php wp_footer(); ?>
    </body>


</html
