<script>
    $("#unit_price").change(function() {

        unitprice = document.getElementById("unit_price").value
        quantity = document.getElementById("quantity").value
        total_cost = unitprice * quantity

        document.getElementById("total_cost").value = total_cost.toFixed(2)


    });
</script>
