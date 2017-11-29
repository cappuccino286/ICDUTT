myApp.service('statInfo',function($http){
    var statInfo={};

    statInfo.async = function(){
        var pub=$http.get("/app/shared/contentPub.php")
        .then(function (response) {
            var data= response.data.records;
            var info={}
            info.infoAnnee={2010:0,2011:0,2012:0,2013:0,2014:0,2015:0,2016:0};
            info.infoLabo={RI:{CREIDD:0,ERA:0,GAMMA3:0,LASMIS:0,LM2S:0,LNIO:0,LOSI:0,TechCICO:0},
            CI:{CREIDD:0,ERA:0,GAMMA3:0,LASMIS:0,LM2S:0,LNIO:0,LOSI:0,TechCICO:0},
            RF:{CREIDD:0,ERA:0,GAMMA3:0,LASMIS:0,LM2S:0,LNIO:0,LOSI:0,TechCICO:0},
            CF:{CREIDD:0,ERA:0,GAMMA3:0,LASMIS:0,LM2S:0,LNIO:0,LOSI:0,TechCICO:0},
            OS:{CREIDD:0,ERA:0,GAMMA3:0,LASMIS:0,LM2S:0,LNIO:0,LOSI:0,TechCICO:0},
            TD:{CREIDD:0,ERA:0,GAMMA3:0,LASMIS:0,LM2S:0,LNIO:0,LOSI:0,TechCICO:0},
            BV:{CREIDD:0,ERA:0,GAMMA3:0,LASMIS:0,LM2S:0,LNIO:0,LOSI:0,TechCICO:0},
            AP:{CREIDD:0,ERA:0,GAMMA3:0,LASMIS:0,LM2S:0,LNIO:0,LOSI:0,TechCICO:0}
        };
        for (i in data) {
            if (Array.isArray(data[i].Labo)) {
                for (x in data[i].Labo) {
                    if(data[i].Labo[x]=="Tech-CICO"){
                        data[i].Labo[x]="TechCICO";
                    }
                    info.infoLabo[data[i].Categorie][data[i].Labo[x]]++;        
                }
            } else {
                if(data[i].Labo=="Tech-CICO"){
                    data[i].Labo="TechCICO";
                }
                info.infoLabo[data[i].Categorie][data[i].Labo]++;  
            }
            info.infoAnnee[data[i].Annee]++;
        }
        return info; 
    });
        return pub;
    }
    
    return statInfo;
});
myApp.controller('pubCtrl', function ($scope, $http, $routeParams,statInfo) {
	$scope.laboratoire=['CREIDD','ERA','GAMMA3','LASMIS','LM2S','LNIO','LOSI','Tech-CICO'];
    $scope.user = $("#user").html();
    $scope.id = $routeParams.id;
    $http.get("/app/shared/getUser.php")
    .then(function (response) {
        $scope.userCompte = response.data.records;
        for (i in $scope.userCompte) {
            if ($scope.userCompte[i].Username == $scope.user) {
                $scope.nom = $scope.userCompte[i].Prenom + " " + $scope.userCompte[i].Nom;
                console.log($scope.nom);
                break;
            }
        }
    });
    $http.get("/app/shared/contentPub.php")
    .then(function (response) {
        $scope.pub = response.data.records;
        for (i in $scope.pub) {
            if ($scope.pub[i].NoPub == $scope.id) {
                $scope.info = $scope.pub[i];
                break;
            }
        }
    });
    $scope.changeAuteur = function (x) {
        $scope.query = x;
    } 
    $scope.isShow=1;
    $scope.show = function (x){
        $scope.isShow=x;
        $('html, body').animate({scrollTop: $("#showJumbo").offset().top}, 800);
    }
    $scope.isShowed = function (x) {
        return $scope.isShow == x;
    }     
});
myApp.controller('statistiqueCtrl', function ($scope, $http, $routeParams,statInfo) {
    $scope.laboratoire=['CREIDD','ERA','GAMMA3','LASMIS','LM2S','LNIO','LOSI','Tech-CICO'];
    statInfo.async().then(function(d) {
        var arrayLabo = $.map(d.infoLabo, function(value, index) {
            value=$.map(value, function(value1, index1){
                return [value1];
            });
            return [value];
        });
        var statLabo=[];
        for (x in arrayLabo){
            sum=0;
            for (y in arrayLabo[x]){
                sum+=arrayLabo[y][x];
            }   
            statLabo.push(sum);
        }
        var statAnnee=$.map(d.infoAnnee, function(value, index) {
            return [value];
        });
        console.log(statAnnee);
        var ctx1 = $("#myChart1");
        var myBarChart = new Chart(ctx1,{
            type: 'horizontalBar',
            data: {
                labels: $scope.laboratoire,
                datasets: [{
                    label: 'RI',
                    data: arrayLabo[0],
                    backgroundColor: ["#D32F2F","#D32F2F","#D32F2F","#D32F2F","#D32F2F","#D32F2F","#D32F2F","#D32F2F"],
                // backgroundColor: ["#FF6384","#36A2EB","#FFCE56","#E53935","#E91E63","#AB47BC","#64B5F6","#69F0AE"],
                borderColor: ["#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD"],
                borderWidth: 1
            },{
                label: 'CI',
                data: arrayLabo[1],
                backgroundColor: ["#E91E63","#E91E63","#E91E63","#E91E63","#E91E63","#E91E63","#E91E63","#E91E63"],
                borderColor: ["#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD"],
                borderWidth: 1
            },{
                label: 'RF',
                data: arrayLabo[2],
                backgroundColor: ["#AB47BC","#AB47BC","#AB47BC","#AB47BC","#AB47BC","#AB47BC","#AB47BC","#AB47BC"],
                borderColor: ["#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD"],
                borderWidth: 1
            },{
                label: 'CF',
                data: arrayLabo[3],
                backgroundColor: ["#2196F3","#2196F3","#2196F3","#2196F3","#2196F3","#2196F3","#2196F3","#2196F3"],
                borderColor: ["#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD"],
                borderWidth: 1
            },{
                label: 'OS',
                data: arrayLabo[4],
                backgroundColor: ["#4DD0E1","#4DD0E1","#4DD0E1","#4DD0E1","#4DD0E1","#4DD0E1","#4DD0E1","#4DD0E1"],
                borderColor: ["#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD"],
                borderWidth: 1
            },{
                label: 'TD',
                data: arrayLabo[5],
                backgroundColor: ["#69F0AE","#69F0AE","#69F0AE","#69F0AE","#69F0AE","#69F0AE","#69F0AE","#69F0AE"],
                borderColor: ["#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD"],
                borderWidth: 1
            },{
                label: 'BV',
                data: arrayLabo[6],
                backgroundColor: ["#FDD835","#FDD835","#FDD835","#FDD835","#FDD835","#FDD835","#FDD835","#FDD835"],
                borderColor: ["#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD"],
                borderWidth: 1
            },{
                label: 'AP',
                data: arrayLabo[7],
                backgroundColor: ["#FF7043","#FF7043","#FF7043","#FF7043","#FF7043","#FF7043","#FF7043","#FF7043"],
                borderColor: ["#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD","#BDBDBD"],
                borderWidth: 1
            }]
        }
        ,
        options: {
            responsive: false,
            title: {
                display: true,
                text: 'VUE ENSEMBLE',
                fontSize:20
            },
            scales: {
                yAxes: [{
                    stacked: true,
                    ticks: {
                        beginAtZero:true
                    }
                }],
                xAxes: [{
                    stacked: true,
                    ticks: {
                        beginAtZero:true
                    }
                }]

            }
        }
    });
        var ctx2 = $("#myChart2");
        var myPieChart = new Chart(ctx2,{
            type: 'pie',
            data: {
                labels: $scope.laboratoire,
                datasets: [
                {
                    data: statLabo,
                    backgroundColor: ["#FF6384","#36A2EB","#FFCE56","#E53935","#E91E63","#AB47BC","#64B5F6","#69F0AE"],
                    hoverBackgroundColor: ["#FF6395","#36A2AF","#FFCE80","#D32F2F","#D81B60","#7B1FA2","#2196F3","#00E676"]
                }]
            },
            options: {
                responsive: false,
                title: {
                    display: true,
                    text: 'PUBLICATION PAR LABO',
                    fontSize:20
                }
            }
        });
        var ctx3 = $("#myChart3");
        var myLineChart = new Chart(ctx3,{
            type: 'line',
            data: {
                labels: [2010,2011,2012,2013,2014,2015,2016],
                datasets: [
                {
                    data: statAnnee,
                    label: "PUBLICATION",
                    fill: false,
                    backgroundColor: "rgba(75,192,192,0.4)",
                    borderColor: "rgba(75,192,192,1)"
                }]
            },
            options: {

                responsive: false,
                title: {
                    display: true,
                    text: 'PUBLICATION PAR ANNEE',
                    fontSize:20
                }
            }
        });
    });

});
myApp.filter('since', function () {
    return function (items,nam) {
        var filtered = [];
        if(nam==undefined){
            for(x in items){
                filtered.push(items[x]);
            }
        } else{
            for (x in items) {
                if (items[x].Annee>=nam) {
                    filtered.push(items[x]);
                }
            }
        }
        return filtered;
    };
});
