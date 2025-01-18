<div class="row" style="width: 100%;
   margin-left:1px;">
    <div class="col-lg-3 col-md-12" >
        <?php echo $__env->make('Hotel::frontend.layouts.search.filter-search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
                <?php
    $terms = request('terms'); 
   
    $lastTermId = null;

    if ($terms && is_array($terms) && count($terms) > 0) {
        $lastTermId = end($terms);
        
        $name = DB::table('bravo_terms')->where('id',$terms)->first();
    
    }
?>

    <div class="col-lg-9 col-md-12">
        <div class="bravo-list-item">
            <div class="topbar-search">
                <h5 class="text">
                    <?php if($rows->total() > 1): ?>
                      
                        
                    <?php if(isset($name)): ?>
                    
                      <?php echo e(__(":count $name->name Found",['count'=>$rows->total()])); ?>

                    
                    <?php else: ?>
                    
                     <?php echo e(__(":count staycations found",['count'=>$rows->total()])); ?>

                    
                    <?php endif; ?>
                        
                        
                        
                    <?php else: ?>
                        <?php echo e(__(":count staycations found",['count'=>$rows->total()])); ?>

                    <?php endif; ?>
                </h5>
                <div class="control">
                    <?php echo $__env->make('Hotel::frontend.layouts.search.orderby', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <div class="list-item">
                <div class="row">
                    <?php if($rows->total() > 0): ?>
                        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $layout = setting_item("hotel_layout_item_search",'list') ?>
                            <?php if($layout == "list"): ?>
                                <div class="col-lg-12 col-md-12">
                                    <?php echo $__env->make('Hotel::frontend.layouts.search.loop-list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php else: ?>
                                <div class="col-lg-4 col-md-12">
                                    <?php echo $__env->make('Hotel::frontend.layouts.search.loop-grid', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="col-lg-12">
                            <?php echo e(__("staycations not found")); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="bravo-pagination">
                <?php echo e($rows->appends(request()->query())->links()); ?>

                <?php if($rows->total() > 0): ?>
                    <span class="count-string"><?php echo e(__("Showing :from - :to of :total staycations",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()])); ?></span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    </div>

<?php /**PATH /home/u533143048/domains/techdocklabs.com/public_html/roamiodeals/themes/BC/Hotel/Views/frontend/layouts/search/list-item.blade.php ENDPATH**/ ?>