<main>
    <div class="container">
        <div class="row">
            <?php if (isset($params['product_one']) && !empty($params['product_one'])) : ?>
                <div class="col-lg-8 main_left">
                    <h1 class="detail_title detail_title1"><?= $params['product_one']['name'] ?></h1>

                    <div class="mb-5">
                        <img src="<?= UPLOAD_PRODUCT_PATH . $params['product_one']['thumb'] ?>" alt="" class="img-thumbnail w-25">
                        <div class="noti_price">
                            <span class="price_new"><?= number_format($params['product_one']['price']) . ' đ' ?></span>
                        </div>
                        <a class="btn btn-primary purchase fs-3" href="<?= BASE_URL . '/cart/add?id=' . $params['product_one']['id'] . '&quantity=1' ?>">Thêm giỏ hàng</a>
                    </div>

                    <p class="detail_sub">Là những câu chuyện cuộc đời Chương từ những ngày đầu thi đại học đến cả lúc đi làm. Tình cảm với Quỳnh, tình bạn với
                        Trâm, Kim Dung, và cả những mối quan hệ trong một thời đạn bom khói lửa của đất nước. Quyển sách bao gồm những hoạt động
                        thường ngày vô cùng giản dị nhưng rất đời, rất người. Nhà văn Nguyễn Nhật Ánh đã vẽ nên một bức tranh đầy hoài niệm,
                        nhung nhớ và tràn đầy những ám ảnh khắc khoải cho mỗi độc giả về một thời tuổi trẻ mà ắt hẳn nhiều người sẽ tìm thấy
                        mình ở các nhân vật trong quyển sách…</p>
                    <div class="detail_img">
                        <img src="<?= UPLOAD_PRODUCT_PATH . $params['product_one']['thumb'] ?>" alt="">

                    </div>

                    <h3 class="detail_title">Thời sinh viên đáng nhớ</h3>
                    <p class="detail_sub">Mở đầu mạch truyện là hình ảnh chàng trai mười tám tuổi Chương trong quá trình lần đầu đến Sài Gòn để thi đại học, thành
                        phố mới, chuyến hành trình đến vùng đất xa lạ, đầy những cảm xúc hỗn tạp – vui sướng, buồn bã và lo âu. Đây có lẽ là cảm
                        xúc chung của đại đa số mọi người bởi hầu như ai cũng phải trải qua thời sinh viên như thế này.</p>

                    <h3 class="detail_title">Có những khoảnh khắc, lỡ nhau muôn đời…</h3>
                    <p class="detail_sub">Cụm lan rừng Chương xin cho Trâm, bức thư tay Trâm viết mà Chương bỏ lỡ, tất cả đều là minh chứng cho tình bạn đẹp của
                        hai người. Chẳng cần nói ra, chỉ giữ yên trong tim là đủ.

                        “Tình yêu đâu phải chỉ được nói ra ngoài miệng lưỡi mà còn bộc lộ trong cách quan hệ với nhau nữa chứ, phải không anh
                        Chương?”

                        Lỗi chẳng phải ở Chương, chẳng phải ở Trâm, Quỳnh hay Kim Dung mà vốn dĩ là do những quan niệm sai lầm của những người
                        đi trước trải qua thời loạn chiến. Bởi vì nó mà muôn vàn người đói khổ, vô số gia đình mất con, đầy rẫy những cuộc chia
                        ly không ngày trở về, và có thể nhiều người chung cảnh ngộ như Chương, như Quỳnh, như Trâm. Hòa bình vốn không dễ có nên
                        chúng ta phải ra sức gìn giữ để lịch sử không lặp lại những chuyện đáng tiếc như vậy nữa</p>
                    <div class="detail_img">
                        <img src="<?= PUBLIC_PATH . '/assets/img/detail_sp/nguyen-nhat-anh-con-chut-gi-de-nho.jpeg' ?>" alt="">
                    </div>
                    <p class="detail_sub">Trong cuộc đời sau này Chương có hối hận không? Có lẽ là có. Hối hận vì ngày đó ra đi biệt tăm biệt tích không nhận được
                        lá thư Trâm gửi. Hối hận bỏ lại sau lưng gia đình dì Ba, nhỏ Lan Anh mà không một lần về thăm. Dù sao thì cũng không thể
                        nào thay đổi bất cứ điều gì, thế nên nó mãi là dằm trong tim nhói đau mỗi khi ai đó nhắc đến Chương về Trâm, về Quỳnh,
                        về những ký ức tươi đẹp ngày xưa đó. Nếu có thể, truyện nên dừng lại ở đoạn giữa là vừa đẹp, thế thì sẽ không còn những
                        giấc mơ ám ảnh Chương mỗi đêm dài, Trâm cũng sẽ ở lại với gia đình, và còn nhiều điều tiếc nuối khác nữa.</p>
                    <h3 class="detail_title">Chân thật, đời thường và đầy cảm xúc</h3>
                    <p class="detail_sub">Cái hay trong những câu truyện của nhà văn Nguyễn Nhật Ánh luôn là sự giản dị và chân thật. Đó là cuộc sống rất đỗi bình
                        thường của Chương, Lan Anh; tình cảm chân thành của Quỳnh; hay tính cách dữ dội của Trâm và Kim Dung. Những tình tiết
                        trong câu truyện vô cùng thường nhật, dễ thấy nhưng khi Nguyễn Nhật Ánh đưa vào truyện lại trở nên thi vị và đầy suy
                        ngẫm. “Còn chút gì để nhớ” gợi cho người đọc về những ký ức thời sinh viên với những đứa bạn lầy lội như Bảo, Kim Dung,
                        về quãng thời gian chật vật, thiếu thốn trong chiến tranh và cả những hậu quả đau lòng của nó không chỉ về vật chất mà
                        còn cả tinh thần.</p>
                    <div class="detail_img">
                        <img src="<?= PUBLIC_PATH . '/assets/img/detail_sp/con-chut-gi-de-nho-nguyen-nhat-anh-van-hoc-viet-nam.jpeg' ?>" alt="">
                    </div>
                    <p class="detail_sub">Đoạn kết của truyện chứa đầy những sự bất ngờ và đem lại nhiều cảm xúc cho người đọc. Suy cho cùng, kỉ niệm luôn đáng để
                        trân trọng nhưng đầy nỗi day dứt, tiếc nuối. Chắc hẳn nhiều người đọc sẽ rơi nước mắt khi đọc những trang cuối đầy cảm
                        xúc day dứt và ám ảnh của câu truyện. Đây hứa hẹn là cuốn sách để lại ấn tượng sâu đậm nhất trong tất cả các truyện ngắn
                        của nhà văn Nguyễn Nhật Ánh. Ngôn từ bình dị, không hoa mỹ, tình tiết và mạch truyện chậm rãi, có lúc cao trào đem lại
                        những xúc cảm khó quên và trên hết là cốt truyện rất quen thuộc, dễ dàng bắt gặp trong cuộc sống vì thế nên có thể chạm
                        đến trái tim của mỗi người đọc.

                        “…không biết trong vô vàn những kỉ niệm ngày xưa,…bây giờ có còn một chút gì để nhớ hay không.”</p>
                    <p class="detail_sub">Link mua sách</p>
                    <ul>
                        <li>Tiki:<a href="https://shorten.asia/ctyHr5af"> https://shorten.asia/ctyHr5af</a></li>
                        <li>Fahasa:<a href="https://shorten.asia/gDJXQk55"> https://shorten.asia/gDJXQk55</a></li>
                        <li>Shopee:<a href="https://shorten.asia/m3sY18zu"> https://shorten.asia/m3sY18zu</a></li>
                    </ul>
                    <div class="cart">
                        <div class="cart_body">
                            <div class="cart_img">
                                <img src="<?= PUBLIC_PATH . '/assets/img/detail_sp/Gấu.jpg' ?>" alt="">
                            </div>
                            <div class="cart_main">
                                <h3 class="cart_title">Gấu Mèo</h3>
                                <p class="cart_sub">Gấu Mèo
                                    Gấu là một tác giả lặng thầm dễ thương nhất, không yêu cầu gì nhiều ngoài chút nhuận bút cỏn con đủ để uống một
                                    ly sinh
                                    tố giữa trưa hè nóng bức</p>
                            </div>
                        </div>
                        <p class="detail_sub my-3">Đùa thôi, nói vậy chứ Gấu Mèo phụ trách nhiều chuyên mục lắm đấy nhé</p>
                    </div>
                </div>
            <?php endif ?>
            <div class="col-lg-4 main_right">
                <div class="line">
                    <p class="title">Những bài review sách tổng hợp</p>
                </div>
                <div class="row main_content">
                    <div class="row">
                        <?php if (isset($params['product']) && !empty($params['product'])) : ?>
                            <?php foreach ($params['product'] as $item) : ?>
                                <div class="col-12 main_content-item">
                                    <div class="main_content-info">
                                        <a href="<?= BASE_URL . '/product/detail/' . $item['id'] ?>">
                                            <h3 class="main_title"><?= $item['name'] ?></h3>
                                        </a>
                                        <p class="main_time">September 27, 2022</p>
                                    </div>
                                    <img src="<?= UPLOAD_PRODUCT_PATH . $item['thumb'] ?>" alt="">
                                </div>
                            <?php endforeach ?>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>