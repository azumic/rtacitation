<?php
require_once('header.php');

$objcontroller = new controller();

$lastindex = $objcontroller->viewer('citation_reg');
$display = array_pop($lastindex);
?>

<style>
.pads{
    padding-right:0;
    padding-left:0;
}
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<div class="mt-5 mb-5" id="report">

    

       
            <div class="text-center mb-2">
                <h4>REPUBLIC OF THE PHILIPPINES</h4>
                <h5>CITY OF CAGAYAN DE ORO</h5>
                <h6>ROADS AND TRAFFIC ADMINISTRATION</h6>
                <small class="fw-bold">TRAFFIC CITATION TICKET Citation # {{ no}}</small>
            </div>


        <div class="row">



            <div class="col-sm pads">
                <div class="input-group">
                    <span class="input-group-text col-4">Date:</span>
                    <input v-model="date" type="date" aria-label="Date" class="form-control">
                </div>
            </div>
            
            <div class="col-sm-3 pads">
                <div class="input-group">
                    <label class="input-group-text col-4" for="license">Status</label>
                    <select v-model="stat" class="form-select" id="license">
                        <option selected>Choose...</option>
                        <option v-bind:value="stats.cs_id" v-for="stats in status">{{stats.cs_status}}</option>
                    </select>
                </div>
            </div>


        </div>

        <div class="text-center p-2 fw-bold">
            Violators Information
        </div>


        <div class="row">


            <div class="col-sm pads">
                <div class="input-group">
                    <span class="input-group-text col-4">Name</span>
                    <input v-model="name" type="text" aria-label="No" class="form-control">
                </div>
            </div>
            

        </div>

        <div class="row">

            <div class="col-sm pads">
                <div class="input-group">
                    <span class="input-group-text col-4">Address</span>
                    <input v-model="address" type="text" aria-label="No" class="form-control">
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-sm pads">
                <div class="input-group">
                    <span class="input-group-text col-4">License #</span>
                    <input type="text" v-model="license" aria-label="License" class="form-control">
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-sm pads">
                <div class="input-group">
                    <span class="input-group-text col-4">Expiry#</span>
                    <input type="date" v-model="expiry" aria-label="Expiry" class="form-control">
                </div>
            </div>

            <div class="col-sm pads">
                <div class="input-group">
                    <label class="input-group-text col-4" for="license">License Type</label>
                    <select v-model="licensetype" class="form-select" id="license">
                        <option selected>Choose...</option>
                        <option v-bind:value="licenses.license_code" v-for="licenses in licenselist">{{licenses.license_typename}}</option>
                    </select>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-sm pads">
                <div class="input-group">
                    <span class="input-group-text col-4">Birthday</span>
                    <input v-model="birthday" type="date" aria-label="Expiry" class="form-control">
                </div>
            </div>

            <div class="col-sm pads">
                <div class="input-group">
                    <div class="input-group">
                        <span class="input-group-text col-4">Nationality</span>
                        <input v-model="nationality" type="text" aria-label="Nationality" class="form-control">
                    </div>
                </div>
            </div>

        </div>

        <div class="row">

        <div class="col-sm pads">
            <div class="input-group">
                <div class="input-group">
                    <span class="input-group-text col-4">Height</span>
                    <input v-model="height" type="number" aria-label="Height" class="form-control">
                </div>
            </div>
        </div>

        <div class="col-sm pads">
            <div class="input-group">
                <div class="input-group">
                    <span class="input-group-text col-4">Weight</span>
                    <input v-model="weight" type="number" aria-label="Height" class="form-control">
                </div>
            </div>
        </div>

        </div>

        <div class="text-center p-2 fw-bold">
            Vehicle Information
        </div>

        <div class="row">


            <div class="col-sm pads">
                <div class="input-group">
                    <span class="input-group-text col-4">Plate No.</span>
                    <input type="text" v-model="plateno" aria-label="Plate No." class="form-control">
                </div>
            </div>
            

        </div>

        <div class="row">

            <div class="col-sm pads">
                <div class="input-group">
                    <span class="input-group-text col-4">Owner</span>
                    <input type="text" v-model="owner" aria-label="Owner" class="form-control">
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-sm pads">
                <div class="input-group">
                    <span class="input-group-text col-4">Address</span>
                    <input type="text" v-model="owneraddress" aria-label="Address" class="form-control">
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-sm pads">
                <div class="input-group">
                    <span class="input-group-text col-4">Make</span>
                    <input type="text" v-model="make" aria-label="make" class="form-control">
                </div>
            </div>

            <div class="col-sm pads">
                <div class="input-group">
                    <span class="input-group-text col-4">Model</span>
                    <input type="text" v-model="model" aria-label="Model" class="form-control">
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-sm pads">
                <div class="input-group">
                    <span class="input-group-text col-4">Color</span>
                    <input type="text" v-model="color" aria-label="Color" class="form-control">
                </div>
            </div>

            <div class="col-sm pads">
                <div class="input-group">
                    <div class="input-group">
                        <span class="input-group-text col-4">Marking</span>
                        <input type="text" v-model="mark" aria-label="Marking" class="form-control">
                    </div>
                </div>
            </div>

            <div class="col-sm pads">
                <div class="input-group">
                    <label class="input-group-text col-4" for="Place">Vehicle Type</label>
                    <select v-model="cartype" class="form-select" id="Place">
                        <option selected>Choose...</option>
                        <option v-bind:value="c.vehicle_code" v-for="c in cars">{{c.vehicle_type}}</option>
                    </select>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-sm pads">
                <div class="input-group">
                    <label class="input-group-text col-4" for="Place">Place of Violation</label>
                    <select v-model="placeofviolation" class="form-select" id="Place">
                        <option selected>Choose...</option>
                        <option v-bind:value="location.location_code" v-for="location in place">{{location.location_name}}</option>
                    </select>
                </div>
            </div>


        </div>

        <div class="text-center p-2 fw-bold">
            You are hereby Cited For Committing Traffic Violation Indicated Here Under
        </div>

        <div class="row">

            <div class="col-sm pads">
                <div class="input-group">
                    <label class="input-group-text col-4" for="Violations">Select Violation</label>
                    <select v-model="violation_v" class="form-select" id="Violations">
                        <option selected>Choose...</option>
                        <option v-for="v in violation" v-bind:value="v">{{v.violation_code}} | {{v.offense_id}} | P{{v.amount | ThousandSeparator}}</option>
                    </select>
                </div>
            </div>


        </div>

        <div class="table-responsive">

            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Violation</th>
                    <th scope="col">Offense</th>
                    <th scope="col">Amount</th>
                    </tr>
                </thead>
                <tbody>

                    <tr v-for="(list,index) in violation_list">
                    <th scope="row">{{list.violation}}</th>
                    <td>{{list.offense}}</td>
                    <td>

                        P{{list.amount | ThousandSeparator}}
                    
                        <svg style="cursor:pointer" v-on:click="delete_violatin_in_list(index,list.amount)" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x float-end" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </td>
                    </tr>
                    <tr>

                    <tr>
                    <td scope="row" colspan="2" class="table-active">Subtotal:</td>
                    <td>P{{display_violation_amount | ThousandSeparator}}</td>
                    </tr>
    
                </tbody>
            </table>

        </div>

        <div class="text-center p-2">
            <h6>You are Hereby Directed To Report To City Treasurer's Office, City Hall For Payment Of Administrative Fine Within 72 Hours From The Date of.</h6>
            <small>Failure To Appear Or Report And Pay Within The Period Stipulated Will Mean A Waiver And A Criminal Complaint Against
You Will Be Field In Court Pursuant To The Provision Of Ordinance No. 10551 - 2017 City Codified Ordinance</small>
        </div>
        



        <div class="clearfix mt-3">

            <div class="float-start">
                <button type="button" class="btn btn-primary btn-lg" v-on:click="create_report" v-bind:disabled="check_empty_fields">Submit Report</button>
            </div>

            <div class="mt-3 mb-5 float-end">
                <?php echo $user['a_fname'] .' '.$user['a_lname'];?> <br>
                _____________________ <br>
                Traffice Enforcer
            </div>


        </div>
</div>




<script>


var report = new Vue({

    el: '#report',

    data (){
            return{
                no: <?php echo $display['citation_no'] + 1;?>,
                date: '',

                name: '',
                address: '',
                license: '',
                expiry: '',
                licensetype: 'Choose...',
                birthday: '',
                nationality: '',
                height: '',
                weight: '',


                plateno:'',
                owner: '',
                owneraddress: '',
                make: '',
                model: '',
                color: '',
                mark: '',
                placeofviolation: 'Choose...',
            

                place: [],
                licenselist:[],
                status: [],
                violation:[],
                cars: [],

                stat: 'Choose...',
                cartype: 'Choose...',


                violation_v: 'Choose...',
                violation_list: [],
                total_violation: 0
            }
    },
    methods:{

        async create_report (){
               
               var payload = new FormData();

               payload.append('date', this.date);
               payload.append('name', this.name);
               payload.append('address', this.address);
               payload.append('license', this.license);
               payload.append('expiry', this.expiry);
               payload.append('licensetype', this.licensetype);
               payload.append('birthday', this.birthday);
               payload.append('nationality', this.nationality);
               payload.append('height', this.height);
               payload.append('weight', this.weight);
               payload.append('plateno', this.plateno);
               payload.append('owner', this.owner);
               payload.append('owneraddress', this.owneraddress);
               payload.append('make', this.make);
               payload.append('model', this.model);
               payload.append('color', this.color);
               payload.append('mark', this.mark);
               payload.append('status', this.stat);
               payload.append('vehicletype', this.cartype);
               payload.append('placeofviolation', this.placeofviolation);
               payload.append('amount', this.total_violation);
               
              
               const sender = await axios({
                   method: 'post',
                   url: '<?php echo SITE_URL;?>/api/report/createreport.php',
                   data: payload
               });
           
           switch(sender.status){

               case 200:
                   const stats = await sender.data;
                          
                   if(stats.msg == "success"){

                       Swal.fire
                       ({
                           title: 'You have inserted a new data',
                           text: 'created a new data',
                           icon: 'success',
                           confirmButtonText: 'Okay'
                       })

                   }else{
                       

                       Swal.fire
                               ({
                                   title: 'Failed to Insert',
                                   text: 'We are going to refresh the entire page as a solution to this error',
                                   icon: 'error',
                                   confirmButtonText: 'Okay'
                               }).then((result) => {
                                   if(result.isConfirmed){
                                       window.location.href = '<?php echo SITE_URL;?>';    
                                   }
                       })

                   }

               break;

               default:
                   alert("Failed");
               break;
           }

       },

        async get_location () {
            const fetch_location = await axios.get('<?php echo SITE_URL;?>/api/location/viewlocation.php');
            
            switch(fetch_location.status){

                case 200:
                    const location = await fetch_location.data;
                    this.place = location;
                break;

                default:
                    alert("Failed to fetch data");
                break;
            }
        },

        async get_car () {
            const fetch_vehicle = await axios.get('<?php echo SITE_URL;?>/api/vehicle/viewvehicle.php');
            
            switch(fetch_vehicle.status){

                case 200:
                    const vehicles = await fetch_vehicle.data;
                    this.cars = vehicles;
                break;

                default:
                    alert("Failed to fetch data");
                break;
            }
        },

        async get_license () {
            const fetch_license = await axios.get('<?php echo SITE_URL;?>/api/license/viewlicense.php');
            
            switch(fetch_license.status){

                case 200:
                    const license = await fetch_license.data;
                    this.licenselist = license;
                break;

                default:
                    alert("Failed to fetch data");
                break;
            }
        },

        async get_status () {
            const fetch_status = await axios.get('<?php echo SITE_URL;?>/api/citation/viewcitation.php');
            
            switch(fetch_status.status){

                case 200:
                    const status = await fetch_status.data;
                    this.status = status;
                break;

                default:
                    alert("Failed to fetch data");
                break;
            }
        },

        async get_violation () {
            const fetch_violation = await axios.get('<?php echo SITE_URL;?>/api/penalty/viewpenalty.php');
            
            switch(fetch_violation.status){

                case 200:
                    const violations = await fetch_violation.data;
                    this.violation = violations;
                break;

                default:
                    alert("Failed to fetch data");
                break;
            }
        },
        total_violation_setter : function (v) {
            return this.total_violation += v;
        },
        delete_violatin_in_list: function (key,amount){
            this.total_violation -= amount;
            return this.$delete(this.violation_list, key)
        }
    },
    computed:{

        check_empty_fields : function (){
            if
            (
                this.date != '' &&
                this.name != '' &&
                this.address != '' &&
                this.license != '' &&
                this.expiry != '' &&
                this.licensetype != 'Choose...' &&
                this.birthday != '' &&
                this.nationality != '' &&
                this.height != '' &&
                this.weight != '' &&
                this.plateno != '' &&
                this.owner != '' &&
                this.owneraddress != '' &&
                this.make != '' &&
                this.model != '' &&
                this.color != '' &&
                this.mark != '' &&
                this.cartype!= 'Choose...' &&
                this.placeofviolation != 'Choose...' &&
                this.licenstype != 'Choose...' &&
                this.total_violation != 0

            ){
                return false;
            }return true;
        },
        today_date : function () {
            var today = new Date();
            var dd = today.getDate();

            var mm = today.getMonth()+1; 
            var yyyy = today.getFullYear();
            if(dd<10) 
            {
                dd='0'+dd;
            } 

            if(mm<10) 
            {
                mm='0'+mm;
            } 
  
            today = dd+'/'+mm+'/'+yyyy;
            
            return today;

        },
        
        set_violation : function (){
            if(this.violation_v != 'Choose...'){

                this.violation_list.push({
                    violation: this.violation_v.violation_code,
                    offense:this.violation_v.offense_id,
                    amount:this.violation_v.amount
                });

                this.total_violation_setter(this.violation_v.amount);

                console.log(this.violation_exist)
            }
        },
        display_violation_amount : function (){
            return this.violation_list.length > 0 ? this.total_violation : 0;
        }

    },
    watch: {
        violation_v : function (){
            this.set_violation;
        }
    },
    filters:{
        ThousandSeparator : function(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    },
    mounted(){
        this.get_violation();
        this.get_location();
        this.get_license();
        this.get_status();
        this.get_car();
    }
});


</script>


<?php
require_once('footer.php');
?>