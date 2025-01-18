@php
    $actives = \App\Currency::getActiveCurrency();
    $current = \App\Currency::getCurrent('currency_main');
@endphp
{{--Multi Language--}}
@if(!empty($actives) and count($actives) > 1)
    <li class="dropdown">
        @foreach($actives as $currency)
            @if($current == $currency['currency_main'])
                <a href="#" data-toggle="dropdown" class="is_login">
                    
                   @if($currency['currency_main']== 'aed')
                             <img src = "{{asset('images/Flag_of_the_United_Arab_Emirates_1.png')}}" style="height:15px; width:25px;">
                             @else
                     <img src = "{{asset('images/1235px-Flag_of_the_United_States.png')}}" style="height:15px; width:25px;">
                          @endif
                 
                 {{strtoupper($currency['currency_main'])}}
                    <i class="fa fa-angle-down"></i>
                </a>
            @endif
        @endforeach
        <ul class="dropdown-menu text-left width-auto">
            @foreach($actives as $currency)
                @if($current != $currency['currency_main'])
                    <li>
                        <a href="{{get_currency_switcher_url($currency['currency_main'])}}" class="is_login" >
                            
                            @if($currency['currency_main']== 'aed')
                             <img src = "{{asset('images/Flag_of_the_United_Arab_Emirates_1.png')}}" style="height:15px; width:25px;">
                             @else
                     <img src = "{{asset('images/1235px-Flag_of_the_United_States.png')}}" style="height:15px; width:25px;">
                          @endif
                
                 
                 
                 {{strtoupper($currency['currency_main'])}}
                        </a>
                    </li>
                @endif
            @endforeach

         
        </ul>
    </li>
@endif
{{--End Multi language--}}