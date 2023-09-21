


var mymap;
var lyrEsriImagery,lyrTopo,lyrESri,lyrOSM,lyrsearch;
var mrkCurrentLocation;
var ctlAttribute,ctlScale,ctlPan,ctlMouseposition,ctlMeasure,ctlEasybutton,ctlSidebar,ctlSearch,cltLayers,browserControl,map;
var objBasemaps,objOverlays,landscape_image;
var ctlDraw, drawnItems,styleEditor,lyrDouar,lyrClusters;
var googleStreets,googleHybrid,googleSatellite,googleTerrain;
var histChart;


// initialisation des variables pour les données geojson
var jsnDouar, jsnzcoeurs, jsnzAdhesion,jsnSites;

var home = {
	lat: 30.13285,
	lng: -9.61349,
	zoom: 11
}; 



//****************** layers style */
var zonecoeursStyle = {
    "color": "#ff7800",
    "weight": 5,
    "opacity": 0.65
}

//#############style for zoneadhesion#######################
var styleAdhesion = {
    "color":"#006600",
    "weight":4,
    "opacity":0.75
}

//*********map initialisation*****************

$(document).ready(function(){

    mymap = L.map('mapdiv', {center:[30.13285,-9.61349], zoom:11, attributionControl:false});
    // function onMapClick(e){
    //     console.log(e.target)
    // }

   // mymap.on("click",onMapClick)
    mymap.zoomControl.setPosition('topright');



    //**********Start:Base maps layers ***************
    googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
    });

    lyrOSM = L.tileLayer.provider('OpenStreetMap.Mapnik');
    mymap.addLayer(lyrOSM);
    lyrEsriImagery = L.tileLayer.provider('Esri.WorldImagery');
   
    lyrTopo = L.tileLayer.provider('OpenTopoMap');
    
    googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
        maxZoom: 20,
        subdomains:['mt0','mt1','mt2','mt3']
    });

    googleSatellite = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
        maxZoom: 20,
        subdomains:['mt0','mt1','mt2','mt3']
    });

    googleTerrain = L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}',{
        maxZoom: 20,
        subdomains:['mt0','mt1','mt2','mt3']
    });


    //**********End:Base maps layers ***************


   

    //**********Start:WMS Layers  ***************

var ZoneC = L.tileLayer.wms("http://localhost:8080/geoserver/PNSM_geoportal/wms", {
    layers: 'PNSM_geoportal:zonecoeurs',
    format: 'image/png',
    transparent: true,
    attribution: "@geoserver"
})

var ZoneA = L.tileLayer.wms("http://localhost:8080/geoserver/PNSM_geoportal/wms", {
    layers: 'PNSM_geoportal:zoneadhesions',
    format: 'image/png',
    transparent:true,
    attribution:"@geoserver"
})
var siteInvest = L.tileLayer.wms("http://localhost:8080/geoserver/PNSM_geoportal/wms", {
    layers: 'PNSM_geoportal:sites_invest_tour',
    format: 'image/png',
    transparent:true,
    attribution: "@geoserver"
})
var province  = L.tileLayer.wms("http://localhost:8080/geoserver/PNSM_geoportal/wms", {
    layers: 'PNSM_geoportal:provinces',
    format: 'image/png',
    transparent:true,
    attribution: "@geoserver"
})
var secteurFor = L.tileLayer.wms("http://localhost:8080/geoserver/PNSM_geoportal/wms", {
    layers: 'PNSM_geoportal:secteur_For',
    format: 'image/png',
    transparent:true,
    attribution: "@geoserver"
})


var LimtePNSM = L.tileLayer.wms("http://localhost:8080/geoserver/PNSM_geoportal/wms", {
    layers: 'PNSM_geoportal:pnsmlimites',
    format: 'image/png',
    transparent:true,
    attribution: "@geoserver"
})
//**********End:WMS Layers  ***************


//**************control panel**********************/
    ctlPan = L.control.pan().addTo(mymap);

 //***********Home button*********************** */
 L.easyButton('<i class="fa fa-home fa-lg" title="Zoom to home"></i>',function(btn,map){
    map.setView([home.lat, home.lng], home.zoom);
      //Responsive map...
      $(window).on("resize", function () { $("#map").height($(window).height()-50); map.invalidateSize(); }).trigger("resize");
  },'Zoom To Home').addTo(mymap);



    ctlMeasure = L.control.polylineMeasure().addTo(mymap);
    ctlSidebar = L.control.sidebar('side-bar').addTo(mymap);


    
    ctlEasybutton = L.easyButton('glyphicon-transfer', function(){
       ctlSidebar.toggle(); 
    }).addTo(mymap);


    

//==============########### START:FETCHING SPATIAL DATA FROM THE DATABASE TO THE MAP######## ==========/


// //===============clusters================================/
// $.ajax({
//     url:'clusters.php',
//     success:function(response){
//         jsnClusters=JSON.parse(response);
//         clusters= L.geoJSON(jsnClusters,{pointToLayer:returnClustermakr}).addTo(mymap);
//        cltLayers.addOverlay(clusters,"Clusters");
//     },
//     error:function(xhr,status,error){
//         alert("ERROR:"+ error);
//     }
// });


// ###############style for zonecoeur ###################
function zoneCoeurStyle(layer) {
    layer.setStyle({
        fillColor: 'rgb(43, 55, 0, 0.8)',
        fillOpacity: 0.8,
        color: '#421800',
        weight: 2,
        opacity: 1
    });
}

// ############Zone du coeur####################
$.ajax({
    url: 'zonecoeurs.php',
    success: function(response) {
        jsnzcoeurs = JSON.parse(response);
        lyrzoneCoeurs = L.geoJSON(jsnzcoeurs, { 
            style: zonecoeursStyle,  // styling each feature like css
            onEachFeature: function(feature, layer) { // loop on each zonecoeur feature to customize its behavior
                // feature is a json that contains properties in 'feature.properties'
                if (feature.properties) { // we check if the attribute properties exists just for security
                    layer
                    .bindPopup(buildFearuePopup(feature.properties, 'zonecoeur'))

            
                }          
        }
        }).addTo(mymap);

        cltLayers.addOverlay(lyrzoneCoeurs, "Zone du Coeurs");
    },
    error: function(xhr, status, error) {
        alert("ERROR:" + error);
    }
});


//#############pnsmlimites #######################
// $.ajax({
//     url:'pnsmlimites.php',
//     success:function(response){
//         jsnlimite=JSON.parse(response);
//         lyrlimite= L.geoJSON(jsnlimite).addTo(mymap);

     
//        cltLayers.addOverlay(lyrlimite,"PNSM Limite");
//     },
//     error:function(xhr,status,error){
//         alert("ERROR:"+ error);
//     }
// });


//===============sites invest ===========================/
$.ajax({
    url:'sites.php',
    success:function(response){
        jsnSites=JSON.parse(response);
        sitesInvest= L.geoJSON(jsnSites,{
            style: zoneCoeurStyle,
            onEachFeature: function(layer,feature){
                
                if(feature.properties){
                    layer
                    .bindPopup(buildFearuePopup(feature.properties, 'sitesInvest'))

                }
            }
        }).addTo(mymap);
       cltLayers.addOverlay(sitesInvest,"Sites Investissement Touristiques");
    },
    error:function(xhr,status,error){
        alert("ERROR:"+ error);
    }
});


//############Zone adhesion####################
$.ajax({
    url:'zoneAdhesion.php',
    success:function(response){
        jsnzAdhesion=JSON.parse(response);
        lyrzAdhesion= L.geoJSON(jsnzAdhesion ,{
            style:styleAdhesion,
            onEachFeature: function(feature,layer){
                if(feature.properties){
                    layer
                    .bindPopup(buildFearuePopup(feature.properties, 'zoneadhesion'))
                    
                }
            }
        }).addTo(mymap);

     
       cltLayers.addOverlay(lyrzAdhesion,"Zone d'Adhesion");
    },
    error:function(xhr,status,error){
        alert("ERROR:"+ error);
    }
});

    



//=============== Douar Parc ======================/
$.ajax({
    url:'douar2.php',
    success:function(response){
        jsnDouar=JSON.parse(response);
        lyrTest= L.geoJSON(jsnDouar,{pointToLayer:returnDouarmakr}).addTo(mymap);

       cltLayers.addOverlay(lyrTest,"Douars du Parc");
    },
    error:function(xhr,status,error){
        alert("ERROR:"+ error);
    }
});
// addFeatureToMap(
//     title="Douars du Parc",
//     backendUrl = 'douar2.php',
//     pointToLayerFunction =  returnDouarmakr
// )


//===============clusters================================/
$.ajax({
    url:'clusters.php',
    success:function(response){
        jsnClusters=JSON.parse(response);
        clusters= L.geoJSON(jsnClusters,{pointToLayer:returnClustermakr,

        }).addTo(mymap);
       cltLayers.addOverlay(clusters,"Clusters");
    },
    error:function(xhr,status,error){
        alert("ERROR:"+ error);
    }
});



//END:FETCHING DATA FROM THE DATABASE TO THE MAP 

    //**************Browser print  ************** */
    browserControl = L.control.browserPrint({position: 'topleft'}).addTo(mymap);


    //************edit drawing tools************

    drawnItems= new L.FeatureGroup();
    drawnItems.addTo(mymap);

    ctlDraw = new L.Control.Draw({
        draw:{
            circle:true,
          
        },
        edit:{
            featureGroup:drawnItems
        }
    }).addTo(mymap);
    
    mymap.on('draw:created',function(e){
       
        drawnItems.addLayer(e.layer);
        let polygonData = e.layer.toGeoJSON();

        /*

        $.ajax({
            url:'addZoneAdhesion.php',
            success:function(response){
                jsnClusters=JSON.parse(response);
                clusters= L.geoJSON(jsnClusters,{pointToLayer:returnClustermakr,
        
                }).addTo(mymap);
               cltLayers.addOverlay(clusters,"Clusters");
            },
            error:function(xhr,status,error){
                alert("ERROR:"+ error);
            }
        });

        */


    });

    //styling tool
    styleEditor = L.control.styleEditor({position:'topright'}).addTo(mymap);

    //**********Layer controls*************** */
//basemaps

objBasemaps = {
    "Google Street Map":googleStreets,
    "Google Hybrid Map":googleHybrid,
    "Google Satellite Map":googleSatellite,
    "Google Terrain Map":googleTerrain,
    "Open Street Maps":lyrOSM,
    "Esri World Imagery":lyrEsriImagery,
    "Open Topo Map":lyrTopo,
    
    
};
//overlays 
objOverlays={

    "Province":province,
    "Secteur Forestiere":secteurFor,
    "Zone Adhesion du Parc":ZoneA,
    "Zone Coeur du Parc":ZoneC,
    "Limite du PNSM":LimtePNSM,
    "Drawn Items":drawnItems,
  
    "Sites Investissement Touristiques":siteInvest,
};


  // Create the control layers with the custom icon
  cltLayers = L.control.layers(objBasemaps, objOverlays,{collapsed:true}).addTo(mymap);
  

//***********Geosearching button ******************** */

    ctlSearch = L.Control.openCageSearch({key: '27beae5a6d64406c8fa78ad7d2a10442',limit: 10}).addTo(mymap);//3c38d15e76c02545181b07d3f8cfccf0
    
    /***********Attribution controls ******************** */
    ctlAttribute = L.control.attribution({position:'bottomleft'}).addTo(mymap);
    ctlAttribute.addAttribution('OSM');
    //ctlAttribute.addAttribution('&copy; <a href="http://millermountain.com">Miller Mountain LLC</a>');
    
     //*******Scale bar******* */
    ctlScale = L.control.scale({position:'bottomleft', metric:false, maxWidth:200}).addTo(mymap);
    
    //*******Mouse Position******* */
    ctlMouseposition= L.control.mousePosition({position: 'bottomright',maxWidth:350,size: 'large'}).addTo(mymap);
    

    mymap.on('keypress', function(e) {
        if (e.originalEvent.key=="l") {
            mymap.locate();
        }
    });
    
    mymap.on('locationfound', function(e) {
        console.log(e);
        if (mrkCurrentLocation) {
            mrkCurrentLocation.remove();
        }
        mrkCurrentLocation = L.circle(e.latlng, {radius:e.accuracy/2}).addTo(mymap);
        mymap.setView(e.latlng, 14);
    });
    
    mymap.on('locationerror', function(e) {
        console.log(e);
        alert("Location was not found");
    })
    
   
    $("#btnLocate").click(function(){
        mymap.locate();
    });
    
    $("#btnZocalo").click(function(){
        mymap.setView([19.43262,-99.13325]);
        mymap.openPopup(popZocalo);
    })
    
});

function LatLngToArrayString(ll) {
    console.log(ll);
    return "["+ll.lat.toFixed(5)+", "+ll.lng.toFixed(5)+"]";
}

//********functions for transforming points fetched frm the database layers ************ */

 function returnDouarmakr(json,latlng){
    var att =json.properties;
    return L.circleMarker(latlng,{radius:10,color:'black',fillColor:'green',fillOpacity:0.7})
    //.bindTooltip("<h4>Id:"+att.id +"</h4> Nom: "+ att.nom)    
   
    .bindPopup(buildFearuePopup(att, 'douar'))

   
   
 }

 //#############func for styling clusters##########################
 function returnClustermakr(json,latlng){
    var att =json.properties;
    customCircleMarker = L.CircleMarker.extend({
        options: { 
           id: att.id,
           name: "cluster"
        }
     });
    return new customCircleMarker(latlng,{radius:10,color:'green',fillColor:'blue',fillOpacity:0.5,dashArray:'5,5',
    id:att.id,name:"cluster"})    
    .bindPopup(buildFearuePopup(att, 'cluster'))

 }
 //#############func for styling zonecoeur ##########################
 function returnZonePolygon (json,latlng){
    var att =json.properties;
    customCircleMarker = L.CircleMarker.extend({
        options: { 
           id: att.id,
           name: "cluster"
        }
     });
    return new customCircleMarker(latlng,{radius:10,color:'green',fillColor:'blue',fillOpacity:0.5,dashArray:'5,5',
    id:att.id,name:"cluster"}).bindTooltip("<h5>Id:"+att.id + "</h5> Nom: "+ att.nom);
 }



 function returnPointById(id){
    var arLayers = lyrDouar.getLayers();
    for(i=0;i<arLayers.length-1;i++){
        var featureID = arLayers[i].feature.properties.Project;
        console.log(featureID);
        if(featureID==id){
            return arLayers[i];
        }
    }
    return false;

 }
 $("#btnFindProject").click(function(){
    var id =$("#textFindProject").val();
    var lyr = returnPointById(id);
    if(lyr){
        if(lyrsearch){
            lyrsearch.remove();
        }
        lyrsearch = L.geoJSON(lyr.toGeoJSON(),{style:{color:'red',weight:10,
    opacity:0.7}}).addTo(mymap);
    mymap.fitBounds(lyr.getBounds().pad(1));
    var att=lyr.feature.properties;
    $("#divProjectData").html("<h4> class='text-center'>Attributes</h4> <h5> Type:"+att.type+"</h5>");

    }else{
        $("#divProjectError").html("****Project Id not found******");
    }

    // Details Panel 
    
 });

 //#########################function to handle db table for douar###############

 function loadItemDetails(attrs){
    // append body
   return true
    //$("#item-details-dialog .body").html(body)
   // $("#item-details-dialog").toggleClass("hidden");

 }
    
//####################function to handle the map #############################/


function showDouarDetailsOnSideBar(){
    
    showFeatureBarChart("Douar Bar chart", jsnDouar.features, {labelCol:"nom", valueCol:"pop"});

 }


 function showZoneCoeurDetailsOnSideBar(){
    showFeatureBarChart("Zone Coeur Bar chart", jsnzcoeurs.features, {labelCol:"name", valueCol:"objectid"});

 }


 function showZoneAdesionDetailsOnSideBar(){
    
    showFeatureBarChart("Zone adhesion Bar chart", jsnzAdhesion.features, {labelCol:"name", valueCol:"objectid_1"});

 }

 function showSiteDetailsOnSideBar(){
 
    showFeatureBarChart("Sites Invest Bar chart", jsnSites.features, {labelCol:"nom", valueCol:"supericie"});

 }

 function showClusterDetailsOnSideBar(){
 
    showFeatureBarChart("Clusters Bar chart", jsnClusters.features, {labelCol:"id", valueCol:"nom"});

 }



 //#################### Generic function to show charts #############################/


 function showFeatureBarChart(title, featureList, chartDefaultColumns) {

    

    let chartCanvas = document.getElementById("sidebar_chart")

    const columns = getColumnsFromObject(featureList[0].properties)
    

    showSelectedColumnsBarChart(chartCanvas, featureList, chartDefaultColumns)

    // clear the select element
    $("#sidebar_chart_select_label_column").html("")
    $("#sidebar_chart_select_value_column").html("")


    // add columns to the select element
    for (var i = 0; i < columns.length; i++) {
        $("#sidebar_chart_select_label_column").append("<option value='"+columns[i]+"'>"+columns[i]+"</option>")
    }

    // filter out the columns that are not numeric
    var numericColumns = columns.filter(function(item){
        return isNumeric(featureList[0].properties[item])
    })

    for (var i = 0; i < numericColumns.length; i++) {
        $("#sidebar_chart_select_value_column").append("<option value='"+numericColumns[i]+"'>"+numericColumns[i]+"</option>")
    }


    // set the default values
    $("#sidebar_chart_select_label_column").val(chartDefaultColumns.labelCol)
    $("#sidebar_chart_select_value_column").val(chartDefaultColumns.valueCol)

    // add event listener to the select element
    $(".sidebar_chart_select").change(function(){
        x = $("#sidebar_chart_select_label_column").val()
        y = $("#sidebar_chart_select_value_column").val()
    
        // update the chart histChart
        histChart.destroy()
        showSelectedColumnsBarChart(chartCanvas, featureList, {labelCol: x, valueCol: y})

    })
 }

 function showSelectedColumnsBarChart(chartCanvas, featureList, chartColumns, title = "Chart") {
    var data = {
        labels: [],
        values: []
    }
    for (var key of Object.keys(featureList)) {
        data.labels.push(featureList[key].properties[chartColumns.labelCol])
        data.values.push(featureList[key].properties[chartColumns.valueCol])
      
    }
    
    histChart = distributionChart(chartCanvas, data, title)
 }

 function showFeatureDetailsOnSideBar(){
    // get the feature name as attribute of html element
    var featureName = $("#charts-popup-link").attr("feature_name")

    ctlSidebar.show(); 
    if (histChart) histChart.destroy() 

    // case of douar
    if(featureName == "douar"){
        showDouarDetailsOnSideBar()
    }
    // case of zone coeur
    else if(featureName == "zonecoeur"){
        showZoneCoeurDetailsOnSideBar()
    }
    // case of zone adhesion
    else if(featureName == "zoneadhesion"){
        showZoneAdesionDetailsOnSideBar()
    }
    // case of sites invest
    else if(featureName == "sitesInvest"){
        showSiteDetailsOnSideBar()
    }

    else if(featureName == "cluster") {
        showClusterDetailsOnSideBar()
    }


 }


 function buildFearuePopup(attrs, featureKey){

      
    var tableHtml = `
    <div
    id="item-details-dialog"
    class="relative space-y-3 overflow-y-scroll w-auto" 
    >
    <table class="table w-full mb-6 ">
    <thead>
      <tr>
        <th scope="col">Field</th>
        <th scope="col">Value</th>
      </tr>
    </thead>
    <tbody class="body">
    `;
    
    for (var key of Object.keys(attrs)) {
        tableHtml += "<tr><th>"+key+"</th><td>"+attrs[key]+"</td></tr>";
    }

    tableHtml += `</tbody>
    </table>
    <div class="w-full bg-white pt-6 pb-2 flex absolute bottom-0 left-0 z-20">
    <button
      feature_name=${featureKey}
      id="charts-popup-link"
      class="graph-link px-4 py-1 block rounded-full text-white bg-[#9e1b49] shadow outline-none"
      href=""
    >
      Afficher le graphe ${featureKey}
    </button>
  </div>
    </div>
    ` 

    var tableEl = document.createElement('div')
    tableEl.innerHTML = tableHtml
    tableEl.addEventListener('click', showFeatureDetailsOnSideBar)

    return tableEl



}

  //#################### end Generic function to show charts #############################/


 function addFeatureToMap(
    title,
    backendUrl,
    style = {},
    onEachFeatureFunction ,
    pointToLayerFunction 
 ){
    $.ajax({
        url: backendUrl,
        success:function(response){
            jsonData=JSON.parse(response);
            layers= L.geoJSON(jsonData,{pointToLayer: pointToLayerFunction, onEachFeature: onEachFeatureFunction }).addTo(mymap);
            cltLayers.addOverlay(layers, title);
        },
        error:function(xhr,status,error){
            alert("ERROR:"+ error);
        }
    });
    
 }


 // open graph event handling


 // function to get the list of keys from a json object
function getColumnsFromObject(obj) {
    var columns = []
    for (var key of Object.keys(obj)) {
        columns.push(key)
    }
    return columns
}

function isNumeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}
