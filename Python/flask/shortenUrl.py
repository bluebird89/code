from flask import Flask, request, redirect
from hashlib import md5

app = Flask('url_shortener')

mapping = {}


@app.route("/shorten", methods=["POST"])
def shorten():
    global mapping
    playload = request.json

    if "url" not in playload:
        return "Missing URL Parameter", 400

    # TODO:check if URL is valid

    hash_ = md5()
    hash_.update(playload["url"].encode())
    digest = hash_.hexdigest()[:5]

    if digest not in mapping:
        mapping[digest] = playload["url"]
        return f"Shortened:r/{digest}\n"
    else:
        # TODO: check for hash collission
        return f"Already exist:r/{digest}\n"


@app.route("/r/<hash_>")
def redirect_(hash_):
    if hash_ not in mapping:
        return "URL Not Found", 400
    return redirect(mapping[hash_])


if __name__ == '__main__':
    app.run(debug=True)

# curl localhost:5000/shorten -H "content-type: application/json" --data '{"url":"https://linkedin.com"}'
# curl localhost:5000/r/a62a4 -v
