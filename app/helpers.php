<?php

function user(){
    return auth()->user();
}


function friendRequests(){
    return user()->friendRequests;
}
?>