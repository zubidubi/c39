$(function () {
    $('#datetimepicker1').datetimepicker({
        language: 'es',
    });
    var date = new Date();
    $('#datetimepicker1').data("DateTimePicker").setMinDate(new Date(date.getFullYear(), date.getMonth(), date.getDate()));
});