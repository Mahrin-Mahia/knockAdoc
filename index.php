<?php require_once 'includes/header.php'; ?>
<title>Welcome</title>
<?php require_once 'includes/header-bottom.php'; ?>

<style media="screen">
    html, body {
        margin: 0;
        padding: 0;
        height: 100%;
        width: 100%;
    }
</style>

<body id="intro-page">

<section id="intro">
    <div id="navi"><h1>Need Doctor</h1></div>
    <div id="inner">

        <div id="select">
            <h1>Welcome to the Doctor Patient Portal</h1>
            <form action="loginforpatient.php">
                <input type="submit" name="submit" id="to-btn" value="Login as patient">

            </form>
            <form action="loginfordoctor.php">
                <input type="submit" name="submit" id="to-btn" value="Login as doctor">

            </form>
            <h2>New to this site?</h2>
            <form action="signupfordoctor.php">
                <input type="submit" name="submit" id="to-btn" value="Register as doctor">

            </form>
            <form action="signupforpatient.php">
                <input type="submit" name="submit" id="to-btn" value="Register as patient">

            </form>
        </div>
    </div>
</section>

<h1>About</h1>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
    sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>


</body>
</html>
