$(document).ready(function () {
    $('[name=activityChosen]').on('change', function () {
        var form = $(this).closest('form');
        form.find('input[type=submit]').click();
    });
});
