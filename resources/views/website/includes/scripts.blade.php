<script src="{{asset('/')}}website/assets/plugins/jquery/jquery.js"></script>
<!-- Bootstrap jQuery -->
<script src="{{asset('/')}}website/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="{{asset('/')}}website/assets/plugins/bootstrap/js/popper.min.js"></script>
<!-- Owl caeousel -->
<script src="{{asset('/')}}website/assets/plugins/owl-carousel/owl.carousel.min.js"></script>
<script src="{{asset('/')}}website/assets/plugins/slick-carousel/slick.min.js"></script>
<script src="{{asset('/')}}website/assets/plugins/magnific-popup/magnific-popup.js"></script>
<!-- Instagram Feed Js -->
<script src="{{asset('/')}}website/assets/plugins/instafeed-js/instafeed.min.js"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
<script src="{{asset('/')}}website/assets/plugins/google-map/gmap.js"></script>

@include('sweetalert::alert')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- main js -->
<script src="{{asset('/')}}website/assets/js/custom.js"></script>

<script>
    function incrementLikes() {
        // Get the current likes count from Local Storage
        var likesCount = parseInt(localStorage.getItem("likesCount")) || 2;
        // Increment the likes count
        likesCount++;
        // Update the likes count in Local Storage
        localStorage.setItem("likesCount", likesCount);
        // Update the likes count in the UI
        document.getElementById("likesCount").innerText = likesCount;
    }
    // On page load, retrieve the likes count from Local Storage and update the UI
    window.onload = function() {
        var likesCount = parseInt(localStorage.getItem("likesCount")) || 2;
        document.getElementById("likesCount").innerText = likesCount;
    };
</script>
<script>
       const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

    $(document).ready(function(){
        $('.newsletter-form').on('submit',function(e){
            e.preventDefault();
            $.ajax({
                method:'POST',
                url:"{{route('subscribe-newsletter')}}",
                data:$(this).serialize(),
                beforeSend:function(data){
                    $('.news-button').text('loading...');
                    $('.news-button').attr('disabled',true);
                },
                success:function(data){
                        if(data.status === 'success') {
                            Toast.fire({
                                icon :'success',
                                title :data.message
                            })
                            $('.news-button').text('loading...');
                            $('.news-button').attr('disabled',false);
                        }
                },
                error:function(data){
                    $('.news-button').text('Sign up');
                    $('.news-button').attr('disabled',false);

                    if (data.status === 422) {
                        let errors = data.responseJSON.errors;
                        $.each(errors,function(index,value){
                            Toast.fire({
                                icon:'error',
                                title:value[0]
                            })
                        }) 
                    }
                }
            })
        })
    })
</script>

<script>
    $(document).ready(function() {
        // Auto move the slider after a time interval
        setInterval(function() {
            $('.carousel').carousel('next');
        }, 7000); // Change the time interval (in milliseconds) as needed
    });
</script>