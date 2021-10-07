<?php

Blade::directive('comment',function (){
    return view('test');
});

Blade::if('check',function (){
    if (!auth()->check()){
        return true;
    }else{
        return false;
    }
});
