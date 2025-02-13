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

{{--
<!-- <ul class="main-menu pb-5">-->
<!--    @foreach($menus as $menuItem)-->
    
<!--        @php $menuItem['class'] .= " ".str_ireplace("/","_",$menuItem['url']) @endphp-->
<!--        <li class="{{$menuItem['class']}}"><a href="{{ url($menuItem['url']) }}">-->
            
<!--                @if(!empty($menuItem['icon']))-->
<!--                    <span class="icon text-center"><i class="{{$menuItem['icon']}}"></i></span>-->
<!--                @endif-->
<!--                {!! clean($menuItem['title'],[-->
<!--                    'Attr.AllowedClasses'=>null-->
<!--                ]) !!}-->
<!--            </a>-->
<!--            @if(!empty($menuItem['children']))-->
<!--                <span class="btn-toggle"><i class="fa fa-angle-left pull-right"></i></span>-->
<!--                <ul class="children">-->
<!--                    @foreach($menuItem['children'] as $menuItem2)-->
<!--                        <li class="{{$menuItem['class']}}"><a href="{{ url($menuItem2['url']) }}">-->
<!--                                @if(!empty($menuItem2['icon']))-->
<!--                                    <i class="{{$menuItem2['icon']}}"></i>-->
<!--                                @endif-->
<!--                                {!! clean($menuItem2['title'],[-->
<!--                                    'Attr.AllowedClasses'=>null-->
<!--                                ]) !!}</a>-->
<!--                        </li>-->
<!--                    @endforeach-->
<!--                </ul>-->
<!--            @endif-->
<!--        </li>-->
<!--    @endforeach-->
<!--</ul>  -->
--}}

<ul class="main-menu pb-5">
    @foreach($menus as $menuItem)
        @php 
            $menuItem['class'] .= " " . str_ireplace("/", "_", $menuItem['url']);
            $hideMenu = stripos($menuItem['title'], 'Tools') !== false ||
                       
                        stripos($menuItem['title'], 'Reports') !== false ||
                        
                          stripos($menuItem['title'], 'User Plans') !== false;
        @endphp
        @unless($hideMenu)
            <li class="{{$menuItem['class']}}"><a href="{{ url($menuItem['url']) }}">
                @if(!empty($menuItem['icon']))
                    <span class="icon text-center"><i class="{{$menuItem['icon']}}"></i></span>
                @endif
                {!! clean($menuItem['title'], [
                    'Attr.AllowedClasses' => null
                ]) !!}
            </a>
            @if(!empty($menuItem['children']))
                <span class="btn-toggle"><i class="fa fa-angle-left pull-right"></i></span>
                <ul class="children">
                    @foreach($menuItem['children'] as $menuItem2)
                        @php
                            $hideMenu2 = stripos($menuItem2['title'], 'Tools') !== false ||
                                       
                                         stripos($menuItem2['title'], 'Reports') !== false||
                                         
                                          stripos($menuItem['title'], 'User Plans') !== false;
                        @endphp
                        @unless($hideMenu2)
                            <li class="{{$menuItem['class']}}"><a href="{{ url($menuItem2['url']) }}">
                                @if(!empty($menuItem2['icon']))
                                    <i class="{{$menuItem2['icon']}}"></i>
                                @endif
                                {!! clean($menuItem2['title'], [
                                    'Attr.AllowedClasses' => null
                                ]) !!}
                            </a></li>
                        @endunless
                    @endforeach
                </ul>
            @endif
            </li>
        @endunless
    @endforeach
</ul>




