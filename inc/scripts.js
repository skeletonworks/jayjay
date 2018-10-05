<style>

$(document).ready(function () {
    $('#sidebarCollapse, #dismiss').on('click', function () {
        $('#sidebar').toggleClass('active');
        $('#sidebarCollapse').toggleClass('active');
    });
});

jQuery(document).ready(function($) {
    $('more').click(function() {
        $('#post-excerpt').hide();
        $('#post-content').show();
        $(this).remove();
    });
});
</script>