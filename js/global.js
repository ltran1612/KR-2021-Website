(function ($) {
    'use strict';
    /*==================================================================
        [ Daterangepicker ]*/
    try {
        $('.js-datepicker').daterangepicker({
            "singleDatePicker": true,
            "showDropdowns": true,
            "autoUpdateInput": false,
            locale: {
                format: 'DD/MM/YYYY'
            },
        });
    
        var myCalendar = $('.js-datepicker');
        var isClick = 0;
    
        $(window).on('click',function(){
            isClick = 0;
        });
    
        $(myCalendar).on('apply.daterangepicker',function(ev, picker){
            isClick = 0;
            $(this).val(picker.startDate.format('DD/MM/YYYY'));
    
        });
    
        $('.js-btn-calendar').on('click',function(e){
            e.stopPropagation();
    
            if(isClick === 1) isClick = 0;
            else if(isClick === 0) isClick = 1;
    
            if (isClick === 1) {
                myCalendar.focus();
            }
        });
    
        $(myCalendar).on('click',function(e){
            e.stopPropagation();
            isClick = 1;
        });
    
        $('.daterangepicker').on('click',function(e){
            e.stopPropagation();
        });
    
    
    } catch(er) {console.log(er);}
    /*[ Select 2 Config ]
        ===========================================================*/
    /**
     * Modified codes taken from select2 website
     */
    function matchCustom(params, data) {
        // If there are no search terms, return all of the data
        if ($.trim(params.term) === '') {
            return data;
        }
    
        // Do not display the item if there is no 'text' property
        if (typeof data.text === 'undefined') {
            return null;
        }
    
        // `params.term` should be the term that is used for searching
        // `data.text` is the text that is displayed for the data object
        const text = data.text.toLowerCase();
        const term = params.term.toLowerCase();
        if (text.indexOf(term) === 0) {
            // You can return modified objects from here
            // This includes matching the `children` how you want in nested data sets
            return data;
        } // end if
    
        // Return `null` if the term should not be displayed
        return null;
    } // end matchCustom

    try {
        var selectSimple = $('.js-select-simple');
    
        selectSimple.each(function () {
            var that = $(this);
            var selectBox = that.find('select');
            var selectDropdown = that.find('.select-dropdown');
            selectBox.select2({
                dropdownParent: selectDropdown,
                matcher: matchCustom
            });
        });
    
    } catch (err) {
        console.log(err);
    }
    

})(jQuery);