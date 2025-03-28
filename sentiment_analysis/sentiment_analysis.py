from flask import Flask, request, jsonify
from textblob import TextBlob
from flask_cors import CORS
# Instala las dependencias necesarias
# pip install Flask textblob flask-cors

app = Flask(__name__)
CORS(app)  # Para permitir peticiones desde Laravel

@app.route('/analyze', methods=['POST'])
def analyze():
    data = request.json
    text = data['text']
    analysis = TextBlob(text)
    sentiment = "Neutral"
    
    if analysis.sentiment.polarity > 0:
        sentiment = "Positivo"
    elif analysis.sentiment.polarity < 0:
        sentiment = "Negativo"
    
    return jsonify({'sentiment': sentiment})

if __name__ == '__main__':
    app.run(debug=True, port=5000)
