<script type="text/javascript">
    /* Get Transactions**/

    $(document).ready(function() {
        //  console.log("{{ route('get_transactions') }}")
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $(".yajra-datatable").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('get_sales') }}",
            responsive: true,


            columns: [{
                    data: "date",
                    name: "sales.date",
                },

                {
                    data: "customer.customer_first_name",
                    name: "customer.customer_first_name",

                    render: function(data, type, row) {
                        return row.customer.customer_first_name + " " + row.customer
                            .customer_middle_name + " " + row.customer.customer_surname
                    },
                },

                {
                    data: "service.service_name",
                    name: "service.service_name",

                },

                {
                    data: "revenue_amount",
                    name: "revenue_amount",
                    render: function(data, type, row) {

                        if (row.service === null) {
                            revenue = row.revenue_amount

                        }

                        if (row.service !== null) {
                            if (row.service.percentage === null) {
                                row.service.percentage = " "
                                revenue = parseInt(row.service.charge)
                            }
                            if (row.service.charge === null) {
                                row.service.charge = "0"
                                if (row.type === "Loan") {
                                    revenue = row.revenue_amount
                                }
                            }


                        }



                        console.log(revenue);
                        return Number(revenue).toLocaleString('en-NG', {
                            maximumFractionDigits: 2,
                            style: 'currency',
                            currency: 'NGN'

                        });
                    },

                },

                {
                    data: "service.percentage",
                    name: "service.percentage",
                    render: function(data, type, row) {
                        if (row.service === null || row.service.percentage === " ") {
                            return " "
                        }
                        if (row.service.percentage === null) {
                            return " "
                        }

                        if (row.service.percentage !== null) {
                            return data + "%"
                        }

                    },
                },

                {
                    data: "loan_amount",
                    name: "sales.loan_amount",
                    render: function(data, type, row) {
                        if (row.service === null) {
                            return " "
                        }

                        if (row.service.percentage && row.type === "Loan") {

                            return Number(row.loan_amount).toLocaleString('en-NG', {
                                maximumFractionDigits: 2,
                                style: 'currency',
                                currency: 'NGN'

                            });
                        }
                    },
                },

                {
                    data: "type",
                    name: "sales.type",
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
            "columnDefs": [{
                "targets": '_all',
                "defaultContent": ""
            }],

        });


    });

    /*** Edit Transactions */

    function memberapprove(id)

    {

        var answer = confirm('Are you sure you want to approve request?');

        if (answer) {

            location.href = `{{ url('/admin/sales/${id}/edit') }}`;


        }

    }

    /** Delete Transactions **/

    function memberdecline(id) {


        var answer = confirm('Are you sure you want to approve request?');

        if (answer) {
            console.log(id)
            url = `{{ url('/admin/sales/${id}/delete') }}`;
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
