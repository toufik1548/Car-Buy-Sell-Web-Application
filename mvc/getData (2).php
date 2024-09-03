<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jQuery Infinite Scroll</title>
    <!-- Latest compiled and minified CSS -->
</head>
<body>




<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 results">
            <!-- Existing content will be appended here -->
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
    var start = 0;
    var limit = 5;
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
            url: 'data.php',
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
</body>
</html>
