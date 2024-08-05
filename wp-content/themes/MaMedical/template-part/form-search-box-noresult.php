<div class="formSearch noResult">
    <div class="inner">
        <div class="formSearchBox">
            <h3 class="formTitle">検索結果</h3>
            <h4 class="textLg">該当する医師は見つかりませんでした</h4>
            <p class="textSm">条件を変更して再度検索<br class="sp">してください</p>
            <?php echo result_search() ?>
            <p class="btnSpecialized"><a href="<?php echo home_url('/doctor/') ?>" class="hover">違う条件で再検索する</a></p>
        </div>
    </div>
</div>