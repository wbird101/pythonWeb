
$(document).ready(function(){
    $("#write_msg").keydown(function(key){
        if(key.keyCode == 13){
            message_submit();
        }
    });
});

function message_submit(){
    //user message 대화창에 쓰기
    append_html($("#write_msg").val(),'user');
    $("#write_msg").val("");    //입력 메세지 지우기
    $('#message_form').submit();


}
//dialogflow로부터 응답 메세지 가져오기
function get_answer(){
    var msg = $("#write_msg").val();
    var user_key = 'a';
    //user message 대화창에 쓰기
    append_html(msg,'user');
    data_send ={
        query : msg,
        sessionId : user_key,
        lang : 'ko'
    }

    $.ajax({
        type : 'post',
        url : 'https://api.dialogflow.com/v1/query?v=20150910',
        beforeSend : function(xhr){
            xhr.setRequestHeader("Authorization", "Bearer 12e33235e64f4ee1a3a516279a41cee9");   //헤더값
            xhr.setRequestHeader("Content-type","application/json; charset=utf-8");
        },
        data : JSON.stringify(data_send),
        error: function(xhr, status, error){
            alert(error);
        },
        success : function(xml){
            //대화창에 응답 메세지 쓰기
            append_html(xml['result']['fulfillment']['speech'],'chatbot');
            //scroll bottom
            $(".msg_history").animate({
                    scrollTop: $(
                      '.msg_history').get(0).scrollHeight
                }, 2000);
        },
    });
    $("#write_msg").val("");    //입력 메세지 지우기
}

function get_answer_v2(){
    var msg = $("#write_msg").val();
    var user_key = 'a';
    //user message 대화창에 쓰기
    append_html(msg,'user');
    data_send ={
            query_input : {
                text : {
                    text : msg,
                    language_code : 'ko'
            }
        }
    }
    $.ajax({
        type : 'post',
        url : 'https://dialogflow.googleapis.com/v2/projects/newagent-uciymq/agent/sessions/123456789:detectIntent',
        beforeSend : function(xhr){
            xhr.setRequestHeader("Authorization", "Bearer ya29.c.Ko8BwQfAgg22IMIDxdn7pT8wXVreorOAIKczFuWwK7SeFQsvZ9_pEu8Pke4P5DCrzmGWfEW-no-fKK3JC61j1PxKsxuu5UQ4dP5jo6ayzx_ZNcLwlpLUhOnUJuCMTrCFeJYYnNg93mBZ9ijJ2JYpVWYP9NJwIkAsQyULEy7j9BmKpkEaAv8t2u-OimZBCSoVZCI");   //헤더값
            xhr.setRequestHeader("Content-type","application/json; charset=utf-8");
        },
        data : JSON.stringify(data_send),
        error: function(xhr, status, error){
            alert("error:"+error);
        },
        success : function(xml){
            //대화창에 응답 메세지 쓰기
            append_html(xml['queryResult']['fulfillmentText'],'chatbot');
            //scroll bottom
            $(".msg_history").animate({
                    scrollTop: $(
                      '.msg_history').get(0).scrollHeight
                }, 2000);
        },
    });
    $("#write_msg").val("");    //입력 메세지 지우기
}

//대화창에 메세지 입력
function append_html(msg,user){
    var tag;
    if(user=='chatbot'){
        tag = '<div class="incoming_msg">';
        tag = tag +  '<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>';
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
