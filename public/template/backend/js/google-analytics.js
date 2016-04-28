gapi.analytics.ready(function() {

    var CLIENT_ID = '818125206534-g1r0datdtu9serq2pf9cp5vkuih3h8pv.apps.googleusercontent.com';

    gapi.analytics.auth.authorize({
        container: 'auth-button',
        clientid: CLIENT_ID,
        userInfoLabel:""
    });

    gapi.analytics.auth.on('success', function(response) {
        //hide the auth-button
        document.querySelector("#auth-button").style.display='none';
        console.log("get profiles");
        getProfiles(function(profs) {
            window.profiles = profs;
            processProfiles();
        });

    });

    Chart.defaults.global.animationSteps = 60;
    Chart.defaults.global.animationEasing = 'easeInOutQuart';
    Chart.defaults.global.responsive = true;
    Chart.defaults.global.maintainAspectRatio = false;

});

function getProfiles(cb) {
    //do we have a cached version?
    if(sessionStorage["gaProfiles"]) {
        console.log("profiles fetched from cache");
        cb(JSON.parse(sessionStorage["gaProfiles"]));
        return;
    }

    gapi.client.analytics.management.accounts.list().then(function(res) {
        var accountId = res.result.items[0].id;
        var profiles = [];
        gapi.client.analytics.management.webproperties.list({'accountId': accountId}).then(function(res) {

            res.result.items.forEach(function(item) {
                if(item.defaultProfileId) profiles.push({id:"ga:"+item.defaultProfileId,name:item.name});
            });
            sessionStorage["gaProfiles"] = JSON.stringify(profiles);
            cb(profiles);
        });
    });
}
function query(params) {
    return new Promise(function(resolve, reject) {
        var data = new gapi.analytics.report.Data({query: params});
        data.once('success', function(response) { resolve(response); })
            .once('error', function(response) { reject(response); })
            .execute();
    });
}

function makeCanvas(id) {
    var container = document.getElementById(id);
    var canvas = document.createElement('canvas');
    var ctx = canvas.getContext('2d');

    container.innerHTML = '';
    canvas.width = container.offsetWidth;
    canvas.height = container.offsetHeight;
    container.appendChild(canvas);

    return ctx;
}

function processProfiles() {
    console.log("working on profile "+profiles[curProfile].name);

    var now = moment();
    var id = profiles[curProfile].id;

    var thisWeek = query({
        'ids': id,
        'dimensions': 'ga:date,ga:nthDay',
        'metrics': 'ga:pageviews',
        'start-date': moment(now).subtract(8, 'day').format('YYYY-MM-DD'),
        'end-date': moment(now).subtract(1,'day').format('YYYY-MM-DD')
    });

    var lastWeek = query({
        'ids': id,
        'dimensions': 'ga:date,ga:nthDay',
        'metrics': 'ga:pageviews',
        'start-date': moment(now).subtract(15, 'day').subtract(1, 'week')
            .format('YYYY-MM-DD'),
        'end-date': moment(now).subtract(8, 'day').subtract(1, 'week')
            .format('YYYY-MM-DD')
    });


    Promise.all([thisWeek, lastWeek]).then(function(results) {
        console.log("Promise.all");console.dir(results);

        var data1 = results[0].rows.map(function(row) { return +row[2]; });
        var data2 = results[1].rows.map(function(row) { return +row[2]; });
        var labels = results[1].rows.map(function(row) { return +row[0]; });

        var totalThisWeek = results[0].totalsForAllResults["ga:pageviews"];
        var totalLastWeek = results[1].totalsForAllResults["ga:pageviews"];
        var percChange = (((totalThisWeek - totalLastWeek) / totalLastWeek) * 100).toFixed(2);
        console.log(totalLastWeek, totalThisWeek, percChange);

        labels = labels.map(function(label) {
            return moment(label, 'YYYYMMDD').format('ddd');
        });

        var data = {
            labels : labels,
            datasets : [
                {
                    label: 'Last Week',
                    fillColor : 'rgba(220,220,220,0.5)',
                    strokeColor : 'rgba(220,220,220,1)',
                    pointColor : 'rgba(220,220,220,1)',
                    pointStrokeColor : '#fff',
                    data : data2
                },
                {
                    label: 'This Week',
                    fillColor : 'rgba(151,187,205,0.5)',
                    strokeColor : 'rgba(151,187,205,1)',
                    pointColor : 'rgba(151,187,205,1)',
                    pointStrokeColor : '#fff',
                    data : data1
                }
            ]
        };

        var titleStr = profiles[curProfile].name + " ";
        if(totalLastWeek > 0 && totalThisWeek > 0) {
            if(percChange < 0) {
                titleStr += "<span class='down'>(Down "+Math.abs(percChange) + "%)</span>";
            } else {
                titleStr += "<span class='up'>(Up "+percChange + "%)</span>";
            }
        }

        $("body").append("<div class='reportContainer'><div class='chartTitleContainer'>"+titleStr+"</div><div class='chartContainer' id='chart-"+curProfile+"-container'></div></div>");

        new Chart(makeCanvas('chart-'+curProfile+'-container')).Line(data);

        if(curProfile+1 < profiles.length) {
            curProfile++;
            //settimeout to try to avoid GA rate limits
            setTimeout(processProfiles,200);
        }
    });
}