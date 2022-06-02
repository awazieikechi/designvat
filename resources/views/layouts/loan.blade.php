<script>
    $("#service_id").change(function() {

        id = document.getElementById("service_id").value
        url = `{{ url('/admin/service/${id}') }}`

        // console.log(id)
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: url,
            type: "GET",

            success: function(data) {
                console.log(data)
                document.getElementById("interest_rate").value = data.toFixed(2);
            }
        })
    });

    $("#loan_amount").change(function() {

        interest_rate = document.getElementById("interest_rate").value
        loan_amount = document.getElementById("loan_amount").value
        revenue_amount = loan_amount * interest_rate
        total_amount = parseInt(loan_amount) + parseInt(revenue_amount)
        document.getElementById("revenue_amount").value = revenue_amount.toFixed(2)
        document.getElementById("total_amount").value = total_amount.toFixed(2)


    });
</script>
