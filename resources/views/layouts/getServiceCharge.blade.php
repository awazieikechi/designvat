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
        document.getElementById("total_price").value = data.toFixed(2);
    }
})
});
</script>
