


$(function() {
	"use strict";
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    console.log(CSRF_TOKEN)
    
    $('.single-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });

    $('.multiple-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });

    $('.select-min').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
        minimumInputLength: 3,
    })

    $('.select-wards').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
        minimumInputLength: 3,
        ajax: {
            url: "/api/data-kelurahan",
            type: "GET",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    _token: CSRF_TOKEN,
                    search: params.term // search term
                };
            },
            processResults: function (response) {
                console.log(response)
                return {
                    results: response
                }
            },
            cache: true
        },
        templateResult: locationResultTemplater,
        templateSelection: locationSelectionTemplater
    })

    function locationResultTemplater(location) {
        return "[" + location.post_code + "] " + location.name;
    } 
    
    function locationSelectionTemplater(location) {
        if (typeof location.name !== "undefined") {
            return locationResultTemplater(location);
        }
        return location.text; // I think its either text or label, not sure.
    }
});