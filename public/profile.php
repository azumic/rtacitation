<?php
require_once('header.php');
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<div class="mt-5 mb-5" id="profile">


    <div class="row">

        <div class="col-sm-3">
            <div class="card shadow-sm p-3 mb-2 bg-white rounded">
                <div class="card-body">
                
                <img src="/assets/img/perfil.png" class="card-img-top h-100 w-100 img-responsive" height="100%" width="100%" alt="name">
                    <div class="card-text text-center">
                        <h4><?php echo $user['a_fname'] .' '.$user['a_lname'];?></h4>
                        <p>@<?php echo $user['position'];?></p>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm p-3 mb-2 bg-white rounded">
                <div class="card-body">


                <ul class="list-group list-group-flush">

                <?php if($user['position'] == "Admin"):?>
                    <li class="list-group-item">
                    License 
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-check-circle float-end" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                        </svg>
                    </li>
                <?php endif;?>

                
                    <li class="list-group-item">
                    Location
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-check-circle float-end" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                        </svg>
                    </li>

                <?php if($user['position'] == "Admin"):?>
                    <li class="list-group-item">
                    Vehicle
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-check-circle float-end" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                        </svg>
                    </li>
                <?php endif;?>

                <?php if($user['position'] == "Admin"):?>
                    <li class="list-group-item">
                    Offense
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-check-circle float-end" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                        </svg>
                    </li>
                <?php endif;?>    

                <?php if($user['position'] == "Admin"):?>
                    <li class="list-group-item">
                    Violation
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-check-circle float-end" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                        </svg>
                    </li>
                <?php endif;?> 


                    <li class="list-group-item">
                    Citation
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-check-circle float-end" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                        </svg>
                    </li>

                    <li class="list-group-item">
                    Report
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-check-circle float-end" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                        </svg>
                    </li>

                <?php if($user['position'] == "Admin"):?>
                    <li class="list-group-item">
                    Personel
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-check-circle float-end" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                        </svg>
                    </li>
                <?php endif;?> 
                </ul>

                </div>
            </div>
        </div>

        <div class="col-sm">
        <form method="POST" id="informationform">
            <div class="card shadow-sm p-3 mb-2 bg-white rounded">
                <div class="card-title">Profile Information</div>
                <div class="card-body">

                    <div class="input-group mb-1">
                        <span class="input-group-text col-6 bg-white fw-bold" style="border:none">First name</span>
                        <input type="text" aria-label="First name" v-model="first" :value="first" name="first" class="form-control" style="border:none">
                    </div>
                    
                    <div class="input-group mb-1">
                        <span class="input-group-text col-6 bg-white fw-bold" style="border:none">Middle name</span>
                        <input type="text" aria-label="First name" v-model="middle" :value="middle" name="middle" class="form-control" style="border:none">
                    </div>

                    <div class="input-group mb-1">
                        <span class="input-group-text col-6 bg-white fw-bold" style="border:none">Last name</span>
                        <input type="text" aria-label="First name" v-model="last" :value="last" name="last" class="form-control"style="border:none">
                    </div>

                    <div class="input-group mb-1">
                        <span class="input-group-text col-6 bg-white fw-bold" style="border:none">Date of hired</span>
                        <input type="text" aria-label="First name" class="form-control" value="<?php echo $user['date_of_hired'];?>" disabled style="border:none">
                    </div>

                    <button type="button" class="btn btn-info text-white btn-lg mt-3" v-on:click="updatinfo" v-bind:disabled="did_change">Update Profile</button>

                </div>
            </div>
        </form>
            <div class="card shadow-sm p-3 mb-5 bg-white rounded">
                <div class="card-title">Change Password</div>
                <div class="card-body">

                    <div class="alert alert-danger animate__animated animate__fadeIn" role="alert" v-if="stat != null && stat != 'success' ">
                        {{stat}}
                        <span class="float-end">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                            </svg>
                        </span>
                    </div>

                    <div class="alert alert-success animate__animated animate__fadeIn" v-if="stat == 'success' " role="alert">
                        <!-- {{stat}} -->
                        Success
                        <span class="float-end">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                            </svg>
                        </span>
                    </div>

                    <form method="post" id="updatepassword">
                        <div class="form-floating mb-1">
                            <input type="password" class="form-control" name="current" id="current" v-model="current" placeholder="Current password">
                            <label for="current">Current password</label>
                        </div>

                        <div class="form-floating mb-1">
                            <input type="password" class="form-control" name="change" id="password" v-model="pass" placeholder="password">
                            <label for="password">Change password</label>
                        </div>

                        <div class="form-floating">
                            <input type="password" class="form-control" name="confirm" id="confirm" v-model="confirm" placeholder="confirm passwor">
                            <label for="confirm">Confirm password</label>
                        </div>

                        <button type="button" class="btn btn-info text-white btn-lg mt-3" v-bind:disabled="change_pass" v-on:click="changepass">Change password</button>
                    </form>
                </div>
            </div>
        </div>


    </div>


</div>


<script>

var profile = new Vue({

    el: '#profile',

    data (){
            return{
                first:'<?php echo $user['a_fname'];?>',
                middle: '<?php echo $user['a_mname'];?>',
                last: '<?php echo $user['a_lname'];?>',

                pass: '',
                current: '',
                confirm: '',
                
                stat: null
            }
    },

    methods:{

        updatinfo : function(){
            this.update();
        },

        async update (){

            

            let form = document.querySelector('#informationform');
            const data = new URLSearchParams();
                for(const p of new FormData(form)){
                    data.append(p[0],p[1]);
            }

            const sender = await axios({
                method: 'post',
                url: '<?php echo SITE_URL;?>/api/account/updatecredential.php',
                data: data
            });
            switch(sender.status){

                case 200:
                    const stats = await sender.data;
                        
                    if(stats.msg != "failed"){
                        
                        this.first = stats.msg[0];
                        this.middle = stats.msg[1];
                        this.last = stats.msg[2];

                        Swal.fire
                        ({
                            title: this.first + ' has updated',
                            text: 'Profile info has been updated',
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

        changepass : function (e){
            e.preventDefault();
            this.update_pass();
        },
        async update_pass (){

                let form = document.querySelector('#updatepassword');
                const data = new URLSearchParams();
                    for(const p of new FormData(form)){
                        data.append(p[0],p[1]);
                }

                const sender = await axios({
                    method: 'post',
                    url: '<?php echo SITE_URL;?>/api/account/updatepassword.php',
                    data: data
                });
                switch(sender.status){

                    case 200:
                        const stats = await sender.data;
                            
                        if(stats.msg == "success"){

                            this.stat = stats.msg;
                            this.pass = '';
                            this.confirm = '';
                            this.current = '';

                        }else{
                            
                            this.stat = stats.msg;

                        }

                    break;

                    default:
                        alert("Failed");
                    break;
                }

            },
    },

    computed: {
        did_change : function (){
            return this.first.trim() != '' && this.middle.trim() != '' && this.last.trim() != '' ? false : true;
        },

        change_pass: function (){
            return this.pass.trim() != '' && this.confirm.trim() != '' && this.current.trim() != '' ? false : true;
        }
    }
});
</script>

<?php
require_once('footer.php');
?>