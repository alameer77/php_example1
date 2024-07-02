/* global js,alerts */

$(function(){
    'use strict';

   var UsernameError = true,
        passwordError = true,
        firstnameError = true,
        lastnameError = true,
        emailError = true,
        // genderError = true,
        dateError = true;


        $('.firstname').blur(function(){// show erroe
            if($(this).val().length < 4 ){
                $(this).css('border','1px solid #f00');
                $(this).parent().find(".custom-alert").fadeIn(300);
                $(this).parent().find(".astrisc").fadeIn(100);
                firstnameError = true;
    
            }
            else{// No erroe
                $(this).css('border','1px solid #080');
                $(this).parent().find(".custom-alert").fadeOut(300);
                $(this).parent().find(".astrisc").fadeOut(100);
                firstnameError = false;
                
            }
           // checkErroe();
    
    
        });


        $('.lastname').blur(function(){// show erroe
            if($(this).val().length < 4 ){
                $(this).css('border','1px solid #f00');
                $(this).parent().find(".custom-alert").fadeIn(300);
                $(this).parent().find(".astrisc").fadeIn(100);
                lastnameError = true;
    
            }
            else{// No erroe
                $(this).css('border','1px solid #080');
                $(this).parent().find(".custom-alert").fadeOut(300);
                $(this).parent().find(".astrisc").fadeOut(100);
                lastnameError = false;
                
            }
           // checkErroe();
    
    
        });

        $('.username').blur(function(){// show erroe
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

        $('.email').blur(function(){// show erroe
            if($(this).val() === '' ){
                $(this).css('border','1px solid #f00');
                $(this).parent().find(".custom-alert").fadeIn(300);
                $(this).parent().find(".astrisc").fadeIn(100);
                emailError = true;
    
            }
            else{// No erroe
                $(this).css('border','1px solid #080');
                $(this).parent().find(".custom-alert").fadeOut(300);
                $(this).parent().find(".astrisc").fadeOut(100);
                emailError = false;
                
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

        // $('.gender').blur(function(){// show erroe
        //     if($(this).val(). ){
        //         $(this).css('border','1px solid #f00');
        //         $(this).parent().find(".custom-alert").fadeIn(300);
        //         $(this).parent().find(".astrisc").fadeIn(100);
        //         genderError = true;
    
        //     }
        //     else{// No erroe
        //         $(this).css('border','1px solid #080');
        //         $(this).parent().find(".custom-alert").fadeOut(300);
        //         $(this).parent().find(".astrisc").fadeOut(100);
        //         genderError = false;
                
        //     }
        //    // checkErroe();
    
    
        // });

        $('.birthday').blur(function(){// show erroe
            if($(this).val() === '' ){
                $(this).css('border','1px solid #f00');
                $(this).parent().find(".custom-alert").fadeIn(300);
                $(this).parent().find(".astrisc").fadeIn(100);
                dateError = true;
    
            }
            else{// No erroe
                $(this).css('border','1px solid #080');
                $(this).parent().find(".custom-alert").fadeOut(300);
                $(this).parent().find(".astrisc").fadeOut(100);
                dateError = false;
                
            }
           // checkErroe();
    
    
        });


        // submit validation

        $('.login-form').submit(function (e) {
            if (UsernameError === true || passwordError === true || firstnameError === true || lastnameError === true || emailError === true || dateError === true) {
                e.preventDefault();

                $('.firstname, .lastname, .username, .email, .password, .birthday').blur();
            }

        });




});