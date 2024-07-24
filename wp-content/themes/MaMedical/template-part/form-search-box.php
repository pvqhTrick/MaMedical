<div class="formSearch">
    <div class="inner">
        <div class="formSearchBox">
            <form id="search-form">
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
                    <button type="button" class="formInputSubmit hover" onclick="filterDoctors()">この条件で検索する</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- <div id="doctor-list">
    <p class="doctor" data-specialty="1" data-disease="心臓病">Dr. John Doe - Cardiologist</p>
    <p class="doctor" data-specialty="2" data-disease="神経病">Dr. Jane Smith - Neurologist</p>
    <p class="doctor" data-specialty="1" data-disease="小児病">Dr. Mike Johnson - Pediatrician</p>
    <p class="doctor" data-specialty="2" data-disease="皮膚病">Dr. Emily Davis - Dermatologist</p>
</div>

<script>
function filterDoctors() {
    const specialty = document.querySelector('select[name="specialty"]').value;
    const disease = document.querySelector('input[name="disease"]').value.toLowerCase();
    const doctors = document.querySelectorAll('#doctor-list .doctor');
    
    doctors.forEach(doctor => {
        const doctorSpecialty = doctor.getAttribute('data-specialty');
        const doctorDisease = doctor.getAttribute('data-disease').toLowerCase();
        
        const matchesSpecialty = specialty === "" || doctorSpecialty === specialty;
        const matchesDisease = disease === "" || doctorDisease.includes(disease);
        
        if (matchesSpecialty && matchesDisease) {
            doctor.style.display = 'block';
        } else {
            doctor.style.display = 'none';
        }
    });
}
</script> -->

<!-- <div class="formSearch">
    <div class="inner">
        <div class="formSearchBox">
            <form action="search-doctor.php" id="search-form">
                <h3 class="formTitle">医師を検索する</h3>
                <div class="formContent">
                    <div class="formField">
                        <p class="formLabel">専門分野</p>
                        <div class="formInput">
                            <select name="" class="formInputSelect">
                                <option value="">選択してください</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                    </div>
                    <div class="formField">
                        <p class="formLabel">対応可能な疾患</p>
                        <div class="formInput">
                            <input type="text" name="" class="formInputText" placeholder="疾患名を入力してください">
                        </div>
                    </div>
                    <input type="submit" class="formInputSubmit hover" value="この条件で検索する">
                </div>
            </form>
        </div>
    </div>
</div>
.formSearch -->