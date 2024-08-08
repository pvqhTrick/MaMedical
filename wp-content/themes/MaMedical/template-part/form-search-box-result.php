<div class="formSearch result">
    <div class="inner">
        <div class="formSearchBox">
            <h3 class="formTitle">検索結果</h3>
            <h4 class="textLg"><?php echo $args['number'] ?>名 見つかりました</h4>
            <?php echo result_search(); ?>
            <p class="btnSpecialized"><a href="<?php echo home_url('/doctor/') ?>" class="hover">違う条件で再検索する</a></p>
        </div>
    </div>
</div>
<!-- .formSearch -->