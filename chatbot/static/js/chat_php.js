
$(document).ready(function(){
    $("#write_msg").keydown(function(key){
        if(key.keyCode == 13){
            get_answer();
        }
    });
});

function get_answer(){
    var msg = $("#write_msg").val();
    var sessionID = $("#sessionID").val();
    append_html(msg,'user');    //ui에 메세지 쓰기

    $.ajax({
        type : 'post',
        url : 'process.php',
        data : { message:msg, sessionID:sessionID},
        error: function(xhr, status, error){
            alert(error);
        },
        success : function(response){
            //대화창에 응답 메세지 쓰기
            append_html(response["result"],'chatbot');
            //alert(response["intent"]);
            //scroll bottom
            $(".msg_history").animate({
                    scrollTop: $(
                      '.msg_history').get(0).scrollHeight
                }, 2000);
        },
    });
    $("#write_msg").val("");    //입력 메세지 지우기
}
//대화창에 입력과 응답 메세지 쓰기
function append_html(msg,user){
    var tag;
    if(user=='chatbot'){
        tag = '<div class="incoming_msg">';
        tag = tag +  '<div class="incoming_msg_img"> <img src="static/img/chat_icon.png" alt="sunil"> </div>';
        tag = tag +  '<div class="received_msg">';
        tag = tag +    '<div class="received_withd_msg">';
        tag = tag +      '<p>'+msg+'</p>';
        tag = tag +      '<span class="time_date">' + getTime() +'   |   '+ today() + '</span></div>';
        tag = tag + '</div>';
        tag = tag +'</div>';
    }else{
        tag = '<div class="outgoing_msg"><div class="sent_msg"><p>';
        tag = tag + msg +'</p>';
        tag = tag + '<span class="time_date"> ' + getTime() +'   |   '+ today() + '</span> </div></div>';

    }
    $("#msg_history").append(tag);
}

//현재 시간과 날짜 구하기
var now = new Date();

function today(){
    var year= now.getFullYear();
    var mon = (now.getMonth()+1)>9 ? ''+(now.getMonth()+1) : '0'+(now.getMonth()+1);
    var day = now.getDate()>9 ? ''+now.getDate() : '0'+now.getDate();

    return year + '-' + mon + '-' + day;
}

function getTime(){
    return now.getHours()+ ':' + now.getMinutes();
}
