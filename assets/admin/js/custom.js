

$(document).ready(function () {
    //DataTables
    $('#datatable-clientes').DataTable({
        "iDisplayLength": 10,
        "aLengthMenu": [[5, 10, 25, 50, -1], [5,10, 25, 50, "All"]],
        "oLanguage": {
            "sLengthMenu": "Mostrar _MENU_ entradas",
            "sSearch": "Procurar na Tabela: _INPUT_"
        },
        "scrollX": true
    });
});

(function ($) {
    "use strict";

    var mainApp = {
        main_fun: function () {
            
            /*====================================
             LOAD APPROPRIATE MENU BAR
             ======================================*/
            $(window).bind("load resize", function () {
                if ($(this).width() < 768) {
                    $('div.sidebar-collapse').addClass('collapse');
                } else {
                    $('div.sidebar-collapse').removeClass('collapse');
                }
            });


        },
        initialization: function () {
            mainApp.main_fun();

        }

    };
    // Initializing ///

    $(document).ready(function () {
        mainApp.main_fun();
    });

}(jQuery));
