
$(document).ready(function () {
    //DataTables
    $('#datatable-clientes').DataTable({
        "iDisplayLength": 5,
        "aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        "oLanguage": {
            "sLengthMenu": "Mostrar _MENU_ entradas",
            "sSearch": "Procurar na Tabela: _INPUT_"
        },
        "columnDefs": [
            {"orderable": false, "targets": 6}
        ]
    });
    
    $('#datatable-encomendas').DataTable({
        "iDisplayLength": 5,
        "aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        "oLanguage": {
            "sLengthMenu": "Mostrar _MENU_ entradas",
            "sSearch": "Procurar na Tabela: _INPUT_"
        },
        "columnDefs": [{
                "orderable": false, 
                "targets": [6,7]
            }
        ]
    });
    
    $('#datatable-produtos').DataTable({
        "iDisplayLength": 5,
        "aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        "oLanguage": {
            "sLengthMenu": "Mostrar _MENU_ entradas",
            "sSearch": "Procurar na Tabela: _INPUT_"
        },
        "columnDefs": [{
                "orderable": false, 
                "targets": []
            }
        ]
    });
    
    /*==================================
     Data nascimento
     ====================================*/
    var d = $('#defaultDateNasc').val();
            
    $('#datePicker').datepicker({
        dateFormat: 'dd/mm/yy',
        dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
        dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
        dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
        monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
        nextText: 'Próximo',
        prevText: 'Anterior',
        changeMonth: true,
        changeYear: true
    });
    
    $('#datePicker').datepicker().val(d);
    


  
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
