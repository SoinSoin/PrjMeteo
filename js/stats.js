//Create the buttons to request the data from the database

//Button to select a minimum date.By default the date is set on the 2/11/2017 (beginning of the training),
//The user can't select an anterior date

//Button to select a maximum date. By default the date is set on the date of today,
//The user can't select a posterior date.

//Drop down menu to select the current year or the current month or the current week

//Drop down menu to select either the group statistics or to select any of the user from the database

//A "Submit" button to run the request and display the chart into the corresponding div


    //Call the google.charts.load function, 'current' loads the latest official release of Google Charts,
    //The corechart package allows to draw bar, column, line, area...
  google.charts.load('current', {'packages':['corechart']});
    //JavaScript function named drawChart that creates the chart on the webpage, 
    //the google.charts.setOnLoadCallback chain allows to display the chart when the page is loaded
  google.charts.setOnLoadCallback(drawChart);

  
  var tableau = (document.getElementById(donnees).value);
//   for(i=O;i<tableau.length;i++){
//   strsplit(tableau)


   
  console.log(tableau);


  //This is the function to draw the chart
  function drawChart() {
    //
    var data = google.visualization.arrayToDataTable([
    //   ['jour', 'The rest of the world', 'Chuck Morris'],
    //   ['2/11',  1,      1],
    //   ['3/11',  4,      1],
    //   ['4/11',  3,       1],
    //   ['5/11',  4,      1],
    //   ['8/11',  4,      1],
    //   ['9/11',  1,      1],
    //   ['10/11',  4,      1],
    //   ['11/11',  3,       1],
    //   ['12/11',  4,      1],
    //   ['13/11',  4,      1],
    //   ['14/11',  1,      1],
    //   ['17/11',  4,      1],
    //   ['18/11',  3,       1],
    //   ['19/11',  4,      1],
    //   ['20/11',  4,      1],
    //   ['21/11',  1,      1],
    //   ['24/11',  4,      1],
    //   ['25/11',  3,       1],
    //   ['26/11',  4,      1],
    //   ['27/11',  4,      1],
    //   ['28/11',  4,      1]
   

    ]);

    var options = {
        title: "Courbe d'humeur",
        curveType: 'function',
        legend: { position: 'bottom' },
        backgroundColor: "grey",//Set up the curve background color
        colors:['green','black'],
        vAxis: {
        title: 'Humeur',//Title of the Y axis
        direction: '-1',//Revert the Y axis orientation (6 is diplayed at the bottom)
        //Set up the ticks from 1 to 6 with their caption
        ticks: [{v:6, f:'orage'}, {v:5, f:'vent'}, {v:4, f:'pluie'}, {v:3, f:'brouillard'}, {v:2, f:'soleil'}, {v:1, f:'arc en ciel'}]
        },
        hAxis:{
            title: 'Temps',
            //viewWindowMode: 'maximized' or 'pretty
            textPosition: 'out',// The labels are displayed outside of the axis (default value is out)
            slantedText: 30 // Slant the text at a 30° angle (default value is 30)
        }
    };

    var chart = new google.visualization.LineChart(document.getElementById('affichage_stat'));

    chart.draw(data, options);
  }


