<script type="text/javascript">
    // Datable for Customers 
    $(document).ready(function() {
        //console.log("{{ route('get_customers') }}")
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

            columns: [


                {
                    data: "created_at",
                    render: function(data, type, row) {
                        return moment(new Date(data).toString()).format('DD/MM/YYYY');
                    }
                },

                {
                    data: "customer_name"
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
                    data: "next_kin_name"
                },

                {
                    data: "next_kin_address"
                },

                {
                    data: "next_kin_phone_number"
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


            ],


        });



    });
</script>
