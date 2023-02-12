<!DOCTYPE html>
<html lang="en">
    <!-- cmm / -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/1147679ae7.js"crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/css/style.css">
        <title>Online Library</title>
    </head>
    <?php 
           session_start();   
    ?>
    <body>
        <header>
            <div class="logo">
                <img src="../src/img/logo.png">
            </div>
<!---------------------------------- menu --------------------------------->
            <div class="menu">
                <li><a href="category.php">Trending</a>
                    <ul class="sub-menu">
                        <li><a href="a.php">Giáo trình</a></li>
                        <li><a href="b.php">Truyện tranh</a></li>
                        <li><a href="c.php">Tiểu thuyết</a></li>
                        <li><a href="d.php">Tâm lý tình cảm</a></li>
                    </ul>
                </li>
                
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="category.php">Mượn sách</a></li>
                <li><a href="request.php">Hỗ trợ</a></li>
                <li><a href="aboutUs.php">About</a></li>
            </div>
            <div class="others">
                <!-- <li><input placeholder="Tìm kiếm" id="input-search" name = "search" type="text"><i><a class="fas fa-search" href="product.php?bookname="<?php $book_name = @ $_GET['search']; echo $book_name?>\""></a></i></li> -->
                <li>
                    <form action="product.php" method="get">
                        <input placeholder="Tìm kiếm" id="input-search" name = "bookname" type="text"><i><a class="fas fa-search" href="product.php?bookname=<?php $book_name = @ $_GET['search']; echo $book_name;?>"></a></i></input>
                        <input style="border-width:0;" id="submit" type="submit" value=""></input>
                    </form>
                </li>
                <div id="error"></div>
                <ul id="suggestions"></ul>
                <script>
                    const inp = document.getElementById('input-search');
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
                        xhr.open('GET', '../Controller/get-searchs.json.php?value=' + encodeURIComponent(value), true);
                        xhr.send();
                    })
                    listBox.addEventListener('click', event => {
                        const value = event.target.innerText;
                        inp.value = value;
                    })
                </script>
                <li><a class ="fas fa-heart" href="../Homepage/profile.php?action="favorite\""></a></li>
                
                <li><a class ="fas fa-shopping-bag" href="../Homepage/profile.php?action="borrow\""></a></li>
                <div class="menu">
                    <li><a class ="fas fa-user" href=""></a>
                        <ul class="sub-menu" id="not_login">
                            <li><a href="../user_login.php">Log in</a></li>
                            <li><a href="../user_register.php">Sign up</a></li>
                        </ul>
                        <ul class="sub-menu" id="already_login">
                            <li><a href="../Homepage/profile.php?action="info\"">Profile</a></li>
                            <li><a href="../logout.php">Logout</a></li>
                        </ul>
                    </li>
                </div>

            </div>
        </header>
<!----------------------------- Slider -------------------------------->
    </body>
 <?php 
    echo "
        <script language='javascript'>
            var ul = document.querySelector(\"#not_login\");
            var ul2 = document.querySelector(\"#already_login\");
    ";
    if(empty($_SESSION['email'])){
        echo "
                ul.style.display = \"block\";
                ul2.style.display = \"none\";
            </script>
        ";
    }else{
        echo "
                ul.style.display = \"none\";
                ul2.style.display = \"block\";
            </script>
        ";
        $email = $_SESSION['email'];
    }
?>
</html>