var pivot = new WebDataRocks({
    container: "#wdr-component",
    toolbar: true,
    width: 1050,
    report: {
        "dataSource": {
            "dataSourceType": "json",
            "data": getJSONData()
        },
        formats: [{
            name: "rating",
            decimalPlaces: 2
        }],
        "slice": {
        "rows": [
            {
                "uniqueName": "Company Location"
            }
        ],
        "columns": [
            {
                "uniqueName": "Review Date"
            },
            {
                "uniqueName": "Measures"
            }
        ],
        "measures": [
            {
                "uniqueName": "Rating",
                "aggregation": "average",
                "format": "rating"
            }
        ],
        "sorting": {
            "column": {
                "type": "desc",
                "tuple": [],
                "measure": "Rating"
            }
        }
    },
    "conditions": [
        {
            "formula": "#value >= 3.5",
            "format": {
                "backgroundColor": "#039BE5",
                "color": "#FFFFFF",
                "fontFamily": "Arial",
                "fontSize": "12px"
            }
        }
    ],
    "formats": [
        {
            "name": "rating",
            "decimalPlaces": 2
        }
    ]
    },
    reportcomplete: function() {
        pivot.off("reportcomplete");
        applyHighchartsThemes();
        createLineChart();
        createBarChart();
        createPieChart();
    }
});

function createLineChart() {
    pivot.highcharts.getData({
        type: "spline",
        slice: {
            rows: [{
                uniqueName: "Company Location"
            }],
            columns: [{
                uniqueName: "[Measures]"
            }],
            measures: [{
                uniqueName: "Rating",
                aggregation: "average"
            }],
            sorting: {
                column: {
                    type: "desc",
                    tuple: [],
                    measure: "Rating"
                }
            }
        }
    }, drawLineChart, drawLineChart);
}


function createBarChart() {
    pivot.highcharts.getData({
        type: "bar",
        slice: {
            rows: [{
                uniqueName: "Bean Type"
            }],
            columns: [{
                uniqueName: "[Measures]"
            }],
            measures: [{
                uniqueName: "Rating",
                aggregation: "average"
            }],
            sorting: {
                column: {
                    type: "desc",
                    tuple: [],
                    measure: "Rating"
                }
            }
        }
    }, drawBarChart, drawBarChart);
}


function createPieChart() {
    pivot.highcharts.getData({
        type: "pie",
        slice: {
            rows: [{
                uniqueName: "Specific Bean Origin",
                "filter": {
                    "type": "top",
                    "quantity": 6,
                    "measure": "Rating"
                },
                "sort": "asc"
            }],
            columns: [{
                uniqueName: "[Measures]"
            }],
            measures: [{
                uniqueName: "Rating",
                aggregation: "max"
            }],
            sorting: {
                column: {
                    type: "desc",
                    tuple: [],
                    measure: "Rating"
                }
            }
        }
    }, drawPieChart, drawPieChart);
}

function drawLineChart(data) {
   data.title.text = "Best chocolate manufacturers by country";
   Highcharts.chart('lineChartContainer', data);
}

function drawBarChart(data) {
   data.title.text = "Best bean types";
   Highcharts.chart('barChartContainer', data);
}

function drawPieChart(data) {
   data.title.text = "Best chocolate by specific bean origin";
   Highcharts.chart('pieChartContainer', data);
}

function applyHighchartsThemes() {
  // Load the fonts
Highcharts.createElement('link', {
    href: 'https://fonts.googleapis.com/css?family=Dosis:400,600',
    rel: 'stylesheet',
    type: 'text/css'
}, null, document.getElementsByTagName('head')[0]);

Highcharts.theme = {
    colors: ['#7cb5ec', '#f7a35c', '#90ee7e', '#7798BF', '#aaeeee', '#ff0066',
        '#eeaaee', '#55BF3B', '#DF5353', '#7798BF', '#aaeeee'],
    chart: {
        backgroundColor: null,
        style: {
            fontFamily: 'Dosis, sans-serif'
        }
    },
    title: {
        style: {
            fontSize: '16px',
            fontWeight: 'bold',
            textTransform: 'uppercase'
        }
    },
    tooltip: {
        borderWidth: 0,
        backgroundColor: 'rgba(219,219,216,0.8)',
        shadow: false
    },
    legend: {
        itemStyle: {
            fontWeight: 'bold',
            fontSize: '13px'
        }
    },
    xAxis: {
        gridLineWidth: 1,
        labels: {
            style: {
                fontSize: '12px'
            }
        }
    },
    yAxis: {
        minorTickInterval: 'auto',
        title: {
            style: {
                textTransform: 'uppercase'
            }
        },
        labels: {
            style: {
                fontSize: '12px'
            }
        }
    },
    plotOptions: {
        candlestick: {
            lineColor: '#404048'
        }
    },


    // General
    background2: '#F0F0EA'

};

// Apply the theme
Highcharts.setOptions(Highcharts.theme);
}
function getJSONData() {
    return [{
            "Company Maker": "A. Morin",
            "Specific Bean Origin": "Agua Grande",
            "REF": 1876,
            "Review Date": 2016,
            "Cocoa Percent": "63%",
            "Company Location": "France",
            "Rating": 3.75,
            "Bean Type": "",
            "Broad Bean Origin": "Sao Tome"
        },
        {
            "Company Maker": "A. Morin",
            "Specific Bean Origin": "Kpime",
            "REF": 1676,
            "Review Date": 2015,
            "Cocoa Percent": "70%",
            "Company Location": "France",
            "Rating": 2.75,
            "Bean Type": "",
            "Broad Bean Origin": "Togo"
        },
        {
            "Company Maker": "A. Morin",
            "Specific Bean Origin": "Atsane",
            "REF": 1676,
            "Review Date": 2015,
            "Cocoa Percent": "70%",
            "Company Location": "France",
            "Rating": 3,
            "Bean Type": "",
            "Broad Bean Origin": "Togo"
        },
        {
            "Company Maker": "A. Morin",
            "Specific Bean Origin": "Akata",
            "REF": 1680,
            "Review Date": 2015,
            "Cocoa Percent": "70%",
            "Company Location": "France",
            "Rating": 3.5,
            "Bean Type": "",
            "Broad Bean Origin": "Togo"
        },
        {
            "Company Maker": "A. Morin",
            "Specific Bean Origin": "Quilla",
            "REF": 1704,
            "Review Date": 2015,
            "Cocoa Percent": "70%",
            "Company Location": "France",
            "Rating": 3.5,
            "Bean Type": "",
            "Broad Bean Origin": "Peru"
        },
        {
            "Company Maker": "A. Morin",
            "Specific Bean Origin": "Carenero",
            "REF": 1315,
            "Review Date": 2014,
            "Cocoa Percent": "70%",
            "Company Location": "France",
            "Rating": 2.75,
            "Bean Type": "Criollo",
            "Broad Bean Origin": "Venezuela"
        },
        {
            "Company Maker": "A. Morin",
            "Specific Bean Origin": "Cuba",
            "REF": 1315,
            "Review Date": 2014,
            "Cocoa Percent": "70%",
            "Company Location": "France",
            "Rating": 3.5,
            "Bean Type": "",
            "Broad Bean Origin": "Cuba"
        },
        {
            "Company Maker": "A. Morin",
            "Specific Bean Origin": "Sur del Lago",
            "REF": 1315,
            "Review Date": 2014,
            "Cocoa Percent": "70%",
            "Company Location": "France",
            "Rating": 3.5,
            "Bean Type": "Criollo",
            "Broad Bean Origin": "Venezuela"
        },
        {
            "Company Maker": "A. Morin",
            "Specific Bean Origin": "Puerto Cabello",
            "REF": 1319,
            "Review Date": 2014,
            "Cocoa Percent": "70%",
            "Company Location": "France",
            "Rating": 3.75,
            "Bean Type": "Criollo",
            "Broad Bean Origin": "Venezuela"
        },
        {
            "Company Maker": "A. Morin",
            "Specific Bean Origin": "Pablino",
            "REF": 1319,
            "Review Date": 2014,
            "Cocoa Percent": "70%",
            "Company Location": "France",
            "Rating": 4,
            "Bean Type": "",
            "Broad Bean Origin": "Peru"
        },
        {
            "Company Maker": "A. Morin",
            "Specific Bean Origin": "Panama",
            "REF": 1011,
            "Review Date": 2013,
            "Cocoa Percent": "70%",
            "Company Location": "France",
            "Rating": 2.75,
            "Bean Type": "",
            "Broad Bean Origin": "Panama"
        },
        {
            "Company Maker": "A. Morin",
            "Specific Bean Origin": "Madagascar",
            "REF": 1011,
            "Review Date": 2013,
            "Cocoa Percent": "70%",
            "Company Location": "France",
            "Rating": 3,
            "Bean Type": "Criollo",
            "Broad Bean Origin": "Madagascar"
        },
        {
            "Company Maker": "A. Morin",
            "Specific Bean Origin": "Brazil",
            "REF": 1011,
            "Review Date": 2013,
            "Cocoa Percent": "70%",
            "Company Location": "France",
            "Rating": 3.25,
            "Bean Type": "",
            "Broad Bean Origin": "Brazil"
        },
        {
            "Company Maker": "A. Morin",
            "Specific Bean Origin": "Equateur",
            "REF": 1011,
            "Review Date": 2013,
            "Cocoa Percent": "70%",
            "Company Location": "France",
            "Rating": 3.75,
            "Bean Type": "",
            "Broad Bean Origin": "Ecuador"
        },
        {
            "Company Maker": "A. Morin",
            "Specific Bean Origin": "Colombie",
            "REF": 1015,
            "Review Date": 2013,
            "Cocoa Percent": "70%",
            "Company Location": "France",
            "Rating": 2.75,
            "Bean Type": "",
            "Broad Bean Origin": "Colombia"
        },
        {
            "Company Maker": "A. Morin",
            "Specific Bean Origin": "Birmanie",
            "REF": 1015,
            "Review Date": 2013,
            "Cocoa Percent": "70%",
            "Company Location": "France",
            "Rating": 3,
            "Bean Type": "",
            "Broad Bean Origin": "Burma"
        },
        {
            "Company Maker": "A. Morin",
            "Specific Bean Origin": "Papua New Guinea",
            "REF": 1015,
            "Review Date": 2013,
            "Cocoa Percent": "70%",
            "Company Location": "France",
            "Rating": 3.25,
            "Bean Type": "",
            "Broad Bean Origin": "Papua New Guinea"
        },
        {
            "Company Maker": "A. Morin",
            "Specific Bean Origin": "Chuao",
            "REF": 1015,
            "Review Date": 2013,
            "Cocoa Percent": "70%",
            "Company Location": "France",
            "Rating": 4,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Venezuela"
        },
        {
            "Company Maker": "A. Morin",
            "Specific Bean Origin": "Piura",
            "REF": 1019,
            "Review Date": 2013,
            "Cocoa Percent": "70%",
            "Company Location": "France",
            "Rating": 3.25,
            "Bean Type": "",
            "Broad Bean Origin": "Peru"
        },
        {
            "Company Maker": "A. Morin",
            "Specific Bean Origin": "Chanchamayo Province",
            "REF": 1019,
            "Review Date": 2013,
            "Cocoa Percent": "70%",
            "Company Location": "France",
            "Rating": 3.5,
            "Bean Type": "",
            "Broad Bean Origin": "Peru"
        },
        {
            "Company Maker": "A. Morin",
            "Specific Bean Origin": "Chanchamayo Province",
            "REF": 1019,
            "Review Date": 2013,
            "Cocoa Percent": "63%",
            "Company Location": "France",
            "Rating": 4,
            "Bean Type": "",
            "Broad Bean Origin": "Peru"
        },
        {
            "Company Maker": "A. Morin",
            "Specific Bean Origin": "Bolivia",
            "REF": 797,
            "Review Date": 2012,
            "Cocoa Percent": "70%",
            "Company Location": "France",
            "Rating": 3.5,
            "Bean Type": "",
            "Broad Bean Origin": "Bolivia"
        },
        {
            "Company Maker": "A. Morin",
            "Specific Bean Origin": "Peru",
            "REF": 797,
            "Review Date": 2012,
            "Cocoa Percent": "63%",
            "Company Location": "France",
            "Rating": 3.75,
            "Bean Type": "",
            "Broad Bean Origin": "Peru"
        },
        {
            "Company Maker": "Acalli",
            "Specific Bean Origin": "Chulucanas, El Platanal",
            "REF": 1462,
            "Review Date": 2015,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3.75,
            "Bean Type": "",
            "Broad Bean Origin": "Peru"
        },
        {
            "Company Maker": "Acalli",
            "Specific Bean Origin": "Tumbes, Norandino",
            "REF": 1470,
            "Review Date": 2015,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3.75,
            "Bean Type": "Criollo",
            "Broad Bean Origin": "Peru"
        },
        {
            "Company Maker": "Adi",
            "Specific Bean Origin": "Vanua Levu",
            "REF": 705,
            "Review Date": 2011,
            "Cocoa Percent": "60%",
            "Company Location": "Fiji",
            "Rating": 2.75,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Fiji"
        },
        {
            "Company Maker": "Adi",
            "Specific Bean Origin": "Vanua Levu, Toto-A",
            "REF": 705,
            "Review Date": 2011,
            "Cocoa Percent": "80%",
            "Company Location": "Fiji",
            "Rating": 3.25,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Fiji"
        },
        {
            "Company Maker": "Adi",
            "Specific Bean Origin": "Vanua Levu",
            "REF": 705,
            "Review Date": 2011,
            "Cocoa Percent": "88%",
            "Company Location": "Fiji",
            "Rating": 3.5,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Fiji"
        },
        {
            "Company Maker": "Adi",
            "Specific Bean Origin": "Vanua Levu, Ami-Ami-CA",
            "REF": 705,
            "Review Date": 2011,
            "Cocoa Percent": "72%",
            "Company Location": "Fiji",
            "Rating": 3.5,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Fiji"
        },
        {
            "Company Maker": "Aequare (Gianduja)",
            "Specific Bean Origin": "Los Rios, Quevedo, Arriba",
            "REF": 370,
            "Review Date": 2009,
            "Cocoa Percent": "55%",
            "Company Location": "Ecuador",
            "Rating": 2.75,
            "Bean Type": "Forastero (Arriba)",
            "Broad Bean Origin": "Ecuador"
        },
        {
            "Company Maker": "Aequare (Gianduja)",
            "Specific Bean Origin": "Los Rios, Quevedo, Arriba",
            "REF": 370,
            "Review Date": 2009,
            "Cocoa Percent": "70%",
            "Company Location": "Ecuador",
            "Rating": 3,
            "Bean Type": "Forastero (Arriba)",
            "Broad Bean Origin": "Ecuador"
        },
        {
            "Company Maker": "Ah Cacao",
            "Specific Bean Origin": "Tabasco",
            "REF": 316,
            "Review Date": 2009,
            "Cocoa Percent": "70%",
            "Company Location": "Mexico",
            "Rating": 3,
            "Bean Type": "Criollo",
            "Broad Bean Origin": "Mexico"
        },
        {
            "Company Maker": "Akesson's (Pralus)",
            "Specific Bean Origin": "Bali (west), Sukrama Family, Melaya area",
            "REF": 636,
            "Review Date": 2011,
            "Cocoa Percent": "75%",
            "Company Location": "Switzerland",
            "Rating": 3.75,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Indonesia"
        },
        {
            "Company Maker": "Akesson's (Pralus)",
            "Specific Bean Origin": "Madagascar, Ambolikapiky P.",
            "REF": 502,
            "Review Date": 2010,
            "Cocoa Percent": "75%",
            "Company Location": "Switzerland",
            "Rating": 2.75,
            "Bean Type": "Criollo",
            "Broad Bean Origin": "Madagascar"
        },
        {
            "Company Maker": "Akesson's (Pralus)",
            "Specific Bean Origin": "Monte Alegre, D. Badero",
            "REF": 508,
            "Review Date": 2010,
            "Cocoa Percent": "75%",
            "Company Location": "Switzerland",
            "Rating": 2.75,
            "Bean Type": "Forastero",
            "Broad Bean Origin": "Brazil"
        },
        {
            "Company Maker": "Alain Ducasse",
            "Specific Bean Origin": "Trinite",
            "REF": 1215,
            "Review Date": 2014,
            "Cocoa Percent": "65%",
            "Company Location": "France",
            "Rating": 2.75,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Trinidad"
        },
        {
            "Company Maker": "Alain Ducasse",
            "Specific Bean Origin": "Vietnam",
            "REF": 1215,
            "Review Date": 2014,
            "Cocoa Percent": "75%",
            "Company Location": "France",
            "Rating": 2.75,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Vietnam"
        },
        {
            "Company Maker": "Alain Ducasse",
            "Specific Bean Origin": "Madagascar",
            "REF": 1215,
            "Review Date": 2014,
            "Cocoa Percent": "75%",
            "Company Location": "France",
            "Rating": 3,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Madagascar"
        },
        {
            "Company Maker": "Alain Ducasse",
            "Specific Bean Origin": "Chuao",
            "REF": 1061,
            "Review Date": 2013,
            "Cocoa Percent": "75%",
            "Company Location": "France",
            "Rating": 2.5,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Venezuela"
        },
        {
            "Company Maker": "Alain Ducasse",
            "Specific Bean Origin": "Piura, Perou",
            "REF": 1173,
            "Review Date": 2013,
            "Cocoa Percent": "75%",
            "Company Location": "France",
            "Rating": 2.5,
            "Bean Type": "",
            "Broad Bean Origin": "Peru"
        },
        {
            "Company Maker": "Alexandre",
            "Specific Bean Origin": "Winak Coop, Napo",
            "REF": 1944,
            "Review Date": 2017,
            "Cocoa Percent": "70%",
            "Company Location": "Netherlands",
            "Rating": 3.5,
            "Bean Type": "Forastero (Nacional)",
            "Broad Bean Origin": "Ecuador"
        },
        {
            "Company Maker": "Alexandre",
            "Specific Bean Origin": "La Dalia, Matagalpa",
            "REF": 1944,
            "Review Date": 2017,
            "Cocoa Percent": "70%",
            "Company Location": "Netherlands",
            "Rating": 3.5,
            "Bean Type": "Criollo, Trinitario",
            "Broad Bean Origin": "Nicaragua"
        },
        {
            "Company Maker": "Alexandre",
            "Specific Bean Origin": "Tien Giang",
            "REF": 1944,
            "Review Date": 2017,
            "Cocoa Percent": "70%",
            "Company Location": "Netherlands",
            "Rating": 3.5,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Vietnam"
        },
        {
            "Company Maker": "Alexandre",
            "Specific Bean Origin": "Makwale Village, Kyela",
            "REF": 1944,
            "Review Date": 2017,
            "Cocoa Percent": "70%",
            "Company Location": "Netherlands",
            "Rating": 3.5,
            "Bean Type": "Forastero",
            "Broad Bean Origin": "Tanzania"
        },
        {
            "Company Maker": "Altus aka Cao Artisan",
            "Specific Bean Origin": "Momotombo",
            "REF": 1728,
            "Review Date": 2016,
            "Cocoa Percent": "60%",
            "Company Location": "U.S.A.",
            "Rating": 2.75,
            "Bean Type": "",
            "Broad Bean Origin": "Nicaragua"
        },
        {
            "Company Maker": "Altus aka Cao Artisan",
            "Specific Bean Origin": "Acopagro",
            "REF": 1728,
            "Review Date": 2016,
            "Cocoa Percent": "60%",
            "Company Location": "U.S.A.",
            "Rating": 3,
            "Bean Type": "",
            "Broad Bean Origin": "Peru"
        },
        {
            "Company Maker": "Altus aka Cao Artisan",
            "Specific Bean Origin": "CIAAB Coop",
            "REF": 1732,
            "Review Date": 2016,
            "Cocoa Percent": "60%",
            "Company Location": "U.S.A.",
            "Rating": 2.5,
            "Bean Type": "",
            "Broad Bean Origin": "Bolivia"
        },
        {
            "Company Maker": "Altus aka Cao Artisan",
            "Specific Bean Origin": "Villa Andina",
            "REF": 1732,
            "Review Date": 2016,
            "Cocoa Percent": "60%",
            "Company Location": "U.S.A.",
            "Rating": 2.5,
            "Bean Type": "",
            "Broad Bean Origin": "Peru"
        },
        {
            "Company Maker": "Altus aka Cao Artisan",
            "Specific Bean Origin": "Gruppo Salinas",
            "REF": 1732,
            "Review Date": 2016,
            "Cocoa Percent": "60%",
            "Company Location": "U.S.A.",
            "Rating": 2.75,
            "Bean Type": "",
            "Broad Bean Origin": "Ecuador"
        },
        {
            "Company Maker": "Altus aka Cao Artisan",
            "Specific Bean Origin": "Sur del Lago",
            "REF": 1125,
            "Review Date": 2013,
            "Cocoa Percent": "60%",
            "Company Location": "U.S.A.",
            "Rating": 2.5,
            "Bean Type": "",
            "Broad Bean Origin": "Venezuela"
        },
        {
            "Company Maker": "Altus aka Cao Artisan",
            "Specific Bean Origin": "Conacado",
            "REF": 1125,
            "Review Date": 2013,
            "Cocoa Percent": "60%",
            "Company Location": "U.S.A.",
            "Rating": 3,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Dominican Republic"
        },
        {
            "Company Maker": "Altus aka Cao Artisan",
            "Specific Bean Origin": "Bolivia",
            "REF": 1129,
            "Review Date": 2013,
            "Cocoa Percent": "80%",
            "Company Location": "U.S.A.",
            "Rating": 3.25,
            "Bean Type": "",
            "Broad Bean Origin": "Bolivia"
        },
        {
            "Company Maker": "Altus aka Cao Artisan",
            "Specific Bean Origin": "Bolivia",
            "REF": 1133,
            "Review Date": 2013,
            "Cocoa Percent": "60%",
            "Company Location": "U.S.A.",
            "Rating": 3,
            "Bean Type": "",
            "Broad Bean Origin": "Bolivia"
        },
        {
            "Company Maker": "Altus aka Cao Artisan",
            "Specific Bean Origin": "Peru",
            "REF": 1133,
            "Review Date": 2013,
            "Cocoa Percent": "60%",
            "Company Location": "U.S.A.",
            "Rating": 3.25,
            "Bean Type": "",
            "Broad Bean Origin": "Peru"
        },
        {
            "Company Maker": "Amano",
            "Specific Bean Origin": "Morobe",
            "REF": 725,
            "Review Date": 2011,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 4,
            "Bean Type": "",
            "Broad Bean Origin": "Papua New Guinea"
        },
        {
            "Company Maker": "Amano",
            "Specific Bean Origin": "Dos Rios",
            "REF": 470,
            "Review Date": 2010,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3.75,
            "Bean Type": "",
            "Broad Bean Origin": "Dominican Republic"
        },
        {
            "Company Maker": "Amano",
            "Specific Bean Origin": "Guayas",
            "REF": 470,
            "Review Date": 2010,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 4,
            "Bean Type": "",
            "Broad Bean Origin": "Ecuador"
        },
        {
            "Company Maker": "Amano",
            "Specific Bean Origin": "Chuao",
            "REF": 544,
            "Review Date": 2010,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Venezuela"
        },
        {
            "Company Maker": "Amano",
            "Specific Bean Origin": "Montanya",
            "REF": 363,
            "Review Date": 2009,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3,
            "Bean Type": "",
            "Broad Bean Origin": "Venezuela"
        },
        {
            "Company Maker": "Amano",
            "Specific Bean Origin": "Bali, Jembrana",
            "REF": 304,
            "Review Date": 2008,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 2.75,
            "Bean Type": "",
            "Broad Bean Origin": "Indonesia"
        },
        {
            "Company Maker": "Amano",
            "Specific Bean Origin": "Madagascar",
            "REF": 129,
            "Review Date": 2007,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3.5,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Madagascar"
        },
        {
            "Company Maker": "Amano",
            "Specific Bean Origin": "Cuyagua",
            "REF": 147,
            "Review Date": 2007,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3,
            "Bean Type": "",
            "Broad Bean Origin": "Venezuela"
        },
        {
            "Company Maker": "Amano",
            "Specific Bean Origin": "Ocumare",
            "REF": 175,
            "Review Date": 2007,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3.75,
            "Bean Type": "Criollo",
            "Broad Bean Origin": "Venezuela"
        },
        {
            "Company Maker": "Amatller (Simon Coll)",
            "Specific Bean Origin": "Ghana",
            "REF": 322,
            "Review Date": 2009,
            "Cocoa Percent": "70%",
            "Company Location": "Spain",
            "Rating": 3,
            "Bean Type": "Forastero",
            "Broad Bean Origin": "Ghana"
        },
        {
            "Company Maker": "Amatller (Simon Coll)",
            "Specific Bean Origin": "Ecuador",
            "REF": 327,
            "Review Date": 2009,
            "Cocoa Percent": "70%",
            "Company Location": "Spain",
            "Rating": 2.75,
            "Bean Type": "",
            "Broad Bean Origin": "Ecuador"
        },
        {
            "Company Maker": "Amatller (Simon Coll)",
            "Specific Bean Origin": "Ecuador",
            "REF": 464,
            "Review Date": 2009,
            "Cocoa Percent": "85%",
            "Company Location": "Spain",
            "Rating": 2.75,
            "Bean Type": "",
            "Broad Bean Origin": "Ecuador"
        },
        {
            "Company Maker": "Amatller (Simon Coll)",
            "Specific Bean Origin": "Ghana",
            "REF": 464,
            "Review Date": 2009,
            "Cocoa Percent": "85%",
            "Company Location": "Spain",
            "Rating": 3,
            "Bean Type": "Forastero",
            "Broad Bean Origin": "Ghana"
        },
        {
            "Company Maker": "Amazona",
            "Specific Bean Origin": "LamasdelChanka, San Martin, Oro Verde coop",
            "REF": 1145,
            "Review Date": 2013,
            "Cocoa Percent": "72%",
            "Company Location": "Peru",
            "Rating": 3.25,
            "Bean Type": "",
            "Broad Bean Origin": "Peru"
        },
        {
            "Company Maker": "Amazona",
            "Specific Bean Origin": "Bellavista Gran Pajeten, San Martin",
            "REF": 1145,
            "Review Date": 2013,
            "Cocoa Percent": "73%",
            "Company Location": "Peru",
            "Rating": 3.5,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Peru"
        },
        {
            "Company Maker": "Ambrosia",
            "Specific Bean Origin": "Belize",
            "REF": 1494,
            "Review Date": 2015,
            "Cocoa Percent": "64%",
            "Company Location": "Canada",
            "Rating": 3,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Belize"
        },
        {
            "Company Maker": "Ambrosia",
            "Specific Bean Origin": "Madagascar",
            "REF": 1494,
            "Review Date": 2015,
            "Cocoa Percent": "66%",
            "Company Location": "Canada",
            "Rating": 3.25,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Madagascar"
        },
        {
            "Company Maker": "Ambrosia",
            "Specific Bean Origin": "Dominican Republic",
            "REF": 1498,
            "Review Date": 2015,
            "Cocoa Percent": "75%",
            "Company Location": "Canada",
            "Rating": 3.25,
            "Bean Type": "",
            "Broad Bean Origin": "Dominican Republic"
        },
        {
            "Company Maker": "Ambrosia",
            "Specific Bean Origin": "Papua New Guinea",
            "REF": 1498,
            "Review Date": 2015,
            "Cocoa Percent": "63%",
            "Company Location": "Canada",
            "Rating": 3.25,
            "Bean Type": "",
            "Broad Bean Origin": "Papua New Guinea"
        },
        {
            "Company Maker": "Ambrosia",
            "Specific Bean Origin": "Venezuela",
            "REF": 1498,
            "Review Date": 2015,
            "Cocoa Percent": "70%",
            "Company Location": "Canada",
            "Rating": 3.25,
            "Bean Type": "",
            "Broad Bean Origin": "Venezuela"
        },
        {
            "Company Maker": "Ambrosia",
            "Specific Bean Origin": "Peru",
            "REF": 1498,
            "Review Date": 2015,
            "Cocoa Percent": "68%",
            "Company Location": "Canada",
            "Rating": 3.5,
            "Bean Type": "",
            "Broad Bean Origin": "Peru"
        },
        {
            "Company Maker": "Amedei",
            "Specific Bean Origin": "Piura, Blanco de Criollo",
            "REF": 979,
            "Review Date": 2012,
            "Cocoa Percent": "70%",
            "Company Location": "Italy",
            "Rating": 3.75,
            "Bean Type": "",
            "Broad Bean Origin": "Peru"
        },
        {
            "Company Maker": "Amedei",
            "Specific Bean Origin": "Porcelana",
            "REF": 111,
            "Review Date": 2007,
            "Cocoa Percent": "70%",
            "Company Location": "Italy",
            "Rating": 4,
            "Bean Type": "Criollo (Porcelana)",
            "Broad Bean Origin": "Venezuela"
        },
        {
            "Company Maker": "Amedei",
            "Specific Bean Origin": "Nine",
            "REF": 111,
            "Review Date": 2007,
            "Cocoa Percent": "75%",
            "Company Location": "Italy",
            "Rating": 4,
            "Bean Type": "Blend",
            "Broad Bean Origin": ""
        },
        {
            "Company Maker": "Amedei",
            "Specific Bean Origin": "Chuao",
            "REF": 111,
            "Review Date": 2007,
            "Cocoa Percent": "70%",
            "Company Location": "Italy",
            "Rating": 5,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Venezuela"
        },
        {
            "Company Maker": "Amedei",
            "Specific Bean Origin": "Ecuador",
            "REF": 123,
            "Review Date": 2007,
            "Cocoa Percent": "70%",
            "Company Location": "Italy",
            "Rating": 3,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Ecuador"
        },
        {
            "Company Maker": "Amedei",
            "Specific Bean Origin": "Jamaica",
            "REF": 123,
            "Review Date": 2007,
            "Cocoa Percent": "70%",
            "Company Location": "Italy",
            "Rating": 3,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Jamaica"
        },
        {
            "Company Maker": "Amedei",
            "Specific Bean Origin": "Grenada",
            "REF": 123,
            "Review Date": 2007,
            "Cocoa Percent": "70%",
            "Company Location": "Italy",
            "Rating": 3.5,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Grenada"
        },
        {
            "Company Maker": "Amedei",
            "Specific Bean Origin": "Venezuela",
            "REF": 123,
            "Review Date": 2007,
            "Cocoa Percent": "70%",
            "Company Location": "Italy",
            "Rating": 3.75,
            "Bean Type": "Trinitario (85% Criollo)",
            "Broad Bean Origin": "Venezuela"
        },
        {
            "Company Maker": "Amedei",
            "Specific Bean Origin": "Madagascar",
            "REF": 123,
            "Review Date": 2007,
            "Cocoa Percent": "70%",
            "Company Location": "Italy",
            "Rating": 4,
            "Bean Type": "Trinitario (85% Criollo)",
            "Broad Bean Origin": "Madagascar"
        },
        {
            "Company Maker": "Amedei",
            "Specific Bean Origin": "Trinidad",
            "REF": 129,
            "Review Date": 2007,
            "Cocoa Percent": "70%",
            "Company Location": "Italy",
            "Rating": 3.5,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Trinidad"
        },
        {
            "Company Maker": "Amedei",
            "Specific Bean Origin": "Toscano Black",
            "REF": 170,
            "Review Date": 2007,
            "Cocoa Percent": "63%",
            "Company Location": "Italy",
            "Rating": 3.5,
            "Bean Type": "Blend",
            "Broad Bean Origin": ""
        },
        {
            "Company Maker": "Amedei",
            "Specific Bean Origin": "Toscano Black",
            "REF": 40,
            "Review Date": 2006,
            "Cocoa Percent": "70%",
            "Company Location": "Italy",
            "Rating": 5,
            "Bean Type": "Blend",
            "Broad Bean Origin": ""
        },
        {
            "Company Maker": "Amedei",
            "Specific Bean Origin": "Toscano Black",
            "REF": 75,
            "Review Date": 2006,
            "Cocoa Percent": "66%",
            "Company Location": "Italy",
            "Rating": 4,
            "Bean Type": "Blend",
            "Broad Bean Origin": ""
        },
        {
            "Company Maker": "AMMA",
            "Specific Bean Origin": "Catongo",
            "REF": 1065,
            "Review Date": 2013,
            "Cocoa Percent": "75%",
            "Company Location": "Brazil",
            "Rating": 3.25,
            "Bean Type": "Forastero (Catongo)",
            "Broad Bean Origin": "Brazil"
        },
        {
            "Company Maker": "AMMA",
            "Specific Bean Origin": "Monte Alegre, 3 diff. plantations",
            "REF": 572,
            "Review Date": 2010,
            "Cocoa Percent": "85%",
            "Company Location": "Brazil",
            "Rating": 2.75,
            "Bean Type": "Forastero (Parazinho)",
            "Broad Bean Origin": "Brazil"
        },
        {
            "Company Maker": "AMMA",
            "Specific Bean Origin": "Monte Alegre, 3 diff. plantations",
            "REF": 572,
            "Review Date": 2010,
            "Cocoa Percent": "50%",
            "Company Location": "Brazil",
            "Rating": 3.75,
            "Bean Type": "Forastero (Parazinho)",
            "Broad Bean Origin": "Brazil"
        },
        {
            "Company Maker": "AMMA",
            "Specific Bean Origin": "Monte Alegre, 3 diff. plantations",
            "REF": 572,
            "Review Date": 2010,
            "Cocoa Percent": "75%",
            "Company Location": "Brazil",
            "Rating": 3.75,
            "Bean Type": "Forastero (Parazinho)",
            "Broad Bean Origin": "Brazil"
        },
        {
            "Company Maker": "AMMA",
            "Specific Bean Origin": "Monte Alegre, 3 diff. plantations",
            "REF": 572,
            "Review Date": 2010,
            "Cocoa Percent": "60%",
            "Company Location": "Brazil",
            "Rating": 4,
            "Bean Type": "Forastero (Parazinho)",
            "Broad Bean Origin": "Brazil"
        },
        {
            "Company Maker": "Anahata",
            "Specific Bean Origin": "Elvesia",
            "REF": 1259,
            "Review Date": 2014,
            "Cocoa Percent": "75%",
            "Company Location": "U.S.A.",
            "Rating": 3,
            "Bean Type": "",
            "Broad Bean Origin": "Dominican Republic"
        },
        {
            "Company Maker": "Animas",
            "Specific Bean Origin": "Alto Beni",
            "REF": 1852,
            "Review Date": 2016,
            "Cocoa Percent": "75%",
            "Company Location": "U.S.A.",
            "Rating": 3.5,
            "Bean Type": "",
            "Broad Bean Origin": "Bolivia"
        },
        {
            "Company Maker": "Ara",
            "Specific Bean Origin": "Madagascar",
            "REF": 1375,
            "Review Date": 2014,
            "Cocoa Percent": "75%",
            "Company Location": "France",
            "Rating": 3,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Madagascar"
        },
        {
            "Company Maker": "Ara",
            "Specific Bean Origin": "Chiapas",
            "REF": 1379,
            "Review Date": 2014,
            "Cocoa Percent": "72%",
            "Company Location": "France",
            "Rating": 2.5,
            "Bean Type": "",
            "Broad Bean Origin": "Mexico"
        },
        {
            "Company Maker": "Ara",
            "Specific Bean Origin": "Equateur",
            "REF": 1379,
            "Review Date": 2014,
            "Cocoa Percent": "75%",
            "Company Location": "France",
            "Rating": 2.75,
            "Bean Type": "",
            "Broad Bean Origin": "Ecuador"
        },
        {
            "Company Maker": "Ara",
            "Specific Bean Origin": "Trincheras",
            "REF": 1379,
            "Review Date": 2014,
            "Cocoa Percent": "75%",
            "Company Location": "France",
            "Rating": 3,
            "Bean Type": "",
            "Broad Bean Origin": "Venezuela"
        },
        {
            "Company Maker": "Arete",
            "Specific Bean Origin": "San Juan",
            "REF": 1724,
            "Review Date": 2016,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3.5,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Trinidad"
        },
        {
            "Company Maker": "Arete",
            "Specific Bean Origin": "Kokoa Kamili",
            "REF": 1724,
            "Review Date": 2016,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3.75,
            "Bean Type": "",
            "Broad Bean Origin": "Tanzania"
        },
        {
            "Company Maker": "Arete",
            "Specific Bean Origin": "Tien Giang",
            "REF": 1900,
            "Review Date": 2016,
            "Cocoa Percent": "73%",
            "Company Location": "U.S.A.",
            "Rating": 3.5,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Vietnam"
        },
        {
            "Company Maker": "Arete",
            "Specific Bean Origin": "Hacienda Victoria",
            "REF": 1904,
            "Review Date": 2016,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3.25,
            "Bean Type": "",
            "Broad Bean Origin": "Ecuador"
        },
        {
            "Company Maker": "Arete",
            "Specific Bean Origin": "Costa Esmeraldas",
            "REF": 1904,
            "Review Date": 2016,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3.25,
            "Bean Type": "",
            "Broad Bean Origin": "Ecuador"
        },
        {
            "Company Maker": "Arete",
            "Specific Bean Origin": "Lachua",
            "REF": 1904,
            "Review Date": 2016,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3.5,
            "Bean Type": "",
            "Broad Bean Origin": "Guatemala"
        },
        {
            "Company Maker": "Arete",
            "Specific Bean Origin": "Rugoso",
            "REF": 1904,
            "Review Date": 2016,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3.75,
            "Bean Type": "",
            "Broad Bean Origin": "Nicaragua"
        },
        {
            "Company Maker": "Arete",
            "Specific Bean Origin": "La Masica, FHIA",
            "REF": 1908,
            "Review Date": 2016,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3.5,
            "Bean Type": "",
            "Broad Bean Origin": "Honduras"
        },
        {
            "Company Maker": "Arete",
            "Specific Bean Origin": "Coto Brus, Terciopelo",
            "REF": 1908,
            "Review Date": 2016,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 4,
            "Bean Type": "",
            "Broad Bean Origin": "Costa Rica"
        },
        {
            "Company Maker": "Arete",
            "Specific Bean Origin": "Phantom",
            "REF": 1924,
            "Review Date": 2016,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 4,
            "Bean Type": "Forastero (Nacional)",
            "Broad Bean Origin": "Peru"
        },
        {
            "Company Maker": "Arete",
            "Specific Bean Origin": "Elvesia",
            "REF": 1928,
            "Review Date": 2016,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3.75,
            "Bean Type": "",
            "Broad Bean Origin": "Dominican Republic"
        },
        {
            "Company Maker": "Arete",
            "Specific Bean Origin": "Matasawalevu",
            "REF": 1928,
            "Review Date": 2016,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3.25,
            "Bean Type": "",
            "Broad Bean Origin": "Fiji"
        },
        {
            "Company Maker": "Arete",
            "Specific Bean Origin": "Lam Dong",
            "REF": 1928,
            "Review Date": 2016,
            "Cocoa Percent": "73%",
            "Company Location": "U.S.A.",
            "Rating": 3.25,
            "Bean Type": "",
            "Broad Bean Origin": "Vietnam"
        },
        {
            "Company Maker": "Arete",
            "Specific Bean Origin": "Fazenda Camboa",
            "REF": 1534,
            "Review Date": 2015,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3.5,
            "Bean Type": "",
            "Broad Bean Origin": "Brazil"
        },
        {
            "Company Maker": "Arete",
            "Specific Bean Origin": "Nacional",
            "REF": 1534,
            "Review Date": 2015,
            "Cocoa Percent": "68%",
            "Company Location": "U.S.A.",
            "Rating": 3.5,
            "Bean Type": "Forastero (Nacional)",
            "Broad Bean Origin": "Peru"
        },
        {
            "Company Maker": "Arete",
            "Specific Bean Origin": "Puerto Quito, heirloom",
            "REF": 1534,
            "Review Date": 2015,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3.75,
            "Bean Type": "Forastero (Nacional)",
            "Broad Bean Origin": "Ecuador"
        },
        {
            "Company Maker": "Arete",
            "Specific Bean Origin": "Oko Caribe",
            "REF": 1598,
            "Review Date": 2015,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3.5,
            "Bean Type": "",
            "Broad Bean Origin": "Domincan Republic"
        },
        {
            "Company Maker": "Arete",
            "Specific Bean Origin": "Maya Mountain",
            "REF": 1598,
            "Review Date": 2015,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3.75,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Belize"
        },
        {
            "Company Maker": "Arete",
            "Specific Bean Origin": "Chuno",
            "REF": 1598,
            "Review Date": 2015,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 4,
            "Bean Type": "Criollo, Trinitario",
            "Broad Bean Origin": "Nicaragua"
        },
        {
            "Company Maker": "Arete",
            "Specific Bean Origin": "Fazenda Camboa",
            "REF": 1602,
            "Review Date": 2015,
            "Cocoa Percent": "75%",
            "Company Location": "U.S.A.",
            "Rating": 2.75,
            "Bean Type": "",
            "Broad Bean Origin": "Brazil"
        },
        {
            "Company Maker": "Arete",
            "Specific Bean Origin": "Guatemala",
            "REF": 1602,
            "Review Date": 2015,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3.25,
            "Bean Type": "",
            "Broad Bean Origin": "Guatemala"
        },
        {
            "Company Maker": "Arete",
            "Specific Bean Origin": "Camino Verde",
            "REF": 1602,
            "Review Date": 2015,
            "Cocoa Percent": "75%",
            "Company Location": "U.S.A.",
            "Rating": 3.5,
            "Bean Type": "",
            "Broad Bean Origin": "Ecuador"
        },
        {
            "Company Maker": "Artisan du Chocolat",
            "Specific Bean Origin": "Trinidad, Heritage, Limited ed.",
            "REF": 1193,
            "Review Date": 2013,
            "Cocoa Percent": "72%",
            "Company Location": "U.K.",
            "Rating": 3.25,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Trinidad"
        },
        {
            "Company Maker": "Artisan du Chocolat",
            "Specific Bean Origin": "Colombia, Casa Luker",
            "REF": 947,
            "Review Date": 2012,
            "Cocoa Percent": "72%",
            "Company Location": "U.K.",
            "Rating": 3.75,
            "Bean Type": "",
            "Broad Bean Origin": "Colombia"
        },
        {
            "Company Maker": "Artisan du Chocolat",
            "Specific Bean Origin": "Haiti",
            "REF": 729,
            "Review Date": 2011,
            "Cocoa Percent": "72%",
            "Company Location": "U.K.",
            "Rating": 4,
            "Bean Type": "",
            "Broad Bean Origin": "Haiti"
        },
        {
            "Company Maker": "Artisan du Chocolat",
            "Specific Bean Origin": "Panama",
            "REF": 745,
            "Review Date": 2011,
            "Cocoa Percent": "72%",
            "Company Location": "U.K.",
            "Rating": 2.75,
            "Bean Type": "",
            "Broad Bean Origin": "Panama"
        },
        {
            "Company Maker": "Artisan du Chocolat",
            "Specific Bean Origin": "Venezuela",
            "REF": 486,
            "Review Date": 2010,
            "Cocoa Percent": "100%",
            "Company Location": "U.K.",
            "Rating": 1.75,
            "Bean Type": "",
            "Broad Bean Origin": "Venezuela"
        },
        {
            "Company Maker": "Artisan du Chocolat",
            "Specific Bean Origin": "Jamaica",
            "REF": 531,
            "Review Date": 2010,
            "Cocoa Percent": "72%",
            "Company Location": "U.K.",
            "Rating": 3.75,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Jamaica"
        },
        {
            "Company Maker": "Artisan du Chocolat",
            "Specific Bean Origin": "Costa Rica",
            "REF": 600,
            "Review Date": 2010,
            "Cocoa Percent": "72%",
            "Company Location": "U.K.",
            "Rating": 3.25,
            "Bean Type": "",
            "Broad Bean Origin": "Costa Rica"
        },
        {
            "Company Maker": "Artisan du Chocolat",
            "Specific Bean Origin": "Ba Ria Vung Tau Province",
            "REF": 600,
            "Review Date": 2010,
            "Cocoa Percent": "72%",
            "Company Location": "U.K.",
            "Rating": 3.25,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Vietnam"
        },
        {
            "Company Maker": "Artisan du Chocolat",
            "Specific Bean Origin": "Bali",
            "REF": 600,
            "Review Date": 2010,
            "Cocoa Percent": "72%",
            "Company Location": "U.K.",
            "Rating": 3.5,
            "Bean Type": "",
            "Broad Bean Origin": "Indonesia"
        },
        {
            "Company Maker": "Artisan du Chocolat",
            "Specific Bean Origin": "Ocumare, Venezuela",
            "REF": 355,
            "Review Date": 2009,
            "Cocoa Percent": "75%",
            "Company Location": "U.K.",
            "Rating": 2.5,
            "Bean Type": "Criollo, Trinitario",
            "Broad Bean Origin": "Venezuela"
        },
        {
            "Company Maker": "Artisan du Chocolat",
            "Specific Bean Origin": "Java",
            "REF": 355,
            "Review Date": 2009,
            "Cocoa Percent": "72%",
            "Company Location": "U.K.",
            "Rating": 2.75,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Indonesia"
        },
        {
            "Company Maker": "Artisan du Chocolat",
            "Specific Bean Origin": "Brazil Rio Doce",
            "REF": 363,
            "Review Date": 2009,
            "Cocoa Percent": "72%",
            "Company Location": "U.K.",
            "Rating": 1.75,
            "Bean Type": "",
            "Broad Bean Origin": "Brazil"
        },
        {
            "Company Maker": "Artisan du Chocolat",
            "Specific Bean Origin": "Madagascar",
            "REF": 363,
            "Review Date": 2009,
            "Cocoa Percent": "80%",
            "Company Location": "U.K.",
            "Rating": 3,
            "Bean Type": "Criollo, Trinitario",
            "Broad Bean Origin": "Madagascar"
        },
        {
            "Company Maker": "Artisan du Chocolat",
            "Specific Bean Origin": "Peru",
            "REF": 363,
            "Review Date": 2009,
            "Cocoa Percent": "75%",
            "Company Location": "U.K.",
            "Rating": 3,
            "Bean Type": "Criollo",
            "Broad Bean Origin": "Peru"
        },
        {
            "Company Maker": "Artisan du Chocolat",
            "Specific Bean Origin": "Dominican Republic",
            "REF": 363,
            "Review Date": 2009,
            "Cocoa Percent": "72%",
            "Company Location": "U.K.",
            "Rating": 3.25,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Dominican Republic"
        },
        {
            "Company Maker": "Artisan du Chocolat",
            "Specific Bean Origin": "Congo",
            "REF": 300,
            "Review Date": 2008,
            "Cocoa Percent": "72%",
            "Company Location": "U.K.",
            "Rating": 3.75,
            "Bean Type": "Forastero",
            "Broad Bean Origin": "Congo"
        },
        {
            "Company Maker": "Artisan du Chocolat (Casa Luker)",
            "Specific Bean Origin": "Orinoqua Region, Arauca",
            "REF": 1181,
            "Review Date": 2013,
            "Cocoa Percent": "72%",
            "Company Location": "U.K.",
            "Rating": 2.75,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Colombia"
        },
        {
            "Company Maker": "Askinosie",
            "Specific Bean Origin": "Mababa",
            "REF": 1780,
            "Review Date": 2016,
            "Cocoa Percent": "68%",
            "Company Location": "U.S.A.",
            "Rating": 3.75,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Tanzania"
        },
        {
            "Company Maker": "Askinosie",
            "Specific Bean Origin": "Tenende, Uwate",
            "REF": 647,
            "Review Date": 2011,
            "Cocoa Percent": "72%",
            "Company Location": "U.S.A.",
            "Rating": 3.75,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Tanzania"
        },
        {
            "Company Maker": "Askinosie",
            "Specific Bean Origin": "Cortes",
            "REF": 661,
            "Review Date": 2011,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3.75,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Honduras"
        },
        {
            "Company Maker": "Askinosie",
            "Specific Bean Origin": "Davao",
            "REF": 331,
            "Review Date": 2009,
            "Cocoa Percent": "77%",
            "Company Location": "U.S.A.",
            "Rating": 3.75,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Philippines"
        },
        {
            "Company Maker": "Askinosie",
            "Specific Bean Origin": "Xoconusco",
            "REF": 141,
            "Review Date": 2007,
            "Cocoa Percent": "75%",
            "Company Location": "U.S.A.",
            "Rating": 2.5,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Mexico"
        },
        {
            "Company Maker": "Askinosie",
            "Specific Bean Origin": "San Jose del Tambo",
            "REF": 175,
            "Review Date": 2007,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3,
            "Bean Type": "Forastero (Arriba)",
            "Broad Bean Origin": "Ecuador"
        },
        {
            "Company Maker": "Bahen & Co.",
            "Specific Bean Origin": "Houseblend",
            "REF": 1474,
            "Review Date": 2015,
            "Cocoa Percent": "80%",
            "Company Location": "Australia",
            "Rating": 3.25,
            "Bean Type": "",
            "Broad Bean Origin": ""
        },
        {
            "Company Maker": "Bahen & Co.",
            "Specific Bean Origin": "Papua New Guinea",
            "REF": 1474,
            "Review Date": 2015,
            "Cocoa Percent": "70%",
            "Company Location": "Australia",
            "Rating": 3.5,
            "Bean Type": "",
            "Broad Bean Origin": "Papua New Guinea"
        },
        {
            "Company Maker": "Bahen & Co.",
            "Specific Bean Origin": "Sambirano",
            "REF": 995,
            "Review Date": 2012,
            "Cocoa Percent": "70%",
            "Company Location": "Australia",
            "Rating": 3,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Madagascar"
        },
        {
            "Company Maker": "Bahen & Co.",
            "Specific Bean Origin": "Bahia",
            "REF": 999,
            "Review Date": 2012,
            "Cocoa Percent": "70%",
            "Company Location": "Australia",
            "Rating": 2.5,
            "Bean Type": "",
            "Broad Bean Origin": "Brazil"
        },
        {
            "Company Maker": "Bahen & Co.",
            "Specific Bean Origin": "Houseblend",
            "REF": 999,
            "Review Date": 2012,
            "Cocoa Percent": "70%",
            "Company Location": "Australia",
            "Rating": 2.5,
            "Bean Type": "Blend",
            "Broad Bean Origin": ""
        },
        {
            "Company Maker": "Bakau",
            "Specific Bean Origin": "Bambamarca, 2015",
            "REF": 1454,
            "Review Date": 2015,
            "Cocoa Percent": "70%",
            "Company Location": "Peru",
            "Rating": 2.75,
            "Bean Type": "",
            "Broad Bean Origin": "Peru"
        },
        {
            "Company Maker": "Bakau",
            "Specific Bean Origin": "Huallabamba, 2015",
            "REF": 1454,
            "Review Date": 2015,
            "Cocoa Percent": "70%",
            "Company Location": "Peru",
            "Rating": 3.5,
            "Bean Type": "",
            "Broad Bean Origin": "Peru"
        },
        {
            "Company Maker": "Bar Au Chocolat",
            "Specific Bean Origin": "Bahia",
            "REF": 1554,
            "Review Date": 2015,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3.5,
            "Bean Type": "",
            "Broad Bean Origin": "Brazil"
        },
        {
            "Company Maker": "Bar Au Chocolat",
            "Specific Bean Origin": "Maranon Canyon",
            "REF": 1295,
            "Review Date": 2014,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 4,
            "Bean Type": "Forastero (Nacional)",
            "Broad Bean Origin": "Peru"
        },
        {
            "Company Maker": "Bar Au Chocolat",
            "Specific Bean Origin": "Duarte Province",
            "REF": 983,
            "Review Date": 2012,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3.25,
            "Bean Type": "",
            "Broad Bean Origin": "Dominican Republic"
        },
        {
            "Company Maker": "Bar Au Chocolat",
            "Specific Bean Origin": "Chiapas",
            "REF": 983,
            "Review Date": 2012,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3.5,
            "Bean Type": "",
            "Broad Bean Origin": "Mexico"
        },
        {
            "Company Maker": "Bar Au Chocolat",
            "Specific Bean Origin": "Sambirano",
            "REF": 983,
            "Review Date": 2012,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3.75,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Madagascar"
        },
        {
            "Company Maker": "Baravelli's",
            "Specific Bean Origin": "single estate",
            "REF": 955,
            "Review Date": 2012,
            "Cocoa Percent": "80%",
            "Company Location": "Wales",
            "Rating": 2.75,
            "Bean Type": "",
            "Broad Bean Origin": "Costa Rica"
        },
        {
            "Company Maker": "Batch",
            "Specific Bean Origin": "Dominican Republic, Batch 3",
            "REF": 1840,
            "Review Date": 2016,
            "Cocoa Percent": "65%",
            "Company Location": "U.S.A.",
            "Rating": 3.5,
            "Bean Type": "",
            "Broad Bean Origin": "Domincan Republic"
        },
        {
            "Company Maker": "Batch",
            "Specific Bean Origin": "Brazil",
            "REF": 1868,
            "Review Date": 2016,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3.75,
            "Bean Type": "",
            "Broad Bean Origin": "Brazil"
        },
        {
            "Company Maker": "Batch",
            "Specific Bean Origin": "Ecuador",
            "REF": 1880,
            "Review Date": 2016,
            "Cocoa Percent": "65%",
            "Company Location": "U.S.A.",
            "Rating": 3.25,
            "Bean Type": "",
            "Broad Bean Origin": "Ecuador"
        },
        {
            "Company Maker": "Beau Cacao",
            "Specific Bean Origin": "Asajaya E, NW Borneo, b. #132/4500",
            "REF": 1948,
            "Review Date": 2017,
            "Cocoa Percent": "73%",
            "Company Location": "U.K.",
            "Rating": 3,
            "Bean Type": "",
            "Broad Bean Origin": "Malaysia"
        },
        {
            "Company Maker": "Beau Cacao",
            "Specific Bean Origin": "Serian E., NW Borneo, b. #134/3800",
            "REF": 1948,
            "Review Date": 2017,
            "Cocoa Percent": "72%",
            "Company Location": "U.K.",
            "Rating": 3.25,
            "Bean Type": "",
            "Broad Bean Origin": "Malaysia"
        },
        {
            "Company Maker": "Beehive",
            "Specific Bean Origin": "Brazil, Batch 20316",
            "REF": 1784,
            "Review Date": 2016,
            "Cocoa Percent": "80%",
            "Company Location": "U.S.A.",
            "Rating": 2.75,
            "Bean Type": "",
            "Broad Bean Origin": "Brazil"
        },
        {
            "Company Maker": "Beehive",
            "Specific Bean Origin": "Dominican Republic, Batch 31616",
            "REF": 1784,
            "Review Date": 2016,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 2.75,
            "Bean Type": "",
            "Broad Bean Origin": "Domincan Republic"
        },
        {
            "Company Maker": "Beehive",
            "Specific Bean Origin": "Ecuador, Batch 31516",
            "REF": 1784,
            "Review Date": 2016,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 2.75,
            "Bean Type": "",
            "Broad Bean Origin": "Ecuador"
        },
        {
            "Company Maker": "Beehive",
            "Specific Bean Origin": "Ecuador",
            "REF": 1788,
            "Review Date": 2016,
            "Cocoa Percent": "90%",
            "Company Location": "U.S.A.",
            "Rating": 2.75,
            "Bean Type": "",
            "Broad Bean Origin": "Ecuador"
        },
        {
            "Company Maker": "Belcolade",
            "Specific Bean Origin": "Costa Rica",
            "REF": 586,
            "Review Date": 2010,
            "Cocoa Percent": "64%",
            "Company Location": "Belgium",
            "Rating": 2.75,
            "Bean Type": "",
            "Broad Bean Origin": "Costa Rica"
        },
        {
            "Company Maker": "Belcolade",
            "Specific Bean Origin": "Papua New Guinea",
            "REF": 586,
            "Review Date": 2010,
            "Cocoa Percent": "64%",
            "Company Location": "Belgium",
            "Rating": 2.75,
            "Bean Type": "",
            "Broad Bean Origin": "Papua New Guinea"
        },
        {
            "Company Maker": "Belcolade",
            "Specific Bean Origin": "Peru",
            "REF": 586,
            "Review Date": 2010,
            "Cocoa Percent": "64%",
            "Company Location": "Belgium",
            "Rating": 2.75,
            "Bean Type": "",
            "Broad Bean Origin": "Peru"
        },
        {
            "Company Maker": "Belcolade",
            "Specific Bean Origin": "Ecuador",
            "REF": 586,
            "Review Date": 2010,
            "Cocoa Percent": "71%",
            "Company Location": "Belgium",
            "Rating": 3.5,
            "Bean Type": "",
            "Broad Bean Origin": "Ecuador"
        },
        {
            "Company Maker": "Bellflower",
            "Specific Bean Origin": "Kakao Kamili, Kilombero Valley",
            "REF": 1800,
            "Review Date": 2016,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3.5,
            "Bean Type": "Criollo, Trinitario",
            "Broad Bean Origin": "Tanzania"
        },
        {
            "Company Maker": "Bellflower",
            "Specific Bean Origin": "Alto Beni, Palos Blanco",
            "REF": 1804,
            "Review Date": 2016,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3.25,
            "Bean Type": "",
            "Broad Bean Origin": "Bolivia"
        },
        {
            "Company Maker": "Bellflower",
            "Specific Bean Origin": "Oko Caribe, Duarte P.",
            "REF": 1864,
            "Review Date": 2016,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3.5,
            "Bean Type": "",
            "Broad Bean Origin": "Domincan Republic"
        },
        {
            "Company Maker": "Belyzium",
            "Specific Bean Origin": "Belize south, low fermentation",
            "REF": 1768,
            "Review Date": 2016,
            "Cocoa Percent": "83%",
            "Company Location": "Germany",
            "Rating": 2.75,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Belize"
        },
        {
            "Company Maker": "Belyzium",
            "Specific Bean Origin": "Belize south",
            "REF": 1768,
            "Review Date": 2016,
            "Cocoa Percent": "78%",
            "Company Location": "Germany",
            "Rating": 3,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Belize"
        },
        {
            "Company Maker": "Belyzium",
            "Specific Bean Origin": "Belize south",
            "REF": 1768,
            "Review Date": 2016,
            "Cocoa Percent": "83%",
            "Company Location": "Germany",
            "Rating": 3.5,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Belize"
        },
        {
            "Company Maker": "Benoit Nihant",
            "Specific Bean Origin": "Baracoa",
            "REF": 1141,
            "Review Date": 2013,
            "Cocoa Percent": "74%",
            "Company Location": "Belgium",
            "Rating": 3.5,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Cuba"
        },
        {
            "Company Maker": "Benoit Nihant",
            "Specific Bean Origin": "Chuao",
            "REF": 1141,
            "Review Date": 2013,
            "Cocoa Percent": "74%",
            "Company Location": "Belgium",
            "Rating": 3.5,
            "Bean Type": "Criollo",
            "Broad Bean Origin": "Venezuela"
        },
        {
            "Company Maker": "Benoit Nihant",
            "Specific Bean Origin": "Cuyagua Village",
            "REF": 1141,
            "Review Date": 2013,
            "Cocoa Percent": "74%",
            "Company Location": "Belgium",
            "Rating": 3.5,
            "Bean Type": "Criollo",
            "Broad Bean Origin": "Venezuela"
        },
        {
            "Company Maker": "Benoit Nihant",
            "Specific Bean Origin": "Rio Peripa H.",
            "REF": 1141,
            "Review Date": 2013,
            "Cocoa Percent": "73%",
            "Company Location": "Belgium",
            "Rating": 4,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Ecuador"
        },
        {
            "Company Maker": "Benoit Nihant",
            "Specific Bean Origin": "Bali, Sukrama Bros. Farm, Melaya, 62hr C",
            "REF": 757,
            "Review Date": 2011,
            "Cocoa Percent": "72%",
            "Company Location": "Belgium",
            "Rating": 4,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Indonesia"
        },
        {
            "Company Maker": "Benoit Nihant",
            "Specific Bean Origin": "Somia Plantation, Sambirano, 70hr C",
            "REF": 773,
            "Review Date": 2011,
            "Cocoa Percent": "72%",
            "Company Location": "Belgium",
            "Rating": 3.75,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Madagascar"
        },
        {
            "Company Maker": "Bernachon",
            "Specific Bean Origin": "Nature",
            "REF": 797,
            "Review Date": 2012,
            "Cocoa Percent": "55%",
            "Company Location": "France",
            "Rating": 2.75,
            "Bean Type": "",
            "Broad Bean Origin": ""
        },
        {
            "Company Maker": "Beschle (Felchlin)",
            "Specific Bean Origin": "Madagascar",
            "REF": 636,
            "Review Date": 2011,
            "Cocoa Percent": "64%",
            "Company Location": "Switzerland",
            "Rating": 3,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Madagascar"
        },
        {
            "Company Maker": "Beschle (Felchlin)",
            "Specific Bean Origin": "Maracaibo",
            "REF": 636,
            "Review Date": 2011,
            "Cocoa Percent": "88%",
            "Company Location": "Switzerland",
            "Rating": 3,
            "Bean Type": "Criollo",
            "Broad Bean Origin": "Venezuela"
        },
        {
            "Company Maker": "Beschle (Felchlin)",
            "Specific Bean Origin": "Indigena Amazonia, Grand Cru, Quizas",
            "REF": 636,
            "Review Date": 2011,
            "Cocoa Percent": "72%",
            "Company Location": "Switzerland",
            "Rating": 3.5,
            "Bean Type": "",
            "Broad Bean Origin": "Venezuela"
        },
        {
            "Company Maker": "Beschle (Felchlin)",
            "Specific Bean Origin": "Ecuador",
            "REF": 636,
            "Review Date": 2011,
            "Cocoa Percent": "72%",
            "Company Location": "Switzerland",
            "Rating": 4,
            "Bean Type": "",
            "Broad Bean Origin": "Ecuador"
        },
        {
            "Company Maker": "Beschle (Felchlin)",
            "Specific Bean Origin": "Carenero S., Barlovento, Grand Cru",
            "REF": 508,
            "Review Date": 2010,
            "Cocoa Percent": "70%",
            "Company Location": "Switzerland",
            "Rating": 3.25,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Venezuela"
        },
        {
            "Company Maker": "Beschle (Felchlin)",
            "Specific Bean Origin": "Porcelana, Premier Cru, Quizas No. 1",
            "REF": 508,
            "Review Date": 2010,
            "Cocoa Percent": "74%",
            "Company Location": "Switzerland",
            "Rating": 3.25,
            "Bean Type": "Criollo (Porcelana)",
            "Broad Bean Origin": "Venezuela"
        },
        {
            "Company Maker": "Beschle (Felchlin)",
            "Specific Bean Origin": "Java, Grand Cru",
            "REF": 508,
            "Review Date": 2010,
            "Cocoa Percent": "64%",
            "Company Location": "Switzerland",
            "Rating": 3.5,
            "Bean Type": "",
            "Broad Bean Origin": "Indonesia"
        },
        {
            "Company Maker": "Beschle (Felchlin)",
            "Specific Bean Origin": "Ocumare, Premier Cru, Quizas No. 2",
            "REF": 508,
            "Review Date": 2010,
            "Cocoa Percent": "72%",
            "Company Location": "Switzerland",
            "Rating": 3.5,
            "Bean Type": "",
            "Broad Bean Origin": "Venezuela"
        },
        {
            "Company Maker": "Bisou",
            "Specific Bean Origin": "Nicaragua, American style",
            "REF": 1482,
            "Review Date": 2015,
            "Cocoa Percent": "76%",
            "Company Location": "U.S.A.",
            "Rating": 2.5,
            "Bean Type": "",
            "Broad Bean Origin": "Nicaragua"
        },
        {
            "Company Maker": "Bisou",
            "Specific Bean Origin": "San Andres, American style",
            "REF": 1486,
            "Review Date": 2015,
            "Cocoa Percent": "76%",
            "Company Location": "U.S.A.",
            "Rating": 2.5,
            "Bean Type": "",
            "Broad Bean Origin": "Costa Rica"
        },
        {
            "Company Maker": "Bisou",
            "Specific Bean Origin": "San Andres, silk",
            "REF": 1486,
            "Review Date": 2015,
            "Cocoa Percent": "78%",
            "Company Location": "U.S.A.",
            "Rating": 2.5,
            "Bean Type": "",
            "Broad Bean Origin": "Costa Rica"
        },
        {
            "Company Maker": "Bisou",
            "Specific Bean Origin": "Belize",
            "REF": 1486,
            "Review Date": 2015,
            "Cocoa Percent": "86%",
            "Company Location": "U.S.A.",
            "Rating": 3.25,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Belize"
        },
        {
            "Company Maker": "Bittersweet Origins",
            "Specific Bean Origin": "Ghana",
            "REF": 963,
            "Review Date": 2012,
            "Cocoa Percent": "72%",
            "Company Location": "U.S.A.",
            "Rating": 3.5,
            "Bean Type": "Forastero",
            "Broad Bean Origin": "Ghana"
        },
        {
            "Company Maker": "Bittersweet Origins",
            "Specific Bean Origin": "Bali, Singaraja",
            "REF": 478,
            "Review Date": 2010,
            "Cocoa Percent": "75%",
            "Company Location": "U.S.A.",
            "Rating": 3.25,
            "Bean Type": "",
            "Broad Bean Origin": "Indonesia"
        },
        {
            "Company Maker": "Bittersweet Origins",
            "Specific Bean Origin": "2009 Hapa Nibby",
            "REF": 502,
            "Review Date": 2010,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3.75,
            "Bean Type": "Blend",
            "Broad Bean Origin": "Dominican Rep., Bali"
        },
        {
            "Company Maker": "Bittersweet Origins",
            "Specific Bean Origin": "Bali, Singaraja",
            "REF": 558,
            "Review Date": 2010,
            "Cocoa Percent": "65%",
            "Company Location": "U.S.A.",
            "Rating": 2.75,
            "Bean Type": "",
            "Broad Bean Origin": "Indonesia"
        },
        {
            "Company Maker": "Bittersweet Origins",
            "Specific Bean Origin": "Sambirano, 2009",
            "REF": 565,
            "Review Date": 2010,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Madagascar"
        },
        {
            "Company Maker": "Bittersweet Origins",
            "Specific Bean Origin": "Ocumare, prototype",
            "REF": 565,
            "Review Date": 2010,
            "Cocoa Percent": "78%",
            "Company Location": "U.S.A.",
            "Rating": 3,
            "Bean Type": "Criollo",
            "Broad Bean Origin": "Venezuela"
        },
        {
            "Company Maker": "Bittersweet Origins",
            "Specific Bean Origin": "Puerto Plata",
            "REF": 414,
            "Review Date": 2009,
            "Cocoa Percent": "75%",
            "Company Location": "U.S.A.",
            "Rating": 3,
            "Bean Type": "",
            "Broad Bean Origin": "Dominican Republic"
        },
        {
            "Company Maker": "Bittersweet Origins",
            "Specific Bean Origin": "Puerto Plata",
            "REF": 414,
            "Review Date": 2009,
            "Cocoa Percent": "65%",
            "Company Location": "U.S.A.",
            "Rating": 3.5,
            "Bean Type": "",
            "Broad Bean Origin": "Dominican Republic"
        },
        {
            "Company Maker": "Bittersweet Origins",
            "Specific Bean Origin": "Sambirano",
            "REF": 423,
            "Review Date": 2009,
            "Cocoa Percent": "75%",
            "Company Location": "U.S.A.",
            "Rating": 3.25,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Madagascar"
        },
        {
            "Company Maker": "Bittersweet Origins",
            "Specific Bean Origin": "Sambirano",
            "REF": 431,
            "Review Date": 2009,
            "Cocoa Percent": "65%",
            "Company Location": "U.S.A.",
            "Rating": 3.5,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Madagascar"
        },
        {
            "Company Maker": "Bittersweet Origins",
            "Specific Bean Origin": "Sambirano",
            "REF": 233,
            "Review Date": 2008,
            "Cocoa Percent": "71%",
            "Company Location": "U.S.A.",
            "Rating": 3,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Madagascar"
        },
        {
            "Company Maker": "Bittersweet Origins",
            "Specific Bean Origin": "Bocas del Toro",
            "REF": 233,
            "Review Date": 2008,
            "Cocoa Percent": "75%",
            "Company Location": "U.S.A.",
            "Rating": 3.5,
            "Bean Type": "",
            "Broad Bean Origin": "Panama"
        },
        {
            "Company Maker": "Bittersweet Origins",
            "Specific Bean Origin": "Puerto Plata",
            "REF": 233,
            "Review Date": 2008,
            "Cocoa Percent": "68%",
            "Company Location": "U.S.A.",
            "Rating": 3.75,
            "Bean Type": "",
            "Broad Bean Origin": "Dominican Republic"
        },
        {
            "Company Maker": "Bittersweet Origins",
            "Specific Bean Origin": "Ankasa",
            "REF": 256,
            "Review Date": 2008,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3,
            "Bean Type": "Forastero",
            "Broad Bean Origin": "Ghana"
        },
        {
            "Company Maker": "Black Mountain",
            "Specific Bean Origin": "La Red",
            "REF": 256,
            "Review Date": 2008,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 2.75,
            "Bean Type": "",
            "Broad Bean Origin": "Dominican Republic"
        },
        {
            "Company Maker": "Black Mountain",
            "Specific Bean Origin": "Carenero Superior",
            "REF": 256,
            "Review Date": 2008,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 2.75,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Venezuela"
        },
        {
            "Company Maker": "Black Mountain",
            "Specific Bean Origin": "Matiguas",
            "REF": 256,
            "Review Date": 2008,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3,
            "Bean Type": "",
            "Broad Bean Origin": "Nicaragua"
        },
        {
            "Company Maker": "Black River (A. Morin)",
            "Specific Bean Origin": "Blue Mountain Region",
            "REF": 1331,
            "Review Date": 2014,
            "Cocoa Percent": "70%",
            "Company Location": "U.K.",
            "Rating": 2.75,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Jamaica"
        },
        {
            "Company Maker": "Blanxart",
            "Specific Bean Origin": "Congo, Grand Cru",
            "REF": 1046,
            "Review Date": 2013,
            "Cocoa Percent": "82%",
            "Company Location": "Spain",
            "Rating": 3.5,
            "Bean Type": "Forastero",
            "Broad Bean Origin": "Congo"
        },
        {
            "Company Maker": "Blanxart",
            "Specific Bean Origin": "Organic Dark",
            "REF": 322,
            "Review Date": 2009,
            "Cocoa Percent": "72%",
            "Company Location": "Spain",
            "Rating": 2.75,
            "Bean Type": "",
            "Broad Bean Origin": ""
        },
        {
            "Company Maker": "Blue Bandana",
            "Specific Bean Origin": "Akesson's E., Sambirano V.",
            "REF": 1740,
            "Review Date": 2016,
            "Cocoa Percent": "82%",
            "Company Location": "U.S.A.",
            "Rating": 3.5,
            "Bean Type": "Trinitario",
            "Broad Bean Origin": "Madagascar"
        },
        {
            "Company Maker": "Blue Bandana",
            "Specific Bean Origin": "Lachua",
            "REF": 1752,
            "Review Date": 2016,
            "Cocoa Percent": "75%",
            "Company Location": "U.S.A.",
            "Rating": 2.75,
            "Bean Type": "",
            "Broad Bean Origin": "Guatemala"
        },
        {
            "Company Maker": "Blue Bandana",
            "Specific Bean Origin": "Kokoa Kamili",
            "REF": 1752,
            "Review Date": 2016,
            "Cocoa Percent": "75%",
            "Company Location": "U.S.A.",
            "Rating": 3.5,
            "Bean Type": "",
            "Broad Bean Origin": "Tanzania"
        },
        {
            "Company Maker": "Blue Bandana",
            "Specific Bean Origin": "Zorzal Reserva",
            "REF": 1756,
            "Review Date": 2016,
            "Cocoa Percent": "75%",
            "Company Location": "U.S.A.",
            "Rating": 3,
            "Bean Type": "",
            "Broad Bean Origin": "Dominican Republic"
        },
        {
            "Company Maker": "Blue Bandana",
            "Specific Bean Origin": "Guatemala",
            "REF": 911,
            "Review Date": 2012,
            "Cocoa Percent": "70%",
            "Company Location": "U.S.A.",
            "Rating": 3.5,
            "Bean Type": "",
            "Broad Bean Origin": "Guatemala"
        }
    ]
}

