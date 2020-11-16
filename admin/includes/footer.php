  </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  <!-- Custom JavaScript -->
  <script src="js/dropzone.js"></script>

    <!-- Custom JavaScript -->
    <script src="js/scripts.js"></script>

    <!-- Google Chart API -->
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Section', 'Count'],
          ['Views',     <?php echo $session->count ;?>],
          ['Photos',    <?php echo Photo::count_all(); ?>],
          ['Users',     <?php echo User::count_all() ;?>],
          ['Comments',  <?php echo Comment::count_all() ;?>]
        ]);

        var options = {
          legend: 'none',
          pieSliceText: 'label',

          backgroundColor: 'transparent',
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
</body>

</html>
