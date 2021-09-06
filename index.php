<?php
include "header.php";
?>
<a href = "register_app/gettooken.php">register</a>
<form action = "register_app/registery.php.php" method = "get">
	<button type = "submit">register</button>
</form>
<div class = "d-lg-flex justify-content-lg-center align-items-lg-center Score" style = "margin: 5px;">
	<i class = "fa fa-star star1"></i><i class = "fa fa-star star2"></i><i class = "fa fa-star star3"></i><i class = "fa fa-star star4"></i><i class = "fa fa-star star5"></i>
</div>
<?php
include "footer.php";
?>

<!--<script>
    const s1 = $('.star1');
    const s2 = $('.star2');
    const s3 = $('.star3');
    const s4 = $('.star4');
    const s5 = $('.star5');
    s1.hover(
        function () {s1.addClass('cstar');},
        function () {s1.removeClass('cstar');}
    )
    s2.hover(
        function () {s1.addClass('cstar');s2.addClass('cstar');},
        function () {s1.removeClass('cstar');s2.removeClass('cstar');}
    )
    s3.hover(
        function () {s1.addClass('cstar');s2.addClass('cstar');s3.addClass('cstar');},
        function () {s1.removeClass('cstar');s2.removeClass('cstar');s3.removeClass('cstar');}
    )
    s4.hover(
        function () {s1.addClass('cstar');s2.addClass('cstar');s3.addClass('cstar');s4.addClass('cstar');},
        function () {s1.removeClass('cstar');s2.removeClass('cstar');s3.removeClass('cstar');s4.removeClass('cstar');}
    )
    s5.hover(
        function () {s1.addClass('cstar');s2.addClass('cstar');s3.addClass('cstar');s4.addClass('cstar');s5.addClass('cstar');},
        function () {s1.removeClass('cstar');s2.removeClass('cstar');s3.removeClass('cstar');s4.removeClass('cstar');s5.removeClass('cstar');}
    )
</script>-->