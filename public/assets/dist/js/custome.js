$(document).ready(function () {
  $("#msgsend").click(function () {
    sendMessage();
  });

  $(".chatmsg").keypress(function (event) {
    if (event.which === 13) {
      // Check if Enter key is pressed (Enter key has keycode 13)
      event.preventDefault(); // Prevent default form submission behavior
      sendMessage();
    }
  });

  function sendMessage() {
    var messageInput = $(".chatmsg").val().trim(); // Get the message and remove leading/trailing whitespace
    if (messageInput !== "") {
      // Check if the message is not empty
      var formdata = $("#chatform").serialize();
      if (formdata) {
        $.ajax({
          url: "http://localhost/MiTech/insertChat",
          type: "POST",
          data: formdata,
          dataType: "JSON",
          success: function (response) {
            console.log(response);
            $("#chatform").trigger("reset");
            var html =
              '<div class="direct-chat-msg right"><div class="direct-chat-infos clearfix"><span class="direct-chat-name float-right"></span><span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span></div><img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image"><div class="direct-chat-text">' +
              response.getdata.message +
              "</div></div>";
            $(".direct-chat-messages").append(html);
            // Trigger page refresh after successful message insertion
            location.reload();
          },
        });
      }
    }
  }

  var SELECTOR_DIRECT_CHAT = ".direct-chat";
  var CLASS_NAME_DIRECT_CHAT_OPEN = "direct-chat-contacts-open";
  $(".chatopen").click(function () {
    $(SELECTOR_DIRECT_CHAT).toggleClass(CLASS_NAME_DIRECT_CHAT_OPEN);
  });

  $(document).ready(function () {
    // Function to update chat count
    function updateChatCount() {
      $.ajax({
        url: "http://localhost/MiTech/getChatCount", // URL to fetch chat count
        type: "GET",
        dataType: "json", // Expect JSON response
        success: function (response) {
          if (response.chat_count !== undefined) {
            $(".chatCounter").text(response.chat_count);
          } else {
            // Handle error or unauthorized access
            $(".chatCounter").text("Error: " + response.error);
          }
        },
        error: function (xhr, status, error) {
          console.error(status, error);
        },
      });
    }

    // Initial call to update chat count
    updateChatCount();

    // Set interval to update chat count every 5 seconds
    setInterval(updateChatCount, 5000);
  });

  $(document).ready(function () {
    // Function to update chat count
    function updatenotificationchatCount() {
      $.ajax({
        url: "http://localhost/MiTech/getnotificationchatCount", // URL to fetch chat count
        type: "GET",
        dataType: "json", // Expect JSON response
        success: function (response) {
          if (response.notificationchat_count !== undefined) {
            $(".notificationchatCounter").text(response.notificationchat_count);
          } else {
            // Handle error or unauthorized access
            $(".notificationchatCounter").text("Error: " + response.error);
          }
        },
        error: function (xhr, status, error) {
          console.error(status, error);
        },
      });
    }

    // Initial call to update chat count
    updatenotificationchatCount();

    // Set interval to update chat count every 5 seconds
    setInterval(updatenotificationchatCount, 5000);
  });
});
