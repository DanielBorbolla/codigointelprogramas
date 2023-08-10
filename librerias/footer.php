<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    $(function() {
        $(document).on('click', '.menu_slide', function() {
            $(".nav.submenu").removeClass('active');
            let id = $(this).attr('id');
            $('.' + id).slideToggle('fast');
            ($('.' + id).hasClass('active')) ? $('.' + id).removeClass('active'): $('.' + id).addClass('active');
            document.cookie = "main=" + id;
        });
    });

    $(function() {
        $(document).on('click', '.menu_user', function() {
            //let id = $(this).attr('id');
            $('.dropdown-menu').slideToggle('fast');
        });
    });
</script>