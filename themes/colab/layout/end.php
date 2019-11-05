<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="footer-title">
                    vComic.
                </div>
                <div class="footer-content">
                    <b>vComic</b> là website đọc truyện online cập nhật liên tục và nhanh nhất các truyện tiên hiệp, kiếm hiệp, huyền ảo được các thành viên liên tục đóng góp rất nhiều truyện hay và nổi bật.,...
                </div>
            </div>
            <div class="col-md-8 mb-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="footer-title">
                                Liên kết
                            </div>
                            <div class="footer-content">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="footer-title">
                                Liên hệ Hỗ trợ
                            </div>
                            <div class="footer-content">
                                <div class="mb-3">
                                    <i class="fal fa-phone fa-lg mr-2"></i> <b>SĐT:</b> 0988.794.788
                                </div>
                                <div class="mb-3">
                                    <i class="fal fa-envelope fa-lg mr-2"></i> <b>Email:</b> support@vcomic.net
                                </div>
                                <div class="mb-3">
                                    <i class="fab fa-facebook fa-lg mr-2"></i> Thư Viện vComic.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="modal fade" id="loginModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Đăng nhập</div>
                <i class="cursor fal fa-times fa-lg position-absolute text-white float-right " style="right:10px;top:17px;" data-dismiss="modal" aria-label="Close"></i>
            </div>
            <div class="modal-body px-5">
                <p id="errorLogin"></p>
                <div class="form-horizontal">
                    <div class="form-group">
                        <label for="username">Tài khoản</label>
                        <input type="text" id="username" name="username" class="form-control bg-light rounded-0" placeholder="Tài khoản" />
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="password" id="password" name="password" class="form-control bg-light rounded-0" placeholder="Mật khẩu" />
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="remember" name="remember" checked="checked" />
                            <label for="">Giữ tôi luôn đăng nhập</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button id="login" class="btn btn-custom rounded-0 btn-block text-uppercase py-2 shadow-sm">Đăng nhập</button>
                    </div>
                    <div class="form-group text-center small-text">
                        <span>hoặc đăng nhập bằng mạng xã hội</span>
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <a href="" class="social-button facebook d-block position-absolute mx-auto" style="left:0;right:0">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-right text-muted d-block">
                <div class="float-left text-left"><a href="#" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#recoverModal">Quên mật khẩu?</a></div>
                <span>Chưa có tài khoản?</span> <a href="#" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#registerModal"> Đăng kí</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="registerModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Đăng kí</div>
                <i class="cursor fal fa-times fa-lg position-absolute text-white float-right " style="right:10px;top:17px;" data-dismiss="modal" aria-label="Close"></i>
            </div>
            <div class="modal-body px-5">
                <p id="errorRegister"></p>
                <div class="form-horizontal">
                    <div class="form-group">
                        <label for="username">Tên người dùng</label>
                        <input type="text" id="usernameReg" name="usernameReg" class="form-control bg-light rounded-0" placeholder="Tài khoản" />
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="password" id="passwordReg" name="passwordReg" class="form-control bg-light rounded-0" placeholder="Mật khẩu"/>
                    </div>
                    <div class="form-group">
                        <label for="password">Họ tên</label>
                        <input type="text" id="fullname" name="fullname" class="form-control bg-light rounded-0" placeholder="Họ tên"/>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control bg-light rounded-0" placeholder="Email"/>
                    </div>
                    <div class="form-group mt-4">
                        <button id="register" class="btn btn-custom rounded-0 btn-block text-uppercase py-2 shadow-sm">Đăng kí</button>
                    </div>
                    <div class="form-group text-center small-text">
                        <span>hoặc đăng nhập bằng mạng xã hội</span>
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <a href="" class="social-button facebook d-block position-absolute mx-auto" style="left:0;right:0">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-right text-muted">
                <span>Đã có tài khoản?</span> <a href="#" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#loginModal" >Đăng nhập</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="recoverModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Quên Mật Khẩu</div>
                <i class="cursor fal fa-times fa-lg position-absolute text-white float-right " style="right:10px;top:17px;" data-dismiss="modal" aria-label="Close"></i>
            </div>
            <div class="modal-body px-5">
                <p id="errorRecover"></p>
                <div class="form-horizontal">
                    <div class="form-group">
                        <label for="username">Tài khoản</label>
                        <input type="text" id="usernameRecover" name="usernameRecover" class="form-control bg-light rounded-0" placeholder="Tài khoản" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="emailRecover" name="emailRecover" class="form-control bg-light rounded-0" placeholder="Email" />
                    </div>
                    <div class="form-group">
                        <button id="recover" class="btn btn-custom rounded-0 btn-block text-uppercase py-2 shadow-sm">Gửi Yêu Cầu</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-right text-muted d-block">
                <div class="float-left text-left"><a href="#" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#loginModal">Đăng Nhập</a></div>
                <span>Chưa có tài khoản?</span> <a href="#" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#registerModal"> Đăng kí</a>
            </div>
        </div>
    </div>
</div>
    <script type="text/javascript" src="<?= SITE_URL ?>/assets/js/jquery.min.js?ver=<?= VERSION ?>"></script>
    <script type="text/javascript" src="<?= SITE_URL ?>/assets/js/bootstrap.min.js?ver=<?= VERSION ?>"></script>
    <script type="text/javascript" src="<?= SITE_URL ?>/assets/js/notify.min.js?ver=<?= VERSION ?>"></script>
    <script type="text/javascript" src="<?= SITE_URL ?>/assets/js/lazyload.min.js?ver=<?= VERSION ?>"></script>
    <script type="text/javascript" src="<?= SITE_URL ?>/themes/<?= THEME ?>/js/swiper.min.js?ver=<?= VERSION ?>"></script>
    <script type="text/javascript" src="<?= SITE_URL ?>/themes/<?= THEME ?>/js/custom.js?ver=<?= VERSION ?>"></script>
    
    <script type="text/javascript">
        $(document).ready(function () {
            $('#submit-chat').on('click', function () {
                var message = $('#chat_box').val(); 
           
                $.ajax({
                    type: "POST",
                    url:  "/chat",
                    data: {
                        msg : message
                    },
                    cache: false,
                    beforeSend : function () {
                        $('#submit-chat').attr('disabled', true);
                    },
                    success: function (data){
                        $('#chat_box').val('');
                        $('#submit-chat').removeAttr('disabled');
                    }
                });
            });

            $('#submit-message').on('click', function () {
                var content = $('#message').val(); 
           
                $.ajax({
                    type: "POST",
                    url:  "/message/<?= $username ?>",
                    data: {
                        content : content
                    },
                    cache: false,
                    success: function (data){
                        $('#message-room').prepend(data);
                        $('#message').val('');
                    }
                });
            });
            setInterval(function(){
                $.getJSON("/modules/ajax/new_msg", function(data) {
                    if (data.new_msg > 0) {
                        $('#new-msg').html('<span class="badge-notif"></span>');
                    }
                });
            }, 10000);
        });
    
        var pusher = new Pusher('4b3ff0efa1aa3ccadbc3', {
            cluster: 'ap1',
            forceTLS: true,
            authEndpoint: '/modules/auth'
        });
        
        var channel = pusher.subscribe('private-chat');

        var user_id = <?= $user_id ?>;
        var audio = new Audio('/assets/alert.mp3');
        
        channel.bind('chat-room', function(data) {
            var html = '<div class="text-' + (data.user_id != user_id ? 'left' : 'right') + '"><div class="media"><div class="media-body mr-3"><div class="chat-content">' + (data.user_id != user_id ? '<img class="lazy avatar-sm" src="' + data.avatar +'"/><a href="/' + data.username + '"><b>' + data.display_name + '</b></a>: ' : '') + data.message + '</div></div></div></div>';            
            $('#chat-room').prepend(html);
            
            if (data.user_id != user_id) {
                audio.play();
            }
        });
    </script>
</body>
</html>