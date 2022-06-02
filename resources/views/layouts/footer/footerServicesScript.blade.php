<script type="text/javascript">
    // Datable for Customers 
    $(document).ready(function() {
        // console.log("{{ route('get_services') }}")
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $(".yajra-datatable").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('get_services') }}",
            responsive: true,

            columns: [{
                    data: "id"
                },

                {
                    data: "service_name"
                },

                {
                    data: "charge",
                    render: function(data, type, row) {
                        return Number(data).toLocaleString('en-NG', {
                            maximumFractionDigits: 2,
                            style: 'currency',
                            currency: 'NGN'

                        });
                    },
                },

                {
                    data: "percentage"
                },

                {
                    data: null,
                    orderable: false,
                    searchable: false,

                    render: function(data, type, row) {
                        return (
                            '<input type="button" onclick="memberapprove(' +
                            row.id +
                            ')" value="Edit" class="btn waves-effect waves-light btn-info">' +
                            '<input type="button" onclick="memberdecline(' +
                            row.id +
                            ')" value="Delete" class="btn waves-effect waves-light btn-danger">'
                        );
                    }
                },


            ],


        });


    });

    function memberapprove(id) {

        var answer = confirm('Are you sure you want to approve request?');

        if (answer) {

            location.href = `{{ url('/admin/service/${id}/edit') }}`;


        }

    }

    function memberdecline(id) {


        var answer = confirm('Are you sure you want to approve request?');

        if (answer) {

            url = `{{ url('/admin/service/${id}/delete') }}`;
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });
            $.ajax({
                url: url,
                type: "delete",
                success: function(data) {
                    $('.yajra-datatable').DataTable().ajax.reload();
                    alert('Service has been successfuly deleted')
                }
            })


        }
    }
</script>
