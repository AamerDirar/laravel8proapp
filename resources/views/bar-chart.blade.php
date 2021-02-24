<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bar Charts</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js" integrity="sha512-SuxO9djzjML6b9w9/I07IWnLnQhgyYVSpHZx0JV97kGBfTIsUYlWflyuW4ypnvhBrslz1yJ3R+S14fdCWmSmSA==" crossorigin="anonymous"></script>
</head>
<body>
    <div style="height: 400px; width:900px; margin:auto;">
        <canvas id="barChart"></canvas>
    </div>

    <script>
        $(function(){
            var datas     = <?php echo json_encode($datas); ?>;
            var barCanvas    = $("#barChart");
            var barChart  = new Chart(barCanvas, {
                type: 'bar',
                data: {
                    labels:['Jan','Feb','Mar','Apr','May','Jun','July','Aug','Sep','Oct','Nov','Dec'],
                    datasets:[
                        {
                            label:'New User Growth, 2020',
                            data:datas,
                            backgroundColor:['red','orange','yellow','green','blue','indigo','violet','purple','pink','silver','gold','brown']
                        }
                    ]
                },
                options:{
                    scales:{
                        yAxes:[{
                            ticks:{
                                beginZero:true
                            }
                        }]
                    }
                }
            })
        })
    </script>
</body>
</html>
