<html>
 <head>

 <script type="text/javascript" src="1/canvasjs.min.js"></script>

<script type="text/javascript">
      window.onload = function () {
          var chart = new CanvasJS.Chart("chartContainer", {
              theme: "theme2",//theme1
              title:{
                  text: "Basic Column Chart - CanvasJS"              
             },
              data: [              
              {
// Change type to "bar", "splineArea", "area", "spline", "pie",etc.
                  type: "column",
                  dataPoints: [
                  { label: "apple", y: 10 },
                  { label: "orange", y: 15 },
                  { label: "banana", y: 25 },
                  { label: "mango", y: 30 },
                  { label: "grape", y: 28 }
                  ]
              }
              ]
          });

          chart.render();
      }
  </script>

</head>
<body>
<div class="row"> <div class="col-md-4"><h4>Dashboard</h4></div>
  </div>

  <div class="row">
  <div class="col-md-4">.col-md-4</div>
  <div class="col-md-3" id="chartContainer" style="height: 300px; width: 30%;"></div>
</div>
</body>
</html>