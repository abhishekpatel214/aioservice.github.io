


</div>
</div>
</main>
  
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   






    
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