-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 15, 2024 lúc 03:00 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlns`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `MaChucVu` int(11) NOT NULL,
  `TenChucVu` varchar(50) DEFAULT NULL,
  `MoTa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`MaChucVu`, `TenChucVu`, `MoTa`) VALUES
(1, 'Nhan Vien', 'Okeeeyy'),
(2, 'Truong Phong Tai Chinh', 'TP'),
(3, 'Truong Phong Nhan Su', 'Tp'),
(7, 'Truong Phong Y te', 'ssss');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hopdong`
--

CREATE TABLE `hopdong` (
  `MaHopDong` int(11) NOT NULL,
  `MaNhanVien` int(11) DEFAULT NULL,
  `LoaiHopDong` varchar(50) DEFAULT NULL,
  `NgayBatDau` date DEFAULT NULL,
  `NgayKetThuc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hopdong`
--

INSERT INTO `hopdong` (`MaHopDong`, `MaNhanVien`, `LoaiHopDong`, `NgayBatDau`, `NgayKetThuc`) VALUES
(1, 6, 'bán mạng', '2024-09-14', NULL),
(2, 1, 'cc', '2024-09-18', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luong`
--

CREATE TABLE `luong` (
  `MaLuong` int(11) NOT NULL,
  `MaNhanVien` int(11) DEFAULT NULL,
  `Thang` int(11) DEFAULT NULL,
  `Nam` int(11) DEFAULT NULL,
  `LuongCoBan` decimal(15,2) DEFAULT NULL,
  `Thuong` decimal(15,2) DEFAULT NULL,
  `KhauTru` decimal(15,2) DEFAULT NULL,
  `TongLuong` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `luong`
--

INSERT INTO `luong` (`MaLuong`, `MaNhanVien`, `Thang`, `Nam`, `LuongCoBan`, `Thuong`, `KhauTru`, `TongLuong`) VALUES
(1, 6, 4, 2024, 6500000.00, 500000.00, 500000.00, 6000000.00),
(2, 1, 3, 2000, 80000000.00, 80000000.00, 9000000.00, 151000000.00),
(3, 2, 3, 2001, 60000000.00, 5000000.00, 100000.00, 64900000.00),
(4, 7, 4, 2014, 7000000.00, 200000.00, 10000.00, 7190000.00),
(5, 3, 2, 2022, 5000000.00, 200000.00, 10000.00, 5190000.00),
(6, 4, 12, 2019, 5500000.00, 300000.00, 20000.00, 5780000.00),
(7, 5, 3, 2014, 6000000.00, 500000.00, 30000.00, 6470000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNhanVien` int(11) NOT NULL,
  `HoTen` varchar(100) DEFAULT NULL,
  `GioiTinh` varchar(10) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `DiaChi` varchar(100) DEFAULT NULL,
  `SoDienThoai` varchar(20) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `MaPhongBan` int(11) DEFAULT NULL,
  `MaChucVu` int(11) DEFAULT NULL,
  `NgayVaoLam` date DEFAULT NULL,
  `NgayNghiViec` date DEFAULT NULL,
  `AnhNhanVien` varchar(255) DEFAULT NULL,
  `TongCong` int(11) DEFAULT 0,
  `NgayChamCongCuoi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNhanVien`, `HoTen`, `GioiTinh`, `NgaySinh`, `DiaChi`, `SoDienThoai`, `Email`, `MaPhongBan`, `MaChucVu`, `NgayVaoLam`, `NgayNghiViec`, `AnhNhanVien`, `TongCong`, `NgayChamCongCuoi`) VALUES
(1, 'NGUYEN VAN A', 'Nam', '1984-08-09', 'HA TINH', '0987654321', 'abc@gmail.com', 1, 2, '2010-08-10', '2024-10-07', 'thay.jpg', 0, NULL),
(2, 'Lê Quả Thị', 'Nữ', '1990-09-12', 'quang nam', '0983999678', 'acccbc@gmail.com', 1, 1, '2010-08-10', NULL, 'n2.png', 0, NULL),
(3, 'nguvc', 'Nam', '1899-04-04', 'fafafsssssssss', '12345698762', 'sadas@gmail.com', 1, 1, '2010-12-31', NULL, '1725959895.png', 0, NULL),
(4, 'nguvcjj', 'Nam', '2024-09-13', 'da nang', '9876543456', 'q456t454mayman1@gmail.com', 1, 1, '2024-09-07', NULL, '1726277057.png', 0, NULL),
(5, 'bình ngu lắmm', 'Nam', '1982-01-06', 'da nang', '0843234567', 'aaaaabb@gmail.com', 2, 3, '2000-09-27', NULL, '1725961240.png', 0, NULL),
(6, 'Võ Tòngg', 'Nam', '1987-02-04', 'LSBB', '1234569875', 'tongvo@gmail.com', 1, 1, '2016-05-02', NULL, '1726123440.jpg', 14, '2024-10-15'),
(7, 'đạt', 'Nam', '2004-02-11', 'da nang', '08765945213', 'quamayka@gmail.com', 3, 7, '2024-10-04', NULL, '1728996208_nn3.png', 0, NULL),
(10, 'dmmmc', 'Nam', '2005-02-01', 'sss', '1234567876', 'quamayeeeman1@gmail.com', 1, 1, '2024-10-10', NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongban`
--

CREATE TABLE `phongban` (
  `MaPhongBan` int(11) NOT NULL,
  `TenPhongBan` varchar(50) DEFAULT NULL,
  `MaTruongPhong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phongban`
--

INSERT INTO `phongban` (`MaPhongBan`, `TenPhongBan`, `MaTruongPhong`) VALUES
(1, 'Tài Chínhh', 2),
(2, 'Nhân Sự', 3),
(3, 'Y Tế', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('bhMdODbvsG5LYib9agbSthbaaXQQ9hP7Gt5oXw5t', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidEdQTGlxeXB1SklvTEd6b0RrUG1DVXJSSzBHNzFCTlgyaGRlTHZKMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9uaGFudmllbnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjEwOiJNYU5oYW5WaWVuIjtpOjY7fQ==', 1728997125);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ungluong`
--

CREATE TABLE `ungluong` (
  `MaUngLuong` int(11) NOT NULL,
  `MaNhanVien` int(11) DEFAULT NULL,
  `NgayUngLuong` date DEFAULT NULL,
  `SoTien` decimal(15,2) DEFAULT NULL,
  `GhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ungluong`
--

INSERT INTO `ungluong` (`MaUngLuong`, `MaNhanVien`, `NgayUngLuong`, `SoTien`, `GhiChu`) VALUES
(1, 1, '2023-02-12', 2000000.00, 'aann');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `MaNhanVien` int(11) DEFAULT NULL,
  `Role` enum('admin','user') DEFAULT 'user',
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`, `MaNhanVien`, `Role`, `CreatedAt`, `UpdatedAt`) VALUES
(2, 'nguyenvana', '$2y$12$LycwBaRMc6l41P.UjHyI0uDMULeB.p3/1TWrIu44Q2vZEVdakmAZG', 1, 'admin', '2024-09-12 07:42:37', '2024-09-22 18:23:56'),
(3, 'votong13', '$2y$12$NUZ0nJdBoCBPO/RYGE5skuO.VDOw88ryo0e0IG6WvJ1pRZXHiW4DK', 6, 'user', '2024-09-12 08:40:39', '2024-09-12 08:40:39'),
(4, 'thiqua12', '$2y$12$Hoa3fffzKjZyCFU0N7col.I4QukxC9pMdMZnkxyy0tXyEX8.tmL6q', 2, 'user', '2024-09-14 03:23:44', '2024-09-14 03:23:44'),
(5, 'nguvc12', '$2y$12$EvFHZruCs8rfmUY5FPkcX.smSr5dQvOjzZMpVu3CQwzQNTiVA4y4C', 3, 'user', '2024-10-08 07:29:19', '2024-10-08 07:29:19'),
(6, 'binhbo123', '$2y$12$KaHi/bOPegGxJu.B28dwfOliXKZcT.FeQPmKlxYE50QLtmCeETRS6', 5, 'user', '2024-10-08 07:30:10', '2024-10-08 07:30:10'),
(7, 'dat123', '$2y$12$aaqj/CuVAmpMgTAZ8Z6zZOtWMh1WnWHpSuPvCuzp1BCvJzY4MnRmC', 7, 'admin', '2024-10-10 08:11:23', '2024-10-10 08:11:30');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`MaChucVu`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  ADD PRIMARY KEY (`MaHopDong`),
  ADD KEY `MaNhanVien` (`MaNhanVien`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `luong`
--
ALTER TABLE `luong`
  ADD PRIMARY KEY (`MaLuong`),
  ADD KEY `MaNhanVien` (`MaNhanVien`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNhanVien`),
  ADD KEY `MaPhongBan` (`MaPhongBan`),
  ADD KEY `MaChucVu` (`MaChucVu`);

--
-- Chỉ mục cho bảng `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`MaPhongBan`),
  ADD KEY `MaTruongPhong` (`MaTruongPhong`),
  ADD KEY `MaTruongPhong_2` (`MaTruongPhong`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ungluong`
--
ALTER TABLE `ungluong`
  ADD PRIMARY KEY (`MaUngLuong`),
  ADD KEY `MaNhanVien` (`MaNhanVien`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD KEY `MaNhanVien` (`MaNhanVien`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `MaChucVu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  MODIFY `MaHopDong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `luong`
--
ALTER TABLE `luong`
  MODIFY `MaLuong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNhanVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `phongban`
--
ALTER TABLE `phongban`
  MODIFY `MaPhongBan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `ungluong`
--
ALTER TABLE `ungluong`
  MODIFY `MaUngLuong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  ADD CONSTRAINT `hopdong_ibfk_1` FOREIGN KEY (`MaNhanVien`) REFERENCES `nhanvien` (`MaNhanVien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
