
!function($) {
    "use strict";

    var SweetAlert = function() {};

    //examples 
    SweetAlert.prototype.init = function() {
        // Delete Data
        $('.sa-warning').click(function(e){
            var form = $(this).closest('form')
            e.preventDefault()

            swal({   
                title: "Apakah Anda yakin?",   
                type: "warning",   
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success text-white',
                cancelButtonClass: 'btn btn-danger m-1-10',
                confirmButtonText: "Yakin", 
                cancelButtonText: 'Batal',
            }).then(function() {   
                swal(
                    'Terhapus!',
                    'Data berhasil dihapus..',
                    'success',
                ).then(function() {
                    form.submit()
                })
            });
        });
    },
    //init
    $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.SweetAlert.init()
}(window.jQuery);