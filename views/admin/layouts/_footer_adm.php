<?php
?>

</div> <!-- container -->

</div> <!-- content -->

<!-- Footer Start -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <a href="http://spaseprogect.pro" target="_blank" style="color:#5c7186;">SpaseProgect</a> <?= date('Y'); ?>. Development and Design.
            </div>
        </div>
    </div>
</footer>
<!-- end Footer -->

</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>


<!-- Vendor js -->
<script src="/assets/assetsAdmin/js/vendor.min.js"></script>

<!-- knob plugin -->
<script src="/assets/assetsAdmin/libs/jquery-knob/jquery.knob.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>

<!--Morris Chart-->
<script src="/assets/assetsAdmin/libs/morris-js/morris.min.js"></script>
<script src="/assets/assetsAdmin/libs/raphael/raphael.min.js"></script>

<!-- Dashboard init js-->
<script src="/assets/assetsAdmin/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="/assets/assetsAdmin/js/app.min.js"></script>

<script>
    $(document).ready(function(){
        $(".slide-one").owlCarousel({
            margin:10, //Отступ от картино если выводите больше 1
            nav:false, //Отключил навигацию
            responsive:{ //Адаптация в зависимости от разрешения экрана
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:4
                }
            }
        });

        $(".slide-two").owlCarousel({
            loop:true, //Зацикливаем слайдер
            margin:10, //Отступ от картино если выводите больше 1
            nav:false, //Отключил навигацию
            autoplay:true, //Автозапуск слайдера
            smartSpeed:1000, //Время движения слайда
            autoplayTimeout:4000, //Время смены слайда
            responsive:{ //Адаптация в зависимости от разрешения экрана
                0:{
                    items:1
                },
            }
        });
    });
</script>

</body>
</html>
