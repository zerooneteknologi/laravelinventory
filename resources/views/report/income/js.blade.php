@push('script')
    <script>
        $(document).ready(function(){
            filter()
            // console.log('ok');
        })

        // edit periode date
        $('#start').change(function(){
            filter();
        })

        $('#end').change(function(){
            filter();
        })

        // filter report 
        function filter()
        {
            $.get('/filter/' + $('#start').val() + '/' + $('#end').val(), {}, function(data)
            {
                $('#table').html(data);
            })
        }

        function head()
        {
            $.get('/report/print'), {}, function(data){
                $('#head').html(data)
            }
        }
    </script>
@endpush