<?php
 $menus = [
     
           'Booking'=>[
                         'url' =>url('/admin/module/report/booking'),
                         'icon'       => 'icon ion-ios-apps',
                         'title'=>__('All Bookings'),
                          ],
                          
                          
    'admin'=>[
        'url'   => route('admin.index'),
        'title' => __("Dashboard"),
        'icon'  => 'icon ion-ios-desktop',
        "position"=>0
    ],
    'menu'=>[
        "position"=>60,
        'url'        => route('core.admin.menu.index'),
        'title'      => __("Menu"),
        'icon'       => 'icon ion-ios-apps',
        'permission' => 'menu_view',
    ],
    
            
 
    
    'general'=>[
        "position"=>80,
        'url'        => route('core.admin.settings.index',['group'=>'general']),
        'title'      => __('Setting'),
        'icon'       => 'icon ion-ios-cog',
        'permission' => 'setting_update',
        'children'   => \Modules\Core\Models\Settings::getSettingPages(true)
    ], 
    'tools'=>[
        "position"=>90,
        'url'      => route('core.admin.tool.index'),
        'title'    => __("Tools"),
        'icon'     => 'icon ion-ios-hammer',
        'children' => [
            'language'=>[
                'url'        => route('language.admin.index'),
                'title'      => __('Languages'),
                'icon'       => 'icon ion-ios-globe',
                'permission' => 'language_manage',
            ],
            'translation'=>[
                'url'        => route('language.admin.translations.index'),
                'title'      => __("Translation Manager"),
                'icon'       => 'icon ion-ios-globe',
                'permission' => 'language_translation',
            ],
            'logs'=>[
                'url'        => route('admin.logs'),
                'title'      => __("System Logs"),
                'icon'       => 'icon ion-ios-nuclear',
                'permission' => 'system_log_view',
            ],
        ]
    ],
];   



// Modules
$custom_modules = \Modules\ServiceProvider::getActivatedModules();

if(!empty($custom_modules)){
    $custom_modules[] = [
        'id'=>'theme',
        'class'=>\Modules\Theme\ModuleProvider::class
    ];
       

    foreach($custom_modules as $moduleData){
        $module = $moduleData['id'];

        

        $moduleClass = $moduleData['class'];

        if(class_exists($moduleClass))
        {
            $menuConfig = call_user_func([$moduleClass,'getAdminMenu']);

           

            if(!empty($menuConfig)){

                $menus = array_merge($menus,$menuConfig);

               
              }

            $menuSubMenu = call_user_func([$moduleClass,'getAdminSubMenu']);

            if(!empty($menuSubMenu)){
                foreach($menuSubMenu as $k=>$submenu){
                    $submenu['id'] = $submenu['id'] ?? '_'.$k;

                     if(!empty($submenu['parent']) and isset($menus[$submenu['parent']])){
                        $menus[$submenu['parent']]['children'][$submenu['id']] = $submenu;
                        $menus[$submenu['parent']]['children'] = array_values(\Illuminate\Support\Arr::sort($menus[$submenu['parent']]['children'], function ($value) {
                            return $value['position'] ?? 100;
                        }));
                    }
                }

            }
        }

    }
} 



$currentUrl = url(\Modules\Core\Walkers\MenuWalker::getActiveMenu());

$user = \Illuminate\Support\Facades\Auth::user();
if (!empty($menus)){
    foreach ($menus as $k => $menuItem) {

        if (!empty($menuItem['permission']) and !$user->hasPermission($menuItem['permission'])) {
            unset($menus[$k]);
            continue;
        }
        $menus[$k]['class'] = $currentUrl == url($menuItem['url']) ? 'active' : '';
        if (!empty($menuItem['children'])) {
            $menus[$k]['class'] .= ' has-children';
            foreach ($menuItem['children'] as $k2 => $menuItem2) {
                if (!empty($menuItem2['permission']) and !$user->hasPermission($menuItem2['permission'])) {
                    unset($menus[$k]['children'][$k2]);
                    continue;
                }
                $menus[$k]['children'][$k2]['class'] = $currentUrl == url($menuItem2['url']) ? 'active' : '';
            }
        }
    }

    //@todo Sort Menu by Position
    $menus = array_values(\Illuminate\Support\Arr::sort($menus, function ($value) {
        return $value['position'] ?? 100;
    }));

}
?>



<ul class="main-menu pb-5">
    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php 
            $menuItem['class'] .= " " . str_ireplace("/", "_", $menuItem['url']);
            $hideMenu = stripos($menuItem['title'], 'Tools') !== false ||
                       
                        stripos($menuItem['title'], 'Reports') !== false ||
                        
                          stripos($menuItem['title'], 'User Plans') !== false;
        ?>
        <?php if (! ($hideMenu)): ?>
            <li class="<?php echo e($menuItem['class']); ?>"><a href="<?php echo e(url($menuItem['url'])); ?>">
                <?php if(!empty($menuItem['icon'])): ?>
                    <span class="icon text-center"><i class="<?php echo e($menuItem['icon']); ?>"></i></span>
                <?php endif; ?>
                <?php echo clean($menuItem['title'], [
                    'Attr.AllowedClasses' => null
                ]); ?>

            </a>
            <?php if(!empty($menuItem['children'])): ?>
                <span class="btn-toggle"><i class="fa fa-angle-left pull-right"></i></span>
                <ul class="children">
                    <?php $__currentLoopData = $menuItem['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuItem2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $hideMenu2 = stripos($menuItem2['title'], 'Tools') !== false ||
                                       
                                         stripos($menuItem2['title'], 'Reports') !== false||
                                         
                                          stripos($menuItem['title'], 'User Plans') !== false;
                        ?>
                        <?php if (! ($hideMenu2)): ?>
                            <li class="<?php echo e($menuItem['class']); ?>"><a href="<?php echo e(url($menuItem2['url'])); ?>">
                                <?php if(!empty($menuItem2['icon'])): ?>
                                    <i class="<?php echo e($menuItem2['icon']); ?>"></i>
                                <?php endif; ?>
                                <?php echo clean($menuItem2['title'], [
                                    'Attr.AllowedClasses' => null
                                ]); ?>

                            </a></li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
            </li>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>




<?php /**PATH /home/u533143048/domains/techdocklabs.com/public_html/roamiodeals/modules/Layout/admin/parts/sidebar.blade.php ENDPATH**/ ?>