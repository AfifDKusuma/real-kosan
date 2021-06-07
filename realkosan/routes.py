from flask import render_template, url_for, flash, redirect
from realkosan import app
from realkosan.forms import RegistrationForm, LoginForm
from realkosan.models import User, Post

posts = [
    {
        'author': 'John Doe',
        'title': 'Kos 1',
        'content': 'Deskripsi Kosan',
        'date_posted': '9 Februari, 2021'
    },
    {
        'author': 'Jane Doe',
        'title': 'Kos 2',
        'content': 'Deskripsi Kosan',
        'date_posted': '26 Mei, 2021'
    },
    {
        'author': 'John Doe',
        'title': 'Kos 3',
        'content': 'Deskripsi Kosan',
        'date_posted': '27 Juli, 2021'
    }
    
]

@app.route("/")
@app.route("/home")
def home():
    return render_template('home.html', posts=posts)

@app.route("/tentangkami")
def tentangkami():
    return render_template('tentangkami.html', title = 'Tentang Kami')

@app.route("/register", methods = ['GET', 'POST'])
def register():
    form = RegistrationForm()
    if form.validate_on_submit():
        flash (f'Akun berhasil dibuat untuk {form.username.data}!', 'success')
        return redirect(url_for('home'))
    return render_template('register.html', title = 'Daftar', form=form)

@app.route("/login", methods = ['GET', 'POST'])
def login():
    form = LoginForm()
    if form.validate_on_submit():
        if form.email.data == 'admin@blog.com' and form.password.data == 'password':
            flash('Anda Berhasil Masuk!', 'success')
            return redirect (url_for('home'))
        else:
            flash('Akun tidak ditemukan. Silakan masuk dengan akun yang telah dibuat!', 'danger')
    return render_template('login.html', title = 'Login', form=form)