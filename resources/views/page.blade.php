<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Infinite Scroll Pagination</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

</head>
<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">Infinite Scroll Pagination</h2>
                </div>
                <div class="col-md-12" id="page-data">
                    @include('data')
                </div>
            </div>
        </div>
    </section>
    <div class="ajax-load text-center" style="display: none;">
        <p>
            <img src="{{asset('images/loader.gif')}}" /> Loading More Page
        </p>
    </div>

     <script>
        function loadMoreData(page)
        {
            $.ajax({
                url:"?page=" + page,
                type: 'get',
                beforeSend: function()
                {
                    $(".ajax-load").show();
                }
            })
            .done(function(data){
                if(data.html == " "){
                    $('.ajax-load').html("No more records found");
                    return;
                }
                $('ajax-load').hide();
                $("#page-data").append(data.html);
            })
            .fail(function(jqXHR,ajaxOptions,thrownError){
                alert("Server not responding...");
            });
        }

        var page = 1;
        $(window).scroll(function(){
            if($(window).scrollTop() +  $(window).height() >= $(document).height()) {
                page++;
                loadMoreData(page);
            }
        });
    </script>
</body>
</html>
