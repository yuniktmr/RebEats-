/* global $ */
/* global window */
/* global document */
/*jslint browser: true*/
/*global $, jQuery, alert*/
$(document).ready(function () {
    $('#toggle-btn').click(function () {
                           $('.nav-links').slideToggle(1000);
                           })
})
$(window).scroll(function(){
            let scroll = $(window).scrollTop();
            if (scroll > 70){
                $('#nav').addClass("new-nav");
            }    else{
                $('#nav').removeClass("new-nav");
            }
                 })
$('nav a').click(function(link){
    link.preventDefault();
    let target = $(this).attr('href');
    $('html','body').animate({
        scrollTop : $(target).offset().top
    }, "slow");
})

function onload(){

    firebase.auth().onAuthStateChanged(function(user) {

    console.log(user.email)

    });

    
}