from flask import Blueprint, render_template, request, flash, redirect, url_for
from .models import User
from werkzeug.security import generate_password_hash, check_password_hash
from . import db
from flask_login import login_user, login_required, logout_user, current_user


auth = Blueprint('auth', __name__)

@auth.route('/home')
def home():
    return render_template("home.html", text='Cari Kos', text1='Bersihkan Kos', text2='Pindah Kos', user = current_user)
    
@auth.route('/kontak')
def kontak():
    return render_template("kontak.html", user = current_user)


@auth.route('/tentangkami')
def tentangkami():
    return render_template("tentangkami.html", user = current_user)

@auth.route('/carikos')
def carikos():
    if request.method =='POST':
        email = request.form.get('email')
        user = User.query.filter_by(email=email).first()

        login_user(user, remember = True)
        return redirect(url_for('auth.login'))
    return render_template("carikos.html", user = current_user)

@auth.route('/bersihkankos')
def bersihkankos():
    if request.method =='POST':
        email = request.form.get('email')
        user = User.query.filter_by(email=email).first()

        login_user(user, remember = True)
        return redirect(url_for('auth.login'))
    return render_template("bersihkankos.html", user = current_user)

@auth.route('/pindahkos')
def pindahkos():
    if request.method =='POST':
        email = request.form.get('email')
        user = User.query.filter_by(email=email).first()

        login_user(user, remember = True)
        return redirect(url_for('auth.login'))
    return render_template("pindahkos.html", user = current_user)

@auth.route('/login', methods = ['GET', 'POST'])
def login():
    if request.method =='POST':
        email = request.form.get('email')
        password = request.form.get('password')

        user = User.query.filter_by(email=email).first()
        if user:
            if check_password_hash(user.password, password):
                flash('Log in sukses! Selamat Datang!', category = 'success')
                login_user(user, remember = True)
                return redirect(url_for('views.home'))
            else:
                flash('e-mail atau password yang anda masukkan salah, coba lagi', category = 'error')
        else:
            flash('Akun tidak terdaftar, silahkan Sign Up terlebih dahulu', category = 'error')        

    return render_template("login.html", user = current_user)
    
@auth.route('/logout')
@login_required
def logout():
    logout_user()
    return redirect(url_for('auth.login'))


@auth.route('/sign-up', methods = ['GET', 'POST'])
def sign_up():
    if request.method == 'POST':
        email = request.form.get('email')
        password1 = request.form.get('password1')
        password2 = request.form.get('password2')

        user = User.query.filter_by(email=email).first()
        if user:
            flash('e-mail sudah terdaftar', category = 'error')
        elif len(email) < 4:
            flash('e-mail tidak ditemukan, harap gunakan email yang terdaftar!', category='error')
        elif password1 != password2:
            flash('Kata sandi tidak cocok', category='error')
        elif len(password1) < 5:
            flash('Kata sandi kurang kuat, gunakan lebih dari 5 karakter!', category='error')
        else:
            new_user = User(email = email, password = generate_password_hash(password1, method = 'sha256'))
            db.session.add(new_user)
            db.session.commit()
            login_user(new_user, remember = True)
            flash('Sukses, anda telah membuat akun!', category='success')
            return redirect(url_for('views.home'))

    return render_template("sign_up.html", user = current_user)