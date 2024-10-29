-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 29, 2024 at 01:58 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ogani_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `avatar`, `created_at`, `updated_at`) VALUES
(2, 'Dan Nong Dan', 'uploads/authors/1725113416-details-author.jpg', '2024-08-31 21:10:16', '2024-08-31 21:10:16');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(300) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Thịt Tươi', 'uploads/categories/1724296035-cat-5.jpg', '2024-08-22 09:35:10', '2024-08-22 03:07:15'),
(2, 'Rau', 'uploads/categories/1724296072-cat-3.jpg', '2024-08-22 09:35:10', '2024-08-22 03:07:52'),
(3, 'Thức ăn nhanh', 'uploads/categories/1724296095-feature-6.jpg', '2024-08-22 09:35:10', '2024-08-22 03:08:15'),
(5, 'Hoa Quả Tươi', 'uploads/categories/1724296107-cat-1.jpg', '2024-08-22 09:35:10', '2024-08-22 03:08:27'),
(6, 'Trái Cây Sấy Khô', 'uploads/categories/1724296138-cat-2.jpg', '2024-08-22 10:08:58', '2024-08-22 10:08:58'),
(7, 'Nước Trái Cây', 'uploads/categories/1724296182-cat-4.jpg', '2024-08-22 10:09:42', '2024-08-22 10:09:42');

-- --------------------------------------------------------

--
-- Table structure for table `category_post`
--

CREATE TABLE `category_post` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category_post`
--

INSERT INTO `category_post` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Thực Phẩm', '2024-08-31 20:35:05', '2024-08-31 20:35:05'),
(3, 'Mẹo Nấu Ăn', '2024-08-31 20:37:00', '2024-08-31 20:37:00'),
(4, 'Mẹo gia đình', '2024-09-06 09:31:38', '2024-09-06 09:31:38');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  `content` longtext NOT NULL,
  `date_comment` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `product_id`, `user_id`, `content`, `date_comment`) VALUES
(1, 18, 26, 'ffff', '2024-08-28 00:00:00'),
(2, 24, 26, 'ffff', '2024-08-28 00:00:00'),
(5, 21, 8, 'Dưa Hấu Ngon Lắm Ạ ', '2024-08-28 00:00:00'),
(6, 15, 7, 'Sản  phẩm rất tốt\r\n', '2024-08-28 00:00:00'),
(10, 12, 8, 'Chuối ngon lắm ạ', '2024-08-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `thumbnail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `product_id`, `thumbnail`) VALUES
(7, 12, '');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(300) NOT NULL,
  `author_id` int NOT NULL,
  `cate_id` int NOT NULL,
  `view_count` int NOT NULL DEFAULT '0',
  `excerpt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `created_at`, `updated_at`, `image`, `author_id`, `cate_id`, `view_count`, `excerpt`) VALUES
(2, ' 6 Cách Chuẩn Bị Bữa Sáng Siêu Ngon', '<p>Bữa s&aacute;ng l&agrave; bữa ăn quan trọng nhất trong ng&agrave;y, cung cấp năng lượng để bạn bắt đầu một ng&agrave;y mới với tinh thần sảng kho&aacute;i v&agrave; cơ thể khỏe mạnh. Tuy nhi&ecirc;n, kh&ocirc;ng phải ai cũng c&oacute; thời gian để chuẩn bị những m&oacute;n ăn phức tạp v&agrave;o buổi s&aacute;ng. Dưới đ&acirc;y l&agrave; 6 c&aacute;ch chuẩn bị bữa s&aacute;ng si&ecirc;u ngon, dễ l&agrave;m v&agrave; đầy dinh dưỡng m&agrave; bạn c&oacute; thể thử ngay tại nh&agrave;.</p>\r\n<p><strong>1. B&aacute;nh m&igrave; nướng bơ v&agrave; tr&aacute;i c&acirc;y</strong><br>Một l&aacute;t b&aacute;nh m&igrave; nướng v&agrave;ng rụm, phết l&ecirc;n một lớp bơ tươi b&eacute;o ngậy v&agrave; th&ecirc;m v&agrave;i l&aacute;t tr&aacute;i c&acirc;y y&ecirc;u th&iacute;ch như chuối, d&acirc;u t&acirc;y, hoặc kiwi l&agrave; bạn đ&atilde; c&oacute; ngay một bữa s&aacute;ng ngon l&agrave;nh. Đ&acirc;y l&agrave; m&oacute;n ăn kh&ocirc;ng chỉ đẹp mắt m&agrave; c&ograve;n cung cấp đầy đủ chất xơ, vitamin v&agrave; năng lượng cần thiết để bắt đầu ng&agrave;y mới.</p>\r\n<p><strong>2. Yến mạch qua đ&ecirc;m (Overnight Oats)</strong><br>Nếu bạn kh&ocirc;ng c&oacute; nhiều thời gian v&agrave;o buổi s&aacute;ng, yến mạch qua đ&ecirc;m l&agrave; lựa chọn ho&agrave;n hảo. Chỉ cần trộn yến mạch với sữa hoặc sữa chua, th&ecirc;m một ch&uacute;t mật ong v&agrave; c&aacute;c loại hạt như hạnh nh&acirc;n, &oacute;c ch&oacute;, sau đ&oacute; để trong tủ lạnh qua đ&ecirc;m. S&aacute;ng h&ocirc;m sau, bạn chỉ việc lấy ra v&agrave; thưởng thức một bữa s&aacute;ng bổ dưỡng, gi&agrave;u chất xơ v&agrave; protein.</p>\r\n<p><strong>3. Trứng chi&ecirc;n cuộn rau củ</strong><br>M&oacute;n trứng chi&ecirc;n cuộn rau củ kh&ocirc;ng chỉ ngon miệng m&agrave; c&ograve;n rất bổ dưỡng. Bạn c&oacute; thể sử dụng c&aacute;c loại rau củ như c&agrave; rốt, ớt chu&ocirc;ng, h&agrave;nh l&aacute; v&agrave; nấm để l&agrave;m nh&acirc;n cuộn trong trứng. M&oacute;n ăn n&agrave;y kh&ocirc;ng chỉ gi&uacute;p bạn nạp đủ protein v&agrave; vitamin m&agrave; c&ograve;n mang đến hương vị thơm ngon, hấp dẫn.</p>\r\n<p><strong>4. Sinh tố xanh (Green Smoothie)</strong><br>Sinh tố xanh l&agrave; lựa chọn tuyệt vời cho những ai muốn c&oacute; một bữa s&aacute;ng nhẹ nh&agrave;ng nhưng đầy năng lượng. Bạn chỉ cần xay nhuyễn c&aacute;c loại rau xanh như cải b&oacute; x&ocirc;i, cải xoăn, kết hợp với tr&aacute;i c&acirc;y như chuối, t&aacute;o v&agrave; một ch&uacute;t sữa chua. M&oacute;n sinh tố n&agrave;y kh&ocirc;ng chỉ gi&agrave;u chất xơ v&agrave; vitamin m&agrave; c&ograve;n gi&uacute;p thanh lọc cơ thể, tốt cho hệ ti&ecirc;u h&oacute;a.</p>\r\n<p><strong>5. B&aacute;nh pancake chuối</strong><br>B&aacute;nh pancake chuối l&agrave; m&oacute;n ăn l&yacute; tưởng cho bữa s&aacute;ng cuối tuần. Chỉ cần trộn bột m&igrave;, sữa v&agrave; trứng với chuối nghiền, sau đ&oacute; chi&ecirc;n v&agrave;ng tr&ecirc;n chảo n&oacute;ng. M&oacute;n b&aacute;nh n&agrave;y mềm mịn, thơm lừng m&ugrave;i chuối v&agrave; c&oacute; thể ăn k&egrave;m với mật ong hoặc siro để th&ecirc;m phần hấp dẫn.</p>', '2024-08-31 21:38:00', '2024-09-01 06:37:57', 'uploads/posts/1725115080-blog-2.jpg', 2, 3, 43, '<p>Bữa s&aacute;ng l&agrave; bữa ăn quan trọng nhất trong ng&agrave;y, cung cấp năng lượng để bạn bắt đầu một ng&agrave;y mới với tinh thần sảng kho&aacute;i v&agrave; cơ thể khỏe mạnh.</p>'),
(3, 'Thời điểm bạn cần loại bỏ tỏi khỏi menu', '<p>Tỏi l&agrave; một trong những gia vị phổ biến v&agrave; quen thuộc trong nhiều m&oacute;n ăn, kh&ocirc;ng chỉ v&igrave; hương vị đặc trưng m&agrave; c&ograve;n nhờ những lợi &iacute;ch sức khỏe m&agrave; n&oacute; mang lại. Tuy nhi&ecirc;n, kh&ocirc;ng phải l&uacute;c n&agrave;o tỏi cũng l&agrave; lựa chọn tốt nhất trong chế độ ăn uống của bạn. Dưới đ&acirc;y l&agrave; những thời điểm m&agrave; bạn n&ecirc;n c&acirc;n nhắc loại bỏ tỏi khỏi menu:</p>\r\n<p><strong>1. Khi bạn gặp vấn đề về dạ d&agrave;y</strong><br>Tỏi c&oacute; thể g&acirc;y k&iacute;ch ứng dạ d&agrave;y đối với những người bị vi&ecirc;m lo&eacute;t dạ d&agrave;y hoặc rối loạn ti&ecirc;u h&oacute;a. Chất allicin trong tỏi, mặc d&ugrave; c&oacute; nhiều lợi &iacute;ch, nhưng cũng c&oacute; thể g&acirc;y ra cảm gi&aacute;c n&oacute;ng r&aacute;t, đầy hơi, v&agrave; thậm ch&iacute; l&agrave; buồn n&ocirc;n. Nếu bạn đang gặp phải c&aacute;c vấn đề n&agrave;y, việc loại bỏ tỏi khỏi chế độ ăn c&oacute; thể gi&uacute;p giảm triệu chứng v&agrave; bảo vệ ni&ecirc;m mạc dạ d&agrave;y.</p>\r\n<p><strong>2. Trước c&aacute;c cuộc phỏng vấn hoặc sự kiện quan trọng</strong><br>Tỏi c&oacute; m&ugrave;i hăng đặc trưng v&agrave; c&oacute; thể lưu lại trong hơi thở trong thời gian d&agrave;i. Nếu bạn c&oacute; cuộc phỏng vấn, thuyết tr&igrave;nh, hoặc gặp gỡ kh&aacute;ch h&agrave;ng quan trọng, việc loại bỏ tỏi khỏi bữa ăn trước đ&oacute; sẽ gi&uacute;p bạn tr&aacute;nh được t&igrave;nh huống k&eacute;m tự tin v&igrave; m&ugrave;i hơi thở kh&ocirc;ng dễ chịu.</p>\r\n<p><strong>3. Khi bạn chuẩn bị phẫu thuật</strong><br>Tỏi c&oacute; khả năng l&agrave;m lo&atilde;ng m&aacute;u, điều n&agrave;y c&oacute; thể tăng nguy cơ chảy m&aacute;u trong c&aacute;c ca phẫu thuật. Nếu bạn sắp c&oacute; một cuộc phẫu thuật hoặc tiểu phẫu, c&aacute;c b&aacute;c sĩ thường khuyến c&aacute;o bạn n&ecirc;n ngừng sử dụng tỏi trong khoảng 1-2 tuần trước khi thực hiện để giảm thiểu nguy cơ n&agrave;y.</p>\r\n<p><strong>4. Khi bạn đang d&ugrave;ng thuốc chống đ&ocirc;ng m&aacute;u</strong><br>Tỏi c&oacute; thể tương t&aacute;c với c&aacute;c loại thuốc chống đ&ocirc;ng m&aacute;u, như warfarin, dẫn đến nguy cơ chảy m&aacute;u cao hơn. Nếu bạn đang sử dụng c&aacute;c loại thuốc n&agrave;y, h&atilde;y tham khảo &yacute; kiến b&aacute;c sĩ để xem liệu c&oacute; cần hạn chế hoặc loại bỏ tỏi khỏi chế độ ăn uống của m&igrave;nh hay kh&ocirc;ng.</p>\r\n<p><strong>5. Khi bạn bị dị ứng với tỏi</strong><br>Dị ứng với tỏi kh&ocirc;ng phổ biến, nhưng một số người c&oacute; thể phản ứng với tỏi với c&aacute;c triệu chứng như ph&aacute;t ban, ngứa ng&aacute;y, sưng ph&ugrave;, hoặc thậm ch&iacute; l&agrave; kh&oacute; thở. Nếu bạn nhận thấy bất kỳ dấu hiệu n&agrave;o của dị ứng sau khi ăn tỏi, tốt nhất l&agrave; loại bỏ ho&agrave;n to&agrave;n tỏi khỏi thực đơn của m&igrave;nh v&agrave; tham khảo &yacute; kiến b&aacute;c sĩ.</p>\r\n<p><strong>Kết Luận</strong><br>Tỏi l&agrave; một gia vị tuyệt vời với nhiều lợi &iacute;ch cho sức khỏe, nhưng cũng c&oacute; những t&igrave;nh huống đặc biệt m&agrave; bạn cần c&acirc;n nhắc loại bỏ tỏi khỏi chế độ ăn uống của m&igrave;nh. H&atilde;y lắng nghe cơ thể v&agrave; tham khảo &yacute; kiến chuy&ecirc;n gia y tế để c&oacute; chế độ ăn uống ph&ugrave; hợp nhất với sức khỏe của bạn.</p>', '2024-09-01 13:38:39', '2024-09-01 13:38:39', 'uploads/posts/1725172719-blog-4.jpg', 2, 3, 3, '<p>Tỏi l&agrave; một trong những gia vị phổ biến v&agrave; quen thuộc trong nhiều m&oacute;n ăn, kh&ocirc;ng chỉ v&igrave; hương vị đặc trưng m&agrave; c&ograve;n nhờ những lợi &iacute;ch sức khỏe m&agrave; n&oacute; mang lại.</p>'),
(4, '07 loại rau bảo vệ gan', '<p>Gan l&agrave; cơ quan quan trọng trong cơ thể, đảm nhiệm nhiều chức năng như giải độc, sản xuất mật, v&agrave; chuyển h&oacute;a c&aacute;c chất dinh dưỡng. Để duy tr&igrave; sức khỏe của gan, việc bổ sung c&aacute;c loại thực phẩm gi&agrave;u dinh dưỡng, đặc biệt l&agrave; rau xanh, v&agrave;o chế độ ăn uống h&agrave;ng ng&agrave;y l&agrave; rất cần thiết. Dưới đ&acirc;y l&agrave; 9 loại rau c&oacute; khả năng bảo vệ v&agrave; hỗ trợ chức năng gan hiệu quả:</p>\r\n<p><strong>1. Cải b&oacute; x&ocirc;i (Rau ch&acirc;n vịt)</strong><br>Cải b&oacute; x&ocirc;i chứa nhiều chất chống oxy h&oacute;a như glutathione, gi&uacute;p gan loại bỏ độc tố v&agrave; giảm thiểu tổn thương gan. H&agrave;m lượng cao chất xơ trong cải b&oacute; x&ocirc;i cũng hỗ trợ qu&aacute; tr&igrave;nh ti&ecirc;u h&oacute;a v&agrave; ngăn ngừa t&aacute;o b&oacute;n.</p>\r\n<p><strong>2. Cải xoăn</strong><br>Cải xoăn l&agrave; một loại rau gi&agrave;u vitamin K, vitamin C v&agrave; c&aacute;c chất chống oxy h&oacute;a kh&aacute;c, gi&uacute;p giảm vi&ecirc;m v&agrave; bảo vệ gan khỏi c&aacute;c tổn thương do gốc tự do g&acirc;y ra. Đ&acirc;y cũng l&agrave; loại rau l&yacute; tưởng để hỗ trợ qu&aacute; tr&igrave;nh thải độc của gan.</p>\r\n<p><strong>3. B&ocirc;ng cải xanh (S&uacute;p lơ xanh)</strong><br>B&ocirc;ng cải xanh chứa sulforaphane, một hợp chất c&oacute; khả năng k&iacute;ch hoạt c&aacute;c enzym bảo vệ gan v&agrave; thải độc cơ thể. Thường xuy&ecirc;n ăn b&ocirc;ng cải xanh gi&uacute;p gan hoạt động hiệu quả hơn trong việc xử l&yacute; c&aacute;c chất độc hại.</p>\r\n<p><strong>4. Rau m&ugrave;i (Ng&ograve;)</strong><br>Rau m&ugrave;i c&oacute; t&aacute;c dụng thanh lọc cơ thể, hỗ trợ qu&aacute; tr&igrave;nh thải độc của gan. C&aacute;c chất chống vi&ecirc;m v&agrave; chất chống oxy h&oacute;a trong rau m&ugrave;i gi&uacute;p giảm thiểu tổn thương gan v&agrave; cải thiện chức năng gan tổng thể.</p>\r\n<p><strong>5. Rau diếp c&aacute;</strong><br>Rau diếp c&aacute; c&oacute; khả năng l&agrave;m m&aacute;t gan v&agrave; giải độc cơ thể. Đ&acirc;y l&agrave; loại rau c&oacute; t&aacute;c dụng lợi tiểu, gi&uacute;p cơ thể loại bỏ c&aacute;c chất độc hại v&agrave; giảm tải cho gan trong qu&aacute; tr&igrave;nh xử l&yacute; độc tố.</p>\r\n<p><strong>6. Rau m&aacute;</strong><br>Rau m&aacute; kh&ocirc;ng chỉ gi&uacute;p giải nhiệt, thanh lọc gan m&agrave; c&ograve;n hỗ trợ tuần ho&agrave;n m&aacute;u. C&aacute;c chất chống oxy h&oacute;a trong rau m&aacute; gi&uacute;p bảo vệ tế b&agrave;o gan khỏi sự tấn c&ocirc;ng của c&aacute;c gốc tự do v&agrave; hỗ trợ qu&aacute; tr&igrave;nh t&aacute;i tạo tế b&agrave;o gan.</p>\r\n<p><strong>7. Rau ng&oacute;t</strong><br>Rau ng&oacute;t gi&agrave;u vitamin C, gi&uacute;p tăng cường hệ miễn dịch v&agrave; hỗ trợ chức năng gan. Đ&acirc;y cũng l&agrave; loại rau c&oacute; khả năng giải độc, gi&uacute;p cơ thể loại bỏ c&aacute;c chất cặn b&atilde; v&agrave; l&agrave;m sạch gan.</p>\r\n<p><strong>Kết Luận</strong><br>Việc bổ sung c&aacute;c loại rau xanh gi&agrave;u dinh dưỡng v&agrave;o bữa ăn h&agrave;ng ng&agrave;y kh&ocirc;ng chỉ gi&uacute;p cải thiện chức năng gan m&agrave; c&ograve;n bảo vệ gan khỏi c&aacute;c tổn thương do độc tố g&acirc;y ra. H&atilde;y chọn cho m&igrave;nh những loại rau ph&ugrave; hợp để c&oacute; một l&aacute; gan khỏe mạnh v&agrave; cơ thể tr&agrave;n đầy năng lượng!</p>', '2024-09-01 13:39:55', '2024-09-01 13:39:55', 'uploads/posts/1725172795-blog-6.jpg', 2, 2, 12, '<p>Gan l&agrave; cơ quan quan trọng trong cơ thể, đảm nhiệm nhiều chức năng như giải độc, sản xuất mật, v&agrave; chuyển h&oacute;a c&aacute;c chất dinh dưỡng.</p>'),
(5, '5 Mẹo Gia Đình Đơn Giản Giúp Cuộc Sống Dễ Dàng Hơn', '<p>Cuộc sống bận rộn khiến nhiều người kh&ocirc;ng c&oacute; đủ thời gian chăm s&oacute;c gia đ&igrave;nh v&agrave; nh&agrave; cửa một c&aacute;ch hiệu quả. Tuy nhi&ecirc;n, chỉ cần &aacute;p dụng một số mẹo nhỏ, bạn c&oacute; thể tiết kiệm thời gian v&agrave; c&ocirc;ng sức, đồng thời giữ cho ng&ocirc;i nh&agrave; lu&ocirc;n gọn g&agrave;ng, sạch sẽ. Dưới đ&acirc;y l&agrave; 5 mẹo gia đ&igrave;nh hữu &iacute;ch:</p>\r\n<p><strong>1. Sử dụng giấm trắng để l&agrave;m sạch nh&agrave; cửa</strong> Giấm trắng l&agrave; một nguy&ecirc;n liệu thi&ecirc;n nhi&ecirc;n tuyệt vời để l&agrave;m sạch mọi thứ, từ k&iacute;nh, mặt b&agrave;n cho đến bồn rửa b&aacute;t. Chỉ cần pha lo&atilde;ng giấm với nước theo tỉ lệ 1:1, bạn đ&atilde; c&oacute; dung dịch tẩy rửa an to&agrave;n v&agrave; hiệu quả.</p>\r\n<p><strong>2. Tổ chức kh&ocirc;ng gian bếp hợp l&yacute;</strong> Sắp xếp c&aacute;c dụng cụ nh&agrave; bếp theo từng khu vực sử dụng để dễ d&agrave;ng t&igrave;m kiếm. V&iacute; dụ, h&atilde;y đặt những dụng cụ nấu ăn gần bếp, c&ograve;n b&aacute;t đĩa th&igrave; n&ecirc;n để gần khu vực rửa.</p>\r\n<p><strong>3. D&ugrave;ng baking soda khử m&ugrave;i tủ lạnh</strong> Đặt một b&aacute;t nhỏ chứa baking soda v&agrave;o tủ lạnh, n&oacute; sẽ gi&uacute;p hấp thụ m&ugrave;i kh&oacute; chịu v&agrave; giữ tủ lạnh lu&ocirc;n thơm tho.</p>\r\n<p><strong>4. L&agrave;m sạch thảm bằng bột bắp</strong> Nếu kh&ocirc;ng c&oacute; m&aacute;y h&uacute;t bụi chuy&ecirc;n dụng, bạn c&oacute; thể d&ugrave;ng bột bắp để h&uacute;t ẩm v&agrave; l&agrave;m sạch thảm. Chỉ cần rắc bột l&ecirc;n thảm, để khoảng 20 ph&uacute;t rồi h&uacute;t sạch.</p>\r\n<p><strong>5. Tạo th&oacute;i quen dọn dẹp h&agrave;ng ng&agrave;y</strong> D&agrave;nh 15 ph&uacute;t mỗi ng&agrave;y để dọn dẹp những khu vực ch&iacute;nh trong nh&agrave; như ph&ograve;ng kh&aacute;ch, nh&agrave; bếp. Th&oacute;i quen nhỏ n&agrave;y sẽ gi&uacute;p bạn tr&aacute;nh bị ngập trong đống việc nh&agrave; v&agrave;o cuối tuần.</p>', '2024-09-06 15:05:35', '2024-09-06 15:05:35', 'uploads/posts/1725609935-blog-5.jpg', 2, 4, 0, '<p>chỉ cần &aacute;p dụng một số mẹo nhỏ, bạn c&oacute; thể tiết kiệm thời gian v&agrave; c&ocirc;ng sức, đồng thời giữ cho ng&ocirc;i nh&agrave; lu&ocirc;n gọn g&agrave;ng, sạch sẽ. Dưới đ&acirc;y l&agrave; 5 mẹo gia đ&igrave;nh hữu &iacute;ch:</p>'),
(6, 'Lợi Ích Tuyệt Vời Của Nước Ép Trái Cây Đối Với Sức Khỏe', '<p>Nước &eacute;p tr&aacute;i c&acirc;y kh&ocirc;ng chỉ l&agrave; một thức uống thơm ngon m&agrave; c&ograve;n mang lại nhiều lợi &iacute;ch to lớn cho sức khỏe. Với nguồn vitamin, kho&aacute;ng chất v&agrave; chất chống oxy h&oacute;a dồi d&agrave;o, nước &eacute;p tr&aacute;i c&acirc;y c&oacute; thể gi&uacute;p cơ thể lu&ocirc;n khỏe mạnh v&agrave; tươi trẻ. Dưới đ&acirc;y l&agrave; một số lợi &iacute;ch quan trọng của nước &eacute;p tr&aacute;i c&acirc;y:</p>\r\n<h3>1. <strong>Cung cấp Vitamin v&agrave; Kho&aacute;ng Chất Dồi D&agrave;o</strong></h3>\r\n<p>Nước &eacute;p tr&aacute;i c&acirc;y tự nhi&ecirc;n chứa rất nhiều loại vitamin như vitamin C, A v&agrave; E. Những vitamin n&agrave;y kh&ocirc;ng chỉ gi&uacute;p tăng cường hệ miễn dịch m&agrave; c&ograve;n duy tr&igrave; sức khỏe cho da v&agrave; mắt. Một ly nước cam mỗi ng&agrave;y c&oacute; thể cung cấp đủ lượng vitamin C cần thiết, gi&uacute;p ph&ograve;ng ngừa cảm lạnh v&agrave; tăng cường khả năng hấp thụ sắt.</p>\r\n<h3>2. <strong>Gi&agrave;u Chất Chống Oxy H&oacute;a</strong></h3>\r\n<p>Nhiều loại nước &eacute;p như nho, lựu hay d&acirc;u t&acirc;y chứa lượng lớn chất chống oxy h&oacute;a, gi&uacute;p cơ thể chống lại c&aacute;c gốc tự do &ndash; nguy&ecirc;n nh&acirc;n g&acirc;y l&atilde;o h&oacute;a v&agrave; c&aacute;c bệnh m&atilde;n t&iacute;nh như tim mạch v&agrave; ung thư.</p>\r\n<h3>3. <strong>Hỗ Trợ Ti&ecirc;u H&oacute;a</strong></h3>\r\n<p>Một số loại nước &eacute;p như nước &eacute;p t&aacute;o, l&ecirc; c&oacute; t&aacute;c dụng k&iacute;ch th&iacute;ch hệ ti&ecirc;u h&oacute;a, gi&uacute;p ngăn ngừa t&aacute;o b&oacute;n v&agrave; cải thiện chức năng ruột. Ch&uacute;ng c&ograve;n gi&agrave;u chất xơ gi&uacute;p cơ thể ti&ecirc;u h&oacute;a dễ d&agrave;ng hơn.</p>\r\n<h3>4. <strong>Tăng Cường Năng Lượng</strong></h3>\r\n<p>Khi bạn cảm thấy mệt mỏi hoặc uể oải, một ly nước &eacute;p tr&aacute;i c&acirc;y như dứa hoặc cam c&oacute; thể cung cấp cho bạn nguồn năng lượng nhanh ch&oacute;ng nhờ lượng đường tự nhi&ecirc;n v&agrave; dưỡng chất c&oacute; trong ch&uacute;ng.</p>\r\n<h3>5. <strong>Giữ Da Lu&ocirc;n S&aacute;ng Mịn</strong></h3>\r\n<p>C&aacute;c loại nước &eacute;p gi&agrave;u vitamin C như d&acirc;u t&acirc;y, kiwi gi&uacute;p th&uacute;c đẩy sản sinh collagen, l&agrave;m cho da trở n&ecirc;n căng mịn v&agrave; s&aacute;ng khỏe. Ngo&agrave;i ra, chất chống oxy h&oacute;a trong nước &eacute;p c&ograve;n bảo vệ da khỏi t&aacute;c động của m&ocirc;i trường v&agrave; l&agrave;m chậm qu&aacute; tr&igrave;nh l&atilde;o h&oacute;a.</p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\"></div>', '2024-09-06 15:10:29', '2024-09-06 15:10:29', 'uploads/posts/1725610229-blog-1.jpg', 2, 4, 0, '<p>Nước &eacute;p tr&aacute;i c&acirc;y kh&ocirc;ng chỉ l&agrave; một thức uống mang lại nhiều lợi &iacute;ch to lớn cho sức khỏe. Với nguồn vitamin, kho&aacute;ng chất, nước &eacute;p tr&aacute;i c&acirc;y c&oacute; thể gi&uacute;p cơ thể lu&ocirc;n khỏe mạnh.</p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\"></div>');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `cate_id` int NOT NULL,
  `title` varchar(300) NOT NULL,
  `price` int NOT NULL COMMENT 'giá giảm',
  `discount` int NOT NULL COMMENT 'Giá gốc',
  `description` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `view_count` int NOT NULL DEFAULT '0',
  `image` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `quantity` int NOT NULL,
  `weight` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cate_id`, `title`, `price`, `discount`, `description`, `created_at`, `updated_at`, `view_count`, `image`, `quantity`, `weight`) VALUES
(11, 1, 'Thịt Bò Tươi Ngon', 270000, 300000, '<ul>\r\n<li><strong>Kết cấu</strong>: Thịt lợn c&oacute; kết cấu đa dạng, từ mềm v&agrave; mọng nước ở phần thăn đến dai hơn ở phần vai. T&ugrave;y v&agrave;o c&aacute;ch chế biến, thịt c&oacute; thể mềm tan trong miệng hoặc c&oacute; độ dai th&uacute; vị.</li>\r\n<li><strong>Hương vị</strong>: Thịt B&ograve; c&oacute; hương vị đậm đ&agrave; v&agrave; hơi ngọt, được m&ocirc; tả l&agrave; nhẹ nh&agrave;ng hơn thịt b&ograve; nhưng đậm đ&agrave; hơn thịt g&agrave;. Thịt lợn dễ thấm gia vị v&agrave; nước ướp, l&agrave;m cho n&oacute; trở th&agrave;nh nền tảng tuyệt vời cho nhiều m&oacute;n ăn.</li>\r\n</ul>', '2024-08-21 15:34:18', '2024-08-27 13:35:24', 0, 'uploads/products/1724293366-product-1.jpg', 0, '3 kg'),
(12, 5, 'Chuối', 25000, 30000, '<p>Chuối l&agrave; một loại tr&aacute;i c&acirc;y nhiệt đới phổ biến, thuộc chi Musa. Chuối c&oacute; nguồn gốc từ Đ&ocirc;ng Nam &Aacute; v&agrave; được trồng rộng r&atilde;i ở c&aacute;c v&ugrave;ng nhiệt đới tr&ecirc;n to&agrave;n thế giới. Quả chuối c&oacute; h&igrave;nh d&aacute;ng cong, lớp vỏ ngo&agrave;i m&agrave;u v&agrave;ng khi ch&iacute;n, b&ecirc;n trong l&agrave; phần thịt mềm m&agrave;u trắng ng&agrave; hoặc v&agrave;ng. Tốt cho hệ ti&ecirc;u h&oacute;a: Chất xơ trong chuối gi&uacute;p điều h&ograve;a qu&aacute; tr&igrave;nh ti&ecirc;u h&oacute;a, ngăn ngừa t&aacute;o b&oacute;n.Cung cấp năng lượng: Chuối chứa carbohydrate dễ ti&ecirc;u h&oacute;a, cung cấp năng lượng nhanh ch&oacute;ng cho cơ thể.</p>', '2024-08-22 09:21:34', '2024-08-27 13:34:09', 500, 'uploads/products/1724293294-product-2.jpg', 3, '0,5 kg'),
(13, 3, 'Đùi Gà KFC ', 35000, 45000, '<p>Đ&ugrave;i g&agrave; KFC l&agrave; một trong những m&oacute;n ăn nổi tiếng v&agrave; được y&ecirc;u th&iacute;ch tại c&aacute;c cửa h&agrave;ng KFC (Kentucky Fried Chicken) tr&ecirc;n to&agrave;n thế giới. Đ&ugrave;i g&agrave; KFC nổi bật với lớp vỏ gi&ograve;n rụm, được tẩm ướp gia vị đặc trưng theo c&ocirc;ng thức b&iacute; mật của KFC, bao gồm 11 loại thảo mộc v&agrave; gia vị kh&aacute;c nhau. B&ecirc;n trong, thịt g&agrave; mềm mại, mọng nước, tạo n&ecirc;n sự kết hợp ho&agrave;n hảo giữa hương vị v&agrave; kết cấu. Đ&ugrave;i g&agrave; KFC thường được phục vụ k&egrave;m với c&aacute;c m&oacute;n phụ như khoai t&acirc;y nghiền, bắp cải trộn, v&agrave; nước ngọt, tạo n&ecirc;n một bữa ăn nhanh gọn nhưng đầy đủ hương vị</p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\"></div>', '2024-08-23 12:02:10', '2024-08-23 05:08:48', 1300, 'uploads/products/1724389330-product-10.jpg', 0, ''),
(14, 2, 'Rau Mồng Tơi', 10000, 14000, '<p>c&oacute; l&aacute; m&agrave;u xanh đậm, h&igrave;nh tr&aacute;i tim, th&acirc;n mềm, mọc leo v&agrave; thường được trồng trong vườn hoặc trong c&aacute;c chậu nhỏ. Loại rau n&agrave;y rất dễ trồng v&agrave; ph&aacute;t triển nhanh ch&oacute;ng, thường được thu hoạch khi c&ograve;n non để c&oacute; hương vị ngon nhất.</p>\r\n<p>Rau mồng tơi c&oacute; nhiều t&aacute;c dụng tốt cho sức khỏe. N&oacute; gi&agrave;u chất xơ, vitamin A, vitamin C, sắt v&agrave; canxi. V&igrave; vậy, ăn mồng tơi gi&uacute;p hỗ trợ ti&ecirc;u h&oacute;a, tăng cường hệ miễn dịch v&agrave; cải thiện sức khỏe xương khớp. Ngo&agrave;i ra, mồng tơi c&ograve;n c&oacute; t&aacute;c dụng l&agrave;m m&aacute;t cơ thể, giải nhiệt, rất th&iacute;ch hợp trong những ng&agrave;y nắng n&oacute;ng.</p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\"></div>', '2024-08-23 12:10:16', '2024-08-23 12:10:16', 0, 'uploads/products/1724389816-product-details-3.jpg', 0, ''),
(15, 2, 'Ớt Chuông', 13000, 17000, '<p>Ớt chu&ocirc;ng, c&ograve;n được gọi l&agrave; ớt ngọt, l&agrave; một loại rau quả thuộc họ Solanaceae, c&oacute; nguồn gốc từ ch&acirc;u Mỹ v&agrave; được trồng rộng r&atilde;i tr&ecirc;n to&agrave;n thế giới. Ớt chu&ocirc;ng c&oacute; nhiều m&agrave;u sắc kh&aacute;c nhau, bao gồm đỏ, v&agrave;ng, cam, xanh l&aacute;, v&agrave; thậm ch&iacute; l&agrave; t&iacute;m, mỗi m&agrave;u mang lại một hương vị v&agrave; gi&aacute; trị dinh dưỡng ri&ecirc;ng.</p>\r\n<p><strong>Gi&aacute; trị dinh dưỡng:</strong> Ớt chu&ocirc;ng rất gi&agrave;u vitamin C, vitamin A, vitamin B6, v&agrave; c&aacute;c chất chống oxy h&oacute;a. Ngo&agrave;i ra, ch&uacute;ng c&ograve;n chứa c&aacute;c chất xơ, gi&uacute;p hỗ trợ ti&ecirc;u h&oacute;a v&agrave; duy tr&igrave; sức khỏe tim mạch. H&agrave;m lượng calo thấp khiến ớt chu&ocirc;ng trở th&agrave;nh lựa chọn l&yacute; tưởng cho những ai muốn duy tr&igrave; c&acirc;n nặng hoặc đang theo đuổi một chế độ ăn l&agrave;nh mạnh.</p>', '2024-08-23 12:11:16', '2024-08-27 03:01:26', 180, 'uploads/products/1724389876-product-details-2.jpg', 35, '0,5 kg'),
(16, 2, 'Combo Rau Ngũ Quả', 119000, 130000, '<p>Combo rau ngũ quả l&agrave; sự kết hợp của năm loại rau củ kh&aacute;c nhau, thường được chọn lựa sao cho đa dạng về m&agrave;u sắc, hương vị v&agrave; dinh dưỡng. Sự phối hợp n&agrave;y kh&ocirc;ng chỉ tạo n&ecirc;n một m&oacute;n ăn hấp dẫn về mặt thị gi&aacute;c m&agrave; c&ograve;n đảm bảo cung cấp nhiều dưỡng chất quan trọng cho sức khỏe. Dưới đ&acirc;y l&agrave; một v&iacute; dụ về combo rau ngũ quả: <strong>Ớt chu&ocirc;ng (đỏ, v&agrave;ng, xanh), </strong><strong>C&agrave; rốt, </strong><strong>B&ocirc;ng cải xanh (s&uacute;p lơ xanh), </strong><strong>Nấm hương, </strong><strong>Cải th&igrave;a, </strong><strong>C&ugrave;ng Nhiều Loại Rau Kh&aacute;c</strong></p>', '2024-08-23 12:13:05', '2024-08-27 03:01:14', 0, 'uploads/products/1724389985-product-details-5.jpg', 68, '6,8 kg'),
(17, 2, 'Combo Cải Thìa-Cà Chua-Cà Tím', 49000, 60000, '<p>Combo cải th&igrave;a, c&agrave; chua, v&agrave; c&agrave; t&iacute;m l&agrave; sự kết hợp tuyệt vời của ba loại rau củ phổ biến, mang đến một bữa ăn vừa ngon miệng vừa bổ dưỡng. Mỗi loại rau củ trong combo n&agrave;y đều c&oacute; hương vị đặc trưng v&agrave; gi&aacute; trị dinh dưỡng ri&ecirc;ng, gi&uacute;p tạo n&ecirc;n một m&oacute;n ăn đa dạng về m&agrave;u sắc v&agrave; hấp dẫn về hương vị.</p>', '2024-08-23 12:14:44', '2024-08-27 03:00:57', 0, 'uploads/products/1724390084-product-details-1.jpg', 36, '3,6 kg'),
(18, 6, 'Hạt Sấy Khô', 89000, 100000, '<p>Hạt sấy kh&ocirc; l&agrave; một loại thực phẩm phổ biến, được l&agrave;m từ c&aacute;c loại hạt dinh dưỡng sau khi đ&atilde; được loại bỏ độ ẩm th&ocirc;ng qua qu&aacute; tr&igrave;nh sấy kh&ocirc;. Việc sấy kh&ocirc; kh&ocirc;ng chỉ gi&uacute;p bảo quản hạt l&acirc;u d&agrave;i m&agrave; c&ograve;n giữ lại được phần lớn c&aacute;c chất dinh dưỡng c&oacute; lợi, đồng thời l&agrave;m cho hạt trở n&ecirc;n gi&ograve;n, thơm ngon v&agrave; tiện lợi để sử dụng.</p>\r\n<p><strong>Dinh dưỡng:</strong> Gi&agrave;u vitamin E, chất xơ, protein, v&agrave; chất b&eacute;o l&agrave;nh mạnh. Hạnh nh&acirc;n rất tốt cho tim mạch v&agrave; gi&uacute;p duy tr&igrave; mức cholesterol khỏe mạnh. Hạt &oacute;c ch&oacute; chứa nhiều omega-3, chất chống oxy h&oacute;a, v&agrave; protein, c&oacute; lợi cho sức khỏe n&atilde;o bộ v&agrave; tim mạch.</p>', '2024-08-23 12:16:53', '2024-08-27 03:00:39', 430, 'uploads/products/1724390213-thumb-4.jpg', 55, '1,2 kg'),
(19, 7, 'Nước Trái Cây Cam Ép', 69000, 80000, '<p>Nước tr&aacute;i c&acirc;y cam &eacute;p l&agrave; một loại thức uống tự nhi&ecirc;n v&agrave; bổ dưỡng được l&agrave;m từ nước &eacute;p của quả cam tươi. Đ&acirc;y l&agrave; một trong những loại nước &eacute;p phổ biến nhất tr&ecirc;n thế giới, được y&ecirc;u th&iacute;ch v&igrave; hương vị ngọt ng&agrave;o, tươi m&aacute;t v&agrave; gi&agrave;u vitamin C, gi&uacute;p tăng cường hệ miễn dịch v&agrave; mang lại nhiều lợi &iacute;ch cho sức khỏe.</p>', '2024-08-23 12:18:17', '2024-08-27 03:00:16', 50, 'uploads/products/1724390297-product-11.jpg', 37, '1,3 kg'),
(20, 3, 'hamburger -Thịt bò', 69000, 75000, '<p>Hamburger l&agrave; một m&oacute;n ăn nhanh nổi tiếng tr&ecirc;n to&agrave;n thế giới, c&oacute; nguồn gốc từ Mỹ, nhưng đ&atilde; trở th&agrave;nh một biểu tượng ẩm thực to&agrave;n cầu. Một chiếc hamburger cơ bản thường bao gồm một miếng thịt xay (thường l&agrave; thịt b&ograve;) được nướng hoặc chi&ecirc;n, kẹp giữa hai nửa b&aacute;nh m&igrave; tr&ograve;n, c&ugrave;ng với c&aacute;c loại rau v&agrave; gia vị t&ugrave;y theo sở th&iacute;ch. hamburger, thường được l&agrave;m từ thịt b&ograve; xay nhuyễn, nhưng cũng c&oacute; thể sử dụng thịt g&agrave;, c&aacute;.</p>', '2024-08-23 12:19:40', '2024-08-27 03:00:00', 570, 'uploads/products/1724390380-product-5.jpg', 34, '0,5 kg'),
(21, 5, 'Dưa Hấu', 10000, 13000, '<p>Dưa hấu l&agrave; một loại tr&aacute;i c&acirc;y phổ biến, đặc biệt được ưa chuộng trong những ng&agrave;y h&egrave; nhờ hương vị ngọt ng&agrave;o, mọng nước v&agrave; t&iacute;nh giải kh&aacute;t cao. Dưa hấu kh&ocirc;ng chỉ l&agrave; một loại tr&aacute;i c&acirc;y ngon m&agrave; c&ograve;n mang lại nhiều lợi &iacute;ch sức khỏe nhờ v&agrave;o h&agrave;m lượng vitamin, kho&aacute;ng chất, v&agrave; chất chống oxy h&oacute;a phong ph&uacute;.</p>\r\n<p><strong>Vitamin C:</strong> Gi&uacute;p tăng cường hệ miễn dịch, bảo vệ cơ thể khỏi c&aacute;c t&aacute;c nh&acirc;n g&acirc;y bệnh.</p>\r\n<p><strong>Vitamin A:</strong> Tốt cho thị lực, gi&uacute;p bảo vệ mắt v&agrave; tăng cường sức khỏe của da.</p>\r\n<p>&nbsp;</p>', '2024-08-23 12:20:49', '2024-08-27 02:59:37', 350, 'uploads/products/1724390449-product-7.jpg', 15, '2,5 kg'),
(22, 5, 'Xoài Thái', 18000, 25000, '<p>Xo&agrave;i Th&aacute;i l&agrave; một loại tr&aacute;i c&acirc;y nhiệt đới nổi tiếng, được biết đến với hương vị ngọt ng&agrave;o, thịt quả d&agrave;y v&agrave; m&ugrave;i thơm đặc trưng. Đ&acirc;y l&agrave; một trong những giống xo&agrave;i được ưa chuộng nhất kh&ocirc;ng chỉ tại Th&aacute;i Lan m&agrave; c&ograve;n ở nhiều quốc gia kh&aacute;c tr&ecirc;n thế giới.</p>\r\n<p><strong>Vitamin C:</strong> Xo&agrave;i Th&aacute;i rất gi&agrave;u vitamin C, gi&uacute;p tăng cường hệ miễn dịch v&agrave; hỗ trợ sự hấp thụ sắt từ thực phẩm kh&aacute;c.</p>\r\n<p><strong>Vitamin A:</strong> Cung cấp vitamin A dồi d&agrave;o, tốt cho thị lực v&agrave; sức khỏe của da.</p>', '2024-08-23 12:21:51', '2024-08-27 02:59:20', 0, 'uploads/products/1724390511-product-6.jpg', 22, '0,5 kg'),
(23, 6, 'Mận Bakalland nguyên quả 100g', 48000, 55000, '<p>Mận Bakalland nguy&ecirc;n quả l&agrave; một sản phẩm mận kh&ocirc; được đ&oacute;ng g&oacute;i sẵn, thương hiệu Bakalland nổi tiếng với c&aacute;c sản phẩm tr&aacute;i c&acirc;y sấy kh&ocirc; v&agrave; c&aacute;c loại hạt dinh dưỡng.&nbsp;</p>\r\n<p>&nbsp;</p>', '2024-08-23 12:24:48', '2024-08-27 02:59:11', 0, 'uploads/products/1724390688-product-9.jpg', 30, '0,8 kg'),
(24, 5, 'Nho Mỹ 200g', 57000, 70000, '<div class=\"flex-shrink-0 flex flex-col relative items-end\">\r\n<div>\r\n<div class=\"pt-0\">\r\n<div class=\"gizmo-bot-avatar flex h-8 w-8 items-center justify-center overflow-hidden rounded-full\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"group/conversation-turn relative flex w-full min-w-0 flex-col agent-turn\">\r\n<div class=\"flex-col gap-1 md:gap-3\">\r\n<div class=\"flex max-w-full flex-col flex-grow\">\r\n<div class=\"min-h-[20px] text-message flex w-full flex-col items-end gap-2 break-words [.text-message+&amp;]:mt-5 overflow-x-auto whitespace-pre-wrap\" dir=\"auto\" data-message-author-role=\"assistant\" data-message-id=\"3f02519b-7fad-4f55-8794-6383aa84722f\">\r\n<div class=\"flex w-full flex-col gap-1 empty:hidden first:pt-[3px]\">\r\n<div class=\"result-streaming markdown prose w-full break-words dark:prose-invert light\">\r\n<p>Nho Mỹ 200g l&agrave; một g&oacute;i nho tươi nhập khẩu từ Mỹ, nổi tiếng với hương vị ngọt ng&agrave;o, gi&ograve;n v&agrave; mọng nước. Nho Mỹ c&oacute; thể l&agrave; nho đỏ, xanh, hoặc đen, t&ugrave;y theo loại nho v&agrave; thời điểm thu hoạch.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', '2024-08-23 12:27:04', '2024-08-31 14:08:19', 0, 'uploads/products/1724390824-product-4.jpg', 6, '0,5 kg');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'client');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int NOT NULL,
  `key` varchar(50) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`) VALUES
(1, 'logo', 'ogani'),
(4, 'logo', 'ogani');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int NOT NULL,
  `image` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `phone`, `address`, `password`, `role_id`, `image`) VALUES
(6, 'Nguyễn Văn B', 'a@gmail.com', '0977553778', 'VIETNAM', '12345678', 2, 'uploads/users/1724811786-avatar 3.jpg'),
(7, 'Nguyễn Văn C', 'c@gmail.com', '0977553778', 'VIETNAM', '12345678', 2, 'uploads/users/1724811776-avatar 4.jpg'),
(8, 'Nguyễn Văn D', 'd@gmail.com', '0977553778', 'VIETNAM', '12345678', 2, 'uploads/users/1724811755-avatar 2.jpg'),
(21, 'Admin', 'admin@gmail.com', '0344487493', 'Hà Nội', '12345678', 1, 'uploads/users/1724811743-avatar 5.jpg'),
(26, 'Dat Do', 'dat@gmail.com', '0344667887', 'HaNoi', '12345678', 2, 'uploads/users/1724811389-avatar 1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_post`
--
ALTER TABLE `category_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cate_id` (`cate_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cate_id` (`cate_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category_post`
--
ALTER TABLE `category_post`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `category_post` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
