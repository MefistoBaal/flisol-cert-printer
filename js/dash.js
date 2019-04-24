function stats() {
    $.ajax({
        type: 'POST',
        url: '/app/controladores/dash.php',
        data: { 'pet': 'stats' },
        success: function (data) {
            try {
                var stats = JSON.parse(data);
                console.log(stats);
            } catch (error) {
                console.log(error);
            }
        },
        error: function (error) {

        },
    });
}
window.onload = function () {
    stats();
}