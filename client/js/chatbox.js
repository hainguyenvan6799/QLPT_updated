
$(document).ready(function(){
	let user_logining = $("#user_logining").val() || null;
	let openMiniBoxChat; // function
	let scrollToBottomFunc; //function
	let enterToSendMessage; // function
	let user_admin_id = 0;
	let checkChatWithAdmin = 0;
	let pusher;
	let channel;
	let pending;

		// user is loginning click inbox button in TrangChu.php
		$('#inbox').on('click', function(){
			if(user_logining != null)
			{
				if(user_logining == 0)
				{
					window.location.href = "Admin/Home";
				}
				else
				{
					checkChatWithAdmin = 1;
					openMiniBoxChat(user_admin_id);
				}
				
			}
			else if (user_logining == null)
			{
				window.location.href = "Login/getFormLogin";
			}
		});

		openMiniBoxChat = (chatWithUserId) => {
			$('#addClass').css("display", "none");
            $('#inbox').css("display", "none");
            $('#countMessageFromAdmin').css('display', 'none');
            $('#qnimate').addClass('popup-box-on');
			if(chatWithUserId == 0)
			{
				$('.popup-head-left').html("Admin");
                    $.get('ChatRealtime/checkStatus/'+ chatWithUserId, function(data){
                        $('#status').html(data);
                    });
                    setInterval(function(){
                        $.get('ChatRealtime/checkStatus/'+ chatWithUserId, function(data){
                            $('#status').html(data);
                        });
                    }, 3000);
			}
			//get all message from userlogining vs admin
			$.get("ChatRealtime/chatWith/" + chatWithUserId, function(data){
                    $(".messages").html(data);
                    scrollToBottomFunc();
                });
                $('#typeMessage').focus();
		};

		scrollToBottomFunc = () => {
			$('.popup-messages').animate({
                    scrollTop: $('.popup-messages').get(0).scrollHeight
                }, 100);
		}

		$("#removeClass").click(function () {
			checkChatWithAdmin = 0;
		    $('#qnimate').removeClass('popup-box-on');
		    $('#addClass').css("display", "block");
		    $('#inbox').css("display", "block");
		    $('#countMessageFromAdmin').css('display', 'block');
		    $('#countMessageFromAdmin').html(0);
		});

		$(document).on("keyup", ".input-text input", function(e){
		    let message = $(this).val();
		    if(e.keyCode == 13)
		    {
		        if(checkChatWithAdmin == 1)
		        {
			        enterToSendMessage(message, 0);
		        }
		        // else
		        // {
		        //     enterToSendMessage(message, friend_id);
		        // }
		    }
		});

		enterToSendMessage = (message, sendToUserId) => {
			$('#typeMessage').val('');
                if(message != '')
                {
                	let dataStr = "received_id=" + sendToUserId + "&message=" + message;
                    $.ajax({
                        type: "post",
                        url: "ChatRealtime/sendMessage", // function nay se tu kich hoat pusher
                        data: dataStr,
                        cache: false,
                        success: function(data)
                        {

                        },
                        error: function(jqXHR, status, err)
                        {

                        },
                        complete: function(){

                        }
                    });
                }
		}

		// tại đây pusher luôn hoạt động để đón tin nhắn đến
		Pusher.logToConsole = true;
        pusher = new Pusher('ed3cf9bac608e3b56afa', {
          cluster: 'eu'
        });
        channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
          // alert(JSON.stringify(data));
	        if(data["from"] == user_logining)
	        {
	            $("#inbox").click();
	        }
	        else if (data["to"] == user_logining)
	        {
	        	// alert($("#countMessageFromAdmin").val());
	        	if(checkChatWithAdmin == 1)
	        	{
	        		$("#inbox").click();
	        	}
	        	else
	        	{
	        		pending = parseInt($('#countMessageFromAdmin').html());
	                if(pending)
	                {
	                    $('#countMessageFromAdmin').html(pending + 1);    
	                }
	                else
	                {   
	                    if($('#countMessageFromAdmin').length)
	                    {
	                        $('#countMessageFromAdmin').html(1);       
	                    }else
	                    {
	                        $('#notification-messages').append('<span id="countMessageFromAdmin">1</span>');    
	                    }
	                    
	                }
	        	}
	        }
    	});

});