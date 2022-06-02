<script type="text/javascript">
    /* Get Transactions**/

    $(document).ready(function() {
        //   console.log("{{ route('get_expenses') }}")
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $(".yajra-datatable").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('get_expenses') }}",
            responsive: true,

            columns: [{
                    data: "date"
                },

                {
                    data: "expense_category"

                },

                {
                    data: "expense_detail"
                },

                {
                    data: "quantity"
                },

                {
                    data: "unit_price",
                    render: function(data, type, row) {
                        return Number(data).toLocaleString('en-NG', {
                            maximumFractionDigits: 2,
                            style: 'currency',
                            currency: 'NGN'

                        });
                    },
                },

                {
                    data: "total_cost",
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

            location.href = `{{ url('/admin/expenses/${id}/edit') }}`;


        }

    }

    /** Delete Transactions **/

    function memberdecline(id) {


        var answer = confirm('Are you sure you want to approve request?');

        if (answer) {
            console.log(id)
            url = `{{ url('/admin/expenses/${id}/delete') }}`;
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
