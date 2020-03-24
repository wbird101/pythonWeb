
$(document).ready(function(){
    $("#write_msg").keydown(function(key){
        if(key.keyCode == 13){
            get_answer_v2();
        }
    });
});
//db 연동이 필요한 경우 true
function is_db_connect(displayName){
    $.getJSON("/intent.json",function(lists){
        if($.inArray(displayName,lists)) return true;
        else return false;
    });
}

//응답 intent의 displayName 추출
function get_display_name(data){
    return data["intent"]["displayName"];
}
function get_display_name_v1(data){
    return data["intent"]["displayName"];
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
        type : 'get',
        url : 'dialogflow.googleapis.com/v2beta1/projects/newagent-uciymq/agent/sessions/e9f00c63-d482-df48-6479-a5b95b3536dd:detectIntent',
        beforeSend : function(xhr){
            xhr.setRequestHeader("Authorization", "Bearer ya29.c.Ko8BwgcpxwROxIPUprAQCF9_3x80k_URPlStRfBO881v4Y_8RYYyzvG7mODwKNnNvhBfFI_XbipLckAVG00qTXYVfWdr2ln5OZiABuKFOALctDx9l8NC4tHXz1E2U9VVF8Dkv8Sf8DYgBIiG9pd5fMMWNnbxxV8Y9-Z5ycKqY9TXu0w-e91xx3FZlIogAfixDKc");   //헤더값
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
