<script>
        $(document).ready(function() {
            $(".add-to-cart").click(function() {
                var id = $(this).attr("data-id");
                $.post("/cart/add/"+id, {}, function(data)  {
                    $("#cart-count").html(data);
                });
                return false;
            });
        });
    </script>