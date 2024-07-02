/* global js,alerts */

$(function(){
    'use strict';

   var UsernameError = true,
        passwordError = true;


        $('.user').blur(function(){// show erroe
            if($(this).val().length < 4 ){
                $(this).css('border','1px solid #f00');
                $(this).parent().find(".custom-alert").fadeIn(300);
                $(this).parent().find(".astrisc").fadeIn(100);
                UsernameError = true;
    
            }
            else{// No erroe
                $(this).css('border','1px solid #080');
                $(this).parent().find(".custom-alert").fadeOut(300);
                $(this).parent().find(".astrisc").fadeOut(100);
                UsernameError = false;
                
            }
           // checkErroe();
    
    
        });


        $('.password').blur(function(){// show erroe
            if($(this).val().length < 5 ){
                $(this).css('border','1px solid #f00');
                $(this).parent().find(".custom-alert").fadeIn(300);
                $(this).parent().find(".astrisc").fadeIn(100);
                passwordError = true;
    
            }
            else{// No erroe
                $(this).css('border','1px solid #080');
                $(this).parent().find(".custom-alert").fadeOut(300);
                $(this).parent().find(".astrisc").fadeOut(100);
                passwordError = false;
                
            }
           // checkErroe();
    
    
        });


        // submit validation

        $('.login-form').submit(function (e) {
            if (UsernameError === true || passwordError === true) {
                e.preventDefault();

                $('.user, .password').blur();
            }

        });




});