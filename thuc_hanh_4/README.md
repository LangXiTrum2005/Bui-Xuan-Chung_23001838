# Bài thực hành 4: Quản lý sản phẩm

Ứng dụng PHP + MySQL theo cấu trúc `app/common`, `app/model`, `app/view`, `app/assets`.

## Chạy với XAMPP

1. Bật Apache và MySQL.
2. Nhập `database.sql` trong phpMyAdmin, hoặc mở PowerShell tại thư mục này và chạy `& 'C:\xampp\mysql\bin\mysql.exe' -u root -e "source database.sql"`.
3. Mở `http://localhost/Bui-Xuan-Chung_23001838/thuc_hanh_4/`. Trang gốc sẽ chuyển vào `app/`.

Mặc định ứng dụng dùng MySQL tại `127.0.0.1:3306`, database `shopping_cart`, tài khoản `root`, mật khẩu rỗng. Có thể thay bằng các biến môi trường `DB_HOST`, `DB_PORT`, `DB_NAME`, `DB_USER`, `DB_PASSWORD`.

File SQL có thể nhập lại mà không tạo trùng sản phẩm mẫu. Nếu database `shopping_cart` đã có từ bài thực hành 5, bài này dùng chung bảng `products` hiện có.
