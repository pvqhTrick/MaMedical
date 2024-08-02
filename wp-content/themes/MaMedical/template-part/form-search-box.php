<div class="formSearch">
    <div class="inner">
        <div class="formSearchBox">
            <form action="<?php echo home_url( '/' ); ?>" id="search-form">
                <h3 class="formTitle">医師を検索する</h3>
                <div class="formContent">
                    <div class="formField">
                        <p class="formLabel">専門分野</p>
                        <div class="formInput">
                            <select name="specialty" class="formInputSelect">
                            <?php $categories = get_terms('specialized-field');
                            foreach($categories as $item): ?>
                                <option value="<?php echo $item->term_id ?>"><?php echo $item->name ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="formField">
                        <p class="formLabel">対応可能な疾患</p>
                        <div class="formInput">
                            <input type="text" name="text" class="formInputText" placeholder="疾患名を入力してください">
                        </div>
                    </div>
                    <input type="submit" class="formInputSubmit hover" value="この条件で検索する">
                </div>
            </form>
        </div>
    </div>
</div>