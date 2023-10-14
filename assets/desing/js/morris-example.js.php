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
                    {period: '2017-12-06', one: 9221636.24, two: 256567.21},
{period: '2017-12-07', one: 9423085.03, two: 340239.74},
{period: '2017-12-08', one: 9558254.06, two: 252700.82},
{period: '2017-12-09', one: 9659494.6, two: 216823.78},
{period: '2017-12-10', one: 9785354.28, two: 260961.86},
{period: '2017-12-11', one: 10147185.52, two: 483255.88},
{period: '2017-12-12', one: 10384580.01, two: 369184.59},
                    ],
                lineColors: ['#50b154', '#b2ddb4', '#50b154'],
                xkey: 'period',
                ykeys: ['one', 'two'],
                labels: ['Резерв выплат', 'Сумма пополнений'],
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
                    {period: '2017-12-06', one: 116565, two: 1882},
{period: '2017-12-07', one: 119352, two: 2787},
{period: '2017-12-08', one: 121313, two: 1961},
{period: '2017-12-09', one: 123520, two: 2207},
{period: '2017-12-10', one: 125768, two: 2248},
{period: '2017-12-11', one: 127812, two: 2042},
{period: '2017-12-12', one: 129918, two: 2106},
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
