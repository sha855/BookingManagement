{{-- @php
$main_color =setting_item('style_main_color','#5291fa')
@endphp
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
    <head>
        <title></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--<![endif]-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' id='google-font-css-css'  href='https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600' type='text/css' media='all' />
        <style>
        
               
            
           
        </style>
    </head>
    <body>
        <div class="b-email-wrap">
            @include('Email::parts.header')

            @yield('content')

            @include('Email::parts.footer')
        </div>
    </body>
</html>



--}}









<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,500;1,600&display=swap" rel="stylesheet">

    <title></title>
</head>
<style>
   

         
</style>

<body>
    
<div class="col-md-8 offset-md-2 mt-5 border mb-4" style="background:#b5afaf0a;">
  
  
            
             @include('Email::parts.header')

             @yield('content')
               {{--
             @include('Email::parts.footer')
            --}}
  
    
  
    
     </div>

</body>
</html>














