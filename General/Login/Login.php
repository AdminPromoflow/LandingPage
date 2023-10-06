<style media="screen">
    .login{
      position: fixed;
      left: -100%;
      top: 50%;
      transition: .7s cubic-bezier(0.68, -0.55, 0.27, 1.55);
      z-index: 14;
      transform: translateY(-50%);
    }
    .containerLogin{

      width: 300px;
      height: 400px;
      max-height: 90vh;
      overflow-y: scroll;

      background: rgba(30,54,81,.7);
      background: linear-gradient(180deg, rgba(30,54,81,.98) 57%, rgba(47,67,90,.98) 100%);
      box-shadow: 0px 0px  29px #1B2737,  -0px -0px  29px #1B2737;
      border-bottom-left-radius: 5px;
      border-bottom-right-radius: 5px;

      transform: perspective(600px) rotateY(0deg);
      backface-visibility: hidden; /* cant see the backside elements as theyre turning around */
      transition: transform 1s linear .1s;
    }
    .headLogin{
      position: absolute;
      top: 0px;
      width: 100%;
      height: 80px;
      background: rgba(106,108,110, .1);
      background: linear-gradient(90deg, rgba(106,108,110,.8) 0%, rgba(141,169,167,.8) 50%, rgba(106,108,110,.8) 100%);
      border-top-left-radius: 5px;
      border-top-right-radius: 5px;
      box-shadow: 0px 0px  5px black;
    }
    .headLogin h1{
      position: relative;
      margin: 0px;
      text-align: center;
      top: 50%;
      transform: translateY(-50%);
      font-size: 2em;
      font-weight: 600;
      color: rgba(255 , 255 , 255 , .8);
      text-shadow: 0px 0px  5px black;
    }
    .headLogin img{
      position: absolute;
      right: 20px;
      top: 50%;
      transform: translateY(-50%);
      height: 30%;
      cursor: pointer;
      filter: drop-shadow(1px 1px 1px black)  brightness(.8);
      transition: .4;
    }
    .headLogin img:hover{
      filter: drop-shadow(1px 1px 3px black)  brightness(.9);
    }
    .headLogin img:active{
      filter: drop-shadow(1px 1px 1px black)  brightness(.8);
    }

    .bodyLogin{
      position: absolute;
      top: 80px;
      width: 100%;
      height: 210px;
      padding-top: 10px;

      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }
    .bodyLogin label{
      color: white;
      margin-bottom: 5px;
      font-size: 1em;

    }
    .bodyLogin input{
      margin-bottom: 20px;
      border-radius: 5px;
      padding: 3px 10px;;
      font-size: 1em;
      background: rgba(255 , 255 , 255 , .8);
    }

    .footerLogin{
      position: absolute;
      top: 290px;
      width: 100%;
      height: 110px;

      display: flex;
      justify-content:flex-start;
      align-items: center;
      flex-direction: column;
    }
    .footerLogin button{
      padding: 8px 20px;
      z-index: 10;
      font-size: 1.3em;
      font-weight: 200;
      border-radius: 5px;
      color: black;
      background-color: #B3C7BF;
      cursor: pointer;
    }
    .fontWeightButtonLogin{
      font-weight: 500;
    }
    .footerLogin h4{
      margin: 10px;
      color: rgba(255 , 255 , 255 , .9);
      border-bottom: 1px solid transparent;

      font-weight: 300;
      cursor: pointer;
      transition: .4s;
    }
    .footerLogin h4:hover{
      color: rgba(255 , 255 , 255 , 1);
      border-bottom: 1px solid white;
    }


  </style>
<section id="login" class="login">
  <div id="containerLogin"  class="containerLogin">
    <div class="headLogin">
      <h1>Login</h1>
      <img id="closeLogin" src="../General/Login/img/close.png" alt="">
    </div>
    <div class="bodyLogin">
      <label for="">Please provide your email:</label>
      <input type="text" name="" value="">
      <label for="">and your password:</label>
      <input type="password" name="" value="">
    </div>
    <div class="footerLogin">
      <button type="button" name="button"><strong class="fontWeightButtonLogin">Start</strong></button>
      <h4 id="openRegisterFromLogin">No account yet? Register here.</h4>
    </div>
  </div>
</section>
<script type="text/javascript">




</script>
