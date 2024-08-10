<?php $query = $args['query']; ?>
<div class="toggleContent">
    <span class="inputCheckbox">
        <?php while ($query->have_posts()): $query->the_post();            
            $doctor_no = get_post_meta(get_the_ID(), 'doctor_no', true);
            $doctor_name = get_the_title();?>
            <span class="wpcf7-list-item">
                <label>
                    <input type="checkbox" name="your-doctor[]" value="<?php echo esc_attr('医師No.'.$doctor_no . '　' . $doctor_name) ?>">
                    <span class="wpcf7-list-item-label"><?php echo ('医師No.'.$doctor_no . '　' . $doctor_name); ?></span>
                </label>
            <p class="linkDetail"><a href="<?php echo get_permalink() ?>" class="hover"><?php echo $doctor_name.'のプロフィール'?></a></p>
            </span>
        <?php endwhile; ?>        
    </span>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('input[type="checkbox"][name="your-doctor[]"]');
    const maxChecked = 3;

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const checkedCount = document.querySelectorAll('input[type="checkbox"][name="your-doctor[]"]:checked').length;
            if (checkedCount >= maxChecked) {
                checkboxes.forEach(cb => {
                    if (!cb.checked) {
                        cb.classList.add('hidden-checkbox');
                        // cb.style.visibility = 'hidden'; 
                        
                    }
                });
            } else {
                checkboxes.forEach(cb => {
                    cb.classList.remove('hidden-checkbox');
                    // cb.style.visibility = 'visible'; 
                });
            }
        });
    });

    const checkbox = document.getElementById('your-confirm');
    const submitButton = document.getElementById('submit-button');

    checkbox.addEventListener('change', function() {
        if (this.checked) {
            submitButton.style.visibility = 'visible'; 
        } else {
            submitButton.style.visibility = 'hidden'; 
        }
    });
});
</script>
<?php wp_reset_postdata(); ?>