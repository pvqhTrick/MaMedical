<?php 
$listDoctors = get_query_var('listDoctors');
// var_dump($listDoctors);
?>

<div class="formSearch result">
    <div class="inner">
        <div class="formSearchBox">
            <h3 class="formTitle">検索結果</h3>
            <h4 class="textLg"><?php echo count($listDoctors) ?>名 見つかりました</h4>
            <ul class="areaSpecialized">
                <li>
                    <span class="label">専門分野:　</span>
                    <br class="sp">
                    <span class="value"><?php find_category($_GET['specialty'], 'specialized-field') ?></span>
                </li>
                <li>
                    <span class="label">対応可能な疾患:　</span>
                    <br class="sp">
                    <span class="value"><?php echo $_GET['text'] ?></span>
                </li>
            </ul>
            <p class="btnSpecialized"><a href="<?php echo home_url('/doctor/') ?>" class="hover">違う条件で再検索する</a></p>
        </div>
    </div>
</div>
 <!-- .formSearch -->