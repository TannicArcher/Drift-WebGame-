$(window).on("load", function () {
  "use strict";

  var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
  // chart chart-leads start
  var chartColors = chartColors = {
    red: '#f37070',
    pink: '#ff445d',
    orange: '#ff8f3a',
    yellow: '#ffde16',
    lightGreen: '#24cf91',
    green: '#4ecc48',
    blue: '#5797fc',
    skyBlue: '#33d4ff',
    gray: '#cfcfcf',
    purple: '#cfcfcf'
  };
  var color = Chart.helpers.color;

  // creating center text
  Chart.pluginService.register({
    beforeDraw: function (chart) {
      var width = chart.chart.width,
        height = chart.chart.height,
        ctx = chart.chart.ctx;

      var center_text = $(ctx.canvas).data('fill');
      if (center_text) {
        var $dtTheme = localStorage.getItem('dt-theme');
        ctx.restore();
        var fontSize = (height / 114).toFixed(2);
        ctx.font = 3 + "rem Source Sans Pro";
        ctx.textBaseline = "middle";

        /*if ($dtTheme == 'dark') {
         ctx.fillStyle = "#fff";
         }*/

        var textX = Math.round((width - ctx.measureText(center_text).width) / 2),
          textY = height / 2;

        ctx.fillText(center_text, textX, textY);
        ctx.save();
      }
    }
  });

});