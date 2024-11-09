<Style>/* Thiết lập cơ bản */

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
}

.container {
    width: 60%;
    margin: 0 auto;
}

/* Header */
header {
    text-align: center;
    margin: 50px 0;
}

.title {
    font-size: 36px;
    font-weight: bold;
    color: #2c3e50;
}

.sub-title {
    font-size: 18px;
    color: #7f8c8d;
}

/* Section Majors */
.majors {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    margin-bottom: 50px;
}

.major-card {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.major-card h2 {
    font-size: 24px;
    color: #16a085;
}

.major-card p {
    font-size: 16px;
    color: #7f8c8d;
    margin-top: 10px;
}

/* Footer */
footer {
    text-align: center;
}

.btn-more {
    display: inline-block;
    padding: 10px 20px;
    background-color: #3498db;
    color: #fff;
    font-size: 18px;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn-more:hover {
    background-color: #2980b9;
}
</Style>
<div>
<body>
    <div class="container">
        <header>
            <h1 class="title">Chào mừng đến với trang chủ</h1>
            <p class="sub-title">Hãy khám phá các ngành học dưới đây và chọn ngành bạn yêu thích!</p>
        </header>

        <section class="majors">
            <div class="major-card">
                <h2>Ngành Công Nghệ Thông Tin</h2>
                <p>Một ngành học không thể thiếu trong kỷ nguyên công nghệ số!</p>
            </div>
            <div class="major-card">
                <h2>Ngành Quản Trị Kinh Doanh</h2>
                <p>Khám phá cách xây dựng và điều hành doanh nghiệp.</p>
            </div>
            <div class="major-card">
                <h2>Ngành Kỹ Thuật Điện</h2>
                <p>Điện và điện tử là phần không thể thiếu trong xã hội hiện đại.</p>
            </div>
            <div class="major-card">
                <h2>Ngành Dược Học</h2>
                <p>Chăm sóc sức khỏe và tạo ra những sản phẩm giúp cải thiện cuộc sống.</p>
            </div>
        </section>

        <footer>
            <a href="./src/view/them_ho_so.php" class="btn-more">Nộp hồ sơ &raquo;</a>
        </footer>
    </div>
</body>
</div>