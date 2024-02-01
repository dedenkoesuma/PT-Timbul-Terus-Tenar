<!DOCTYPE html>
<html>
<head>

  <style>
    .whatsapp-icon {
      position: fixed;
      bottom: 50px;
      right: 50px;
      width: 60px;
      height: 60px;
      color: white;
      border-radius: 50%;
      text-align: center;
      line-height: 60px;
      cursor: pointer;
      font-size: 24px;
      z-index: 99;
    }

    .chat-box {
      display: none;
      position: fixed;
      bottom: 175px;
      right: 80px;
      width: 300px;
      height: 300px;
      border-radius: 10px;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
      animation: popUp 0.8s cubic-bezier(0.68, -0.55, 0.27, 1.55) both;
      z-index: 99;
    }
    
    @keyframes popUp {
      0% {
        transform: scale(0);
        opacity: 0;
      }
      70% {
        transform: scale(1.0.5);
      }
      100% {
        transform: scale(1);
        opacity: 1;
      }
    }
    
    .chat-header {
      background-color: #25D366;
      color: white;
      padding: 10px;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .chat-header .close-icon {
      cursor: pointer;
    }
    .chat-body {
      background-image: url('images/bg-wa.png');
      padding: 10px;
      height: 300px;
      overflow-x: hidden;
      border-radius: 0 0 10px 10px;
    }
    .chat-body .icon-whatsapp{
        float: left;
        margin-right: 10px;
        margin-top: 10px;
        animation: popUp 2s cubic-bezier(0.68, -0.55, 0.27, 1.55) both;
    }
    .message {
      margin-top: 10px;
      background-color: #DCF8C6;
      padding: 10px;
      width: 200px;
      border-radius: 5px;
      margin-bottom: 10px;
      overflow: hidden;
      animation: popUp 2s cubic-bezier(0.68, -0.55, 0.27, 1.55) both;
    }
    @keyframes popUp {
      0% {
        transform: scale(0);
        opacity: 0;
      }
      100% {
        transform: scale(1);
        opacity: 1;
      }
    }
    .input-container {
      display: flex;
      align-items: center;
      border-top: 1px solid #E0E0E0;
      padding: 10px;
    }
    .input-box {
      flex-grow: 1;
      border: none;
      border-radius: 5px;
      padding: 5px;
    }
    .send-button {
      background-color: #25D366;
      border: none;
      border-radius: 5px;
      position: fixed;
      bottom: 0px;
      left: 0;
      right: 0;
      border-radius: 20px;
      max-width: 275px;
      padding: 10px 20px;
      cursor: pointer;
      margin-left: 13px;
    }
    .send-button a{
        text-decoration: none;
        color: white;
    }
    @media(max-width:480px){
        .chat-box{
            right: 30px;
        }
    }
  </style>
</head>
<body>
        <div class="row">
          <div class="col-12">
              <div class="whatsapp-icon whatsapp-popup" id="whatsapp-icon"><img src="images/whatsapp.svg" width="45px" alt=""></div>

                <div class="chat-box " id="chat-box">
                    <div class="chat-header">
                        Chat WhatsApp
                        <div class="close-icon" id="close-icon">&times;</div>
                    </div>
                <div class="chat-body">
                    <img src="images/user.svg" width="35px" alt="" class="icon-whatsapp">
                    <div class="message">{{__('chatWhatshapp')}}</div>
                        <div class="input-container">
                        <button class="send-button"><a href="https://api.whatsapp.com/send/?phone=02159647597&text&type=phone_number&app_absent=0">Send Message</a></button>
                        </div>
                </div>
              </div>
          </div>
        </div>
        

<script>
document.addEventListener("DOMNodeInserted", function() {
  var whatsappIcon = document.getElementById("whatsapp-icon");
  var chatBox = document.getElementById("chat-box");
  var closeIcon = document.getElementById("close-icon");

  whatsappIcon.addEventListener("click", function() {
    setTimeout(function() {
      chatBox.style.display = "block";
    }, 500); 
  });

  closeIcon.addEventListener("click", function() {
    chatBox.style.display = "none";
  });
  
});

</script>

</body>
</html>
