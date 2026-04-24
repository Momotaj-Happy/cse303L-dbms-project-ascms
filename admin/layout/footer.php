</div> <!-- Close main-content-wrapper -->
</div> <!-- Close row from header -->

<?php require('about-modal.php'); ?>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    $(document).ready(function(){
        $('.sidenav').sidenav();
        $('.modal').modal();
        $('select').formSelect();
    });
</script>
</body>
</html>