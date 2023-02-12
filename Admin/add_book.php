<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="Css/admin_login.css">
</head>
<?php
    include '../database/connect.php';
    session_start();
?>
<body>
    <div class="container">
        <form action="Controller/addbook_done.php" method="Post">
            <h1>BOOK REGISTER</h1>
            <div class="form-control">
                <input id="username" type="text" name="username" class="username" placeholder="Author" >
                <small class="notShow">Author is required</small>
                <div id="error"></div>
                <ul id="suggestions"></ul>
                <script>
                    const inp = document.getElementById('username');
                    const listBox = document.getElementById('suggestions');
                    const errorBox = document.getElementById('suggestions');
                    function setSuggestions(s) {
                        listBox.innerHTML = s.map(si => `<li>${si}</li>`).join('');
                    }
                    inp.addEventListener('input', () => {
                        const value = inp.value.trim();
                        if (value == '') return setSuggestions([]);
                        const xhr = new XMLHttpRequest();
                        xhr.onload = () => {
                            const ret = JSON.parse(xhr.response);
                            console.log(ret)
                            setSuggestions(ret.suggestions);
                        }
                        xhr.onerror = (err) => {
                            errorBox.innerText = err;
                        }
                        xhr.open('GET', 'get-searchs.json.php?value=' + encodeURIComponent(value), true);
                        xhr.send();
                    })
                    listBox.addEventListener('click', event => {
                        const value = event.target.innerText;
                        inp.value = value;
                    })
                </script>
            </div>
            <div class="form-control">
                <input id="email" type="text" name="email" class="email" placeholder="Category" >
                <small class="notShow">Category is required</small>
                <div id="error1"></div>
                <ul id="suggestions1"></ul>
                <script>
                    const inp1 = document.getElementById('email');
                    const listBox1 = document.getElementById('suggestions1');
                    const errorBox1 = document.getElementById('suggestions1');
                    function setSuggestions1(s) {
                        listBox1.innerHTML = s.map(si => `<li>${si}</li>`).join('');
                    }
                    inp1.addEventListener('input', () => {
                        const value = inp1.value.trim();
                        if (value == '') return setSuggestions1([]);
                        const xhr1 = new XMLHttpRequest();
                        xhr1.onload = () => {
                            const ret1 = JSON.parse(xhr1.response);
                            console.log(ret1)
                            setSuggestions1(ret1.suggestions);
                        }
                        xhr1.onerror = (err) => {
                            errorBox.innerText = err;
                        }
                        xhr1.open('GET', 'get_category.php?value=' + encodeURIComponent(value), true);
                        xhr1.send();
                    })
                    listBox1.addEventListener('click', event => {
                        const value = event.target.innerText;
                        inp1.value = value;
                    })
                </script>
            </div>
            <div class="form-control">
                <input id="password" type="text" name="Password" class="Password" placeholder="Name of book" >
                <small class="notShow">Name is required</small>
                <span></span>
            </div>
            <div class="form-control">
                <input id="tele" type="text" name="phoneNumber" class="phoneNumber" placeholder="Version" >
                <small class="notShow">Version is required</small>
                <span></span>
            </div>
            <div class="form-control">
                <input id="addr" type="text" name="addr" class="addr" placeholder="Public Company" >
                <small class="notShow">?Public Company is required</small>
                <span></span>
            </div>
            <button type="submit" name="submit" class="btn-submit">Register</button>
            <div class="signup-link">
                <a href="book.php"#>BACK</a>
            </div>
        </form>
    </div>
</body>

</html>