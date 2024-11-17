<Style>/* Thiết lập cơ bản */

/* Thiết lập cơ bản */


.container {
    width: 100%;
    max-width: 800px; /* Giới hạn chiều rộng container */
    margin: 0 auto;
    padding: 20px;
    align-items: center; /* Căn giữa dọc */
    justify-content: center; /* Căn giữa ngang */
    background-color: #fff; /* Màu nền cho container */
    border-radius: 10px; /* Bo góc container */
    position: absolute;
    display: grid;
    margin-left: 24%;
}

/* Header */


.title {
    font-size: 36px;
    font-weight: bold;
}

.sub-title {
    font-size: 18px;
    color: #bdc3c7;
}

/* Section Majors */
.majors {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.major-card {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.major-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
}

.major-card  {
    background-color: #16a085;
    color: #fff;
    font-size: 18px;
    font-weight: bold;
    border: none;
    padding: 50px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
}
.major-card  button{
    background-color: #16a085;
    color: #fff;
    font-size: 18px;
    font-weight: bold;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.major-card button:hover {
    background-color: #149174;
    transform: scale(1.05);
}

/* Footer */
footer {
    text-align: center;
    margin-top: 20px;
    padding: 10px 0;
    background-color: #f4f4f4;
    border-top: 1px solid #ddd;
}

.btn-more {
    display: inline-block;
    padding: 10px 20px;
    background-color: #3498db;
    color: #fff;
    font-size: 18px;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.btn-more:hover {
    background-color: #2980b9;
    transform: translateY(-3px);
}

</Style>
<div>
<body>
    <div class="container home">
        <header>
            <h1 class="title">Chào mừng đến với trang chủ Admin</h1>
        </header>

        <section class="majors">
            <div class="major-card">
               <a href="./src/view/them_ho_so.php"><button type="submit" class="btn_navigate" name="menu" value="themHoSo">Duyệt hồ sơ</button></a> 
    
            </div>
            <div class="major-card">
                 <a href="./src/view/thong_ke_ho_so.php"><button type='submit' class='btn_navigate' name='menu' value='thongKe'>Thống kê</button></a>
            </div>
            <div class="major-card">
                <a href="./src/view/quan_ly_nganh.php"><button type='submit' class='btn_navigate' name='menu' value='phanQuyen'>Quản lý các ngành</button></a>
            </div>
            <div class="major-card">
                <a href="./src/view/them_nganh.php"><button type='submit' class='btn_navigate' name='menu' value='themNganh'>Thêm ngành</button></a>
            </div>
            <div class="major-card">
                <a href="./src/view/dang_xuat_admin.php"><button type="submit" class="btn_navigate" name="menu" value="dangXuat">Đăng xuất</button></a>
            </div>
        </section>

        
    </div>
</body>
</div>