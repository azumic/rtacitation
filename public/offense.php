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
                <small class="card-title text-muted">Create Offense</small>

                <div class="form-floating mb-3 mt-5">
                    <input v-model="value" type="text" id="licensevalue" :class="check_if_exist" placeholder="prof / non prof / sp">
                    <label for="licensevalue">Offense Name</label>
                </div>

                <button type="button" class="btn btn-primary btn-lg" v-on:click="call_action" :disabled="check_value">{{edit_or_insert}}</button>
                <button type="button" class="btn btn-danger btn-lg" v-on:click="cancel" v-if="action == true">Cancel</button>
            </div>
        </div>

    </div>

    <div class="col-md">

        <div class="card shadow-sm p-3 mb-2 bg-white rounded">
            <div class="card-body">

                <small class="card-title text-muted">Offense Preview</small>


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
                


                <table class="table">

                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Offense</th>
                        <th scope="col">Option</th>
                       
                        </tr>
                    </thead>

                    <tbody>

                        <tr v-for="(view,index) in searchlist">
                        <th scope="row">{{view.offense_id}}</th>
                        <td>{{view.offense_name}}</td>
                        <td>
                            <i class='bx bx-pencil' style="cursor:pointer" v-on:click="edit_list(index,view.offense_id)"></i>
                            <i class='bx bx-trash-alt' style="cursor:pointer" v-on:click="delete_list(index,view.offense_id)"></i>
                        </td>
                        </tr>

                    </tbody>

                </table>



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
                value: '',
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

        async list () {
            const fetch_list = await axios.get('<?php echo SITE_URL;?>/api/offense/viewoffense.php');
            
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

            const create_pending = await axios.get('<?php echo SITE_URL;?>/api/offense/createoffense.php?value='+`${this.value}`);
            
            switch(create_pending.status){

                case 200:
                    const stats = await create_pending.data;
                           
                    if(stats.msg == "success"){

                        let last = this.preview[Object.keys(this.preview)[Object.keys(this.preview).length - 1]];
                        this.last = this.last == null ? last.offense_id+1 : this.last+1;
                        this.preview.push({offense_id : this.last, offense_name: this.value.toLowerCase()});

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


        async Update__into (){

            const update_pending = await axios.get('<?php echo SITE_URL;?>/api/offense/updateoffense.php?value='+`${this.value}`+'&id='+`${this.toupdatekey}`);
            
            switch(update_pending.status){

                case 200:
                    const stats = await update_pending.data;
                           
                    if(stats.msg == "success"){
                        
                        let update = this.preview[this.toupdate];
                        update.offense_name = this.value.toLowerCase();

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

        async Delete__into (id){

            const delete_pending = await axios.get('<?php echo SITE_URL;?>/api/offense/deleteoffense.php?value='+id);
            
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
            this.value = edit.offense_name

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
        }


    },

    watch:{
      preview : function() {
        this.setPages();
      }
    },
    
    filters: {

        object_length : function (val){
            return val.length;
        }

    },
    
    computed:{

        paginatedlist(){
            return this.paginate(this.preview);
        },

        check_value : function(){
            return this.value.trim() != '' && this.check_if_exist != "form-control is-invalid" ? false : true;
        },

        check_if_exist : function(){
            var Exist = this.preview.findIndex( s => s.offense_name == this.value.toLowerCase())

            return Exist < 0 ? "form-control" : "form-control is-invalid";
        },

        searchlist() {
            if(this.search != ''){
                return this.preview.filter(list => {
                    
                    return list.offense_name.toLowerCase().includes(this.search.toLowerCase())
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
        
    }
    
});

</script>


<?php

require_once('footer.php');

?>