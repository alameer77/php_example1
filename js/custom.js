/* global js,alerts */

$(function(){
    'use strict';

    // start contact-form

    var UserError = true,
        emailErroe = true,
        messageError = true;
       
        

    // function checkErroe(){

    //     if(UserError === true || emailErroe === true || messageError === true){
    //         $(this).parent().find(".submit").fadeOut(100);
    //     }
    //     else{
    //         console.log("this Ok");
    //     }
    // }




    $('.username').blur(function(){// show erroe
        if($(this).val().length < 4 ){
            $(this).css('border','1px solid #f00');
            $(this).parent().find(".custom-alert").fadeIn(300);
            $(this).parent().find(".astrisc").fadeIn(100);
            UserError = true;

        }
        else{// No erroe
            $(this).css('border','1px solid #080');
            $(this).parent().find(".custom-alert").fadeOut(300);
            $(this).parent().find(".astrisc").fadeOut(100);
            UserError = false;
            
        }
       // checkErroe();


    })


    $('.email').blur(function(){
        if($(this).val() === '' ){
            $(this).css('border','1px solid #f00');
            $(this).parent().find(".custom-alert").fadeIn(300);
            $(this).parent().find(".astrisc").fadeIn(100);

            emailErroe = true;

        }
        else{
            $(this).css('border','1px solid #080');
            $(this).parent().find(".custom-alert").fadeOut(300);
            $(this).parent().find(".astrisc").fadeOut(100);

            emailErroe = false;
            
        }
       // checkErroe();

    })

    $('.message').blur(function(){
        if($(this).val().length < 11){
            $(this).css('border','1px solid #f00');
            $(this).parent().find(".custom-alert").fadeIn(300);
            $(this).parent().find(".astrisc").fadeIn(100);

            messageError = true;

        }
        else{
            $(this).css('border','1px solid #080');
            $(this).parent().find(".custom-alert").fadeOut(300);
            $(this).parent().find(".astrisc").fadeOut(100);

            messageError = false
            
        }
      //  checkErroe();

    });


    // submit validation

    $('.contact-form').submit(function (e) { 
        if(UserError === true || emailErroe === true || messageError === true){
            e.preventDefault();

            $('.username, .email, .message').blur();
        }
        
    });


    // End contact-form

   
        






});

