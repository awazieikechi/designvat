<script>
    $("#customer_id").change(function() {
        url = `{{ route('get_balance') }}`
        id = document.getElementById("customer_id").value
        // console.log(id)
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: url,
            type: "POST",
            data: {
                "id": id
            },
            success: function(data) {
                // console.log(data)
                document.getElementById("balance").innerHTML = data.toFixed(2);
            }
        })
    });
</script>
