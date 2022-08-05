@push('script')
    <script>
        // get product wher id suplayer start
        $('#suplayerId').change(function(e)
        {
            deletedraf()
            $('#id').remove()
            $.ajax(
            {
                type: 'get',
                dataType: 'json',
                url: "/checksuplayer/",
                data: { id : $(this).val() },
                success: function(data, status)
                {
                    // read product
                    $.each(data, function(key, value)
                    {
                        $.each(value, function(i, dat){
                            let product = {
                                productId : dat.id,
                                productCode : dat.productCode,
                                productName : dat.productName,
                                purchasePrice : dat.purchasePrice,
                                qty : 0,
                                subTotal : 0
                            }
                            store(product);
                            index()
                        })
                    }) 
                }
            })

        })
        

        // read drafPrduct
        function index()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post('/index', {}, function(data){
                $('#page').html(data)
            })
        }

        // add drafProdut
        function store(product)
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }); 

            $.ajax({
                type: 'post',
                url: '/store',
                data: product,
                dataType: 'json',
            });
        }

        // get draf product by id
        function drafproduct(id, qty)
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'post',
                url: '/drafproduct',
                data: {id: id},
                success: function(data, status){
                    $.each(data, function(key, value){
                        $.each(value, function(key, product){
                            update(id, product.price, qty, product.total);
                        })
                    })
                }
            })
        }

        function update(id, price, qty, total)
        {
            let subTotal = parseInt(price) * parseInt(qty);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }); 
            $.ajax({
                type: 'post',
                url: '/update/' + id,
                data: {id : id, qty : qty, subTotal: subTotal},
                success: function(){
                    index()
                }
            })
        }

        //  delete drafProduct
        function destroy(id){
            $.post('/destroy/' + id, {}, function(){
                index()
            });
        }
        
        // truncate drafProduct
        function deletedraf()
        {
            $.post('/deletedraf', $('form').serialize())
        }

    </script>
@endpush