
function MorrisAreaChart() {
	if($('#morris-hero-area').length) {
		  window.MorrisAreaChart = Morris.Area({
			element: 'morris-hero-area',
                padding: 20,
                behaveLikeLine: true,
                gridEnabled: false,
                gridLineColor: '#e1e8ed',
                axes: true,
                fillOpacity: .7,
                grid: true,
				postUnits: ' руб.',
				//axes:false,
                data: [
                	{period: '2017-08-06',one: 45124,two: 10240},
                    {period: '2017-08-07',one: 54612,two: 7294},
                    {period: '2017-08-08',one: 39812,two: 12969},
                    {period: '2017-08-09',one: 49283,two: 9878},
                    {period: '2017-08-10',one: 45090,two: 8235},
                    {period: '2017-08-11',one: 61249,two: 13240},
                    {period: '2017-08-12',one: 57231,two: 11245},
                    {period: '2017-08-13',one: 52572,two: 10246},
                    {period: '2017-08-14',one: 41923,two: 9824},
                    {period: '2017-08-15',one: 49213,two: 12380}
                    ],
                lineColors: ['#50b154', '#b2ddb4', '#50b154'],
                xkey: 'period',
                ykeys: ['one', 'two'],
                labels: ['Сумма пополнений', 'Сумма выплат'],
                lineWidth: 1,
				pointSize: 2,
				gridTextFamily: 'Ubuntu',
				gridTextSize: '11px',
                hideHover: 'auto'
		});
	}
	if($('#morris-hero-area2').length) {
		  window.MorrisAreaChart = Morris.Area({
			element: 'morris-hero-area2',
                padding: 20,
                behaveLikeLine: true,
                gridEnabled: false,
                gridLineColor: '#e1e8ed',
                axes: true,
                fillOpacity: .7,
                grid: true,
				postUnits: ' чел.',
				//axes:false,
                data: [
                	{period: '2017-08-06',one: 48921,two: 1872},
                    {period: '2017-08-07',one: 50652,two: 1982},
                    {period: '2017-08-08',one: 52812,two: 1542},
                    {period: '2017-08-09',one: 53821,two: 1921},
                    {period: '2017-08-10',one: 56234,two: 2010},
                    {period: '2017-08-11',one: 58001,two: 1823},
                    {period: '2017-08-12',one: 60120,two: 2012},
                    {period: '2017-08-13',one: 62345,two: 1621},
                    {period: '2017-08-14',one: 63980,two: 1592},
                    {period: '2017-08-15',one: 65491,two: 1452}
                    ],
                lineColors: ['#50b154', '#b2ddb4', '#50b154'],
                xkey: 'period',
                ykeys: ['one', 'two'],
                labels: ['Кол-во участников', 'Новых участников'],
                lineWidth: 1,
				pointSize: 2,
				gridTextFamily: 'Ubuntu',
				gridTextSize: '11px',
                hideHover: 'auto'
		});
	}
}

$(document).ready(function() {
  MorrisAreaChart();

  $(window).resize(function() {
  	if($('#morris-hero-area').length) {
	    window.MorrisAreaChart.redraw();
	}
  	if($('#morris-hero-area2').length) {
	    window.MorrisAreaChart.redraw();
	}
  });

});
