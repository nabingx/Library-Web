
<body>
<?php include 'header.php'?>
        <section id="Slider">
            <div class="aspect-ratio-169">
                <img src="../src/img/1.png">
                <img src="../src/img/2.png">
                <img src="../src/img/3.png">
                <img src="../src/img/4.png">
                <img src="../src/img/5.png">
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
                    <img src="../src/img/appstore.png">
                    <img src="../src/img/googleplay.png">
                </div>
                <p>Nhận bản tin Library Book</p>
                <input type="text" placeholder="Nhập email của bạn">
            </section>
        </section>
<!----------------------------- footer ----------------------------------->
<?php include 'footer.php'?>
    
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