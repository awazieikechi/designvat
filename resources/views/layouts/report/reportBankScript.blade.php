<script type="text/javascript">
    /* Get Transactions**/

    $(document).ready(function() {
        //console.log("{{ route('get_transactions') }}")
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $(".yajra-datatable").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('get_transactions') }}",
            responsive: true,

            columns: [{
                    data: "date"
                },

                {
                    data: "customer.customer_first_name",
                    render: function(data, type, row) {
                        return row.customer.customer_first_name + " " + row.customer
                            .customer_middle_name +
                            " " +
                            row.customer.customer_surname
                    },

                },

                {
                    data: "transaction_type"
                },

                {
                    data: "deposits",
                    render: function(data, type, row) {
                        return Number(data).toLocaleString('en-NG', {
                            maximumFractionDigits: 2,
                            style: 'currency',
                            currency: 'NGN'

                        });
                    },
                },

                {
                    data: "withrawals",
                    render: function(data, type, row) {
                        return Number(data).toLocaleString('en-NG', {
                            maximumFractionDigits: 2,
                            style: 'currency',
                            currency: 'NGN'

                        });
                    },
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

    /*** Edit Transactions */

    function memberapprove(id)

    {

        var answer = confirm('Are you sure you want to approve request?');

        if (answer) {

            location.href = `{{ url('/admin/bank/${id}/edit') }}`;


        }

    }

    /** Delete Transactions **/

    function memberdecline(id) {


        var answer = confirm('Are you sure you want to approve request?');

        if (answer) {
            console.log(id)
            url = `{{ url('/admin/bank/${id}/delete') }}`;
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });
            $.ajax({
                url: url,
                type: "post",
                success: function(data) {
                    console.log(data);
                    $('.yajra-datatable').DataTable().ajax.reload();
                    alert('Transaction has been successfuly deleted')
                }
            })


        }
    }
</script>
