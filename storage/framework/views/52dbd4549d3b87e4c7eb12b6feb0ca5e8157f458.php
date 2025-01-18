<?php
    $terms_ids = $row->terms->pluck('term_id');
    $attributes = \Modules\Core\Models\Terms::getTermsById($terms_ids);
?>
<?php /**PATH /home/u533143048/domains/techdocklabs.com/public_html/roamiodeals/themes/BC/Hotel/Views/frontend/layouts/details/hotel-attributes.blade.php ENDPATH**/ ?>