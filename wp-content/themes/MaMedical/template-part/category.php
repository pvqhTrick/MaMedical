<?php $categories = wp_get_post_terms(get_the_ID(), 'specialized-field');

if ($categories): ?>
    <ul class="rFList">
        <?php foreach ($categories as $item): ?>
            <li><?php echo $item->name ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>e:\BPO\MaMedical\html\contact.html