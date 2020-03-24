import requests
import json
#http://localhost:5000/?content=%EA%B0%80%EC%A1%B1%EC%9D%80%20%EB%AA%87%20%EB%AA%85%EC%9D%B4%EC%95%BC?&userid=a
from flask import Flask, request, jsonify, render_template


def get_answer(text, user_key):
    data_send = {

        'query': text,

        'sessionId': user_key,

        'lang': 'ko',

    }

    data_header = {

        'Authorization': 'Bearer 12e33235e64f4ee1a3a516279a41cee9',

        'Content-Type': 'application/json; charset=utf-8'

    }

    dialogflow_url = 'https://api.dialogflow.com/v1/query?v=20150910'

    res = requests.post(dialogflow_url, data=json.dumps(data_send), headers=data_header)

    if res.status_code != requests.codes.ok:
        return '오류가 발생했습니다.'

    data_receive = res.json()

    answer = data_receive['result']['fulfillment']['speech']

    return answer


app = Flask(__name__)

app.config['JSON_AS_ASCII'] = False


@app.route('/', methods=['POST','GET'])
def webhook():
    content = request.args.get('content')
    userid = request.args.get('userid')
    if(len(content)>0 ):
        return get_answer(content, userid)
    else:
        return render_template('index.html')

@app.route('/', methods=['POST','GET'])
def index():
    return render_template('index.html')


if __name__ == '__main__':
    app.run(host='0.0.0.0',debug=True)