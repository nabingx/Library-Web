insert into "Category" ("Category_Name") VALUES ('Anime');
insert into "Category" ("Category_Name") VALUES ('Truyen');
insert into "Category" ("Category_Name") VALUES ('Sach');
insert into "Category" ("Category_Name") VALUES ('Tieu Thuyet');

insert into "Author" ("Author_Name") VALUES ('A');
insert into "Author" ("Author_Name") VALUES ('B');
insert into "Author" ("Author_Name") VALUES ('C Thuyet');

insert into "Library" ("BookName", "Category", "Version", "Author", "Public_Date", "Public_Company", "Overview", "Book_Status")
VALUES ('Abc', 'Anime', '1', 'A', '2000-02-01', 'Hanoi Company', 'sach nhu cac', true);
insert into "Library" ("BookName", "Category", "Version", "Author", "Public_Date", "Public_Company", "Overview", "Book_Status")
VALUES ('Abcd', 'Truyen', '1', 'B', '2000-02-01', 'Hanoi Company', 'sach nhu cac', true);
insert into "Library" ("BookName", "Category", "Version", "Author", "Public_Date", "Public_Company", "Overview", "Book_Status")
VALUES ('Abcde', 'Truyen', '1', 'A', '2000-02-01', 'Hanoi Company', 'sach nhu cac', true);
insert into "Library" ("BookName", "Category", "Version", "Author", "Public_Date", "Public_Company", "Overview", "Book_Status")
VALUES ('Abcdef', 'Tieu Thuyet', '1', 'C Thuyet', '2000-02-01', 'Hanoi Company', 'sach nhu cac', true);
insert into "Library" ("BookName", "Category", "Version", "Author", "Public_Date", "Public_Company", "Overview", "Book_Status")
VALUES ('afvas', 'Tieu Thuyet', '1', 'C Thuyet', '2000-02-01', 'Hanoi Company', 'sach nhu cac', true);
insert into "Library" ("BookName", "Category", "Version", "Author", "Public_Date", "Public_Company", "Overview", "Book_Status")
VALUES ('asdwqe', 'Tieu Thuyet', '1', 'C Thuyet', '2000-02-01', 'Hanoi Company', 'sach nhu cac', true);
insert into "Library" ("BookName", "Category", "Version", "Author", "Public_Date", "Public_Company", "Overview", "Book_Status")
VALUES ('gjhghj', 'Tieu Thuyet', '1', 'C Thuyet', '2000-02-01', 'Hanoi Company', 'sach nhu cac', true);
insert into "Library" ("BookName", "Category", "Version", "Author", "Public_Date", "Public_Company", "Overview", "Book_Status")
VALUES ('werwer', 'Anime', '1', 'B', '2000-02-01', 'Hanoi Company', 'sach nhu cac', true);
insert into "Library" ("BookName", "Category", "Version", "Author", "Public_Date", "Public_Company", "Overview", "Book_Status")
VALUES ('asdwdfhdgfqe', 'Anime', '1', 'A', '2000-02-01', 'Hanoi Company', 'sach nhu cac', true);
insert into "Library" ("BookName", "Category", "Version", "Author", "Public_Date", "Public_Company", "Overview", "Book_Status")
VALUES ('asdcvbncvbwqe', 'Truyen', '1', 'B', '2000-02-01', 'Hanoi Company', 'sach nhu cac', true);
insert into "Library" ("BookName", "Category", "Version", "Author", "Public_Date", "Public_Company", "Overview", "Book_Status")
VALUES ('11312563', 'Anime', '1', 'B', '2000-02-01', 'Hanoi Company', 'sach nhu cac', true);
insert into "Library" ("BookName", "Category", "Version", "Author", "Public_Date", "Public_Company", "Overview", "Book_Status")
VALUES ('asdf5623', 'Anime', '1', 'A', '2000-02-01', 'Hanoi Company', 'sach nhu cac', true);
insert into "Library" ("BookName", "Category", "Version", "Author", "Public_Date", "Public_Company", "Overview", "Book_Status")
VALUES ('asdfjghf498', 'Truyen', '1', 'A', '2000-02-01', 'Hanoi Company', 'sach nhu cac', true);
select *from "Library"

SELECT * FROM "Library"
LIMIT 12 OFFSET 12;

insert into "Admin" ("Email", "Password") VALUES ('root', '1');