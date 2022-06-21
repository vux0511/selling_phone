<!-- FOOTER -->
<hr>
<footer>
    <div class="content">
        <div class="left box">
            <div class="upper">
                <div class="topic">Thông Tin Cửa Hàng</div>
                <p style="text-align: center;">Cửa hàng mua bán điện thoại uy tín chất lượng hàng đầu <br>
                Việt Nam</p>
            </div>
            <div class="lower">
                <div class="topic">Liên Hệ</div>
                <div class="phone">
                    <a href="#"><i class="fas fa-phone-volume"></i>033.4373.123</a>
                </div>
                <div class="email">
                    <a href="#"><i class="fas fa-envelope"></i>vux.0511@gmail.com</a>
                </div>
            </div>
        </div>

        <div class="middle box">
            <div class="topic">Dịch Vụ Của Chúng Tôi</div>
            <div><a href="#">Chính sách đổi trả</a></div>
            <div><a href="#">Hệ thống bảo hành</a></div>
            <div><a href="#">Chính sách bảo mật</a></div>
            <div><a href="#">Câu hỏi thường gặp mua hàng</a></div>
        </div>
        <div class="right box">
            <div class="topic">Theo Dõi Tại</div>
            <form action="#">
                <div class="media-icons">
                    <a href="https://www.facebook.com/Vuxxxxx/"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/vux_0511/"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fas fa-envelope"></i></a>
                </div>
            </form>
        </div>
    </div>
</footer>
<!-- FOOTER -->




<!-- SCRIPT HEADER -->
<script>
    window.onscroll = function() {
        myFunction()
    };

    var header = document.getElementById("myHeader");

    var sticky = header.offsetTop;

    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
</script>


<!-- SCRIPT TAB PRODUCTS -->
<script>
    function openPage(pageName, elmnt, color) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].style.backgroundColor = "";
        }
        document.getElementById(pageName).style.display = "block";
        elmnt.style.backgroundColor = color;
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>
</body>

</html>