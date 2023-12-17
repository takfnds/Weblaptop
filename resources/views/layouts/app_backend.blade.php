<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Backend @yield('title') </title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/navbar-fixed/">
    <!-- Bootstrap core CSS -->
    <meta name="robots" content="noindex, nofollow">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Show it is fixed to the top */
        body {
            min-height: 75rem;
            padding-top: 4.5rem;
        }
        .hide { display: none}
    </style>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="{{ route('get.home') }}">Backend</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            @foreach(config('nav.admin.top') as $item)
            <li class="nav-item">
                <a class="nav-link {{ \Request::route()->getName() == $item['route'] ? 'active' : '' }}" href="{{ route($item['route']) }}">{{ $item['name'] }}</a>
            </li>
            @endforeach
        </ul>
        <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
                <a class="nav-link"><i class="fab fa-user"></i>Hi {{ get_data_user('admins','name') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('get_admin.logout') }}"><i class="fab fa-twitter"></i> Thoát</a>
            </li>
        </ul>
    </div>
</nav>
<main role="main" class="container-fluid">
    @yield('content')
</main>
<!-- Bootstrap core JavaScript
    ================================================== -->
{{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Placed at the end of the document so the pages load faster -->
{{--<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>--}}
<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
<script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
<script>
    $(function (){
        $(document).ready(function() {
            $('.js-tags').select2();
            $('#jsDataTable').DataTable();
        });
    })
</script>
<script>
    var URL_GET_CHAR =  '{{ route('ajax_admin.get_dashboard_char') }}'
    $(function () {
        $(window).on('load', function() {
            if (typeof URL_GET_CHAR !== "undefined")
            {
                $.ajax({
                    url : URL_GET_CHAR,
                    method : "GET",
                    async : false,
                    success : function(results)
                    {
                        let dataPayIn = results.arrRevenueTransactionsMonth;
                        dataPayIn  =  JSON.parse(dataPayIn);

                        let listday = results.listDay;
                        listday = JSON.parse(listday);

                        render(listday, dataPayIn)
                    }
                });
            }
        });

        $(".js-change-month").change( function (event){
            let $this = $(this)
            let month = $this.val()
            let status = $('.js-change-status').find(":selected").val();

            $.ajax({
                url : URL_GET_CHAR,
                method : "GET",
                async : false,
                data : {
                    status : status,
                    month : month
                },
                success : function(results)
                {
                    let dataPayIn = results.arrRevenueTransactionsMonth;
                    dataPayIn  =  JSON.parse(dataPayIn);

                    let listday = results.listDay;
                    listday = JSON.parse(listday);

                    render(listday, dataPayIn)
                }
            });
        })

        $(".js-change-status").change( function (event){
            let $this = $(this)
            let status = $this.val()
            let month = $('.js-change-month').find(":selected").val();
            $.ajax({
                url : URL_GET_CHAR,
                method : "GET",
                async : false,
                data : {
                    status : status,
                    month : month
                },
                success : function(results)
                {
                    let dataPayIn = results.arrRevenueTransactionsMonth;
                    dataPayIn  =  JSON.parse(dataPayIn);

                    let listday = results.listDay;
                    listday = JSON.parse(listday);

                    render(listday, dataPayIn)
                }
            });
        })


        function render(days, moneyMonth)
        {
            $("#body-line-chart").html(`<canvas id="line-chart" width="400" height="100"></canvas>`);
            var lineChart = document.getElementById('line-chart');
            if(window.myChart != undefined)
            {
                window.myChart.destroy();
            }
            var myChart = new Chart(lineChart, {
                type: 'line',
                height: 300,
                data: {
                    labels: days,
                    datasets: [
                        {
                            label: 'Doanh thu các ngày trong tháng',
                            data: moneyMonth,
                            backgroundColor: 'rgba(0, 128, 128, 0.3)',
                            borderColor: 'rgba(0, 128, 128, 0.7)',
                            borderWidth: 1
                        },
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true,
                                userCallback: function(value, index, values) {
                                    value = value.toString();
                                    value = value.split(/(?=(?:...)*$)/);
                                    value = value.join('.');
                                    return  value;
                                }
                            }
                        }]
                    },
                }
            });
        }

        $('#copy_menu').off('click').click(function () {
            let $rowMenu = $('.row-menu-temple').clone().removeClass('row-menu-temple');
            $rowMenu.find('.action-row-menu').removeClass('hide');
            $('#wrap-row-menu').append($rowMenu);
        })


        $('#wrap-row-menu').on('click', '.btn-remove', function () {
            let $this = $(this);
            if (confirm("Bạn có chắc chắn muốn xoá menu này?"))
            {
                $this.closest('.row-menu').remove();
            }
        })

        $('#wrap-row-menu').on('click', '.btn-move-up' ,function () {
            let $this = $(this);
            let $rowMenu  = $this.closest('.row-menu');
            let $rowMenuBefore = $rowMenu.prev();
            $rowMenu.after($rowMenuBefore);
        })

        $('#wrap-row-menu').on('click', '.btn-move-down', function () {
            let $this = $(this);
            let $rowMenu  = $this.closest('.row-menu');
            let $rowMenuBefore = $rowMenu.next();
            $rowMenu.before($rowMenuBefore);
        })
    })
</script>
</body>
</html>
