<?php

require_once('header.php');

if($_SESSION[session::$role] != 'Admin'){
	helper::redirect('/');
}
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<div class="row mt-5" id="license">

    <div class="col-md">

        <div class="card shadow-sm p-3 mb-2 bg-white rounded">
            <div class="card-body">


                <small class="card-title text-muted">Create Penalty</small>

                <select v-model="violation_v" class="form-select form-select-lg mb-3 mt-5" aria-label=".form-select-lg example">
                    <option selected>Select Violation</option>
                    <option v-for="v in violation" v-bind:value="v">{{v.violation_name}}</option>
                
                </select>

                <select v-model="offense_v" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option selected>Select Offense</option>
                    <option v-for="o in offense" v-bind:value="o">{{o.offense_name}}</option>
                </select>


                <div class="form-floating mb-3">
                    <input v-model="value" type="number" id="licensevalue" class="form-control"placeholder="prof / non prof / sp">
                    <label for="licensevalue">Enter Amount</label>
                </div>

                <button type="button" class="btn btn-primary btn-lg" v-on:click="call_action" :disabled="check_value">{{edit_or_insert}}</button>
                <button type="button" class="btn btn-danger btn-lg" v-on:click="cancel" v-if="action == true">Cancel</button>
            </div>
        </div>

    </div>

    <div class="col-md">

        <div class="card shadow-sm p-3 mb-2 bg-white rounded">
            <div class="card-body">

                <small class="card-title text-muted">Penalty Preview</small>


            <div class="row mt-2">
                <div class="col-sm-2 mb-2">

                <select class="form-select" aria-label="Disabled select example" v-model="perPage">
                <option selected>5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                </select>

                </div>


                <div class="col-sm mb-2">
                    <div class="input-group float-end" style="max-width:20rem">

                        <span class="input-group-text bg-white" id="basic-addon1">
                            <i class='bx bx-search'></i>
                        </span>

                        <input type="text" class="form-control" placeholder="Search" aria-label="search" v-model="search" aria-describedby="basic-addon1">

                    </div>
                </div>
            </div>
                

                <div class="table-responsive">
                    <table class="table">

                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Violation</th>
                            <th scope="col">Offense</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Option</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr v-for="(view,index) in searchlist">
                            <th scope="row">{{view.penalty_id}}</th>
                            <td> {{view.violation_code}}</td>
                            <td>{{view.offense_id}}</td>
                            <td>&#8369;{{view.amount | ThousandSeparator}}</td>
                            <td>
                                <i class='bx bx-pencil' style="cursor:pointer" v-on:click="edit_list(index,view.penalty_id)"></i>
                                <i class='bx bx-trash-alt' style="cursor:pointer" v-on:click="delete_list(index,view.penalty_id)"></i>
                            </td>
                            </tr>

                        </tbody>

                    </table>
                </div>


                    <div class="row">
                        <div class="col-sm-7">

                            Showing {{page}} to {{pages | object_length}} of {{perPage}} entries

                        </div>
                        <div class="col-sm">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination" id="paginatebuttons">
                                
                                    <li class="page-item">
                                    <button v-if="page != 1" @click="page--" class="page-link text-dark" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                    </button>
                                    </li>
                                    
                                    
                                    <button class="page-link text-dark" v-for="pageNumber in pages.slice(page-1, page+5)" @click="page = pageNumber">{{pageNumber}}</button>
                                

                                    <li class="page-item">
                                    <button class="page-link text-dark" @click="page++" v-if="page < pages.length" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </button>
                                    </li>

                                </ul>
                            </nav>
                        </div>
                    </div>


            </div>
        </div>

    </div>

</div>


<script>

var license = new Vue({

    el: '#license',

    data (){
            return{

                offense:[],
                violation:[],

                value: '',
                violation_v: 'Select Violation',
                offense_v: 'Select Offense',


                preview: [''],
                search: '',
                action: false,
                last: null,

                toupdate: null,
                toupdatekey: null,


                page: 1,
                perPage: 5,
                pages: []

            }
    },

    methods:{
        

        setPages () {
              this.pages  = [];
              let numberOfPages = Math.ceil(this.preview.length / this.perPage);
              for (let index = 1; index <= numberOfPages; index++) {
                  this.pages.push(index);
              }
        },

        paginate (list) {
              let page = this.page;
              let perPage = this.perPage;
              let from = (page * perPage) - perPage;
              let to = (page * perPage);

            
              return  list.slice(from, to);
        },

        async offense_getter () {
            const fetch_list = await axios.get('<?php echo SITE_URL;?>/api/offense/viewoffense.php');
            
            switch(fetch_list.status){

                case 200:
                    const list = await fetch_list.data;
                    this.offense = list;
                break;

                default:
                    alert("Failed to fetch data");
                break;
            }
        },

        async violation_getter () {
            const fetch_list = await axios.get('<?php echo SITE_URL;?>/api/violation/viewviolation.php');
            
            switch(fetch_list.status){

                case 200:
                    const list = await fetch_list.data;
                    this.violation = list;
                break;

                default:
                    alert("Failed to fetch data");
                break;
            }
        },


        async list () {
            const fetch_list = await axios.get('<?php echo SITE_URL;?>/api/penalty/viewpenalty.php');
            
            switch(fetch_list.status){

                case 200:
                    const list = await fetch_list.data;
                    this.preview = list;

                    console.log(this.pages)
                break;

                default:
                    alert("Failed to fetch data");
                break;
            }
        },

        async create__into (){

            const create_pending = await axios.get('<?php echo SITE_URL;?>/api/penalty/createpenalty.php?violation='+`${this.violation_v.violation_code}`+'&offense='+`${this.offense_v.offense_id}`+'&amount='+`${this.value}`);
            
            switch(create_pending.status){

                case 200:
                    const stats = await create_pending.data;
                           
                    if(stats.msg == "success"){

                        let last = this.preview[Object.keys(this.preview)[Object.keys(this.preview).length - 1]];
                        this.last = this.last == null ? last.penalty_id+1 : this.last+1;
                        this.preview.push({penalty_id : this.last, violation_code: this.violation_v.violation_name.toLowerCase() , offense_id: this.offense_v.offense_name.toLowerCase(),amount: this.value});

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
                                        window.location.href = '<?php echo SITE_URL;?>/penalty';    
                                    }
                        })

                    }

                break;

                default:
                    alert("Failed");
                break;
            }


        },


        async Update__into (){

            const update_pending = await axios.get('<?php echo SITE_URL;?>/api/penalty/updatepenalty.php?id='+`${this.toupdatekey}`+'&violation='+`${this.violation_v.violation_code}`+'&offense='+`${this.offense_v.offense_id}`+'&amount='+`${this.value}`);
            
            switch(update_pending.status){

                case 200:
                    const stats = await update_pending.data;
                           
                    if(stats.msg == "success"){
                        
                        let update = this.preview[this.toupdate];
                        update.violation_code = this.violation_v.violation_name;
                        update.offense_id = this.offense_v.offense_name;
                        update.amount = this.value ;

                        Swal.fire
                        ({
                            title: 'You have Updated a data',
                            text: 'data been successfuly updated!',
                            icon: 'success',
                            confirmButtonText: 'Okay'
                        })

                    }else{
                        

                        Swal.fire
                                ({
                                    title: 'Failed to Update',
                                    text: 'We are going to refresh the entire page as a solution to this error',
                                    icon: 'error',
                                    confirmButtonText: 'Okay'
                                })

                    }

                break;

                default:
                    alert("Failed");
                break;
            }

        },

        async Delete__into (id){

            const delete_pending = await axios.get('<?php echo SITE_URL;?>/api/penalty/deletepenalty.php?value='+id);
            
            switch(delete_pending.status){

                case 200:
                    const stats = await delete_pending.data;
                           
                    if(stats.msg == "success"){

                        Swal.fire
                        ({
                            title: 'You have Deleted a data',
                            text: 'data been successfuly Deleted!',
                            icon: 'success',
                            confirmButtonText: 'Okay'
                        })

                    }else{
                        

                        Swal.fire
                                ({
                                    title: 'Failed to delete',
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

        delete_list(index,key){

            let x = this.preview[index];
            this.Delete__into(key);
            return this.$delete(this.preview, index)
        },

        edit_list(index,key){

            let edit = this.preview[index];
            this.toupdate = index;
            this.toupdatekey = key;

            this.value = edit.amount;

            return this.action = true;
        },

        insert_list : function (){
            this.create__into();
        },

        update_list : function (){
            this.Update__into();

        },

        call_action : function (){
            return this.edit_or_insert == "Register" ? this.insert_list() : this.update_list();
        },     

        cancel : function (){
            this.value = '';
            return this.action = false;
        },

        violation_viewer : function() {
            this.violation.forEach(element => {
                if(element.violation_code === 2){
                    return element.violation_name;
                }
            });
        },


    },

    watch:{
      preview : function() {
        this.setPages();
      }
    },
    
    filters: {

        object_length : function (val){
            return val.length;
        },

        display_violation : function(val){
            return this.violation_viewer(val)
        },

        
        ThousandSeparator : function(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

            

        
    },
    
    computed:{

        check_value : function(){
            return this.value != '' ? false : true;
        },

        paginatedlist(){
            return this.paginate(this.preview);
        },

        searchlist() {
            if(this.search != ''){
                return this.preview.filter(list => {
                    
                    return list.violation_code.toLowerCase().includes(this.search.toLowerCase()) || list.offense_id.toLowerCase().includes(this.search.toLowerCase())
                })
            }else{
                return this.paginatedlist;
            }
        },

        edit_or_insert : function (){
            return !this.action ? "Register" : "Update";
        }

    },

    mounted(){
        this.list();
        this.offense_getter();
        this.violation_getter();
    }
    
});

</script>


<?php

require_once('footer.php');

?>