<!DOCTYPE html>
<html lang="en">
    <!-- cmm / -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/1147679ae7.js"crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/style.css">
        <title>Library Bách Khoa</title>
    </head>

    <body>
        <header>
            <div class="logo">
                <img src="../images/logo.png">
            </div>
<!---------------------------------- menu --------------------------------->
            <div class="menu">
                <li><a href="">SACH HAY</a>
                    <ul class="sub-menu">
                        <li><a href="">SACH VÀNG</a></li>
                        <li><a href="">SACH CA NHAC</a></li>
                        <li><a href="">SACH TÂM LÍ</a></li>
                        <li><a href="">SACH VIỄN TƯỞNG</a></li>
                    </ul>
                </li>
                
                <li><a href="">NGON TINH</a></li>
                <li><a href="">SACH GIAO KHOA</a></li>
                <li><a href="">SACH VIEN TUONG</a></li>
                <li><a href="">SACH NGHIEN CUU</a></li>
            </div>
            <div class="others">
                <li><input placeholder="Tìm kiếm" id="input-search" type="text"><i class="fas fa-search"></i></li>
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
                        xhr.open('GET', 'get-searchs.json.php?value=' + encodeURIComponent(value), true);
                        xhr.send();
                    })

                    listBox.addEventListener('click', event => {
                        const value = event.target.innerText;
                        inp.value = value;
                    })

                </script>

                <li><a class ="fas fa-heart" href=""></a></li>
                <li><a class ="fas fa-user" href=""></a></li>
                <li><a class ="fas fa-shopping-bag" href=""></a></li>
                <li><a class ="fas fa-bars" href=""></a></li>

            </div>
        </header>
<!----------------------------- Slider -------------------------------->
        <section id="Slider">
            <div class="aspect-ratio-169">
                <img src="../images/1.jpg">
                <img src="../images/2.jpg">
                <img src="../images/3.jpg">
                <img src="../images/4.jpg">
                <img src="../images/5.jpg">
            </div>
        <div class="dot-container">
            <div class="dot active"></div>
            <div class="dot "></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
        </section>
        <section>
<!---------------------------- app-container ------------------------------------->
            <section class = "app-container">
                <p>Tải ứng dụng Library Book</p>
                <div class="app-google">
                    <img src="../images/appstore.png">
                    <img src="../images/googleplay.png">
                </div>
                <p>Nhận bản tin Library Book</p>
                <input type="text" placeholder="Nhập email của bạn">
            </section>
        </section>
<!----------------------------- footer ----------------------------------->
<div class = "footer-top">
    <li><a href=""><img src = "../images/chatluong.png"alt=""></a></li>
    <li><a href=""></a>Liên hệ</li>
    <li><a href=""></a>Thông tin</li>
    <li><a href=""></a>Giới thiệu</li>
    <li>
        <a href="" class="fab fa-facebook-f"></a>
        <a href="" class="fab fa-twitter"></a>
        <a href="" class="fab fa-youtube"></a>
        <a href="" class="fab fa-instagram"></a>

    </li>
</div>
<div class="footer-center">
    <p>
        Thư viện sách Bách Khoa<br>
        Địa chỉ: 108 P. Lê Thanh Nghị, Bách Khoa, Hai Bà Trưng, Hà Nội <br>
        Hotline liên hệ : <b>0968 686 868</b>
    </p>
</div>

<div class="footer-bottom">
    © All rights reserved
</div>
    
    </body>
    <!------------------------------ Java Script ------------------------------>
    <script>
        const header = document.querySelector("header")
        window.addEventListener("scroll",function()
        {
            x = window.pageYOffset
            if(x>0)
            {
                header.classList.add("sticky")
            }
            else{
                header.classList.remove("sticky")
            }
        })
        const imgPosition = document.querySelectorAll(".aspect-ratio-169 img")
        const imgContainer = document.querySelector('.aspect-ratio-169')
        const dotItem = document.querySelectorAll(".dot")
        let imgNumber = imgPosition.length
        let index = 0
        //console.log(imgPosition)
        imgPosition.forEach(function(image,index){
            image.style.left = index*100 + "%"
            dotItem[index].addEventListener("click",function(){
                slider (index)
            })
        })
        function imgSlide(){
            index++;
            console.log(index)
            if(index>=imgNumber){index=0}
            slider (index)
        }
        function slider(index){
            imgContainer.style.left = "-" +index*100+ "%"
            const dotActive = document.querySelector('.active')
            dotActive.classList.remove("active")
            dotItem[index].classList.add("active")
        }
        setInterval(imgSlide,5000)
    </script>
</html>