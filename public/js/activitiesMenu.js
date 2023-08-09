$(document).ready(function () {
    $('.clickMenu').on('click', function () {
        if ($('.dropdownMenu').hasClass('d-none')) {
            $('.dropdownMenu').removeClass('d-none');
            $('.dropdownMenu').addClass('d-inline-block');
        } else {
            $('.dropdownMenu').removeClass('d-inline-block');
            $('.dropdownMenu').addClass('d-none');
        }
    })
});
