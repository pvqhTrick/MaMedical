<div class="formSearch">
    <div class="inner">
        <div class="formSearchBox">
            <form action="search-doctor.php" id="search-form">
                <h3 class="formTitle">医師を検索する</h3>
                <div class="formContent">
                    <div class="formField">
                        <p class="formLabel">専門分野</p>
                        <div class="formInput">
                            <select name="specialty" class="formInputSelect">
                                <option value="">選択してください</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                    </div>
                    <div class="formField">
                        <p class="formLabel">対応可能な疾患</p>
                        <div class="formInput">
                            <input type="text" name="disease" class="formInputText" placeholder="疾患名を入力してください">
                        </div>
                    </div>
                    <input type="submit" class="formInputSubmit hover" value="この条件で検索する">
                </div>
            </form>
        </div>
    </div>
</div>