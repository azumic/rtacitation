<?php 
require_once('header.php');

$objcontroller = new controller();

$license = count($objcontroller->viewer('license_type'));
$location = count($objcontroller->viewer('location_info'));
$vehicle = count($objcontroller->viewer('vehicle_info'));
$offense = count($objcontroller->viewer('offense_info'));
$violation = count($objcontroller->viewer('violation_info'));
$citation = count($objcontroller->viewer('cs_status'));
$penalty = count($objcontroller->viewer('penalty_info'));
$report = count($objcontroller->viewer('citation_reg'));
$personnel = count($objcontroller->viewer('administrator'));
?>
<div id="dashboard">

    <div class="row mt-5">


        <div class="col-sm-4">
            <div class="card shadow-sm p-3 mb-2 bg-white rounded">
                <div class="card-body">
                    <small class="card-title text-muted">Greeting Section</small>
                    <h5 class="mt-2 card-text fw-light">{{Greetings}} <?php echo $user['a_fname'] .' '.$user['a_lname'];?> </h5>
                    <small class="mt-1 card-text fw-light">{{timestamp}}</small>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow-sm p-3 mb-2 bg-white rounded">
                <div class="card-body">
                    <small class="card-title text-muted">Dashboard</small>
                    
                    <figure>
                        <blockquote class="blockquote">
                            <p>{{message}}</p>
                        </blockquote>
                        <figcaption class="blockquote-footer">
                            Someone famous in <cite title="Source Title">{{author}}</cite>
                        </figcaption>
                    </figure>

                </div>
            </div>
        </div>

    </div>


    <div class="mt-3">
        <div class="row row-cols-1 row-cols-md-3 g-4">

            <div class="col">
                <div class="card shadow-sm p-3 mb-1 bg-danger text-white rounded">
                    <div class="card-body">
                        <h5 class="card-title">License</h5>
                        <h5 class="card-text text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-card-heading" viewBox="0 0 16 16">
                                <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                <path d="M3 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0-5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-1z"/>
                            </svg> &nbsp; <?php echo $license;?> Entries
                        </h5>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-sm p-3 mb-1 bg-success text-white rounded">
                    <div class="card-body">
                        <h5 class="card-title">Location</h5>
                        <h5 class="card-text text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg> &nbsp; <?php echo $location;?> Entries
                        </h5>
                    </div>
                </div>
            </div>
            
            <div class="col">
                <div class="card shadow-sm p-3 mb-1 bg-dark text-white rounded">
                    <div class="card-body">
                        <h5 class="card-title">Vehicle</h5>
                        <h5 class="card-text text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                            </svg> &nbsp; <?php echo $vehicle;?> Entries
                        </h5>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-sm p-3 mb-1 bg-info text-white rounded">
                    <div class="card-body">
                        <h5 class="card-title">Offense</h5>
                        <h5 class="card-text text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bar-chart" viewBox="0 0 16 16">
                                <path d="M4 11H2v3h2v-3zm5-4H7v7h2V7zm5-5v12h-2V2h2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3z"/>
                            </svg> &nbsp; <?php echo $offense;?> Entries
                        </h5>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-sm p-3 mb-1 bg-warning text-white rounded">
                    <div class="card-body">
                        <h5 class="card-title">Violation</h5>
                        <h5 class="card-text text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                                <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                                <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
                            </svg> &nbsp; <?php echo $violation;?> Entries
                        </h5>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-sm p-3 mb-1 bg-danger text-white rounded">
                    <div class="card-body">
                        <h5 class="card-title">Citation</h5>
                        <h5 class="card-text text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                                <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                            </svg> &nbsp; <?php echo $citation;?> Entries
                        </h5>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-sm p-3 mb-1 bg-secondary text-white rounded">
                    <div class="card-body">
                        <h5 class="card-title">Penalty</h5>
                        <h5 class="card-text text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                                <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
                            </svg> &nbsp; <?php echo $penalty;?> Entries
                        </h5>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-sm p-3 mb-1 bg-primary text-white rounded">
                    <div class="card-body">
                        <h5 class="card-title">Report</h5>
                        <h5 class="card-text text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                                <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
                            </svg> &nbsp; <?php echo $report;?> Entries
                        </h5>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-sm p-3 mb-1 bg-success text-white rounded">
                    <div class="card-body">
                        <h5 class="card-title">Personnel</h5>
                        <h5 class="card-text text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                            </svg> &nbsp; <?php echo $personnel;?> Entries
                        </h5>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<script>

var dashboard = new Vue({

    el: '#dashboard',
    data ()
    {
        return{
            message: 'hello',
            author: 'Ced',
            timestamp: ""
        }
    },

    methods:{

        async qoute_of_the_day(){
        
            const fetch_qoute = await axios.get('http://quotes.rest/qod.json');
            
            switch(fetch_qoute.status){

                case 200:
                    const qoute = await fetch_qoute.data;
                    this.message = qoute.contents.quotes[0].quote;
                    this.author = qoute.contents.quotes[0].author;
                break;

                default:
                    alert("Failed to fetch data");
                break;
            }
        },

        greeting : function(){

            var format="";
            var ndate = new Date();
            var hr = ndate.getHours();
            var h = hr % 12;
            
            if (hr < 12)
            {
                greet = 'Good Morning';
                format='AM';
                }
            else if (hr >= 12 && hr <= 17)
            {
                greet = 'Good Afternoon';
                format='PM';
                }
            else if (hr >= 17 && hr <= 24)
                greet = 'Good Evening';
            
            return greet;

        },

        getNow: function() {
                    const today = new Date();
                    const date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                    const time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                    const dateTime = date +' '+ time;
                    this.timestamp = dateTime;
        }

    },

    created() {
        setInterval(this.getNow, 1000);
    },

    computed:{
        Greetings : function(){
            return this.greeting();
        }
    },

    mounted(){
        this.qoute_of_the_day();
    }
});

</script>
<?php require_once('footer.php');?>
