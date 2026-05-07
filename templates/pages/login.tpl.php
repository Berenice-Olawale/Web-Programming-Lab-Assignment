<h2>Login or registration</h2>
<section class="grid"><div class="card">
    <h3>Login</h3>
    <form action="login2" method="post">
        <label>Username</label>
        <input type="text" name="username" required>
        <label>Password</label>
        <input type="password" name="password" required>
        <button class="btn" type="submit">Login</button>
    </form>
    <p>Demo user: <strong>berenice</strong> / <strong>12345</strong></p>
</div>
<div class="card">
    <h3>Register</h3>
    <form action="register" method="post">
        <label>First name</label>
        <input type="text" name="firstname" required>
        <label>Last name</label>
        <input type="text" name="lastname" required>
        <label>Username</label>
        <input type="text" name="username" required>
        <label>Password</label>
        <input type="password" name="password" required>
        <button class="btn secondary" type="submit">Register</button>
    </form>
</div>
</section>