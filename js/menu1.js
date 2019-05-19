
$(function() {
    //We initially hide the all dropdown menus
    $('#dropdown_nav li').find('.sub_nav').hide();

    //When hovering over the main nav link we find the dropdown menu to the corresponding link.
    $('#dropdown_nav li').hover(function() {
        //Find a child of 'this' with a class of .sub_nav and make the beauty fadeIn.
        $(this).find('.sub_nav').fadeIn(100);
    }, function() {
        //Do the same again, only fadeOut this time.
        $(this).find('.sub_nav').fadeOut(50);
    });
});
