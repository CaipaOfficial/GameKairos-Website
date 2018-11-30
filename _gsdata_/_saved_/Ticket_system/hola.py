from flask import Flask

app = Flask(__name__)


@app.route("/system")
def hello():
    return "Hello World!"

if __name__ == "__main__":
    app.run(debug=True, host="213.136.67.9", port=80)