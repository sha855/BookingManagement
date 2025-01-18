<?php
if(!auth()->check()) return;
[$notifications,$countUnread] = getNotify();
?>

<li class="dropdown-notifications dropdown p-0" style="margin-top: 9px;">
    <a href="#" data-toggle="dropdown" class="is_login">
        <i class="fa fa-bell-o mr-3 mt-3" style="font-size: 20px;
   color: red;
   top: -9px;
    position: relative;"></i>
        <h1 class="notification-icon" style="top: -28px;
    color: red;">@if($countUnread) . @endif</h1>
        <!--<i class="fa fa-angle-down " style="left: -18px;-->
        <!--position: relative;"></i>-->
    </a>
    <ul class="dropdown-menu overflow-auto notify-items dropdown-container dropdown-menu-right dropdown-large">
        <div class="dropdown-toolbar">
            <div class="dropdown-toolbar-actions">
                <a href="#" class="markAllAsRead">{{__('Mark all as read')}}</a>
            </div>
            <h3 class="dropdown-toolbar-title">{{__('Notifications')}} (<span class="notif-count">{{$countUnread}}</span>)</h3>
        </div>
        <ul class="dropdown-list-items p-0">
            @if(count($notifications)> 0)
                @foreach($notifications as $oneNotification)
                    @php
                        $active = $class = '';
                        $data = json_decode($oneNotification['data']);

                        $idNotification = @$data->id;
                        $forAdmin = @$data->for_admin;
                        $usingData = @$data->notification;

                        $services = @$usingData->type;
                        $idServices = @$usingData->id;
                        $title = @$usingData->message;
                        $name = @$usingData->name;
                        $avatar = @$usingData->avatar;
                        $link = @$usingData->link;

                        if(empty($oneNotification->read_at)){
                            $class = 'markAsRead';
                            $active = 'active';
                        }
                    @endphp
                    <li class="notification {{$active}}">
                        <a class="{{$class}} p-0" data-id="{{$idNotification}}" href="{{$link}}">
                            <div class="media">
                                <div class="media-left">
                                    <div class="media-object">
                                        @if($avatar)
                                            <img class="image-responsive" src="{{$avatar}}" alt="{{$name}}">
                                        @else
                                            <span class="avatar-text">{{ucfirst($name[0])}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="media-body">
                                    {!! $title !!}
                                    <div class="notification-meta">
                                        <small class="timestamp">{{format_interval($oneNotification->created_at)}}</small>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            @endif
        </ul>
        <div class="dropdown-footer text-center">
            <a href="{{route('core.notification.loadNotify')}}">{{__('View More')}}</a>
        </div>
    </ul>
</li>
