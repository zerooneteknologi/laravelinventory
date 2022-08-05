@push('script')
    <script>
        // get member by member No
        $('#memberNo').change(function()
        {
            $.ajax({
                type: 'get',
                dataType: 'json',
                url: '/getMember/' + $(this).val(),
                success: function(data, status)
                {
                    $('#memberId').val(data.member.id);
                    let member = `
                                <!-- [ product code ] end -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="floating-label" for="productCode">Nama Member</label>
                                        <input name="memberName" id="memberName" value="${data.member.customerName}" type="text" class="form-control">
                                    </div>
                                </div>`
                    $('#member').append(member); 
                }
            })
        })

        // get product by product code
        $('#productCode').change(function()
        {
            $.ajax({
                type: 'get',
                url: '/getProduct/' + $(this).val(),
                dataType: 'json',
                success: function(data, status)
                {
                    let product = {
                        productId : data.product.id,
                        productCode : data.product.productCode,
                        productName : data.product.productName,
                        purchasePrice : data.product.sellingPrice,
                        qty : 0,
                        subTotal : 0
                    }
                    store(product);
                    index()
                }
            })
        })

        // index drafProduct
        function index()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post('/index', {}, function(data){
                $('#page').html(data);
            })
        }

        // store drafPorduct
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
                dataType: 'json'
            }) 
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

        // update qty
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
            })
        }
        
        // truncate drop drafProduct
        function deletedraf()
        {
            $.post('/deletedraf', $('form').serialize())
        }

        // show modal search member start
        function membershow()
        {
            modalmember()
            $('#modal').modal('show')
        }

        function modalmember()
        {
            $.get('/modalmember', {}, function(data){
                $('#modalbody').children().remove()
                $('#modaltitle').html('Cari Member')
                $('#modalbody').html(data)
            })
        }

        function searchmember()
        {
            $('#tmember').children().remove();
            $.get('/searchmember', { key: $('#searchmember').val() }, function(data){
                $.each(data, function(key, value){
                    let member = `<tr>
                                    <td>${value.customerNo}</td>
                                    <td>${value.customerName}</td>
                                    <td>${value.customerPhone}</td>
                                    <td>${value.customerAddress}</td>
                                </tr>`
                    $('#tmember').append(member);
                })
            })
        }

        // show modal search member end

        // show modal search product start
        function productshow()
        {
            modalproduct()
            $('#modal').modal('show')
        }

        function modalproduct()
        {
            $.get('/modalproduct', {}, function(data){
                $('#modalbody').children().remove()
                $('#modaltitle').html('Cari Produk')
                $('#modalbody').html(data)
            })
        }

        function searchproduct()
        {
            $('#tbody').children().remove();
            $.get('/searchproduct', {key: $('#searchproduct').val()}, function(data){
                $.each(data, function(key, value){
                    let product = `<tr>
                                        <td>${value.productCode}</td>
                                        <td>${value.productName}</td>
                                        <td>${value.sellingPrice}</td>
                                    </tr>`
                    $('#tbody').append(product);
                    // console.log(value);
                })
            })
        }
    </script>
@endpush