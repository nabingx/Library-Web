# Library-Web
 A simple library web for web programming's final exam
# Tutorial
 	CÁC BƯỚC CHẠY PROJECT 
I. Database
- Database được sử dụng : PostgreSQL
- Kết nối Database : Sửa thông tin kết nối trong file database/connect.php
- Các bước khởi tạo database:
	Bước 1 : Tạo database : Lệnh query trong file : createtable.sql
	Bước 2 : Thêm dữ liệu : Thực hiện query lần lượt : add_data.sql -> add_book.sql
Query tạo account Admin:
insert into public."Admin"("User_ID","Email","Password") values('1','admin@gmail.com','1');
Nếu muốn drop database : chạy query trong droptable
II. Các bước demo
1. User
- chạy file index.php trong HomePage ( Trang chủ )
- Thực hiện sign up rồi sign in
- Các chức năng : + Xem Profile : Đổi mật khẩu, xem các sách đã mượn
		  + Tìm kiếm sách ( Ajax) , xem thông tin sách, ấn mượn sách
		  + Khi xem thông tin sách có thể thêm comment ( Dưới sách hiển thị tất cả comment )
2. Admin
- Đăng nhập bằng quyền Admin
Account Admin : + Email : admin@gmail.com 
		+ Password : 1
- Xem thông tin quản lý sách, người dùng, tác giả,  loại sách
- Quản lý : + Disable sách bất kì ( không hiển thị sách đó với người dùng )
	    + Disable tác giả, loại sách ( không hiển thị tất cả sách của tác giả hoặc loại sách đó )
