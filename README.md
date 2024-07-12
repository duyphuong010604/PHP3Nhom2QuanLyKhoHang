Thiết Lập Dự Án Laravel
Giới Thiệu
Tài liệu này cung cấp hướng dẫn từng bước để thiết lập một dự án Laravel mới. Laravel là một framework ứng dụng web với cú pháp đẹp và dễ sử dụng nhằm mang lại trải nghiệm phát triển tuyệt vời.

Yêu Cầu
PHP >= 8.0
Composer
Máy chủ web (ví dụ: Apache, Nginx, Ampps, Laragron)
Cơ sở dữ liệu (MySQL)

Cài Đặt

1. Clone repository
   bash
   Sao chép mã:
   git clone https://github.com/your-username/your-repository.git
   cd your-repository

2. Cài đặt các thư viện phụ thuộc bằng Composer
   bash
   Sao chép mã:
   composer install

3. Tạo bản sao của file .env.example và đổi tên thành .env
   bash
   Sao chép mã:
   cp .env.example .env

4. Tạo khóa ứng dụng
   bash
   Sao chép mã:
   php artisan key:generate

5. Cấu hình file .env
   Mở file .env và cập nhật các thông tin cấu hình cơ sở dữ liệu và các thiết lập khác.

Ví dụ:

plaintext
Sao chép mã
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

6. Chạy các lệnh migration để tạo các bảng trong cơ sở dữ liệu
   bash
   Sao chép mã:
   php artisan migrate 7. Chạy dự án
   bash
   Sao chép mã:
   php artisan serve
   Truy cập vào địa chỉ http://localhost:8000 để xem ứng dụng Laravel của bạn.

7. Lưu ý về branchs coding
