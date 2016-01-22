'use strict';

$(document).ready(function () {
    var rules = {
        username: {
            required: true,
            minlength: 3
        },
        senha: {
            required: true,
            minlength: 0
        },
        email: {
            required: true,
            email: true
        },
        password_confirmation: {
            equalTo: '#password'
        },
        webpage: {
            url: true
        },
        topic: {
            required: '#newsletter:checked',
            minlength: 2
        },
        terms: "required"
    };

    var messages = {
        username: {required: "O username é necessário."},
        senha: {required: "A password é necessária."},
        email: {required: "O campo email é obrigatório.",
                email: "Coloque o email válido."},
        password_confirmation: {equalTo: "Password mismatch"},
        terms: "You must agree with our terms of service.",
        topic: "You must select at least two topics."
    };


        $('#XXX').validate({
            rules: rules,
            messages: messages,
            errorElement: 'span',
            errorClass: 'field-error',
            errorPlacement: function(error, element) {
                if (element.attr("name") == "topic") {
                    error.insertAfter("#newsletter");
                } else {
                    error.insertAfter(element);
                }
            }
        });

        var $newsletter = $('#newsletter');
        if ($newsletter.is(':checked')) {
            $('#newsletter-topics').removeClass('hidden');
        } else {
            $('#newsletter-topics').addClass('hidden');
        }
        $newsletter.click(function() {
            $('#newsletter-topics').toggleClass('hidden');
        });



});