from werkzeug.utils import secure_filename

from flask import (Flask, abort, make_response, redirect, render_template,
                   request, session, url_for)

app = Flask(__name__)

app.config.update(DEBUG=True)
# app.config.from_object('configs')
app.secret_key = 'A0Zr98j/3yX R~XHH!jmN]LWX/,?RT'

# 开启debug模式方法一
# app.debug = True


@app.route('/')
def index():
    username = request.cookies.get('username', '')

    if username != None:
        resp = make_response(render_template(...))
        resp.set_cookie('username', 'the username')
        return 'cookie set success'

   if 'username' in session:
       return 'Logged in as %s' % escape(session['username'])
   return 'You are not logged in'


@app.route('/hello')
@app.route('/hello/<name>')
def hello(name=None):
    app.logger.debug('A value for debugging')
    app.logger.warning('A warning occurred (%d apples)', 42)
    app.logger.error('An error occurred')

    return render_template('hello.html', name=name)

@app.route('/redirect')
def index1():
   return redirect(url_for('login'))

@app.route('/login')
def login():
   abort(401)
   this_is_never_executed()

@app.route('/login1', methods=['POST', 'GET'])
def login1():
   error = None
   if request.method == 'POST':
       session['username'] = request.form['username']
       return redirect(url_for('index'))

    if valid_login(request.form['username'],
                    request.form['password']):
        return log_the_user_in(request.form['username'])
    else:
            searchword = request.args.get('key', '')
            error = 'Invalid username/password'

   # the code below is executed if the request method
   # was GET or the credentials were invalid
   return render_template('login.html', error=error)
   return '''
       <form method="post">
           <p><input type=text name=username>
           <p><input type=submit value=Login>
       </form>
   '''

@app.route('/logout')
def logout():
   # remove the username from the session if it's there
   session.pop('username', None)
   return redirect(url_for('index'))

@app.route('/user/<username>')
def show_user_profile(username):
   # show the user profile for that user
   return 'User %s' % username

@app.route('/post/<int:post_id>')
def show_post(post_id):
   # show the post with the given id, the id is an integer
   return 'Post %d' % post_id

@app.route('/upload', methods=['GET', 'POST'])
def upload_file():
   if request.method == 'POST':
       f = request.files['the_file']
       f.save('./' + secure_filename(f.filename))

@app.errorhandler(404)
def not_found(error):
   resp = make_response(render_template('error.html'), 404)
   resp.headers['X-Something'] = 'A value'
   return resp

if __name__ == '__main__':
 # app.run(debug=True)
 app.run()
 # with app.test_request_context():
 #  print url_for('index')
 #  print url_for('login')
 #  print url_for('login', next='/')
 #  print url_for('profile', username='John Doe')
