 <?php if(count($event_related) > 0): ?>
    <div class="bravo-list-space-related">
        <h2 style="text-align:start"><?php echo e(__("You might also like")); ?></h2>
        <div class="row">
            <?php $__currentLoopData = $event_related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3">
                    <?php echo $__env->make('Event::frontend.layouts.search.loop-grid',['row'=>$item,'include_param'=>0], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?>

<?php /**PATH /home/u533143048/domains/techdocklabs.com/public_html/roamiodeals/themes/BC/Event/Views/frontend/layouts/details/related.blade.php ENDPATH**/ ?>