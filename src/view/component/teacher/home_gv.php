<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ Giáo Viên</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Đặt lại cơ bản */


/* Container chính */
.container {
    max-width: 900px;
    width: 90%;
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    padding: 20px 30px;
    position: absolute;
    display: grid;
    margin-left: 20%;
}

/* Header */
.header .title {
    display: flex;
    font-size: 32px;
    color: #333;
    margin-bottom: 10px;
    text-align: center;
}

.header .sub-title {
    font-size: 18px;
    color: #666;
    margin-bottom: 20px;
}

/* Phần chức năng */
.majors {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;


}

.major-card {
    background: #16a085;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.major-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
}

.btn-card {
    display: block;
    text-decoration: none;
    color: #fff;
    font-size: 18px;
    font-weight: bold;
    padding: 15px 20px;
    border-radius: 10px;
    text-align: center;
    background: inherit;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.btn-card:hover {
    background-color: #149174;
    transform: scale(1.05);
}

/* Đăng xuất */
.logout {
    background-color: #e74c3c;
}

.logout:hover {
    background-color: #c0392b;
}

    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <h1 class="title">Chào mừng, Giáo viên!</h1><br>
        </header>

        <section class="majors">
            <div class="major-card">
                <a href="./src/view/them_ho_so.php" class="btn-card">
                   Duyệt hồ sơ học sinh đã đăng kí nghành 
                </a>
            </div>
            <div class="major-card">
                <a href="./src/view/dang_xuat_admin.php" class="btn-card">Đăng xuất</a>
            </div>
           
        </section>
    </div>
</body>
</html>
