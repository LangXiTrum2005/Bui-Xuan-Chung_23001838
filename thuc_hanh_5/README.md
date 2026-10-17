# Bài thực hành 5: Quản lý sản phẩm

Ứng dụng PHP + MySQL gồm quản lý sản phẩm, đăng ký, đăng nhập và đăng xuất. Toàn bộ mã nguồn và file SQL nằm trong `app/`; bên ngoài chỉ có file hướng dẫn này.

## Chạy với XAMPP

1. Bật Apache và MySQL trong XAMPP.
2. Nhập `app/database.sql` bằng phpMyAdmin, hoặc mở PowerShell tại thư mục này và chạy `& 'C:\xampp\mysql\bin\mysql.exe' -u root -e "source app/database.sql"`.
3. Mở `http://localhost/Bui-Xuan-Chung_23001838/thuc_hanh_5/app/`.

Tài khoản mẫu: `admin` / `admin123`. Đổi mật khẩu sau khi dùng thử. Có thể đăng ký thêm tài khoản trong ứng dụng.

Mặc định ứng dụng kết nối MySQL tại `127.0.0.1:3306`, database `shopping_cart`, tài khoản `root` và mật khẩu rỗng (cấu hình XAMPP thường gặp). Nếu khác, đặt các biến môi trường `DB_HOST`, `DB_PORT`, `DB_NAME`, `DB_USER`, `DB_PASSWORD` cho Apache/PHP.

Nếu đã nhập database của bài thực hành trước, file SQL này tạo thêm bảng `users` và chỉ thêm 5 sản phẩm mẫu khi bảng `products` đang trống.
