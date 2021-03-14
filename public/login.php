<?php


if(session::isLogin()){
	helper::redirect('/');
}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <title>Login</title>
  </head>
  <body class="bg-white">
  

  
  <div class="content" id="login">
    <div class="container">
      <div class="row">
        <div class="col-md-6"  data-aos="fade-up"
     data-aos-duration="3000">
          <img src="images/undraw_towing_6yy4.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents shadow-sm p-1 bg-white rounded"  data-aos="fade-up"
     data-aos-duration="3000">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4 mt-3">
              <h3>Sign In <small><?php echo SITE_TITLE;?></small></h3>
              <p class="mb-4">The roads and transport authority website is an online gate for all online services for Philippines traffic, fines, licensing, public transport, nol and transport business.</p>
            </div>

            <div class="alert alert-success" role="alert" v-if="isAuthenticated == true">
              You have successfuly login!

              <sup>
                <div class="spinner-border spinner-border-sm" role="status">
                  <span class="sr-only">Loading...</span>
                </div>
              </sup>

            </div>

            <div class="alert alert-danger" role="alert" v-if="invalid == true && isAuthenticated != true">
            The account name or password that you have entered is incorrect.
            </div>

            <form method="post" autocomplete="off" id="loginform">
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" v-model="user" name="user" class="form-control" id="username">

              </div>
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" v-model="pass" name="pass" class="form-control" id="password">
                
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
              </div>

              <input type="submit" value="Log In" class="btn btn-block btn-primary mb-5" v-bind:disabled="field_not_empty" v-on:click="loggin">

            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>


  <script>

    var credentials = new Vue({

      el: '#login',
      
      data ()
      {
          return{
             user: '',
             pass: '',
             isAuthenticated: false,
             invalid: false,
          }
      },


      methods:{

        loggin : function(e){
          e.preventDefault();
          this.connect();
        },

        async connect(){
          
          let form = document.querySelector('#loginform');
          const data = new URLSearchParams();
              for(const p of new FormData(form)){
                  data.append(p[0],p[1]);
          }

          const sender = await axios({
            method: 'post',
            url: '<?php echo SITE_URL;?>/api/account/login.php',
            data: data
          });
          
          if(sender.status != 200){

            console.log("Error Handshake");
            
          }else{
              const reciever = await sender.data;
           
          }

          switch(sender.status){
            case 200:
              const reciever = await sender.data;
              
              
                switch(reciever.msg){
                  case 'success':
                      this.isAuthenticated = true;

                      setTimeout(() => {
                        window.location.href = '<?php echo SITE_URL;?>';   
                      }, 2000);

                    break;
                    case 'failed':
                      this.invalid = true;
                      break;
                }
              
              break;
            default:
              alert('failed');
              break;
          }

        }

      },

      computed:{

          field_not_empty : function (){
            return this.user.trim() != '' && this.pass.trim() != '' ? false : true;
          }

      }

    });


  </script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
        AOS.init();
  </script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>