require('./bootstrap');

$('#myModal{{$nota->id}}').on('shown.bs.modal', function() {
    $('#myInput').trigger('focus')
})