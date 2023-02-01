<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>

<body>




    <input type="text" id="search">
    <span id="result"></span>

</body>

    <script>
        $(document).ready(function() {

            $("#search").keyup(function() {


                $.ajax({
                    type: "get",
                    url: "search.php",
                    data: `search=${$(this).val().trim()}`,

                    success: function(result) {
                        console.log('res',result);

                        $("#result").html(result);

                    }
                });



            });


        });
    </script>

</html>