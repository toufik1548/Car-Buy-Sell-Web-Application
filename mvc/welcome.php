<a href="<?php echo $site_url; ?>/login/"><img src="<?php echo $site_url; ?>/images/deshicar-banner.jpg" class="img-responsive img-fluid"></a>
<br>

<div id="title">Recently Added Cars</div>
<div id="area">

<?php 
$ncars=get_total("car_used","car_id", "WHERE status=1"); 
$soldcars=get_total("car_used","car_id", "WHERE status=2");

 echo "<h2 align=center>".number_format($ncars)." cars available</h2>";

//echo "<h2 align=center>Sold $soldcars Cars</h2>";

 echo "<center><small>Sold $soldcars Cars</small></center>";
?>
<center><a href="<?php echo $site_url; ?>/login/" class="btn btn-warning btn-sm active" role="button" aria-pressed="true">Post your ad</a></center><br>


<div id="bikes">

<div class="results"></div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
    var start = 0;
    var limit = 15;
    var reachedMax = false;

    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100 && !reachedMax) {
            getData();
        }
    });

    $(document).ready(function () {
        getData();
    });

    function getData() {
        if (reachedMax)
            return;

        $.ajax({
            url: 'mvc/welcome_data.php',
            method: 'POST',
            dataType: 'html', // Use 'html' instead of 'text'
            data: {
                getData: 1,
                start: start,
                limit: limit
            },
            success: function (response) {
                if (response.trim() == "reachedMax") { // Trim to remove whitespace
                    reachedMax = true;
                } else {
                    start += limit;
                    $(".results").append(response);
                }
            }
        });
    }
</script>



</div>
</div>