<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/php_mvc/public/css/chat.css">
    <title>Document</title>
</head>
<body>
<div class="pop-up">
    <img src="http://localhost/php_mvc/public/image/messenger.png" alt="">
</div>

<div class="father">
    <div class="container-c">
        <div class="left-c">
            <div class="search-user">
                <input type="text" placeholder="Search user...">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                  </svg>
            </div>
            <div class="listuser">
                <div class="users">




                </div>
            </div>
        </div>
        
        
    
        <!-- right -->
    
    <div class="right-c">
        <div class="title">
            <div class="img"><img  alt=""></div>
            <input type="hidden" name="" class="title-id">
            <div class="name-title"></div>
        </div>
        <div class="field-chat">


    
        </div>
        <div class="field-write">
            <input type="text" name="" id="mess-content" placeholder="Aa">
<div onclick="SendMess()" class="send">
<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
              </svg>
</div>
        </div>
    </div>
    
        <!-- end rigght -->
    </div>
</div>
<script src="http://localhost/php_mvc/public/js/chat.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</body>
</html>