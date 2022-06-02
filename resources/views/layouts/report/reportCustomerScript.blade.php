<script type="text/javascript">
    // Datable for Customers 
    $(document).ready(function() {
        //  console.log("{{ route('get_customers') }}")
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $(".yajra-datatable").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('get_customers') }}",
            responsive: true,
            "createdRow": function(row, data, index) {
                $('td', row).eq(13).addClass('negtivenumber');
            },

            columns: [


                {
                    data: "created_at",
                    render: function(data, type, row) {
                        return moment(new Date(data).toString()).format('DD/MM/YYYY');
                    }
                },

                {
                    data: "customer_first_name",

                    render: function(data, type, row) {
                        return row.customer_first_name + " " + row.customer_middle_name + " " +
                            row.customer_surname
                    },
                },

                {
                    data: "customer_email"
                },

                {
                    data: "customer_photo",

                    render: function(data, type, row) {
                        return (
                            '<a  target="_blank" href="../storage/uploads/' +
                            row.customer_photo +
                            '">' +
                            '<img src="../storage/uploads/' +
                            row.customer_photo +
                            '" class="img-fluid myimage" width="449" height="300" id="image' +
                            row.id +
                            '"></a>'
                        );
                    },
                },
                {
                    data: "phone_number"
                },

                {
                    data: "gender"
                },

                {
                    data: "address"
                },

                {
                    data: "marital_status"
                },

                {
                    data: "occupation"
                },


                {
                    data: "account_balance",
                    render: function(data, type, row) {
                        return Number(data).toLocaleString('en-NG', {
                            maximumFractionDigits: 2,
                            style: 'currency',
                            currency: 'NGN'

                        });
                    },
                },
                {
                    data: "other_transactions",
                    render: function(data, type, row) {
                        number = Number(data).toLocaleString('en-NG', {
                            maximumFractionDigits: 2,
                            style: 'currency',
                            currency: 'NGN'

                        });
                        return ('<span style="color: #red" >' + number + '</span>');
                    }

                },

                {
                    data: null,
                    orderable: false,
                    searchable: false,

                    render: function(data, type, row) {
                        return (
                            `<a href="/admin/customer/${row.id}" class="btn btn-primary mr-1 btn-sm "><span class="fas fa-eye"></span>View</a>` +

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

            location.href = `{{ url('/admin/customer/${id}/edit') }}`;


        }

    }

    function memberdecline(id) {


        var answer = confirm('Are you sure you want to approve request?');

        if (answer) {

            url = `{{ url('/admin/customer/${id}/delete') }}`;
            console.log(url);
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
                    alert('Customer has been successfuly deleted')
                }
            })


        }

    }
</script>
